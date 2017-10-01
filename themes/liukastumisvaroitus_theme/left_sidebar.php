<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var \Concrete\Core\View\View $view
 * @var \Concrete\Core\Page\Page $c
 */

$view->inc('elements/header.php');

?>

<div class="row">
  <div class="col-lg-4">
    <?php
    $sidebar = new \Concrete\Core\Area\Area('Sidebar');
    $sidebar->display($c);
    ?>
  </div>

  <div class="col-lg-8">
    <?php
    $main = new \Concrete\Core\Area\Area('Main');
    $main->display($c);
    ?>
  </div>
</div>

<?php

$view->inc('elements/footer.php');
