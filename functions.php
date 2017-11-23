<?php

const THEMENAME = 'Deverati';
const WEB_AUTHOR = 'Benedict Wallis, https://benedict-wallis.com';

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_filter('site_keywords', function($tags) {
    $technologies = get_terms(array('taxonomy' => 'technology', 'orderby' => 'count', 'order' => 'DESC', 'number' => 20));
    if (!is_wp_error($technologies)) {
        $tags = implode(', ', array_map(function ($technology) {
            return $technology->name;
        }, $technologies));
    }
    return $tags;
});