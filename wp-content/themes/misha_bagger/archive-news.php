<?php
get_header();
?>

<?php
$hero_title = get_field('news_hero_title', 'option') ?: 'Новости';
$hero_subtitle = get_field('news_hero_subtitle', 'option') ?: 'Актуальные новости и события';
$hero_bg = get_field('news_hero_background', 'option');
$hero_bg_url = $hero_bg ? wp_get_attachment_image_url($hero_bg, 'full') : '';

$accent_title = get_field('news_accent_title', 'option') ?: 'Новости';
$section_title = get_field('news_section_title', 'option') ?: 'Последние новости';
?>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider">
                <?php echo esc_html($accent_title); ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-primary-900 font-arimo mt-3">
                <?php echo esc_html($section_title); ?>
            </h2>
        </div>

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
        $news_args = array(
            'post_type'      => 'news',
            'posts_per_page' => 9,
            'paged'          => $paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $news_query = new WP_Query($news_args);
        ?>

        <?php if ($news_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <article class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-gray-100 group">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="relative h-48 overflow-hidden">
                                <img src="<?php the_post_thumbnail_url('high'); ?>" 
                                     alt="<?php the_title(); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-3 right-3 bg-primary-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    <?php echo get_the_date('d.m.Y'); ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="h-48 bg-primary-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-sm text-gray-500 font-golos">
                                <span><?php echo get_the_date('d.m.Y'); ?></span>
                            </div>
                            <h3 class="text-xl font-bold text-primary-800 font-arimo mt-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary-500 transition">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="text-gray-600 font-golos mt-2 text-sm leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" 
                               class="mt-4 inline-block text-primary-500 hover:text-primary-400 font-semibold transition group-hover:translate-x-1">
                                Читать далее →
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php if ($news_query->max_num_pages > 1) : ?>
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <?php
                        echo paginate_links(array(
                            'total'     => $news_query->max_num_pages,
                            'current'   => $paged,
                            'prev_text' => '<span class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition">←</span>',
                            'next_text' => '<span class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition">→</span>',
                            'mid_size'  => 2,
                        ));
                        ?>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="text-center py-12">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <p class="text-gray-500 font-golos text-lg">Новостей пока нет</p>
                <p class="text-gray-400 font-golos text-sm mt-1">Следите за обновлениями</p>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>