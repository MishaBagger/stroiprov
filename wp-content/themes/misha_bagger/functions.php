<?php

function stroiprov_assets()
{
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
    'footer_contacts'   => 'Меню в подвале (Контакты)',
    'footer_info'  => 'Меню в подвале (Информация)',
]);

// Главное меню в шапке, добавление Tailwind классов

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'text-gray-50 hover:text-primary-400 transition duration-300';
    }

    if ($args->theme_location === 'footer_contacts') {
        $atts['class'] = 'text-gray-50 hover:text-primary-400 transition duration-300';
    }

    if ($args->theme_location === 'footer_info') {
        $atts['class'] = 'text-gray-50 hover:text-primary-400 transition duration-300';
  
    }

    return $atts;
}, 10, 3);

// Очистка дефолтных li с отступами и прочими помехами при вёрстке

add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    if ($args->theme_location === 'primary') {
        return [];
    }
    return $classes;
}, 10, 3);

add_filter('rest_authentication_errors', function ($result) {
    if (!is_user_logged_in()) {
        return $result;
    }
    return true;
});

// Костыль для target_blank в меню)

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
    $site_url = home_url();
    if (strpos($item->url, $site_url) === false && !empty($item->url)) {
        $atts['target'] = '_blank';
        $atts['rel'] = 'noopener noreferrer';
    }
    return $atts;
}, 10, 3);

// Вынесен скрипт в отдельный файл, подключение в футере

function stroiprov_menu()
{
    wp_enqueue_script(
        'stroiprov-menu',
        get_template_directory_uri() . '/assets/js/menu.js',
        [],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'stroiprov-form',
        get_template_directory_uri() . '/assets/js/form.js',
        [],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'stroiprov-cookie',
        get_template_directory_uri() . '/assets/js/cookie.js',
        [],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'stroiprov-sanitize',
        get_template_directory_uri() . '/assets/js/sanitize.js',
        [],
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'stroiprov_menu');

// Рендер картинок без костылей

function render_acf_image($field_name, $page_id = null, $size = 'full', $class = '', $alt = '')
{
    if (!$page_id) {
        $page_id = get_the_ID();
    }

    $image_id = get_field($field_name, $page_id);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, $size) : '';

    if ($image_url) {
        $alt_text = $alt ?: $field_name;
        $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '"' . $class_attr . '>';
    }
}

function render_file_link($field_name, $page_id, $default_text) {
    $file = get_field($field_name, $page_id);
    if ($file) {
        if (is_array($file)) {
            $file_url = $file['url'];
            $file_title = $file['title'] ?: basename($file_url);
        } elseif (is_numeric($file)) {
            $file_url = wp_get_attachment_url($file);
            $file_title = get_the_title($file) ?: basename($file_url);
        } else {
            $file_url = $file;
            $file_title = basename($file_url);
        }
        echo '<a href="' . esc_url($file_url) . '" download class="text-primary-500 hover:text-primary-400 transition font-semibold">' . esc_html($file_title) . '</a>';
    } else {
        echo '<span class="text-gray-400">' . esc_html($default_text) . ' (файл не загружен)</span>';
    }
}


// Подключение CPT

add_action('init', function() {
    register_post_type('news', [
        'labels' => [
            'name'          => 'Новости',
            'singular_name' => 'Новость',
            'add_new'       => 'Добавить новую',
            'add_new_item'  => 'Добавить новость',
            'edit_item'     => 'Редактировать новость',
            'new_item'      => 'Новая новость',
            'view_item'     => 'Просмотреть новость',
            'search_items'  => 'Искать новости',
            'not_found'     => 'Новостей не найдено',
            'menu_name'     => 'Новости',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'date'],
        'rewrite'            => ['slug' => 'news', 'with_front' => false],
        'capability_type'    => 'post',
    ]);
});

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Настройки новостей',
        'menu_title' => 'Настройки новостей',
        'menu_slug'  => 'news-settings',
        'capability' => 'manage_options',
        'position'   => 20,
        'icon_url'   => 'dashicons-megaphone',
    ]);
}

add_theme_support('post-thumbnails');

add_filter('wpcf7_autop_or_not', '__return_false');

add_action('init', function() {
    register_post_type('program_workers', [
        'labels' => [
            'name'               => 'Программы для рабочих',
            'singular_name'      => 'Программа для рабочих',
            'add_new'            => 'Добавить программу',
            'add_new_item'       => 'Добавить программу для рабочих',
            'edit_item'          => 'Редактировать программу',
            'new_item'           => 'Новая программа',
            'view_item'          => 'Просмотреть программу',
            'search_items'       => 'Искать программы',
            'not_found'          => 'Программ не найдено',
            'not_found_in_trash' => 'В корзине нет программ',
            'menu_name'          => 'Программы для рабочих',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'programs', 'with_front' => false],
        'capability_type'    => 'post',
    ]);
});

add_action('init', function() {
    register_post_type('program_qualified', [
        'labels' => [
            'name'               => 'Повышение квалификации',
            'singular_name'      => 'Программа повышения квалификации',
            'add_new'            => 'Добавить программу',
            'add_new_item'       => 'Добавить программу повышения квалификации',
            'edit_item'          => 'Редактировать программу',
            'new_item'           => 'Новая программа',
            'view_item'          => 'Просмотреть программу',
            'search_items'       => 'Искать программы',
            'not_found'          => 'Программ не найдено',
            'not_found_in_trash' => 'В корзине нет программ',
            'menu_name'          => 'Повышение квалификации',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-update',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'qualification', 'with_front' => false],
        'capability_type'    => 'post',
    ]);
});

add_action('init', function() {
    register_post_type('program_retraining', [
        'labels' => [
            'name'               => 'Профессиональная переподготовка',
            'singular_name'      => 'Программа переподготовки',
            'add_new'            => 'Добавить программу',
            'add_new_item'       => 'Добавить программу переподготовки',
            'edit_item'          => 'Редактировать программу',
            'new_item'           => 'Новая программа',
            'view_item'          => 'Просмотреть программу',
            'search_items'       => 'Искать программы',
            'not_found'          => 'Программ не найдено',
            'not_found_in_trash' => 'В корзине нет программ',
            'menu_name'          => 'Профпереподготовка',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-editor-paste-word',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'retraining', 'with_front' => false],
        'capability_type'    => 'post',
    ]);
});

add_action('init', function() {
    register_post_type('program_additional', [
        'labels' => [
            'name'               => 'Дополнительное образование',
            'singular_name'      => 'Программа допобразования',
            'add_new'            => 'Добавить программу',
            'add_new_item'       => 'Добавить программу допобразования',
            'edit_item'          => 'Редактировать программу',
            'new_item'           => 'Новая программа',
            'view_item'          => 'Просмотреть программу',
            'search_items'       => 'Искать программы',
            'not_found'          => 'Программ не найдено',
            'not_found_in_trash' => 'В корзине нет программ',
            'menu_name'          => 'Дополнительное образование',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 23,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'additional', 'with_front' => false],
        'capability_type'    => 'post',
    ]);
});