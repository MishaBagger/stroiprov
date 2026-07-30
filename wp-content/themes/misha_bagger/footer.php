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

<?php wp_footer(); ?>
</body>

</html>