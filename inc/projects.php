<?php

namespace Deverati;

/**
 * Class Projects
 *
 * @package Deverati
 */
class Projects {

    /**
     * Initialize
     *
     */
    public static function init () {
        add_shortcode('projects', array('Deverati\Projects', 'do_shortcode'));
        add_filter('slick_slide', array('Deverati\Projects', 'add_slide_tags'));
    }

    /**
     * Projects
     *
     * @return string
     */
    public static function do_shortcode() {

        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            // 'post__in'  => get_option('sticky_posts'),
            // 'ignore_sticky_posts' => 1,
            // has thumbnail
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            )
        );

        $slick = array(
            'dots' => true,
            'slidesToShow' => 1,
            'slidesToScroll' => 1,
            'autoplay' => true,
        );

        return \Pressgang\Carousel::render($args, 400, 500, $slick);
    }

    /**
     * slick_slide
     *
     * @param $slide
     */
    public static function add_slide_tags($slide) {

        $terms = wp_get_post_terms($slide->ID, 'technology');

        $technologies = array();

        foreach ($terms as $term) {
            $technologies[] = new \Timber\Term($term->term_id);
        }

        $slide->technologies = $technologies;
    }
}

Projects::init();