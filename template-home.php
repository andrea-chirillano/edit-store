<?php
/*
Template Name: Personalized Blog
*/
get_header();
?>

<h1>Main blog</h1>

<?php
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 10
));

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        the_title('<h2>', '</h2>');
        the_excerpt();
    endwhile;
endif;
wp_reset_postdata();
?>

<?php get_footer(); ?>