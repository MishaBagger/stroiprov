<?php

function stroiprov_assets() {
    wp_enqueue_style('stroiprov-style', get_template_directory_uri() . '/dist/app.css', [], filemtime(get_template_directory() . '/dist/app.css'));
}
add_action('wp_enqueue_scripts', 'stroiprov_assets');

add_theme_support('title-tag');

add_theme_support('custom-logo', [
    'height'      => 60,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
]);