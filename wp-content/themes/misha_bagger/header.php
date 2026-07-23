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

                <nav class="hidden lg:flex items-center xl:space-x-8 lg:space-x-2 text-base font-medium">
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Учебный центр</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Охрана труда</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Промышленная безопасность</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Электробезопасность</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Дистанционное обучение</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">Новости</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300">ЦОК</a>
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

            <nav id="mobile-menu" class="lg:hidden hidden pb-6">
                <div class="flex flex-col space-y-4 text-base font-medium">
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Учебный центр</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Охрана труда</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Промышленная безопасность</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Электробезопасность</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Дистанционное обучение</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">Новости</a>
                    <a href="#" class="text-white hover:text-primary-400 transition duration-300 py-2 border-b border-primary-500">ЦОК</a>
                </div>
            </nav>
        </div>
    </header>

    <main class="min-h-screen">