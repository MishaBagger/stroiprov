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

register_nav_menus([
    'primary' => 'Главное меню (шапка)',
]);

// Главное меню в шапке, добавление Tailwind классов

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'text-gray-50 hover:text-primary-400 transition duration-300';

        if (wp_is_mobile()) {
            $atts['class'] .= ' inline-block w-full py-2 border-b-2 border-primary-500';
        }
    }
    return $atts;
}, 10, 3);

// Очистка дефолтных li с отступами и прочими помехами при вёрстке

add_filter('nav_menu_css_class', function($classes, $item, $args) {
    if ($args->theme_location === 'primary') {
        return [];
    }
    return $classes;
}, 10, 3);

add_filter('rest_authentication_errors', function($result) {
    if (!is_user_logged_in()) {
        return $result;
    }
    return true;
});

// Костыль для target_blank в меню)

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
    $site_url = home_url();
    if (strpos($item->url, $site_url) === false && !empty($item->url)) {
        $atts['target'] = '_blank';
        $atts['rel'] = 'noopener noreferrer';
    }
    return $atts;
}, 10, 3);

// Вынесен скрипт в отдельный файл, подключение в футере

function stroiprov_menu() {
    wp_enqueue_script(
        'stroiprov-menu',                        
        get_template_directory_uri() . '/assets/js/menu.js',
        [],                                     
        '1.0.0',                               
        true                                    
    );
}
add_action('wp_enqueue_scripts', 'stroiprov_menu');