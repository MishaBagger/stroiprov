<?php
get_header();
?>

<?php
$bg_image = get_field('background_image', get_the_ID());
$bg_url = $bg_image ? wp_get_attachment_image_url($bg_image, 'full') : '';
?>

<?php if (has_post_thumbnail()) : ?>
    <main class="relative min-h-60 md:min-h-75 lg:min-h-80 w-full flex items-center justify-center overflow-hidden" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-primary-900/70"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white font-arimo"><?php the_title(); ?></h1>
            <div class="flex items-center justify-center gap-4 text-gray-300 mt-4 font-golos">
                <span><?php echo get_the_date('d.m.Y'); ?></span>
            </div>
        </div>
    </main>
<?php else : ?>
    <section class="py-8 bg-primary-900">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white font-arimo"><?php the_title(); ?></h1>
            <div class="flex items-center justify-center gap-4 text-gray-300 mt-4 font-golos">
                <span><?php echo get_the_date('d.m.Y'); ?></span>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="relative overflow-hidden">
                        <img src="<?php the_post_thumbnail_url('large'); ?>"
                            alt="<?php the_title(); ?>"
                            class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                <?php echo get_the_date('d.m.Y'); ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="p-6 md:p-10 lg:p-12">
                    <h1 class="text-2xl sm:text-3xl font-bold text-primary-800 font-arimo mb-4"><?php the_title(); ?></h1>

                    <div class=" max-w-none font-golos text-gray-700 leading-relaxed 
                              
                              ">
                        <?php the_content(); ?>
                    </div>

                    <div class="my-8 border-t border-gray-200"></div>

                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <a href="<?php echo home_url('/news/'); ?>"
                            class="inline-flex items-center text-primary-500 hover:text-primary-400 font-semibold transition group">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Все новости
                        </a>

                        <div class="flex gap-3">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            <?php if ($prev_post) : ?>
                                <a href="<?php echo get_permalink($prev_post); ?>"
                                    class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition flex items-center gap-1">
                                    ← Назад
                                </a>
                            <?php endif; ?>
                            <?php if ($next_post) : ?>
                                <a href="<?php echo get_permalink($next_post); ?>"
                                    class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition flex items-center gap-1">
                                    Вперед →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>