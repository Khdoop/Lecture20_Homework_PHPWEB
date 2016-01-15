<?php

function getValue($array, $key, $default = null) {
    return isset($array[$key]) ? $array[$key] : $default;
}

function getClass($array, $key, $class = 'error') {
    return empty($array[$key]) ? '' : $class;
}

function getErrors($array, $key) {
    $html = '';
    foreach (getValue($array, $key, []) as $error) {
        $html .= sprintf('<span>%s</span>', $error);
    }

    return $html;
}