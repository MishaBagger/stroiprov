<?php
/*
Template Name: Одиночная новость
*/
get_header();
?>

<?php
$bg_image = get_field('background_image', get_the_ID());
$bg_url = $bg_image ? wp_get_attachment_image_url($bg_image, 'full') : '';
?>

<main class="relative min-h-62.5 md:min-h-75 lg:min-h-87.5 w-full flex items-center justify-center overflow-hidden" style="<?php if ($bg_url) : ?>background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center;<?php endif; ?>">
    <div class="absolute inset-0 bg-primary-900/70"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white font-arimo"><?php the_title(); ?></h1>
        <div class="w-20 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
        <div class="flex items-center justify-center gap-4 text-gray-300 mt-4 font-golos">
            <span><?php echo get_the_date('d.m.Y'); ?></span>
            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
        </div>
    </div>
</main>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-gray-100">
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 rounded-xl overflow-hidden">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" 
                         alt="<?php the_title(); ?>" 
                         class="w-full h-auto object-cover">
                </div>
            <?php endif; ?>

            <div class="prose prose-lg max-w-none font-golos text-gray-700 leading-relaxed">
                <?php the_content(); ?>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200 flex justify-between items-center flex-wrap gap-4">
                <a href="<?php echo home_url('/novosti/'); ?>" 
                   class="inline-flex items-center text-primary-500 hover:text-primary-400 font-semibold transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    ← Все новости
                </a>
                
                <?php 
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                <div class="flex gap-3">
                    <?php if ($prev_post) : ?>
                        <a href="<?php echo get_permalink($prev_post); ?>" 
                           class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition">
                            ← Назад
                        </a>
                    <?php endif; ?>
                    <?php if ($next_post) : ?>
                        <a href="<?php echo get_permalink($next_post); ?>" 
                           class="px-4 py-2 bg-primary-100 text-primary-700 rounded-lg hover:bg-primary-200 transition">
                            Вперед →
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>