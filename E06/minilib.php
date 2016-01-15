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
    return (bool) preg_match('/[^a-z0-9а-я\s]/i',$var);
}

function validateIdentical($var1, $var2) {
    return $var1 === $var2;
}

function validateNumber($var) {
    return is_numeric($var);
}

function validateSequence($string, $count) {
    $a = (bool) preg_match('/^[0-9]-,/', $string);
    preg_match_all('/[0-9]|-|,/', $string, $array);
    $array = explode(',',implode('', $array[0]));

    if (!$a && count($array) == $count) {
        return true;
    } else {
        return false;
    }
}

function validateDate($date) {
    list($year, $month, $day) = sscanf($date, "%d-%d-%d");
    if ((bool)preg_match('/^[0-9]-/', $date)) {
        return false;
    } else if (!is_numeric($year) || !is_numeric($month) || !is_numeric($day)) {
        return false;
    } else if (!checkdate($month, $day, $year)) {
        return false;
    }
    return true;
}