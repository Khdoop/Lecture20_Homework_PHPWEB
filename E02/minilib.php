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

function validateRequired($var) {
    return !empty($var);
}

function validateLength($var, $min, $max = null) {
    $length = mb_strlen($var, 'UTF-8');
    if ($min > $length) {
        return false;
    }

    if ($max != null && $max < $length) {
        return false;
    }

    return true;
}

function validateNonAlphaNum($var) {
    return preg_match('/[^a-z0-9а-я\s]/i',$var);
}

function validateIdentical($var1, $var2) {
    return $var1 === $var2;
}
