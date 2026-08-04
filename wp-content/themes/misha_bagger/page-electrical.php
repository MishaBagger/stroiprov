<?php
/*
Template Name: Электробезопасность
*/
get_header();
?>

<?php
$page_id = get_the_ID();
$bg_image = get_field('background_image', $page_id);
$bg_url = $bg_image ? wp_get_attachment_image_url($bg_image, 'full') : '';
?>

<main class="relative min-h-75 md:min-h-100 lg:min-h-125 w-full flex items-center justify-center overflow-hidden" style="<?php if ($bg_url) : ?>background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center;<?php endif; ?>">
    <div class="absolute inset-0 bg-primary-900/70"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white font-arimo"><?php the_title(); ?></h1>
        <div class="w-20 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
        <p class="text-base sm:text-lg md:text-xl text-gray-200 mt-4 font-golos max-w-3xl mx-auto">
            <?php the_field('subtitle', $page_id) ?>

        </p>
    </div>
</main>

<section class="relative bg-primary-50 py-16 overflow-hidden">

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_1', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_1', $page_id) ?>
            </h2>
        </div>

        <div class="relative max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-8 md:p-12 lg:p-14 border border-gray-100 hover:shadow-3xl transition-shadow duration-500">

            <div class="w-14 h-14 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>

            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed">
                <span class="font-bold text-primary-800"><?php the_field('content_section_1', $page_id) ?>
            </p>
            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed mt-4">
                <?php the_field('content_2_section_1', $page_id) ?>
            </p>

            <?php 
            $button_text = get_field('button_section_1', $page_id) ?: 'Подробнее';
            $button_link = get_field('button_link_section_1', $page_id);
            if ($button_link) :
            ?>
                <div class="mt-8 text-center">
                    <a href="<?php echo esc_url(home_url($button_link)); ?>" 
                       class="inline-block bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 px-10 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_2', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_2', $page_id) ?>
            </h2>
        </div>

        <div class="relative max-w-4xl mx-auto bg-primary-50 rounded-2xl shadow-2xl p-8 md:p-12 lg:p-14 border border-primary-100 hover:shadow-3xl transition-shadow duration-500">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-24 h-24 bg-primary-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-12 h-12 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-2xl md:text-3xl font-bold text-primary-800 font-arimo"><?php the_field('subtitle_section_2', $page_id) ?>Электролаборатория</h3>
                    <p class="text-gray-600 font-golos mt-3 leading-relaxed">
                        <?php the_field('content_section_2', $page_id) ?>
                    </p>
                    <p class="text-gray-600 font-golos mt-3 leading-relaxed">
                        <?php the_field('content_2_section_2', $page_id) ?>
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="<?php the_field('button_link_section_2') ?>"
                    target="_blank"
                    class="inline-block bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 px-10 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform">
                    <?php the_field('button_section_2') ?>
                    →
                    <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>