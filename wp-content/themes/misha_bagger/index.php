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
                СтройМеханизация Профи
            </h1>
            <p class="lg:text-xl xs:text-lg text-gray-50 mt-4">
                Профессионально обучаем персонал для работы на строительных машинах и механизмах с целью обеспечения потребности в квалифицированных кадрах строительных организаций с 2009 года. У нас более 5000 довольных учеников и 50+ организаций. Работаем в Вологде, Великом Устюге и Вытегре.
            </p>
            <div class="flex  mt-6">
                <button class="cursor-pointer bg-primary-500 hover:bg-transparent border-primary-500 border-2 text-white font-semibold py-3 px-8 rounded-md transition duration-300">
                    Записаться
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Основной контент -->
<section class="bg-primary-50 pb-10">
    <div class="container mx-auto px-3">
        <h1 class="text-4xl font-bold text-primary-900 py-5 text-center font-arimo">
            О нас
        </h1>

        <div class="grid grid-cols-2 space-x-4">
            <div class="bg-secondary-light p-5 rounded-xl shadow">
                <h2 class="text-4xl text-primary-900 font-bold pb-4 font-arimo">Учебный центр</h2>
                <text class="text-lg font-golos">Постоянно возрастающую роль в нашей жизни играет дополнительное профессиональное образование.
                    Повышение квалификации является важной формой непрерывного профессионального образования специалистов.
                    Еe задачами является расширение и углубление имеющихся знаний, практических умений и навыков для адаптации специалистов к постоянно изменяющимся социальным и профессиональным условиям, а также совершенствование их профессиональных, деловых, личностных, нравственных качеств.</text>
            </div>
            <div class="space-y-4">
                <div class="bg-secondary-light p-5 rounded-xl shadow">
                    <h2 class="text-4xl text-primary-900 font-bold pb-4 font-arimo">Программы обучения</h2>
                    <text class="text-lg font-golos"> ЧНОУ ДПО Отраслевой учебный центр «Строймеханизация-Профи» проводит обучение по следующим Образовательным программам:</text>
                    <ul class=" font-sans font-bold">
                        <li class="py-2">
                            <a class="text-xl text-primary-700 hover:text-primary-500 transition duration-300" href="">Обучение рабочих</a>
                        </li>
                        <li class="py-2">

                            <a class="text-xl text-primary-700 hover:text-primary-500 transition duration-300" href="">Повышение квалификации</a>
                        </li>
                        <li class="py-2">

                            <a class="text-xl text-primary-700 hover:text-primary-500 transition duration-300" href="">Профессиональная переподготовка</a>
                        </li>
                        <li class="py-2">

                            <a class="text-xl text-primary-700 hover:text-primary-500 transition duration-300" href="">Дополнительное образование</a>
                        </li>
                    </ul>
                </div>
                <div class="bg-secondary-light p-5 rounded-xl shadow">
                    <h2 class="text-4xl text-primary-900 font-bold pb-4 font-arimo">Контакты</h2>
                    <text class="text-lg font-golos">Частное негосударственное образовательное учреждение дополнительного профессионального образования
                        Отраслевой учебный центр «Строймеханизация-Профи»
                        Сделать заявку на обучение: можете отправить заявку нам на электронный адрес stroiprov@mail.ru или через форму обратной связи,
                        или позвонить по телефону (8-172) 27-93-18.
                        Мы ВКонтакте: https://vk.com/stroymeh_profi

                        Наш адрес: 160014, г.Вологда, Советский проспект, 131 Д, помещение 4. см. схему проезда</text>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Секция с преимуществами -->
<section class="bg-primary-100 py-16">
    <div class="container mx-auto px-6">
        <h2 class="heading-lg text-center mb-12">
            <?php _e('Почему выбирают нас', 'stroiprov'); ?>
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="card-modern text-center">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">
                    <?php _e('Опыт с 2009 года', 'stroiprov'); ?>
                </h3>
                <p class="text-body mt-2">
                    <?php _e('15 лет успешной работы', 'stroiprov'); ?>
                </p>
            </div>
            <!-- Добавь ещё 2 карточки -->
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

<header class="bg-primary-900 text-gray-200 border-b border-primary-700">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Логотип светлый -->
        <div class="text-2xl font-bold text-white tracking-tight">Строй<span class="text-primary-500">Мех</span></div>

        <ul class="flex space-x-8 text-sm font-medium">
            <li><a href="#" class="hover:text-white transition">Курсы</a></li>
            <li><a href="#" class="hover:text-white transition">О нас</a></li>
            <li><a href="#" class="hover:text-white transition">Контакты</a></li>
        </ul>

        <button class="bg-primary-500 hover:bg-primary-400 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-lg transition">
            Записаться
        </button>
    </div>
</header>

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