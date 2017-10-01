<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var \Concrete\Core\View\View $view
 * @var \Concrete\Core\Page\Page $c
 */

$view->inc('elements/header.php');

?>

<div class="row">
  <div class="col-lg-12">
    <?php
    $main = new \Concrete\Core\Area\Area('Main');
    $main->display($c);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 tipGallery">
    <?php
    $left = new \Concrete\Core\Area\Area('Column 1');
    $left->display($c);
    ?>
  </div>

  <div class="col-lg-4 tipGallery">
    <?php
    $center = new \Concrete\Core\Area\Area('Column 2');
    $center->display($c);
    ?>
  </div>

  <div class="col-lg-4 tipGallery">
    <?php
    $right = new \Concrete\Core\Area\Area('Column 3');
    $right->display($c);
    ?>
  </div>
</div>

<?php

$view->inc('elements/footer.php');
