<?php
/*
Template Name: Сведения об образовательной организации
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
    </div>
</main>

<section class="py-16 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">

            <!-- 1. Основные сведения -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_1', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_1', $page_id); ?>
                    <?php echo do_shortcode('[foogallery id="444"]') ?>
                    <?php
                    $file_id = get_field('section_1_file', $page_id);
                    if ($file_id) :
                        $file_url = wp_get_attachment_url($file_id);
                        $file_title = get_the_title($file_id) ?: basename($file_url);
                    ?>
                        <a href="<?php echo esc_url($file_url); ?>" target="_blank" class="text-primary-500 hover:text-primary-400 transition mt-5 inline-block">
                            📄 <?php echo esc_html($file_title); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_field('section_1_end', $page_id); ?>
                </div>
            </div>

            <!-- 2. Структура и органы управления -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_2', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_2', $page_id); ?>
                    <?php
                    // Получаем файлы
                    $file_1 = get_field('section_2_file_1', $page_id);
                    $file_2 = get_field('section_2_file_2', $page_id);
                    $file_3 = get_field('section_2_file_3', $page_id);

                    // Файл 1
                    if ($file_1) :
                        if (is_array($file_1)) {
                            $file_url_1 = $file_1['url'];
                            $file_title_1 = $file_1['title'] ?: basename($file_url_1);
                        } elseif (is_numeric($file_1)) {
                            $file_url_1 = wp_get_attachment_url($file_1);
                            $file_title_1 = get_the_title($file_1) ?: basename($file_url_1);
                        } else {
                            $file_url_1 = $file_1;
                            $file_title_1 = basename($file_url_1);
                        }
                    endif;

                    // Файл 2
                    if ($file_2) :
                        if (is_array($file_2)) {
                            $file_url_2 = $file_2['url'];
                            $file_title_2 = $file_2['title'] ?: basename($file_url_2);
                        } elseif (is_numeric($file_2)) {
                            $file_url_2 = wp_get_attachment_url($file_2);
                            $file_title_2 = get_the_title($file_2) ?: basename($file_url_2);
                        } else {
                            $file_url_2 = $file_2;
                            $file_title_2 = basename($file_url_2);
                        }
                    endif;

                    // Файл 3
                    if ($file_3) :
                        if (is_array($file_3)) {
                            $file_url_3 = $file_3['url'];
                            $file_title_3 = $file_3['title'] ?: basename($file_url_3);
                        } elseif (is_numeric($file_3)) {
                            $file_url_3 = wp_get_attachment_url($file_3);
                            $file_title_3 = get_the_title($file_3) ?: basename($file_url_3);
                        } else {
                            $file_url_3 = $file_3;
                            $file_title_3 = basename($file_url_3);
                        }
                    endif;

                    // Проверяем, есть ли хоть один файл
                    if (!empty($file_1) || !empty($file_2) || !empty($file_3)) : ?>
                        <div class="mt-4 pt-3 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold text-primary-700">Документы:</span>
                            </p>
                            <div class="mt-2 space-y-1 flex flex-col">
                                <?php if (!empty($file_1)) : ?>
                                    <a href="<?php echo esc_url($file_url_1); ?>" target="_blank" class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <?php echo esc_html($file_title_1); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($file_2)) : ?>
                                    <a href="<?php echo esc_url($file_url_2); ?>" target="_blank" class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <?php echo esc_html($file_title_2); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($file_3)) : ?>
                                    <a href="<?php echo esc_url($file_url_3); ?>" target="_blank" class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <?php echo esc_html($file_title_3); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 3. Документы -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_3', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">

                    <div class="space-y-4 font-golos text-gray-700">

                        <?php
                        $files_3 = get_field('section_3_files', $page_id);

                        for ($i = 1; $i <= 7; $i++) :
                            $title = $files_3['title_' . $i] ?? 'Документ ' . $i;
                            $file = $files_3['file_' . $i] ?? 0;
                            $file_url = $file ? wp_get_attachment_url($file) : '';
                            $file_name = $file ? get_the_title($file) : '';
                        ?>
                            <div class="pb-4 border-b border-gray-200">
                                <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">3.<?php echo $i; ?>. <?php echo esc_html($title); ?></h3>
                                <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg">
                                    <?php if ($file && $file_url) : ?>
                                        <a href="<?php echo esc_url($file_url); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <?php echo esc_html($file_name); ?>
                                        </a>
                                    <?php else : ?>
                                        <span class="text-gray-400 text-sm">Файл не загружен</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="pb-6 border-b border-gray-200 last:border-b-0 last:pb-0">
                        <?php the_field('section_3', $page_id); ?>


                        <div class="space-y-3">
                            <?php
                            $check_files = get_field('section_3_check', $page_id);
                            if ($check_files) :
                                for ($i = 1; $i <= 2; $i++) :
                                    $title = $check_files['title_' . $i] ?? 'Документ ' . $i;
                                    $file = $check_files['file_' . $i] ?? 0;
                                    $file_url = $file ? wp_get_attachment_url($file) : '';
                                    $file_name = $file ? get_the_title($file) : '';
                            ?>
                                    <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg">
                                        <p class="text-sm text-gray-700 font-medium mb-1"><?php echo esc_html($title); ?></p>
                                        <?php if ($file && $file_url) : ?>
                                            <a href="<?php echo esc_url($file_url); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <?php echo esc_html($file_name); ?>
                                            </a>
                                        <?php else : ?>
                                            <span class="text-gray-400 text-sm">Файл не загружен</span>
                                        <?php endif; ?>
                                    </div>
                            <?php
                                endfor;
                            endif;
                            ?>
                        </div>
                    </div>

                    <!-- 4. Локальные акты -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                        <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4">Локальные акты</h2>

                        <div class="space-y-4 font-golos text-gray-700">

                            <!-- 4.1 Реквизиты -->
                            <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                                <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">Реквизиты ЧНОУ ДПО ОУЦ "Строймеханизация-Профи"</h3>
                                <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg">
                                    <p class="text-gray-700">Локальные акты, правила внутреннего распорядка обучающихся, правила внутреннего трудового распорядка</p>
                                </div>
                            </div>

                            <!-- 4.2 Приказы -->
                            <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                                <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">Документы</h3>

                                <?php
                                $local_acts = get_field('section_4_files', $page_id);

                                for ($i = 1; $i <= 22; $i++) :
                                    $file = $local_acts['file_' . $i] ?? 0;
                                    $file_url = $file ? wp_get_attachment_url($file) : '';
                                    $file_name = $file ? get_the_title($file) : '';
                                ?>
                                    <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg mb-2">
                                        <?php if ($file && $file_url) : ?>
                                            <a href="<?php echo esc_url($file_url); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <?php echo esc_html($file_name); ?>
                                            </a>
                                        <?php else : ?>
                                            <span class="text-gray-400 text-sm">Файл <?php echo $i; ?> не загружен</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endfor; ?>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <!-- СОУТ -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_sout', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php
                    // Файл 1 (СОУТ)
                    $file_1 = get_field('section_sout_1', $page_id);
                    if ($file_1) :
                        if (is_array($file_1)) {
                            $file_url_1 = $file_1['url'];
                            $file_title_1 = $file_1['title'] ?: basename($file_url_1);
                        } elseif (is_numeric($file_1)) {
                            $file_url_1 = wp_get_attachment_url($file_1);
                            $file_title_1 = get_the_title($file_1) ?: basename($file_url_1);
                        } else {
                            $file_url_1 = $file_1;
                            $file_title_1 = basename($file_url_1);
                        }
                    endif;

                    // Файл 2 (СОУТ)
                    $file_2 = get_field('section_sout_2', $page_id);
                    if ($file_2) :
                        if (is_array($file_2)) {
                            $file_url_2 = $file_2['url'];
                            $file_title_2 = $file_2['title'] ?: basename($file_url_2);
                        } elseif (is_numeric($file_2)) {
                            $file_url_2 = wp_get_attachment_url($file_2);
                            $file_title_2 = get_the_title($file_2) ?: basename($file_url_2);
                        } else {
                            $file_url_2 = $file_2;
                            $file_title_2 = basename($file_url_2);
                        }
                    endif;
                    ?>

                    <?php if ($file_1) : ?>
                        <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg">
                            <a href="<?php echo esc_url($file_url_1); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <?php echo esc_html($file_title_1); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($file_2) : ?>
                        <div class="bg-primary-50 border-l-4 border-primary-500 p-3 rounded-r-lg mt-2">
                            <a href="<?php echo esc_url($file_url_2); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <?php echo esc_html($file_title_2); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 4. Образование -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_4', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_4', $page_id); ?>
                </div>
            </div>

            <!-- 5. Руководство -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_5', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_5', $page_id); ?>
                </div>
            </div>

            <!-- 6. Педагогический состав -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_6', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_6', $page_id); ?>
                </div>
                <?php
                $files_6 = get_field('section_6_files', $page_id);
                if ($files_6) :
                    for ($i = 1; $i <= 5; $i++) :
                        $file_id = $files_6['file_' . $i] ?? 0;
                        if ($file_id) :
                            $file_url = wp_get_attachment_url($file_id);
                            $file_title = get_the_title($file_id);
                ?>
                            <a href="<?php echo esc_url($file_url); ?>" download class="block text-primary-500 hover:text-primary-400 transition mt-2">
                                📄 <?php echo esc_html($file_title ?: basename($file_url)); ?>
                            </a>
                <?php
                        endif;
                    endfor;
                endif;
                ?>
            </div>

            <!-- 7. Материально-техническое обеспечение -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_7', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_7', $page_id); ?>
                    <div class="space-y-6 font-golos text-gray-700">

                        <!-- 6.1 Доступ к информационным системам -->
                        <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">6.1. Доступ к информационным системам и информационно-коммуникационным сетям</h3>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                                <p class="text-gray-700">В Учебном центре организован доступ к информационно-телекоммуникационной сети Интернет, а также локальной сети учебного центра (через стационарные компьютеры).</p>
                            </div>
                        </div>

                        <!-- 6.2 Электронно-образовательные ресурсы -->
                        <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">6.2. Электронно-образовательные ресурсы</h3>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                                <p class="text-gray-700">Имеется доступ к электронным образовательным ресурсам (электронной библиотеке) разработанной Учебным центром.</p>
                                <p class="text-gray-700 mt-2">Имеется доступ к нормативно-технической и справочной информации находящейся в <span class="font-semibold text-primary-700">ИИС «Техэксперт»</span>.</p>
                                <p class="text-sm text-gray-500 mt-2">Информационно-справочная система «Техэксперт» (ИСС «Техэксперт») является банком данных, негосударственным информационным фондом, благодаря которому в строгом соответствии с законодательством Российской Федерации с применением самых передовых технологий собирается, обрабатывается и предоставляется пользователям вся необходимая нормативно-техническая информация.</p>
                            </div>
                        </div>

                        <!-- 6.3 Сведения о наличии оборудованных учебных кабинетов -->
                        <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">6.3. Сведения о наличии оборудованных учебных кабинетов, площадок</h3>

                            <p class="font-semibold text-primary-700 mt-3 mb-2">📍 г. Вологда</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-gray-700">В Учебном центре в г. Вологда оборудованы 2 учебных класса, кабинеты №47 и №48. Учебный полигон.</p>
                            </div>

                            <!-- Учебный класс 1 -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный класс 1 (кабинет №47)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 46.90 кв.м.</p>
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-1 text-sm text-gray-700 list-disc list-inside">
                                    <li>Столы учебные — 12 шт</li>
                                    <li>Стулья учебные — 24 шт</li>
                                    <li>Столы преподавателя — 2 шт</li>
                                    <li>Стулья преподавателя — 2 шт</li>
                                    <li>Доска учебная — 1 шт</li>
                                    <li>Компьютер — 1 шт</li>
                                    <li>Телевизор 50" — 1 шт</li>
                                    <li>Наглядные учебные плакаты</li>
                                    <li>Магнитно-маркерная доска — 1 шт</li>
                                    <li>Учебно-тренировочный стенд, оснащенный специальным оборудованием для проведения практических занятий по дисциплине «правила охраны труда при работе на высоте»</li>
                                    <li>Манекен в спецодежде — 1 шт</li>
                                    <li>Манекен-тренажер для проведения обучения правилам оказания первой помощи пострадавшим «Эскандер» — 1 шт</li>
                                    <li>Тренажер для приобретения первоначальных навыков управления машинистов башенных кранов</li>
                                    <li>Библиотека мультимедийных программ — наглядная техника безопасности</li>
                                </ul>
                            </div>

                            <!-- Учебный класс 2 -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный класс 2 (кабинет №48)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 35.50 кв.м.</p>
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-1 text-sm text-gray-700 list-disc list-inside">
                                    <li>Столы учебные — 10 шт</li>
                                    <li>Стулья учебные — 20 шт</li>
                                    <li>Столы преподавателя — 2 шт</li>
                                    <li>Стулья преподавателя — 2 шт</li>
                                    <li>Компьютеры — 4 шт</li>
                                    <li>Телевизор 50" — 1 шт</li>
                                    <li>Магнитно-маркерная доска — 1 шт</li>
                                    <li>Наглядные учебные плакаты</li>
                                    <li>Компьютер преподавателя — 2 шт</li>
                                    <li>Ноутбук — 1 шт</li>
                                    <li>Учебно-тренировочный стенд симулятор Тренажер выполнения операций лесозаготовительной техники на базе ПК с экраном TV 42" — 1 шт</li>
                                    <li>Учебно-тренировочный стенд симулятор Тренажер выполнения операций экскаватора на базе ПК с экраном TV 42" — 1 шт</li>
                                </ul>
                            </div>

                            <!-- Учебный полигон Вологда -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный полигон (г. Вологда)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 2400 кв.м.</p>
                                <p class="text-gray-700">Для прохождения производственного обучения.</p>
                            </div>

                            <!-- Техника Вологда -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Техника для обучения практическим навыкам (г. Вологда)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-gray-700">
                                        <thead>
                                            <tr class="bg-primary-100">
                                                <th class="text-left py-2 px-3 font-semibold text-primary-800">Профессия</th>
                                                <th class="text-left py-2 px-3 font-semibold text-primary-800">Наименование</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных мототранспортных А1</td>
                                                <td class="py-2 px-3">Снего-болотоход CF-MOTO CF625-С</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных автотранспортных A2</td>
                                                <td class="py-2 px-3">Снего-болотоход CF-MOTO Z6</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных автотранспортных A3</td>
                                                <td class="py-2 px-3">Снего-болотоход «Кержак»</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель мототранспортных средств кат. A</td>
                                                <td class="py-2 px-3">Мототранспортное средство кат. А</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель мототранспортных средств кат. A1</td>
                                                <td class="py-2 px-3">Мототранспортное средство кат. А1</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель автомобиля кат. В</td>
                                                <td class="py-2 px-3">«Хюндай Солярис» 2 шт.<br>«ВАЗ-2115» 1 шт.<br>«Шевроле Авео» 1 шт.</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории B</td>
                                                <td class="py-2 px-3">Трактор Т-25А3</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории C</td>
                                                <td class="py-2 px-3">Трактор колесный МТЗ-80Л с прицепом</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории D</td>
                                                <td class="py-2 px-3">Трактор колесный ХТЗ-16131 с прицепом</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории E<br>Машинист бульдозера</td>
                                                <td class="py-2 px-3">Трактор гусеничный ДТ-75Т (ДЗ-42)<br>Экскаватор-бульдозер ЭПБ-11</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Оператор крана-манипулятора<br>Машинист автовышки и автогидроподъёмника</td>
                                                <td class="py-2 px-3">Трактор колесный МТЗ-80.1 (Пату 5000)</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-3">Машинист экскаватора одноковшового<br>Водитель фронтального погрузчика</td>
                                                <td class="py-2 px-3">Экскаватор-бульдозер ЭПБ-11</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- 6.4 Обособленное подразделение (Великий Устюг) -->
                        <div class="pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <h3 class="text-lg font-bold text-primary-800 font-arimo mb-2">6.4. Обособленное подразделение в г. Великий Устюг</h3>

                            <p class="font-semibold text-primary-700 mt-3 mb-2">📍 г. Великий Устюг</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-gray-700">В учебном центре в г. Великий Устюг оборудованы 2 учебных класса.</p>
                            </div>

                            <!-- Учебный класс 3 -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный класс 3</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 60 кв.м.</p>
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-1 text-sm text-gray-700 list-disc list-inside">
                                    <li>Столы учебные — 15 шт</li>
                                    <li>Стулья учебные — 30 шт</li>
                                    <li>Стол преподавателя — 1 шт</li>
                                    <li>Стул преподавателя — 1 шт</li>
                                    <li>Доска учебная — 1 шт</li>
                                    <li>Компьютер — 1 шт</li>
                                    <li>Телевизор 50" — 1 шт</li>
                                    <li>Наглядные учебные плакаты</li>
                                    <li>Магнитно-маркерная доска — 1 шт</li>
                                    <li>Учебно-тренировочный стенд манекен-тренажер для проведения обучения правилам оказания первой помощи пострадавшим «Александр» — 1 шт</li>
                                </ul>
                            </div>

                            <!-- Учебный класс 4 -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный класс 4</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 12 кв.м.</p>
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-1 text-sm text-gray-700 list-disc list-inside">
                                    <li>Учебно-тренировочный стенд симулятор Тренажер выполнения операций лесозаготовительной техники, операций экскаватора на базе ПК с экраном TV 42" — 1 шт</li>
                                    <li>Учебно-тренировочный стенд симулятор Тренажер для приобретения первоначальных навыков управления автомобилем кат. В с механической коробкой передач — 1 шт</li>
                                </ul>
                            </div>

                            <!-- Учебный полигон Великий Устюг -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Учебный полигон (г. Великий Устюг)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg mb-4">
                                <p class="text-sm text-gray-500 mb-2">Площадь: 2500 кв.м.</p>
                                <p class="text-gray-700">Для прохождения производственного обучения.</p>
                            </div>

                            <!-- Техника Великий Устюг -->
                            <p class="font-semibold text-primary-700 mt-3 mb-2">Техника для обучения практическим навыкам (г. Великий Устюг)</p>
                            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-gray-700">
                                        <thead>
                                            <tr class="bg-primary-100">
                                                <th class="text-left py-2 px-3 font-semibold text-primary-800">Профессия</th>
                                                <th class="text-left py-2 px-3 font-semibold text-primary-800">Наименование</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных мототранспортных А1</td>
                                                <td class="py-2 px-3">Снего-болотоход CF-MOTO CF625-С</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных автотранспортных A2</td>
                                                <td class="py-2 px-3">Снего-болотоход CF-MOTO Z6</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель внедорожных автотранспортных A3</td>
                                                <td class="py-2 px-3">Снего-болотоход «Кержак»</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель мототранспортных средств кат. A</td>
                                                <td class="py-2 px-3">Мототранспортное средство кат. А</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель мототранспортных средств кат. A1</td>
                                                <td class="py-2 px-3">Мототранспортное средство кат. А1</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Водитель автомобиля кат. В</td>
                                                <td class="py-2 px-3">«Хюндай Солярис» 2 шт.<br>«ВАЗ-2115» 1 шт.<br>«Шевроле Авео» 1 шт.</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории B</td>
                                                <td class="py-2 px-3">Трактор Т-25А3</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории C</td>
                                                <td class="py-2 px-3">Трактор колесный МТЗ-80Л с прицепом</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории D</td>
                                                <td class="py-2 px-3">Трактор колесный ХТЗ-16131 с прицепом</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Тракторист категории E<br>Машинист бульдозера</td>
                                                <td class="py-2 px-3">Трактор гусеничный ДТ-75Т (ДЗ-42)<br>Экскаватор-бульдозер ЭПБ-11</td>
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 px-3">Оператор крана-манипулятора<br>Машинист автовышки и автогидроподъёмника</td>
                                                <td class="py-2 px-3">Трактор колесный МТЗ-80.1 (Пату 5000)</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-3">Машинист экскаватора одноковшового<br>Водитель фронтального погрузчика</td>
                                                <td class="py-2 px-3">Экскаватор-бульдозер ЭПБ-11</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <div class="mt-5 text-gray-700 font-golos">
                                <p>В учебном центре созданы безопасные условия для слушателей в соответствии с разработанным
                                    <?php render_file_link('section_7_health_policy', $page_id, 'Положением об охране здоровья обучающихся'); ?>
                                </p>
                                <p class="mt-2">а также созданы условия доступности для лиц с ограниченными возможностями и инвалидов
                                    (<?php render_file_link('section_7_accessibility_vologda', $page_id, 'Паспорт доступности в г. Вологда'); ?>,
                                    <?php render_file_link('section_7_accessibility_ustug', $page_id, 'Паспорт доступности в г. Великий Устюг'); ?>,
                                    <?php render_file_link('section_7_accessibility_vytegra', $page_id, 'Паспорт доступности в г. Вытегра'); ?>)
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- 8. Платные образовательные услуги -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_8', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_8', $page_id); ?>
                </div>
                <?php
                $files_8 = get_field('section_8_files', $page_id);
                if ($files_8) :
                    for ($i = 1; $i <= 5; $i++) :
                        $file_id = $files_8['file_' . $i] ?? 0;
                        if ($file_id) :
                            $file_url = wp_get_attachment_url($file_id);
                            $file_title = get_the_title($file_id);
                ?>
                            <a href="<?php echo esc_url($file_url); ?>" download class="block text-primary-500 hover:text-primary-400 transition mt-2">
                                📄 <?php echo esc_html($file_title ?: basename($file_url)); ?>
                            </a>
                <?php
                        endif;
                    endfor;
                endif;
                ?>
            </div>

            <!-- 9. Финансово-хозяйственная деятельность -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_9', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_9', $page_id); ?>
                </div>
                <?php
                $files_9 = get_field('section_9_files', $page_id);
                if ($files_9) :
                    for ($i = 1; $i <= 5; $i++) :
                        $file_id = $files_9['file_' . $i] ?? 0;
                        if ($file_id) :
                            $file_url = wp_get_attachment_url($file_id);
                            $file_title = get_the_title($file_id);
                ?>
                            <a href="<?php echo esc_url($file_url); ?>" download class="block text-primary-500 hover:text-primary-400 transition mt-2">
                                📄 <?php echo esc_html($file_title ?: basename($file_url)); ?>
                            </a>
                <?php
                        endif;
                    endfor;
                endif;
                ?>
            </div>

            <!-- 10. Вакантные места -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_10', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_10', $page_id); ?>
                </div>
            </div>

            <!-- 11. Стипендии и меры поддержки -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_11', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_11', $page_id); ?>
                </div>
            </div>

            <!-- 12. Международное сотрудничество -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_12', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_12', $page_id); ?>
                </div>
            </div>

            <!-- 13. Организация питания -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_13', $page_id); ?></h2>
                <div class="prose max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_13', $page_id); ?>
                </div>
            </div>

            <!-- 14. Образовательные стандарты -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100">
                <h2 class="text-2xl font-bold text-primary-800 font-arimo mb-4"><?php the_field('title_section_14', $page_id); ?></h2>
                <div class="max-w-none font-golos text-gray-700 leading-relaxed">
                    <?php the_field('section_14', $page_id); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>