<?php
get_header();
?>

<?php
$home_page = get_page_by_path('main');
$page_id = $home_page ? $home_page->ID : 0;

$bg_image_id = get_field('background_image', $page_id);

$bg_url = $bg_image_id ? wp_get_attachment_image_url($bg_image_id, 'full') : '';
?>

<main style="<?php if ($bg_url) : ?>background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center;<?php endif; ?>" class="min-h-100 h-screen max-h-screen w-full flex items-center">
    <div class="container mx-auto">
        <div class="max-w-3xl bg-primary-800/90 rounded-md p-8 shadow-2xl">

            <h1 class="lg:text-4xl xs:text-2xl font-bold text-gray-50 font-arimo">
                <?php the_field('title', $page_id); ?>
            </h1>
            <p class="lg:text-xl xs:text-lg text-gray-50 mt-4">
                <?php the_field('subtitle', $page_id); ?>
            </p>
            <div class="flex  mt-6">
                <button class="cursor-pointer bg-primary-500 hover:bg-transparent border-primary-500 border-2 text-white font-semibold py-3 px-8 rounded-md transition duration-300">
                    <?php the_field('button', $page_id); ?>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Основной контент -->
<section class="bg-primary-50 pb-10">
    <div class="container mx-auto px-3">
        <h1 class="xs:text-3xl lg:text-4xl font-bold text-primary-900 py-5 text-center font-arimo">
            <?php the_field('section_1', $page_id); ?>
        </h1>

        <div class="grid lg:grid-cols-2 xs:grid-cols-1 lg:space-x-4 xs:space-y-4 lg:space-y-0 items-stretch self-stretch">
            <div class="bg-secondary-light p-5 rounded-xl shadow items-stretch self-stretch">
                <h2 class="xs:text-2xl lg:text-3xl text-primary-900 font-bold pb-4 font-arimo"><?php the_field('column_1', $page_id); ?></h2>
                <p class="lg:text-lg xs:text-md font-golos"><?php the_field('content_column_1', $page_id); ?></p>
                <?php render_acf_image('image_column_1', $page_id, 'full', 'w-full h-auto rounded-xl shadow mt-5 mx-auto'); ?>


            </div>
            <div class="space-y-4 items-stretch self-stretch flex flex-col">
                <div class="bg-secondary-light p-5 rounded-xl shadow items-stretch self-stretch flex flex-col flex-1">
                    <h2 class="xs:text-2xl lg:text-3xl text-primary-900 font-bold pb-4 font-arimo"><?php the_field('column_2', $page_id); ?></h2>
                    <p class="lg:text-lg xs:text-md font-golos"><?php the_field('content_column_2', $page_id); ?></p>
                    <?php
                    $list_json = get_field('content_list_column_2', $page_id);

                    $list_items = json_decode($list_json, true);

                    if ($list_items && is_array($list_items)) : ?>
                        <ul class="font-sans font-bold">
                            <?php foreach ($list_items as $item) :
                                $link = !empty($item['link']) ? $item['link'] : '#';
                                $title = !empty($item['title']) ? $item['title'] : 'Программа';
                            ?>
                                <li class="py-2">
                                    <a class="lg:text-xl xs:text-md text-primary-700 hover:text-primary-500 transition duration-300"
                                        href="<?php echo esc_url($link); ?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php render_acf_image('image_column_2', $page_id, 'full', 'w-full h-auto rounded-xl shadow'); ?>
                </div>
                <div class="bg-secondary-light p-5 rounded-xl shadow items-stretch self-stretch flex flex-col">
                    <h2 class="xs:text-2xl lg:text-3xl text-primary-900 font-bold pb-4 font-arimo"><?php the_field('column_3', $page_id); ?></h2>
                    <p class="lg:text-lg xs:text-md font-golos"><?php the_field('content_column_3', $page_id); ?></p>
                    <?php render_acf_image('image_column_3', $page_id, 'full', 'w-full h-auto rounded-xl shadow'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Секция с преимуществами -->
<section class="bg-primary-100 pb-10">
    <div class="container mx-auto px-6">
        <h2 class="xs:text-3xl lg:text-4xl font-bold text-primary-900 py-5 text-center font-arimo">
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
                    <hr class="h-1 w-1/2 mx-auto my-2 bg-primary-500/70 border-0">
                    <p class="text-lg mt-2">
                        <?php echo esc_html($description); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Цикл записей (если есть посты) -->
<section class="container mx-auto px-6 py-16">
    <h2 class="heading-lg mb-8">
        <?php _e('Новости и статьи', 'stroiprov'); ?>
    </h2>
    <?php if (have_posts()) : ?>
        <div class="grid md:grid-cols-3 gap-6">
            <?php while (have_posts()) : the_post(); ?>
                <article class="card-modern">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover rounded-xl mb-4">
                    <?php endif; ?>
                    <h3 class="text-xl font-semibold text-gray-800">
                        <a href="<?php the_permalink(); ?>" class="hover:text-primary-500 transition">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <p class="text-muted mt-2">
                        <?php echo get_the_date(); ?>
                    </p>
                    <p class="text-body mt-2">
                        <?php the_excerpt(); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="text-primary-500 font-semibold hover:text-primary-400 transition">
                        <?php _e('Читать далее →', 'stroiprov'); ?>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p class="text-body"><?php _e('Новостей пока нет.', 'stroiprov'); ?></p>
    <?php endif; ?>
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
<button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-all duration-300">
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