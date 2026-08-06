<?php
/*
Template Name: Политика конфиденциальности
*/
get_header();
?>

<?php
// Получаем ID текущей страницы
$page_id = get_the_ID();
?>


<div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 lg:p-10 border border-gray-100">
    <div class="max-w-none font-golos text-gray-700 leading-relaxed">
        <div class="text-center pb-4 border-b border-gray-200">
        <h1 class="text-3xl md:text-4xl font-bold text-primary-800 font-arimo"><?php the_title(); ?></h1>
        
    </div>
     <p class="text-gray-700 leading-relaxed my-5">При использовании Сайта Пользователь автоматически соглашается с <?php
        $privacy_id = get_field('privacy', $page_id);
        if ($privacy_id) :
            $privacy_url = wp_get_attachment_url($privacy_id);
            $privacy_title = get_the_title($privacy_id) ?: basename($privacy_url);
        ?>
            <a href="<?php echo esc_url($privacy_url); ?>" target="_blank" class="text-primary-500 hover:text-primary-400 transition">
                📄 <?php echo esc_html($privacy_title); ?>
            </a>
        <?php endif; ?></p>
    
        
        
        <?php the_field('policy_text', $page_id); ?>
    </div>
</div>

<?php get_footer(); ?>