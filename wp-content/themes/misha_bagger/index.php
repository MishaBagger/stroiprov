<?php
get_header();
?>

<?php
$home_page = get_page_by_path('main');
$page_id = $home_page ? $home_page->ID : 0;

$bg_image_id = get_field('background_image', $page_id);

$bg_url = $bg_image_id ? wp_get_attachment_image_url($bg_image_id, 'full') : '';
?>
<!-- Баннер с заявкой -->
<main style="<?php if ($bg_url) : ?>background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center;<?php endif; ?>" class="min-h-100 h-screen max-h-screen w-full flex items-center">
    <div class="container mx-auto">
        <div class="max-w-3xl bg-primary-800/90 rounded-2xl p-8 shadow-2xl">

            <h1 class="lg:text-4xl xs:text-2xl font-bold text-gray-50 font-arimo">
                <?php the_field('title', $page_id); ?>
            </h1>
            <p class="lg:text-xl xs:text-lg text-gray-50 mt-4">
                <?php the_field('subtitle', $page_id); ?>
            </p>
            <div class="flex  mt-6">
                <button class="cursor-pointer bg-primary-500 hover:bg-transparent border-primary-500 border-2 text-white text-xl font-semibold py-3 px-8 rounded-2xl transition duration-300">
                    <?php the_field('button', $page_id); ?>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- О нас -->
<section class="bg-primary-50 py-16 overflow-hidden relative">

    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo mt-3 text-center mb-12">
            <?php the_field('section_1', $page_id) ?: 'О нас'; ?>
        </h2>

        <div class="grid lg:grid-cols-2 xs:grid-cols-1 lg:gap-6 xs:gap-4">

            <!-- Левая колонка -->
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 p-6 md:p-8 border border-gray-100 flex flex-col">
                <hr class="w-full h-1 bg-linear-to-r from-primary-500 to-secondary rounded-full mb-4 border-0">
                </hr>

                <div class="flex items-start space-x-3 mb-4">
                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center shrink-0 mt-1">
                        <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 font-arimo">
                        <?php the_field('column_1', $page_id) ?: 'Почему мы?'; ?>
                    </h2>
                </div>

                <p class="text-base sm:text-lg font-golos text-primary-700 leading-relaxed flex-1">
                    <?php the_field('content_column_1', $page_id) ?: 'Профессиональное обучение персонала для работы на строительных машинах и механизмах с 2009 года.'; ?>
                </p>

                <?php render_acf_image('image_column_1', $page_id, 'full', 'w-full h-auto rounded-xl shadow-lg mt-5'); ?>
            </div>

            <!-- Правая колонка -->
            <div class="flex flex-col lg:space-y-6 xs:space-y-4">

                <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 p-6 md:p-8 border border-gray-100 flex-1">
                    <hr class="w-full h-1 bg-linear-to-r from-primary-500 to-secondary rounded-full mb-4 border-0">
                    </hr>

                    <div class="flex items-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center shrink-0 mt-1">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 font-arimo">
                            <?php the_field('column_2', $page_id) ?: 'Программы'; ?>
                        </h2>
                    </div>

                    <p class="text-base sm:text-lg font-golos text-primary-700 leading-relaxed">
                        <?php the_field('content_column_2', $page_id) ?: 'Выберите направление обучения:'; ?>
                    </p>

                    <?php
                    $list_json = get_field('content_list_column_2', $page_id);
                    $list_items = json_decode($list_json, true);

                    if ($list_items && is_array($list_items)) : ?>
                        <ul class="font-sans font-bold grid grid-cols-2 gap-2 mt-4">
                            <?php foreach ($list_items as $item) :
                                $link = !empty($item['link']) ? $item['link'] : '#';
                                $title = !empty($item['title']) ? $item['title'] : 'Программа';
                            ?>
                                <li class="py-1">
                                    <a class="text-base sm:text-lg text-primary-700 hover:text-primary-500 hover:pl-2 transition-all duration-300 flex items-center gap-2"
                                        href="<?php echo esc_url($link); ?>">
                                        <span class="w-1.5 h-1.5 bg-primary-400 rounded-full shrink-0"></span>
                                        <?php echo esc_html($title); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php render_acf_image('image_column_2', $page_id, 'full', 'w-full h-auto rounded-xl shadow-lg mt-4'); ?>
                </div>

                <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 p-6 md:p-8 border border-gray-100 flex-1">
                    <hr class="w-full h-1 bg-linear-to-r from-primary-500 to-secondary rounded-full mb-4 border-0">
                    </hr>

                    <div class="flex items-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center shrink-0 mt-1">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 font-arimo">
                            <?php the_field('column_3', $page_id) ?: 'Документы'; ?>
                        </h2>
                    </div>

                    <p class="text-base sm:text-lg font-golos text-primary-700 leading-relaxed">
                        <?php the_field('content_column_3', $page_id) ?: 'Государственная лицензия, все документы установленного образца.'; ?>
                    </p>

                    <?php render_acf_image('image_column_3', $page_id, 'full', 'w-full h-auto rounded-xl shadow-lg mt-4'); ?>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Секция с преимуществами -->
<section class="bg-primary-100 py-16 overflow-hidden">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl  font-bold text-primary-900 py-5 text-center font-arimo mb-12">
            <?php the_field('section_2', $page_id); ?>
        </h2>
        <div class="grid md:grid-cols-3 gap-10 mt-5">
            <?php
            $advantages = [
                'advantages_1' => 'Опыт с 2009 года',
                'advantages_2' => 'Собственный полигон',
                'advantages_3' => 'Лицензия',
            ];

            foreach ($advantages as $field_name => $default_title) :
                $group = get_field($field_name, $page_id);

                $title = $group['title'] ?? $default_title;
                $description = $group['description'] ?? '';
                $image_id = $group['image'] ?? '';
                $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
            ?>
                <div class="card-modern text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>"
                                alt="<?php echo esc_attr($title); ?>"
                                class="object-contain">
                        <?php else : ?>
                            <svg class="w-16 h-16 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                            </svg>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl font-arimo font-bold text-gray-800">
                        <?php echo esc_html($title); ?>
                    </h3>
                    <hr class="h-1 w-1/2 mx-auto my-2 bg-linear-to-r from-primary-500 to-secondary border-0">
                    <p class="text-lg mt-2">
                        <?php echo esc_html($description); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Секция с дополнительной конверсией -->
<section class="relative bg-secondary-light py-16 overflow-hidden">

    <div class="container mx-auto relative z-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-900 font-arimo">
                <?php the_field('section_3', $page_id); ?>
            </h2>
            <div class="xs:w-80 md:w-100 h-1 bg-primary-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="relative mx-auto bg-white rounded-r-2xl shadow-2xl p-8 md:p-12 lg:p-14hover:shadow-3xl transition-shadow duration-500">
            <div class="absolute top-0 left-0 w-1 h-full bg-linear-to-b from-primary-500 to-secondary"></div>

            <div class="w-14 h-14 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 11H6.5C6.5 8.5 8 7 10 7V11ZM10 16H6.5C6.5 13.5 8 12 10 12V16ZM18 11H14.5C14.5 8.5 16 7 18 7V11ZM18 16H14.5C14.5 13.5 16 12 18 12V16Z" />
                </svg>
            </div>

            <p class="text-lg md:text-xl font-golos text-primary-700 leading-relaxed">
                <?php the_field('content_section_3', $page_id); ?>
            </p>

            <button class="cursor-pointer hover:bg-primary-50 hover:text-secondary bg-secondary border-secondary  border-2 text-white text-xl font-semibold py-3 px-10 mt-5 rounded-2xl transition duration-300 block mx-auto">
                <?php the_field('button', $page_id); ?>
            </button>
        </div>
    </div>
</section>

<!-- Контакты центра -->
<section class="bg-primary-50 py-16">
    <h2 class="text-3xl sm:text-4xl lg:text-5xl  font-bold text-primary-900 py-5 mb-12 text-center font-arimo"><?php the_field('section_4', $page_id); ?></h2>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 md:p-10 transition-all duration-300 container mx-auto">

        <div class="text-center border-b border-gray-200 pb-6 mb-6">
            <?php the_field('content_section_4', $page_id); ?>
        </div>

        <?php
        $contacts = get_field('contacts', $page_id);

        if ($contacts) :
            $address = $contacts['address'] ?? [];
            $phones = $contacts['phones'] ?? [];
            $emails = $contacts['emails'] ?? [];
            $socials = $contacts['socials'] ?? [];

            $address_json = $address['description'] ?? [];
            $address_items = json_decode($address_json, true);

            $phones_json = $phones['description'] ?? [];
            $phones_items = json_decode($phones_json, true);

            $emails_json = $emails['description'] ?? [];
            $emails_items = json_decode($emails_json, true);
        ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="flex items-start space-x-4 p-4 bg-primary-50 rounded-xl hover:bg-primary-100 transition duration-300">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary-800 text-sm uppercase tracking-wider font-sans">
                            <?php echo esc_html($address['title']); ?></h4>
                        <ul>

                            <?php if ($address_items && is_array($address_items)) :
                                foreach ($address_items as $item) :
                                    $address = !empty($item['address']) ? $item['address'] : 'Адрес';
                            ?>

                                    <li class="text-primary-700 font-golos my-2"><?php echo esc_html($address); ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                    </div>

                </div>

                <div class="flex items-start space-x-4 p-4 bg-primary-50 rounded-xl hover:bg-primary-100 transition duration-300">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary-800 text-sm uppercase tracking-wider font-sans"><?php echo esc_html($phones['title']); ?></h4>
                        <ul>
                            <?php if ($phones_items && is_array($phones_items)) :
                                foreach ($phones_items as $item) :
                                    $phone = !empty($item['phone']) ? $item['phone'] : '(8172) 27-93-18';
                                    $link = !empty($item['link']) ? $item['link'] : '8172279318';
                            ?>
                                    <li class="my-2 text-primary-700 font-golos hover:text-primary-500 hover:pl-2 transition-all duration-300 flex items-center"><span class="w-1.5 h-1.5 bg-primary-400 rounded-full block shrink-0 mr-2"></span><a href="tel:<?php echo esc_html($link) ?>"><?php echo esc_html($phone) ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start space-x-4 p-4 bg-primary-50 rounded-xl hover:bg-primary-100 transition duration-300">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary-800 text-sm uppercase tracking-wider font-sans"><?php echo esc_html($emails['title']); ?></h4>
                        <ul>

                            <?php if ($emails_items && is_array($emails_items)) :
                                foreach ($emails_items as $item) :
                                    $email = !empty($item['email']) ? $item['email'] : 'stroiprov@mail.ru';
                            ?>

                                    <li class="my-2 text-primary-700 font-golos hover:text-primary-500 hover:pl-2 transition-all duration-300 flex items-center"><span class="w-1.5 h-1.5 bg-primary-400 rounded-full block shrink-0 mr-2"></span><a href="mailto:<?php echo esc_html($email) ?>"><?php echo esc_html($email) ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start space-x-4 p-4 bg-primary-50 rounded-xl hover:bg-primary-100 transition duration-300">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 4.237 2.636 7.855 6.356 9.312-.087-.791-.167-2.005.035-2.868.182-.78 1.172-4.971 1.172-4.971s-.299-.599-.299-1.484c0-1.391.806-2.428 1.809-2.428.853 0 1.265.64 1.265 1.408 0 .858-.546 2.14-.828 3.328-.236.995.499 1.807 1.481 1.807 1.777 0 3.143-1.874 3.143-4.579 0-2.394-1.72-4.068-4.177-4.068-2.845 0-4.515 2.134-4.515 4.34 0 .859.331 1.781.744 2.282.082.099.094.186.068.286-.076.315-.244.994-.278 1.135-.043.183-.145.222-.334.133-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.472 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.965-.526-2.29-1.148 0 0-.501 1.908-.623 2.378-.226.868-.835 1.958-1.244 2.623.937.288 1.931.443 2.963.443 5.523 0 10-4.477 10-10S17.523 2 12 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary-800 text-sm uppercase tracking-wider font-sans"><?php echo esc_html($socials['title']); ?></h4>
                        <ul class="space-y-2 my-2">
                            <li class="my-2 text-primary-500 font-golos hover:text-secondary hover:pl-2 transition-all duration-300 flex items-center"><span class="w-1.5 h-1.5 bg-primary-400 rounded-full block shrink-0 mr-2"></span><a href="<?php echo $socials['social_1']['url']; ?>" target="_blank">
                                    <?php echo $socials['social_1']['title']; ?>
                                </a></li>
                            <li class="my-2 text-primary-500 font-golos hover:text-secondary hover:pl-2 transition-all duration-300 flex items-center"><span class="w-1.5 h-1.5 bg-primary-400 rounded-full block shrink-0 mr-2"></span><a href="<?php echo $socials['social_2']['url']; ?>" target="_blank">
                                    <?php echo $socials['social_2']['title']; ?>
                                </a></li>
                            <li class="my-2 text-primary-500  font-golos hover:text-secondary hover:pl-2 transition-all duration-300 flex items-center"><span class="w-1.5 h-1.5 bg-primary-400 rounded-full block shrink-0 mr-2"></span><a href="<?php echo $socials['social_3']['url']; ?>" target="_blank">
                                    <?php echo !empty($socials['social_3']['title']) ? $socials['social_3']['title'] : 'Соцсеть'; ?>
                                </a></li>



                        </ul>
                    </div>
                </div>

            </div>
        <?php endif; ?>

        <div class="mt-8 p-6 bg-primary-50 rounded-xl border border-primary-100">
            <h4 class="text-lg font-bold text-primary-800 font-arimo">✉️ Как отправить заявку</h4>
            <p class="text-primary-700 mt-1 font-golos">
                Вы можете отправить заявку нам на электронный адрес <strong class="text-primary-600"><?php echo esc_html($email) ?></strong>,
                через форму обратной связи или позвонить по указанным телефонам.
            </p>
        </div>

        <div class="mt-6 p-4 bg-gray-100 rounded-xl text-center">
            <p class="text-gray-600 text-sm font-golos">
                🗺️ На карте отмечены все ключевые объекты: учебный центр, полигон, хостел,
                медицинский кабинет и технический надзор — для вашего удобства.
            </p>
            <a href="#" class="inline-block mt-3 text-primary-500 hover:text-primary-400 font-semibold font-golos transition">
                Смотреть на Яндекс.Картах →
            </a>
        </div>
        <div class="container mx-auto flex justify-center my-5">
            <?php
            $map_url = get_field('map_url', $page_id);
            if ($map_url) :
            ?>
                <iframe
                    src="<?php echo esc_url($map_url); ?>"
                    frameborder="0"
                    allowfullscreen="true"
                    allow="geolocation"
                    style="display: block; width: 100%; max-width: 800px; height: 400px"
                    class="md:height: 500px; lg:height: 600px;">
                    
                </iframe>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Основная кнопка (Акцент) -->
<button class="bg-primary-500 hover:bg-primary-400 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
    Записаться на курс
</button>

<!-- Второстепенная кнопка (Outline) -->
<button class="border-2 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white font-medium py-3 px-6 rounded-lg transition-all duration-300">
    Подробнее
</button>

<!-- Серая кнопка (нейтральная) -->
<button class="bg-gray-200 hover:bg-gray-300 text-primary-700 font-medium py-2 px-4 rounded-lg transition-all duration-300">
    Отмена
</button>

<div class="bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 p-6 transition-all duration-300 group">
    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
        <!-- Иконка (SVG) -->
        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20">
            <path d="..." />
        </svg>
    </div>
    <h3 class="text-xl font-semibold text-primary-800">Экскаваторщик</h3>
    <p class="text-gray-500 text-sm mt-2">Профессиональная подготовка</p>
    <div class="mt-4 flex items-center justify-between">
        <span class="text-2xl font-bold text-gray-900">45 000 ₽</span>
        <span class="bg-primary-100 text-primary-600 text-xs font-semibold px-3 py-1 rounded-full">Популярный</span>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200">
                <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Название</th>
                <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Часов</th>
                <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Цена</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-100 hover:bg-primary-50 transition-colors">
                <td class="px-6 py-4 font-medium text-gray-900">Крановщик</td>
                <td class="px-6 py-4 text-gray-500">120 ч.</td>
                <td class="px-6 py-4 font-bold text-primary-600">55 000 ₽</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 max-w-md mx-auto">
    <h3 class="text-2xl font-bold text-primary-800 mb-2">Оставить заявку</h3>
    <p class="text-gray-500 text-sm mb-6">Мы перезвоним вам в течение часа</p>

    <input type="text" placeholder="Ваше имя" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all duration-300">
    <input type="tel" placeholder="+7 (___) ___-__-__" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl mt-4 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all duration-300">

    <button class="w-full bg-primary-500 hover:bg-primary-400 text-white font-semibold py-3 rounded-xl mt-6 shadow-md hover:shadow-lg transition-all duration-300">
        Отправить
    </button>
</div>

<?php get_footer(); ?>