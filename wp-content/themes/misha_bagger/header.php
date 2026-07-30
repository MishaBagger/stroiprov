<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Golos+Text:wght@400..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="w-full bg-primary-700 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-25">

                <a href="<?php echo home_url('/'); ?>" class="flex items-center h-full">
                    <?php if (has_custom_logo()) : ?>
                        <?php
                        $logo_id = get_theme_mod('custom_logo');
                        $logo_url = wp_get_attachment_image_src($logo_id, 'full');
                        if ($logo_url) :
                        ?>
                            <img src="<?php echo esc_url($logo_url[0]); ?>"
                                alt="<?php bloginfo('name'); ?>"
                                class="h-20 w-auto object-contain">
                        <?php endif; ?>
                    <?php else : ?>
                        <span class="text-2xl font-bold text-white">
                            <?php bloginfo('name'); ?>
                        </span>
                    <?php endif; ?>
                </a>

                <nav id="desktop_menu" class="hidden lg:flex items-center xl:space-x-8 lg:space-x-2 text-base font-medium">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex items-center xl:space-x-8 lg:space-x-2 text-base font-medium',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>
                </nav>

                <button id="burger-button"
                    class="lg:hidden text-white hover:text-primary-400 transition duration-300 p-2 focus:outline-none focus:ring-2 focus:ring-primary-400 rounded-lg"
                    aria-label="Открыть меню">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" id="burger-icon-open" d="M4 6h16M4 12h16M4 18h16" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" id="burger-icon-close" d="M6 18L18 6M6 6l12 12" class="hidden" />
                    </svg>
                </button>
            </div>

            <nav id="mobile-menu" class="lg:hidden hidden p-6 absolute left-0 right-0 top-full bg-primary-700 shadow-lg  border-primary-600 z-50 h-screen overflow-y-auto">
                <div class="flex flex-col space-y-4 text-base font-medium">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex flex-col space-y-4 text-base font-medium',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer_info',
                        'menu_class'     => 'flex flex-col space-y-4 text-base font-medium',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>
                </div>
            </nav>
        </div>
    </header>