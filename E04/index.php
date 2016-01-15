<?php
require_once 'minilib.php';

$string = getValue($_POST, 'string');

function validateForm(&$errors) {
    global $string;
    ## string ##
    if (!validateRequired($string)) {
        $errors['string'][] = 'This field is required.';
    } else if (!validateSequence($string, 10)) {
        $errors['string'][] = 'Allowed symbols: <b>1234567890-,</b>';
    }
    ## math ##
    $result = false;
    if (empty($errors)) {
        $array = explode(',', $string);
        sort($array);
        $min = min($array);
        $max = max($array);
        $result = implode(', ', $array)."<br>min = $min <br>max = $max";
    }
    ## return ##
    return $result;
}

$errors = [];
$result = false;
if ($_POST) {
    $result = validateForm($errors);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
    <div>
        <form action="index.php" method="post">
            <div>
                <label for="string">Enter 10 numbers separated with <b>,</b></label>
                <input type="text" id="string" name="string" class="<?= getClass($errors, 'string') ?>" value="<?= htmlentities($string) ?>">
                <?= getErrors($errors, 'string')?>
            </div>
            <div>
                <button type="submit">Sort</button>
            </div>
            <?= ($_POST && $result) ? "<p>$result</p>" : '' ?>
        </form>
    </div>
    </body>
</html>