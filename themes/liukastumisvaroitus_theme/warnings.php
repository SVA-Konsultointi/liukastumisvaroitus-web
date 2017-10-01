<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var \Concrete\Core\View\View $view
 * @var \Concrete\Core\Page\Page $c
 */

$view->inc('elements/header.php');

$warnings = new \Liukastumisvaroitus\Helpers\Warnings();

?>

<div class="row">
  <div class="col-lg-6">
    <?php
    $main = new \Concrete\Core\Area\Area('Main');
    $main->display($c);
    ?>

    <?php
    $warnings->printWarningNumbers();
    ?>
  </div>

  <div class="col-lg-6">
    <?php
    $warnings->printYearlyWarnings();
    ?>
  </div>
</div>

<?php

$view->inc('elements/footer.php');
