<?php
/**
 * WP Plugin Info · Eliasis module for WordPress plugins
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP_Plugin-Info.git
 * @since      1.0.0
 */

namespace Eliasis\Modules\WP_Plugin_Info\Controller\Admin\Info;


use Eliasis\Module\Module,
    Eliasis\Controller\Controller;
    
/**
 * Info controller.
 *
 * @since 1.0.0
 */
class Info extends Controller {

    /**
     * Actual plugin slug.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected $slug;

    /**
     * Plugins information.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $plugin = [];

    /**
     * Get current plugins information.
     * 
     * @since 1.0.0
     *
     * @return float → rating
     */
    public function getPluginsInfo() {

        $this->plugin = $this->model->getPluginsInfo();
    }

    /**
     * Get plugin info in WordPress API.
     *
     * @since 1.0.0
     *
     * @param string $slug → WordPress plugin slug
     *
     * @return array
     */
    protected function getPluginInfo($slug) {

        $args = (object) ['slug' => $slug];
     
        $request = [

            'action'  => 'plugin_information', 
            'timeout' => 15, 
            'request' => serialize($args)
        ];
     
        $url = Module::WP_Plugin_Info()->get('url', 'wp-api');
     
        $resp = wp_remote_post($url, ['body' => $request]);

        $resp = isset($resp['body']) ? unserialize($resp['body']) : [];

        unset($resp->sections, $resp->versions, $resp->screenshots);

        return (array) $resp;
    }

    /**
     * Get plugin options.
     *
     * @since 1.0.0
     *
     * @param string $option → option to get
     * @param string $slug   → WordPress plugin slug
     *
     * @return int
     */
    public function get($option, $slug) {

        $this->getInfo($slug);

        if (isset($this->plugin[$this->slug][$option])) {

            return $this->plugin[$this->slug][$option];
        }

        $plugin = $this->plugin[$this->slug];

        return false;
    }

    /**
     * Get plugin info.
     * 
     * @since 1.0.0
     *
     * @param string $slug → WordPress plugin slug
     */
    protected function getInfo($slug) {

        $this->slug = $slug;

        if (!$this->updated()) {

            $this->plugin[$this->slug] = $this->getPluginInfo($this->slug);

            $this->plugin[$this->slug]['last-update'] = time();

            $this->model->setPluginsInfo($this->plugin);
        }
    }

    /**
     * Check the last update.
     * 
     * @since 1.0.0
     *
     * @return boolean
     */
    protected function updated() {

        if (isset($this->plugin[$this->slug]['last-update'])) {

            $interval = Module::WP_Plugin_Info()->get('interval');

            $lastUpdate = $this->plugin[$this->slug]['last-update'];

            if ((time() - $lastUpdate) < $interval) {

                return true;
            }
        }

        return false;
    }
}
