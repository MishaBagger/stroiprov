<?php
/*
Template Name: Учебный центр
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

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_1', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl font-bold text-primary-900 font-arimo mt-3"><?php the_field('title_section_1', $page_id) ?></h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 font-golos mt-4 max-w-2xl mx-auto"><?php the_field('subtitle_section_1', $page_id) ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $programms = get_field('list_section_1', $page_id);
            $programms_items = json_decode($programms, true);

            if ($programms_items && is_array($programms_items)) :
                foreach ($programms_items as $item) :
            ?>
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 border border-gray-100 text-center group">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 transition-colors duration-300">
                            <?php echo $item['icon'] ?>
                        </div>
                        <h3 class="text-xl font-bold text-primary-800 font-arimo"><?php echo esc_html($item['title']) ?></h3>
                        <p class="text-gray-600 font-golos mt-2 text-sm"><?php echo esc_html($item['subtitle']) ?></p>
                        <a href="<?php echo esc_url(home_url($item['link'])); ?>" class="mt-4 inline-block text-primary-500 hover:text-primary-400 font-semibold transition"><?php the_field('button_section_1', $page_id) ?> →</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_2', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl font-bold text-primary-900 font-arimo mt-3"><?php the_field('title_section_2', $page_id) ?></h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 font-golos mt-4 max-w-2xl mx-auto"><?php the_field('subtitle_section_2', $page_id) ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
            <?php
            $safety = get_field('list_section_2', $page_id);
            $safety_items = json_decode($safety, true);

            if ($safety_items && is_array($safety_items)) :
                foreach ($safety_items as $item) :
            ?>
                    <div class="bg-primary-50 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 border border-primary-100 flex flex-col items-center text-center group">
                        <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors duration-300">
                            <?php echo $item['icon'] ?>
                        </div>
                        <h3 class="text-2xl font-bold text-primary-800 font-arimo"><?php echo esc_html($item['title']) ?></h3>
                        <p class="text-gray-600 font-golos mt-3 leading-relaxed">
                            <?php echo esc_html($item['subtitle']) ?>
                        </p>
                        <a href="<?php echo esc_url(home_url($item['link'])); ?>" class="mt-6 border-2 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-300">
                            <?php the_field('button_section_1', $page_id) ?>
                        </a>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-16 bg-primary-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold font-arimo"><?php the_field('title_section_3', $page_id) ?></h2>
        <div class="w-20 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
        <p class="text-gray-300 font-golos mt-4 max-w-2xl mx-auto text-lg">
            <?php the_field('subtitle_section_3', $page_id) ?>
        </p>
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
            <?php
            $phones = get_field('list_section_3', $page_id);
            $phones_items = json_decode($phones, true);

            if ($phones_items && is_array($phones_items)) :
                $count = count($phones_items);
                $i = 0;
                foreach ($phones_items as $item) :
                    $i++;
            ?>
                    <a href="tel:<?php echo esc_attr($item['link']); ?>" class="flex items-center space-x-2 text-primary-400 hover:text-primary-300 transition text-xl font-semibold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span><?php echo esc_html($item['phone']); ?></span>
                    </a>
                    <?php if ($i < $count) : ?>
                        <span class="text-gray-500 hidden sm:block">|</span>
                    <?php endif; ?>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-primary-50 rounded-2xl p-8 md:p-10 border border-primary-100 text-center">
            <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 font-arimo"><?php the_field('title_section_4', $page_id) ?></h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>

            <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                <span class="bg-white px-4 py-2 rounded-lg border border-primary-100 text-gray-700 font-golos"><?php the_field('text_section_4_1', $page_id) ?></span>
                <span class="bg-white px-4 py-2 rounded-lg border border-primary-100 text-gray-700 font-golos"><?php the_field('text_section_4_2', $page_id) ?></span>
                <span class="bg-white border-primary-100 border text-gray-700 px-4 py-2 rounded-lg font-golos"><?php the_field('text_section_4_3', $page_id) ?></span>

            </div>

            <p class="text-gray-600 font-golos mt-6">
                <?php the_field('subtitle_section_4', $page_id) ?>
            </p>
     
                <?php
                $file_id = get_field('file_programms', $page_id);
                $file_url = $file_id ? wp_get_attachment_url($file_id) : '#';
                $file_title = $file_id ? get_the_title($file_id) : 'Скачать перечень программ';
                ?>

                <a href="<?php echo esc_url($file_url); ?>"
                    class="mt-6 inline-block bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl" target="_blank">
                    <?php echo esc_html($file_title); ?>
                </a>
        </div>
    </div>
</section>

<section class="relative bg-primary-50 py-16 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_2', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_5', $page_id); ?>
            </h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="relative max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-8 md:p-12 lg:p-14 border border-gray-100 hover:shadow-3xl transition-shadow duration-500">
            <hr class="absolute top-0 left-0 w-1 h-full bg-linear-to-b from-primary-500 to-secondary rounded-l-2xl"></hr>

            <div class="w-14 h-14 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20.364l-7.682-7.682a4.5 4.5 0 016.364-6.364L12 7.636l1.318-1.318a4.5 4.5 0 016.364 6.364L12 20.364z" />
                </svg>
            </div>

            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed">
                <?php the_field('subtitle_section_5', $page_id); ?>
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>