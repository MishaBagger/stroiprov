<?php
$home_page = get_page_by_path('main');
$cookies_page_id = $home_page ? $home_page->ID : 0;
?>

<footer class="w-full bg-primary-700 border-t border-primary-700">
    <div class="container mx-auto px-4 sm:px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="space-y-4">
                <a href="<?php echo home_url('/'); ?>" class="flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php
                        $logo_id = get_theme_mod('custom_logo');
                        $logo_url = wp_get_attachment_image_src($logo_id, 'full');
                        if ($logo_url) :
                        ?>
                            <img src="<?php echo esc_url($logo_url[0]); ?>"
                                alt="<?php bloginfo('name'); ?>"
                                class="h-16 w-auto object-contain">
                        <?php endif; ?>
                    <?php else : ?>
                        <span class="text-2xl font-bold text-white">
                            <?php bloginfo('name'); ?>
                        </span>
                    <?php endif; ?>
                </a>
                <p class="text-primary-100 text-sm font-golos leading-relaxed">
                    Профессиональное обучение персонала для работы на строительных машинах и механизмах с 2009 года.
                </p>

            </div>


            <div>
                <h4 class="text-white font-semibold text-lg mb-4 font-arimo">Контакты</h4>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_contacts',
                    'menu_class'     => 'space-y-2 text-sm font-golos',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>
            </div>

            <div>
                <h4 class="text-white font-semibold text-lg mb-4 font-arimo">Навигация</h4>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class'     => 'space-y-2 text-sm font-golos',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>
            </div>

            <div>
                <h4 class="text-white font-semibold text-lg mb-4 font-arimo">Информация</h4>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_info',
                    'menu_class'     => 'space-y-2 text-sm font-golos',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>
            </div>


        </div>
        <div class="border-t border-primary-500 mt-10 pt-6 text-center">
            <p class="text-primary-100 text-sm font-golos">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                Все права защищены.
            </p>
        </div>
</footer>

<div id="modal-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-9999 flex items-center justify-center opacity-0 invisible transition-all duration-300">

    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 xs:max-w-[90%] sm:max-w-md mx-auto">
        <button id="modal-close" class="absolute top-3 right-4 text-gray-400 hover:text-gray-800 text-3xl cursor-pointer transition-colors duration-200 bg-transparent border-0 leading-none">
            &times;
        </button>

        <?php echo do_shortcode('[contact-form-7 id="c356283" title="Заявка с главной страницы"]'); ?>

        

    </div>


</div>

<div id="cookie-notice" class="fixed bottom-4 left-1/2 -translate-x-1/2 z-9999 max-w-2xl w-[90%] bg-primary-900 text-gray-200 px-4 py-4 md:px-6 md:py-5 rounded-xl shadow-2xl border border-primary-700 transition-all duration-700 transform translate-y-10 opacity-0 pointer-events-none">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4">
        <p class="text-sm sm:text-base xs:text-xs font-golos text-gray-200 leading-relaxed sm:text-left">
            <?php the_field('text_cookies', $cookies_page_id) ?>
            <a href="<?php the_field('link_cookies', $cookies_page_id) ?>" class="text-secondary hover:text-primary-400 transition duration-300" target="_blank"><?php the_field('link_cookies_text', $cookies_page_id) ?> </a>
            <?php the_field('text_cookies_end', $cookies_page_id) ?>

        </p>
        <button id="cookie-accept" class="shrink-0 bg-primary-500 hover:bg-primary-400 text-white font-semibold py-2.5 px-6 md:py-3 md:px-8 rounded-lg text-sm md:text-base font-golos cursor-pointer transition-all duration-300 hover:scale-105 active:scale-95">
            <?php the_field('button_cookies', $cookies_page_id) ?>
        </button>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>