<?php
/*
Template Name: Программы повышения квалификации
*/
get_header();
$page_id = get_the_ID();
?>

<h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-primary-900 font-arimo text-center my-5"><?php the_title() ?></h1>
<div class="mb-6 bg-primary-50 border-l-4 border-primary-500 p-4 rounded-r-lg flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 container mx-auto">
    <p class="text-sm text-gray-700 font-golos leading-relaxed">
        <?php the_field('programs_note_text', $page_id); ?>
    </p>
    <?php 
    $note_file = get_field('programs_note_file', $page_id);
    if ($note_file) :
        $file_url = is_array($note_file) ? $note_file['url'] : wp_get_attachment_url($note_file);
        $file_title = is_array($note_file) ? ($note_file['title'] ?: basename($file_url)) : (get_the_title($note_file) ?: basename($file_url));
    ?>
        <a href="<?php echo esc_url($file_url); ?>" download class="shrink-0 inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-400 text-white font-semibold text-sm py-2 px-5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <?php echo esc_html($file_title); ?>
        </a>
    <?php endif; ?>
</div>

<?php
$programs = new WP_Query([
    'post_type'      => 'program_qualified',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC',
]);
?>

<?php if ($programs->have_posts()) : ?>
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm container mx-auto my-16">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Название</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-500 tracking-wider">Описание</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Часов</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Цена</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider">Документ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($programs->have_posts()) : $programs->the_post();
                        $hours = get_field('program_hours');
                        $price = get_field('program_price');
                        $description = get_field('program_description');
                        $file = get_field('program_file');
                        $file_url = $file ? wp_get_attachment_url($file) : '';
                        $file_name = $file ? basename($file_url) : '';
                    ?>
                        <tr class="border-b border-gray-200 hover:bg-primary-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                <?php echo esc_html(get_the_title() ?: '—'); ?>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm max-w-50">
                                <?php echo esc_html($description ?: '—'); ?>
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                <?php echo esc_html($hours ?: '—'); ?>
                            </td>
                            <td class="px-6 py-4 font-bold text-primary-600">
                                <?php echo esc_html($price ?: '—'); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($file_url) : ?>
                                    <a href="<?php echo esc_url($file_url); ?>" download class="text-primary-500 hover:text-primary-400 transition inline-flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <?php echo esc_html($file_name); ?>
                                    </a>
                                <?php else : ?>
                                    <span class="text-gray-400 text-sm">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-12 text-center min-h-screen">
        <p class="text-gray-500 font-golos">Программ обучения пока нет.</p>
    </div>
<?php endif; ?>
<?php get_footer(); ?>