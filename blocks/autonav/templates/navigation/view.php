<?php

$navItems = $controller->getNavItems();

foreach ($navItems as $ni) {
    $classes = array();

    if ($ni->inPath) {
        //class for parent items of the page currently being viewed
        $classes[] = 'active';
    }

    $ni->classes = implode(" ", $classes);
}

echo '<ul class="nav navbar-nav">';

foreach ($navItems as $ni) {

    echo '<li class="' . $ni->classes . '">';
    echo '<a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a>';
    echo '</li>';
}

echo '</ul>';
