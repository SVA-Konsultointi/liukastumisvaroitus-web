<?php

namespace Concrete\Package\Liukastumisvaroitus;

defined('C5_EXECUTE') or die('Access Denied.');

use \Concrete\Core\Package\Package;
use \Concrete\Core\Page\Template;
use \Concrete\Theme\Concrete\PageTheme;

class Controller extends Package
{
    protected $pkgHandle = 'liukastumisvaroitus';
    protected $appVersionRequired = '8.2.0';
    protected $pkgVersion = '2.0.0';
    protected $pkgAutoloaderRegistries = array(
        'src/Helpers' => '\Liukastumisvaroitus\Helpers'
    );

    public function getPackageName()
    {
        return t('Liukastumisvaroitus');
    }

    public function getPackageDescription()
    {
        return t('Custom styles and functionality for liukastumisvaroitus.');
    }

    public function install()
    {
        $package = parent::install();

        PageTheme::add('liukastumisvaroitus_theme', $package);

        Template::add('default', 'Default', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);

        Template::add('left_sidebar', 'Left sidebar', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);

        Template::add('warnings', 'Warnings', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);

        Template::add('full', 'Full', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);

        Template::add('full_gallery', 'Full gallery', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);

        Template::add('gallery_page', 'Gallery page', FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $package);
    }
}
