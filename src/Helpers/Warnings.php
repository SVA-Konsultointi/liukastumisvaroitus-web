<?php

namespace Liukastumisvaroitus\Helpers;

defined('C5_EXECUTE') or die('Access Denied.');

class Warnings
{
    private $output = [];

    public function __construct()
    {
        $curl = curl_init('http://46.101.247.197/api/v1/warnings');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($curl);

        $this->output = json_decode($json, true);

        curl_close($curl);
    }

    public function printWarningNumbers()
    {
        $warnings = [];

        foreach ($this->output as $item) {
            $city = $item['city'];

            if (!array_key_exists($city, $warnings)) {
                $warnings[$city] = 0;
            }

            $warnings[$city]++;
        }

        echo <<<EOF
<h3>Varoitusviestien määrät</h3>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        {$this->printWarningNumberRows($warnings)}
    </table>
</div>
EOF;
    }

    public function printYearlyWarnings()
    {
        $warnings = [];

        foreach ($this->output as $item) {
            $year = date_create_from_format('Y-m-d H:i:s', $item['created_at'])->format('Y');

            if (!array_key_exists($year, $warnings)) {
                $warnings[$year] = [];
            }

            $warnings[$year][] = $item;
        }

        $distinctYears = array_keys($warnings);

        echo <<<EOF
<h3>Varoitusten ajankohdat ja kaupungit</h3>
<ul class="nav nav-tabs">
    {$this->printTabs($distinctYears)}
</ul>
<div class="tab-content">
    {$this->printPanes($distinctYears, $warnings)}
</div>
EOF;
    }

    private function printPanes($distinctYears, $warnings)
    {
        $html = '';

        foreach ($distinctYears as $start) {
            $end = $start + 1;

            $html .= <<<EOF
<div class="tab-pane fade in active" id="$end">
    <table class="table table-striped table-hover">
        {$this->printRows($warnings[$start])}
    </table>
</div>
EOF;
        }

        return $html;
    }

    private function printRows($warnings)
    {
        $html = '';

        foreach ($warnings as $row) {
            $date = date('d.m.Y H:i', strtotime($row['created_at']));
            $city = $row['city'];

            $html .= <<<EOF
<tr>
    <td>$date</td>
    <td>$city</td>
</tr>
EOF;
        }

        return $html;
    }

    private function printTabs($distinctYears)
    {
        $html = '';

        foreach ($distinctYears as $start) {
            $end = $start + 1;

            $html .= <<<EOF
<li class="active"><a href="#$end" data-toggle="tab">$start - $end</a></li>
EOF;
        }

        return $html;
    }

    private function printWarningNumberRows($warnings)
    {
        $html = '';

        foreach ($warnings as $city => $count) {
            $html .= <<<EOF
<tr>
    <td>$city</td>
    <td>
        <script>
            var found = false;
            
            $("table:first tr").each(function() {
                var city = $(this).find("td:eq(0)").html();
                var city2 = "$city";
            
                if(city === city2) {
                    document.write($(this).find("td:eq(1)").html() * $count);
                    found = true;
                }
            });
            
            if(!found) {
                document.write($count);
            }
        </script>
    </td>
</tr>
EOF;
        }

        return $html;
    }
}
