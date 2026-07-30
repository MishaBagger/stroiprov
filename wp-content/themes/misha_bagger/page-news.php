<?php
/*
Template Name: Новости
*/
get_header();
?>

<?php the_title(); ?>

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