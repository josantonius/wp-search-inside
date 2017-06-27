<?php
/**
 * PHP library for adding addition of modules for Eliasis Framework.
 *
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Eliasis-Framework/Module
 * @since      1.0.0
 */

namespace Eliasis\Module;

use Eliasis\App\App,
    Josantonius\Hook\Hook,
    Josantonius\Json\Json,
    Eliasis\Module\Exception\ModuleException;

/**
 * Module class.
 *
 * @since 1.0.0
 */
class Module { 

    /**
     * Module instance.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected static $instances;

    /**
     * Available modules.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $module = [];

    /**
     * List of modules (status indicators).
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected static $states;

    /**
     * Action hooks.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected static $hooks = [
        'activation', 
        'deactivation',
        'installation',
        'uninstallation',
    ];

    /**
     * Id of current module called.
     *
     * @since 1.0.0
     *
     * @var array
     */
    public static $id;

    /**
     * Get module instance.
     *
     * @since 1.0.0
     *
     * @return object → module instance
     */
    public static function getInstance() {

        if (!isset(self::$instances[App::$id][self::$id])) { 

            self::$instances[App::$id][self::$id] = new self;
        }

        return self::$instances[App::$id][self::$id];
    }


    /**
     * Load all modules found in the directory.
     *
     * @since 1.0.0
     *
     * @param string $path → modules folder path
     */
    public static function loadModules($path) {

        if (is_dir($path) && $handle = opendir($path)) {

            while ($dir = readdir($handle)) {

                $ignore = App::DS . '.' . App::DS . '..' . App::DS;

                if ((is_dir($path . $dir)) && !strpos($ignore, $dir)) {

                    $file = $path . $dir . App::DS . $dir . '.php';

                    if (!file_exists($file)) {

                        continue;
                    }

                    $module = require($file);

                    self::$id = isset($module['id']) ? $module['id'] : '';

                    self::_add($module, $path . $dir);
                }
            }

            closedir($handle);
        }
    }

    /**
     * Add module.
     *
     * @since 1.0.0
     *
     * @param string $module → module info
     * @param string $path   → module path
     *
     * @throws ModuleException → module configuration file error
     */
    private static function _add($module, $path) {

        $that = self::getInstance();

        self::getStates();

        $required = [

            'id',
            'name',
            'version',
            'description',
            'state',
            'category',
            'uri',
            'author',
            'author-uri',
            'license',
        ];

        if (count(array_intersect_key(array_flip($required),$module)) != 10) {

            $message = 'The module configuration file is not correct. Path';

            throw new ModuleException($message . ': ' . $path . '.', 816);
        }

        $folder = explode(App::DS, $path);

        $module['path']['root'] = $path . App::DS;
        $module['folder'] = array_pop($folder) . App::DS;
        $module['slug'] = trim($module['folder'], App::DS);

        $that->module = $module;

        $state  = $that->_getState();
        $action = $that->_getAction($state);

        $that->_setAction($action);

        $that->setState($state);

        $that->_getSettings();

        $states = ['active', 'outdated'];

        if (in_array($action, self::$hooks) || in_array($state, $states)) {

            $that->_addResources();

            Hook::getInstance(App::$id);

            Hook::doAction('module-load');

            if (in_array($action, self::$hooks)) {

                $that->_doAction($action, $state);
            }
        }
    }

    /**
     * Get modules list (status indicators).
     *
     * @since 1.0.0
     *
     * @return array → modules states
     */
    public static function getStates() {

        $id = App::$id;

        $name = self::$id;

        $filepath = App::MODULES() . App::modules('states-file');

        $states = Json::fileToArray($filepath);

        $states = isset($states[$id][$name]) ? $states[$id][$name] : [];

        self::$states = $states;

        return self::$states;
    }

    /**
     * Save states for modules.
     *
     * @since 1.0.0
     */
    private static function _setStates() {

        if (!is_null(self::$states)) {

            $filepath = App::MODULES() . App::modules('states-file');

            $states = Json::fileToArray($filepath);

            $states[App::$id][self::$id] = self::$states;

            Json::ArrayToFile($states, $filepath);
        }
    }

    /**
     * Get module state.
     *
     * @since 1.0.0
     *
     * @return string → module state
     */
    private function _getState() {

        if (isset(self::$states['state'])) {

            return self::$states['state'];
        
        } else if (isset($this->module['state'])) {

            return $this->module['state'];
        }

        return App::modules('default-state');
    }

    /**
     * Set module state.
     *
     * @since 1.0.0
     *
     * @param string $state → module state
     *
     * @return string → state
     */
    public function setState($state) {

        $that = self::getInstance();

        $that->module['state'] = $state;

        self::$states['state'] = $state;

        self::_setStates();

        return $state;
    }

    /**
     * Get module action.
     *
     * @since 1.0.0
     *
     * @param string $state → module state
     */
    private function _getAction($state) {

        $action = App::modules('default-action');

        if (isset(self::$states['action'])) {

            $action = self::$states['action'];
        }

        return ($state === 'uninstalled') ? '' : $action;
    }

    /**
     * Set module action.
     *
     * @since 1.0.0
     *
     * @param string $action
     */
    private function _setAction($action) {

        self::$states['action'] = $action;
    }

    /**
     * Execute action hook.
     *
     * @since 1.0.5
     *
     * @param string  $action
     * @param string  $state
     */
    private function _doAction($action, $state) {

        $that = self::getInstance();

        $Launcher = $that->instance('Launcher', 'controller');

        if (is_object($Launcher) && method_exists($Launcher, $action)) {

            call_user_func([$Launcher, $action]);
        }

        $that->_setAction('');

        $that->setState($state);
    }

    /**
     * Delete module.
     *
     * @since 1.0.0
     *
     * @param boolean $moduleName → plugin name to delete
     * @param boolean $deleteAll  → delete the entire directory or
     *                              leave only the configuration file.
     *
     * @return string → module state
     */
    public static function remove($moduleName, $deleteAll = true) {

        self::$id = $moduleName;

        $that = self::getInstance();

        if (isset($that->module['path']['root'])) {

            $that->setState('remove');

            $state = $that->changeState(self::$id);

            $path = $that->module['path']['root'];

            $that->_deleteDir($path, $deleteAll);     
        }

        return $state;
    }

    /**
     * Change module state.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function changeState($moduleName = null) {

        self::$id = ($moduleName) ? $moduleName : self::$id;

        $that = self::getInstance();

        self::getStates();

        $state = $that->_getState();

        switch ($state) {
            
            case 'active':
                $action = 'deactivation';
                $state = 'inactive';
                break;

            case 'inactive':
                $action = 'activation';
                $state = 'active';
                break;

            case 'uninstalled':
                $action = '';
                $state = 'installed';
                break;

            case 'installed':
                $action = 'installation';
                $state = 'inactive';
                break;

            case 'outdated':
                $action = 'installation';
                $state = 'updated';
                break;

            case 'updated':
                $action = 'activation';
                $state = 'active';
                break;

            case 'remove':
                $action = 'uninstallation';
                $state = 'uninstalled';
                break;
        }

        $that->setState($state);

        $that->_doAction($action, $state);

        return $state;
    }

    /**
     * Delete module.
     *
     * @since 1.0.0
     *
     * @param boolean $modulePath → module path
     * @param boolean $deleteAll  → delete the entire directory or
     *                              leave only the configuration file
     *
     * @return boolean
     */
    private static function _deleteDir($modulePath, $deleteAll) {

        $that = self::getInstance();

        $slug = trim($that->module['folder'], App::DS);

        if (!is_dir($modulePath)) {

            return false;
        }
         
        $objects = scandir($modulePath); 
        
        foreach ($objects as $obj) { 
        
            if ($obj === '.' || $obj === '..') { continue; }

            if (is_file($modulePath . $obj)) {

                if (!$deleteAll) {

                    if ($obj == $slug . '.php' || $obj == $slug . '.png') {

                        continue;
                    }
                }

                unlink($modulePath . $obj);

            } else {

                $that->_deleteDir($modulePath . $obj . App::DS, $deleteAll);
            } 
        }

        if (!$deleteAll) {

            $path = explode(App::DS, trim($modulePath, App::DS));

            $folder = array_pop($path);

            $folders = [$slug, 'images', 'public'];

            if (in_array($folder, $folders)) {

                return true;
            }
        }

        rmdir($modulePath);

        return true;
    }

    /**
     * Get modules info.
     *
     * @since 1.0.0
     *
     * @param string $category → module category
     *
     * @return array $data → modules info
     */
    public static function getModulesInfo($category = 'all') {

        $data = [];

        $id = self::$id;

        $that = self::getInstance();

        $modules = array_keys(self::$instances[App::$id]);

        foreach ($modules as $module) {

            self::$id = $module;

            $that = self::getInstance();

            $module = $that->module;

            if ($category !== 'all' && $module['category'] !== $category) {

                continue;
            }

            $data[] = [

                'id'          => $module['id'],
                'name'        => $module['name'],
                'version'     => $module['version'],
                'description' => $module['description'],
                'state'       => $module['state'],
                'category'    => $module['category'],
                'path'        => $module['path']['root'],
                'uri'         => $module['uri'],
                'author'      => $module['author'],
                'author-uri'  => $module['author-uri'],
                'license'     => $module['license'],
                'state'       => $module['state'],
                'slug'        => $module['slug'],
            ];
        }

        self::$id = $id;

        return $data;
    }

    /**
     * Get settings.
     *
     * @since 1.0.0
     */
    private function _getSettings() {

        $that = self::getInstance();

        $_root = $that->module['path']['root'];

        $_path =  $_root . 'config' . App::DS;
            
        if (is_dir($_path) && $handle = scandir($_path)) {

            $_files = array_slice($handle, 2);

            foreach ($_files as $_file) {

                $content = require($_path . $_file);

                $merge = array_merge($that->module, $content);

                $that->module = $merge;
            }
        }

        $that->module['path']['root']   = $_root;
        $that->module['path']['config'] = $_path;
    }
                                                                               
    /**
     * Add module routes and hooks if exists.
     *
     * @since 1.0.0
     */
    private function _addResources() {

        $that = self::getInstance();

        $module = $that->module;

        if (isset($module['hooks'])) {

            Hook::getInstance(App::$id);
            
            Hook::addActions($module['hooks']);
        } 

        if (class_exists($Router = 'Josantonius\Router\Router')) {

            if (isset($module['routes']) && count($module['routes'])) {

                $Router::addRoute($module['routes']);
            }
        }
    }
                                                                      
    /**
     * Check if module exists.
     *
     * @since 1.0.2
     *
     * @param string $id → module id
     *
     * @return boolean
     */
    public static function exists($id) {

        return array_key_exists($id, self::$instances[App::$id]);
    }

    /**
     * Define new configuration settings.
     *
     * @since 1.0.4
     *
     * @param string $option → option name or options array
     * @param mixed  $value  → value/s
     *
     * @return mixed
     */
    public static function set($option, $value) {

        $that = self::getInstance();

        if (!is_array($value)) {

            return $that->module[$option] = $value;
        }

        if (array_key_exists($option, $value)) {

            $that->module[$option] = array_merge_recursive(

                $that->module[$option], $value
            );
        
        } else {

            foreach ($value as $key => $value) {
            
                $that->module[$option][$key] = $value;
            }
        }

        return $that->module[$option];        
    }

    /**
     * Get options saved.
     *
     * @since 1.0.4
     *
     * @param array $params
     *
     * @return mixed
     */
    public static function get(...$params) {

        $that = self::getInstance();

        $key = array_shift($params);

        $col[] = isset($that->module[$key]) ? $that->module[$key] : 0;

        if (!count($params)) {

            return ($col[0]) ? $col[0] : '';
        }

        foreach ($params as $param) {

            $col = array_column($col, $param);
        }
        
        return (isset($col[0])) ? $col[0] : '';
    }

    /**
     * Get controller instance.
     *
     * @since 1.0.4
     *
     * @param array $class     → class name
     * @param array $namespace → namespace index
     *
     * @return object|false → class instance or false
     */
    public function instance($class, $namespace = '') {

        $that = self::getInstance();

        if (isset($that->module['namespaces'])) {

            if (isset($that->module['namespaces'][$namespace])) {

                $namespace = $that->module['namespaces'][$namespace];

                $class = $namespace . $class . '\\' . $class;

                return call_user_func([$class, 'getInstance']);
            }

            foreach ($that->module['namespaces'] as $key => $namespace) {

                $instance = $namespace . $class . '\\' . $class;
                
                if (class_exists($instance)) {

                    return call_user_func([$instance, 'getInstance']);
                }
            }
        }

        return false;
    }

    /**
     * Receives the name of the module to execute: Module::ModuleName();
     *
     * @since 1.0.0
     *
     * @param string $index  → module name
     * @param array  $params → params
     *
     * @throws ModuleException → Module not found
     *
     * @return object
     */
    public static function __callstatic($index, $params = false) {

        if (!array_key_exists($index, self::$instances[App::$id])) {

            $message = 'Module not found';

            throw new ModuleException($message . ': ' . $index . '.', 817);
        }

        $that = self::getInstance();

        self::$id = $index;

        if (!$params) { return $that; }

        $method = (isset($params[0])) ? $params[0] : '';
        $args   = (isset($params[1])) ? $params[1] : 0;

        if (method_exists($that, $method)) {

            return call_user_func_array([$that, $method], [$args]);
        }
    }
}
