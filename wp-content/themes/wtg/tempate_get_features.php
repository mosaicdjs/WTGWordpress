<?php
/*
* Template Name: Check Features
*
*/
get_header();
echo '<h1>GET FEATURES</h1>';
$args = array (
        'post_type' => 'features',
        'posts_per_page' => 500
);
$features = new WP_Query ($args);
//var_dump($features);
var_dump($args);
$i;
global $post;
while ($features->have_posts())
{
    $i++;
    //echo $i;
    //if ($i < 2) var_dump ($post);
    $features->the_post();
    $slug = basename (get_permalink());
    //echo '<br />'.$slug;

    $duplicate = substr ($slug, -2);

    if ($duplicate == '-2') echo '<br />'.get_the_title().' '.$duplicate;

}
get_footer();

