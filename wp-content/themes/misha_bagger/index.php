<?php get_header(); ?>

<!-- Основной контент -->
<section class="bg-primary-900 text-white py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="heading-xl text-white">
            <?php _e('Профессиональное обучение', 'stroiprov'); ?>
        </h1>
        <p class="text-xl text-primary-300 mb-8">
            <?php _e('Строительные машины и механизмы', 'stroiprov'); ?>
        </p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="btn-primary">
                <?php _e('Записаться на курс', 'stroiprov'); ?>
            </a>
            <a href="#" class="btn-outline border-white text-white hover:bg-white hover:text-primary-900">
                <?php _e('О центре', 'stroiprov'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Секция с преимуществами -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h2 class="heading-lg text-center mb-12">
            <?php _e('Почему выбирают нас', 'stroiprov'); ?>
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="card-modern text-center">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
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

<?php get_footer(); ?>