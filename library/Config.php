<?php

class Config {

    static function get($key) {
        $config = parse_ini_file(LIB_DIR.DS. 'config.ini');
        return $config[$key];
    }

}
