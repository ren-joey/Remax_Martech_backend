<?php

namespace Utils;

class Helpers {
    static public function get_json ($path) {
        $file = file_get_contents($path);
        $data = json_decode($file);
        return $data;
    }
}