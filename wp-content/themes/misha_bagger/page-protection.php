<?php
/*
Template Name: Охрана труда
*/
get_header();
?>

<?php
$page_id = get_the_ID();
$bg_image = get_field('background_image', $page_id);
$bg_url = $bg_image ? wp_get_attachment_image_url($bg_image, 'full') : '';
?>
<main class="relative min-h-75 md:min-h-100 lg:min-h-125 w-full flex items-center justify-center overflow-hidden" style="background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-primary-900/70"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white font-arimo"><?php the_field('title_section_1', $page_id) ?></h1>
        <div class="w-20 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
        <p class="text-base sm:text-lg md:text-xl text-gray-200 mt-4 font-golos max-w-3xl mx-auto">
            <?php the_field('subtitle_section_1', $page_id) ?>
        </p>
    </div>
</main>

<section class="relative bg-primary-50 py-16 overflow-hidden">

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_2', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_2', $page_id) ?>
            </h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="relative max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-8 md:p-12 lg:p-14 border border-gray-100 hover:shadow-3xl transition-shadow duration-500">
            <div class="absolute top-0 left-0 w-1 h-full bg-linear-to-b from-primary-500 to-secondary rounded-l-2xl"></div>

            <div class="w-14 h-14 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <p class="text-lg md:text-xl font-golos text-gray-700 leading-relaxed">
                <?php the_field('subtitle_section_2', $page_id) ?>
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
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

        <?php
        $services = get_field('list_section_3', $page_id);
        if ($services) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php for ($i = 1; $i <= 3; $i++) :
                    $icon = $services['service_icon_' . $i] ?? '';
                    $title = $services['service_title_' . $i] ?? '';
                    $text = $services['service_text_' . $i] ?? '';
                    $file_id = $services['service_file_' . $i] ?? 0;
                    $file_url = $file_id ? wp_get_attachment_url($file_id) : '';
                ?>
                    <?php if ($title || $text) : ?>
                        <div class="bg-primary-50 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 border border-primary-100 text-center group">
                            <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 transition-colors duration-300">
                                <?php echo $icon; ?>
                            </div>
                            <h3 class="text-xl font-bold text-primary-800 font-arimo"><?php echo esc_html($title); ?></h3>
                            <p class="text-gray-600 font-golos mt-2 text-sm"><?php echo esc_html($text); ?></p>
                            <?php if ($file_url) : ?>
                                <div class="mt-4 flex items-center justify-center gap-3 flex-wrap">
                                    <a href="<?php echo esc_url($file_url); ?>" target="_blank" class="inline-block text-primary-500 hover:text-primary-400 font-semibold transition">
                                        Подробнее →
                                    </a>
                                <?php endif; ?>
                                </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>

            </div>
        <?php endif; ?>
    </div>
</section>

<section class="relative bg-primary-50 py-16 overflow-hidden">

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-1 rounded-full text-sm font-semibold font-sans uppercase tracking-wider"><?php the_field('accent_title_section_4', $page_id) ?></span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3">
                <?php the_field('title_section_4', $page_id) ?>
            </h2>
            <div class="w-20 h-1 bg-linear-to-r from-primary-500 to-secondary mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-8 md:p-12 lg:p-14 border border-gray-100">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <?php
    $documents = get_field('list_section_4', $page_id);
    
    if ($documents) :
        for ($i = 1; $i <= 4; $i++) :
            $icon = $documents['document_icon_' . $i] ?? '';
            $title = $documents['document_title_' . $i] ?? '';
            $text = $documents['document_text_' . $i] ?? '';
            $file_id = $documents['document_file_' . $i] ?? 0;
            $file_url = $file_id ? wp_get_attachment_url($file_id) : '';
            
            if (empty($title) && empty($text)) continue;
    ?>
            <div class="flex items-start space-x-4 p-4 bg-primary-50 rounded-xl hover:bg-primary-100 transition duration-300">
                <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                    <?php echo $icon; ?>
                </div>
                <div>
                    <h4 class="font-semibold text-primary-800 font-arimo"><?php echo esc_html($title); ?></h4>
                    <p class="text-gray-600 text-sm font-golos mt-1"><?php echo esc_html($text); ?></p>
                    <?php if ($file_url) : ?>
                        <a href="<?php echo esc_url($file_url); ?>" 
                           download 
                           class="text-primary-500 hover:text-primary-400 text-sm font-semibold transition inline-block mt-1">
                            Скачать →
                        </a>
                    <?php else : ?>
                        <span class="text-gray-400 text-sm font-golos inline-block mt-1">Файл не загружен</span>
                    <?php endif; ?>
                </div>
            </div>
    <?php 
        endfor;
    endif; 
    ?>
</div>
        </div>
    </div>
</section>

<section class="py-16 bg-primary-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <div class="w-16 h-16 bg-primary-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-arimo">
                <?php the_field('title_section_5', $page_id) ?>
            </h2>
            <div class="w-20 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-300 font-golos mt-4 text-lg max-w-2xl mx-auto">
                <?php the_field('subtitle_section_5', $page_id) ?>
            </p>
            <?php
            $button_text = get_field('button_section_5', $page_id);
            $button_link = get_field('button_section_5_link', $page_id);
            if ($button_text && $button_link) :
            ?>
                <a href="<?php echo esc_url($button_link); ?>"
                    target="_blank"
                    class="mt-8 inline-block bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 px-10 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform">
                    <?php echo esc_html($button_text); ?>
                    <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>