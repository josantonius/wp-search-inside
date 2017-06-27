<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.1.7
 */

namespace SearchInside\Controller\Admin\Component\Rating;

use Eliasis\App\App,
    Eliasis\Module\Module,
    Eliasis\Controller\Controller;
    
/**
 * Rating controller
 *
 * @since 1.1.7
 */
class Rating extends Controller {

    /**
     * Get plugin Rating.
     *
     * @param string $slug → WordPress plugin slug
     *
     * @since 1.1.7
     *
     * @return array → stars states
     */
    public function getPluginRating($slug) {

        $rating = 5;

        $pluginsUrl = App::SearchInside()->get('url', 'wp-plugins');

        $url = $pluginsUrl . $slug . '/reviews/#new-post';
        
        $data['plugin-url-review'] = $url;

        if (Module::exists('WP_Plugin_Info')) {

            $rating = Module::WP_Plugin_Info()->instance('Info')
                                              ->get('rating', $slug);

            $rating = ($rating !== false) ? $rating : 5;
        }

        $data['stars'] = $this->prepareStars($rating);

        return $data;
    }

    /**
     * Prepare states for each star.
     * 
     * @since 1.1.7
     *
     * @param float|int $rating → plugin rating 
     *
     * @return array $rating → state for the five stars
     */
    public function prepareStars($rating) {

        $stars = [];

        $fullStar = (int) floor($rating);

        $halfStar = (($rating - $fullStar) > 0) ? true : false;

        for ($i=0; $i < $fullStar; $i++) { 
            
            $stars[] = 'filled';
        }

        if ($halfStar) {

            $stars[] = 'half';
        }

        for ($i=0; $i < (5 - $fullStar); $i++) { 
            
            $stars[] = 'empty';
        }

        return array_reverse($stars);
    }
}
