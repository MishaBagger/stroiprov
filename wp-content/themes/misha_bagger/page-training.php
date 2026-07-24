<?php
/*
Template Name: Учебный центр
*/
get_header();
?>

<?php
// Получаем ID текущей страницы
$page_id = get_the_ID();

// Получаем фоновое изображение
$bg_image = get_field('background_image', $page_id);
$bg_url = $bg_image ? $bg_image['url'] : '';
?>

<img src="<?php echo esc_url($bg_url); ?>" alt="<?php the_title(); ?>" class="w-full h-96 object-cover">

<?php the_title(); ?>
<?php get_footer(); ?>