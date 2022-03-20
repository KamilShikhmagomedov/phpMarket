<?php

namespace core\base\settings;

use core\base\settings\Settings;

class ShopSettings {

    static private $_instance;
    private $baseSettings;

    private $templateArr = [
        'text' => ['price', 'short'],
        'textArea' => ['goods_content']
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
        self::$_instance = new self();
        self::instance()-> baseSettings = Settings::instance();
        $baseProperties = self::$_instance-> baseSettings-> clueProperties(get_class());
        return self::$_instance;
    }
}