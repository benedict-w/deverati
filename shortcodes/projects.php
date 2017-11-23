<?php

namespace Deverati;

/**
 * Class Projects
 *
 * @package Deverati
 */
class Projects extends \Pressgang\Shortcode
{

    /**
     * __construct
     *
     */
    public function __construct() {
        add_filter('slick_slide', array('Deverati\Projects', 'add_slide_tags'));

        parent::__construct();
    }

    /**
     * do_shortcode
     *
     * @return string
     */
    public function do_shortcode($atts, $content = null) {

        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            // has thumbnail
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
                array(
                    'key' => 'featured',
                    'value' => '1',
                    'compare' => '=='
                ),
            )
        );

        $slick = array(
            'dots' => true,
            'arrows' => true,
            'slidesToShow' => 1,
            'slidesToScroll' => 1,
            'adaptiveHeight' => true,
            'autoplay' => true,
            'responsive' => array(
                array(
                    'breakpoint' => 480,
                    'settings' => array(
                        'dots' => false,
                        'arrows' => false,
                    ),
                ),
            ),
        );

        return \Pressgang\Carousel::render('projects-slick.twig', $args, 485, 300, $slick);
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

new Projects();