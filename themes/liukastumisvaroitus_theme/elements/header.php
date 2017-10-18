<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var \Concrete\Core\View\View $view
 * @var \Concrete\Core\Page\Page $c
 */

$language = \Concrete\Core\Localization\Localization::activeLanguage();

if ($language === 'fi') {
    $language = '';
} else {
    $language = " $language";
}

?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index,follow,noodp,noydir"/>
	<meta name="description" content="Liukastumisvaroitus on palvelu, joka varoittaa jalankulkijaa liukkaudeta tekstiviestillä.">

    <!-- Bootstrap -->
    <link href="<?= $view->getThemePath() ?>/css/bootstrap.css" rel="stylesheet" media="screen" type="text/css">
    <link href="<?= $view->getThemePath() ?>/css/main.css" rel="stylesheet" media="screen" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?= $view->getThemePath() ?>/js/html5shiv.js"></script>
      <script src="<?= $view->getThemePath() ?>/js/respond.min.js"></script>
    <![endif]-->

    <?php \Concrete\Core\View\View::element('header_required') ?>
  </head>
  <body>
    <div id="wrapper" class="container">
      <div class="row">
        <div class="col-md-6">
          <?php
          $logo = new \Concrete\Core\Area\GlobalArea("Logo$language");
          $logo->display($c);
          ?>
        </div>
      </div>

      <header>
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
              <div class="container-fluid">
                <?php
                $navigation = new \Concrete\Core\Area\GlobalArea('Header Navigation');
                $navigation->display($c);
                ?>
              </div>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php
            $header = new \Concrete\Core\Area\GlobalArea("Header$language");
            $header->display($c);
            ?>
          </div>
        </div>
      </header>
