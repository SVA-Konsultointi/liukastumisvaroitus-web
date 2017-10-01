<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var \Concrete\Core\View\View $view
 */

?>
      <footer>
        <div class="row">
          <div class="col-md-6">
            <p>
              <?= 'Liukastumisvaroitus ' . date('Y') ?>
			  <a class="glyph-link" href="/index.php/login">
                <span class="glyphicon glyphicon-lock"></span>
              </a>
            </p>
          </div>

          <div class="col-md-6">
            <a class="glyph-link pull-right" href="#">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
          </div>
        </div>
      </footer>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= $view->getThemePath() ?>/js/bootstrap.js"></script>

    <?php \Concrete\Core\View\View::element('footer_required') ?>
  </body>
</html>
