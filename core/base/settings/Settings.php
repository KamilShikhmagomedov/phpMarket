<?php

namespace core\base\settings;

class Settings {

    static private $_instance;

    private $routes = [
        'settings' => [
            'path' => 'core/base/settings/'
        ],
        'plugins' => [
            'path' => 'core/base/plugins/',
            'hrUrl' => false
        ],
        'admin' => [
            'name' => 'admin',
            'path' => 'core/admin/controller/',
            'hrUrl' => false
        ],
        'user' => [
            'path' => 'core/user/controller/',
            'hrUrl' => true,
            'routes' => [

            ]
        ],
        'default' => [
            'controller' => 'IndexController',
            'inputMethod' => 'inputData',
            'outputMethod' => 'outputData'
        ]
    ];

    private $templateArr = [
        'text' => ['name', 'phone', 'address'],
        'textArea' => ['content', 'keywords']
    ];

    private function __construct(){
    }

    private function __clone(){
    }

    public function getInstance($property){
        return self::instance() -> $property;
    }

    public static function instance(){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new self();
    }

    public function clueProperties($class) {
        $baseProperties = [];
        foreach ($this as $name => $item) {
            $property = $class::getInstance($name);
            if (is_array($property) && is_array($item)){
                $baseProperties[$name] = array_merge_recursive($this->$name, $property);
            }
        }
        exit();
    }

}