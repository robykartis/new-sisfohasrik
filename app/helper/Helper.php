<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array('$uri')) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
    function set_expand($uri, $output = 'menu-open')
    {
        if (is_array('$uri')) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}
