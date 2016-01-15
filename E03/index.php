<?php
require_once 'minilib.php';

$number = getValue($_POST, 'num1');
$op = getValue($_POST, 'op');

function validateForm(&$errors) {
    global $number, $op;
    ## num1 ##
    if (!validateRequired($number)) {
        $errors['num1'][] = 'Temperature 1 is required.';
    } else if (!validateNumber($number)) {
        $errors['num1'][] = 'Temperature must be a number.';
    }
    ## op ##
    if (!validateRequired($op)) {
        $errors['op'][] = 'Operation is required.';
    } else if (!validateNumber($op)) {
        $errors['op'][] = 'Pls no hackerino.';
    }
    ## math ##
    if (empty($errors)) {
        switch ($op) {
            case 1:
                $result = $number * (9 / 5) + 32;
                break;
            case 2:
                $result = ($number - 32) * (5 / 9);
                break;
            default:
                $result = false;
        }

        if (is_float($result)) {
            $result = round($result, 2);
        }

        if ($op == 1) {
            $result .= '&#8457;';
        } else if ($op == 2) {
            $result .= '&#8451;';
        }

    } else {
        $result = false;
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
                <label for="num1">Temperature:</label>
                <input type="number" id="num1" name="num1" class="<?= getClass($errors, 'num1') ?>" value="<?= htmlentities($number) ?>">
                <?= getErrors($errors, 'num1')?>
            </div>
            <div>
                <label for="op">Operation:</label>
                <select name="op" id="op">
                    <option value="1" <?= $op==1 ? 'selected' : '' ?>>Celsius to Fahrenheit</option>
                    <option value="2" <?= $op==2 ? 'selected' : '' ?>>Fahrenheit to Celsius</option>
                </select>
                <?= getErrors($errors, 'op')?>
            </div>
            <div>
                <button type="submit">Convert</button>
            </div>
            <?= ($_POST && $result) ? "<h3>$result</h3>" : '' ?>
        </form>
    </div>
    </body>
</html>