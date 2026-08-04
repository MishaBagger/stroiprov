<?php
/*
Template Name: Промышленная безопасность
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
    <div class="absolute -top-20 -right-20 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-secondary/5 rounded-full blur-3xl"></div>

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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>

            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed">
                
                <?php the_field('content_section_1', $page_id) ?>
            </p>
            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed mt-4">
                <?php the_field('content_2_section_1', $page_id) ?>
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-primary-50 rounded-2xl shadow-xl p-8 md:p-10 border border-primary-100 hover:shadow-2xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-10 h-10 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-2xl md:text-3xl font-bold text-primary-800 font-arimo"><?php the_field('title_section_2', $page_id) ?></h3>
                    <p class="text-gray-600 font-golos mt-2"><?php the_field('subtitle_section_2', $page_id) ?></p>
                </div>
                <a href="<?php echo esc_url(home_url(get_field('button_link_section_2', $page_id))); ?>" 
                   class="inline-block bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap">
                    <?php the_field('button_section_2', $page_id) ?> →
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_3', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_3', $page_id) ?>
            </h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 font-golos mt-4 max-w-2xl mx-auto">
                <?php the_field('subtitle_section_3', $page_id) ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $services = get_field('services_industrial', $page_id);
            $services_items = json_decode($services, true);

            if ($services_items && is_array($services_items)) :
                foreach ($services_items as $item) :
            ?>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 border border-gray-100 text-center group">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 transition-colors duration-300">
                        <?php echo $item['icon']; ?>
                    </div>
                    <h3 class="text-xl font-bold text-primary-800 font-arimo"><?php echo esc_html($item['title']); ?></h3>
                    <p class="text-gray-600 font-golos mt-2 text-sm"><?php echo esc_html($item['subtitle']); ?></p>
                    <a href="<?php echo esc_url($item['link']); ?>" 
                       <?php echo strpos($item['link'], 'https://') === 0 ? 'target="_blank"' : ''; ?> 
                       class="mt-4 inline-block text-primary-500 hover:text-primary-400 font-semibold transition">
                        <?php the_field('button_section_2', $page_id) ?> →
                    </a>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>