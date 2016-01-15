<?php
require_once 'minilib.php';

$num1 = getValue($_POST, 'num1');
$num2 = getValue($_POST, 'num2');
$op = getValue($_POST, 'op');

function validateForm(&$errors) {
    global $num1, $num2, $op;

    if (empty($num1)) {
        $errors['num1'][] = 'First number is required.';
    } else if (!is_numeric($num1)) {
        $errors['num1'][] = 'Only numbers are allowed.';
    }

    if (empty($num2)) {
        $errors['num2'][] = 'Second number is required.';
    } else if (!is_numeric($num2)) {
        $errors['num2'][] = 'Only numbers are allowed.';
    }

    if (empty($op)) {
        $errors['op'][] = 'Operation is required.';
    } else if (!is_numeric($op)) {
        $errors['op'][] = 'Pls no hackerino';
    }

    if (empty($errors)) {
        switch ($op) {
            case 1:
                $calc = $num1 + $num2;
                break;
            case 2:
                $calc = $num1 - $num2;
                break;
            case 3:
                $calc = $num1 * $num2;
                break;
            case 4:
                $calc = $num1 / $num2;
                break;
            default:
                $calc = 'ERROR!';
        }
        if (is_float($calc)) {
            $calc = round($calc, 2);
        }
    } else {
        $calc = 'ERROR!';
    }

    return $calc;
}
$calc = '';
$errors = [];
if ($_POST) {
    $calc = validateForm($errors);
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
                <label for="num1">1st number:</label>
                <input type="number" id="num1" name="num1" class="<?= getClass($errors, 'num1') ?>" value="<?= htmlentities($num1) ?>">
                <?= getErrors($errors, 'num1')?>
            </div>
            <div>
                <label for="num2">2nd number:</label>
                <input type="number" id="num2" name="num2" class="<?= getClass($errors, 'num2') ?>" value="<?= htmlentities($num2) ?>">
                <?= getErrors($errors, 'num2')?>
            </div>
            <div>
                <label for="op">Operation</label>
                <select name="op" id="op">
                    <option value="1" <?= $op==1 ? 'selected' : '' ?>>+</option>
                    <option value="2" <?= $op==2 ? 'selected' : '' ?>>-</option>
                    <option value="3" <?= $op==3 ? 'selected' : '' ?>>*</option>
                    <option value="4" <?= $op==4 ? 'selected' : '' ?>>/</option>
                </select>
                <?= getErrors($errors, 'op')?>
            </div>
            <div>
                <button type="submit">math!</button>
            </div>
            <?php if ($_POST && empty($errors)) echo "<h3>$calc</h3>"; ?>
        </form>
    </div>
    </body>
</html>