<?php
require_once 'minilib.php';

$username = getValue($_POST, 'username');
$password1 = getValue($_POST, 'password1');
$password2 = getValue($_POST, 'password2');

function validateForm(&$errors) {
    global $username, $password1, $password2;
    ## username ##
    if (!validateRequired($username)) {
        $errors['username'][] = 'Username is required.';
    } else if (!validateLength($username, 4)) {
        $errors['username'][] = 'Minimum username length is 4.';
    }
    ## password1 ##
    if (!validateRequired($password1)) {
        $errors['password1'][] = 'Password is required.';
    } else if (!validateLength($password1, 6)) {
        $errors['password1'][] = 'Minimum password length is 6.';
    } else if (!validateNonAlphaNum($password1)) {
        $errors['password1'][] = 'Password must contain at least 1 non-alphanumeric character.';
    } else if (!validateIdentical($password1, $password2)) {
        $errors['password1'][] = 'Passwords don\'t match.';
    }
    ## password2 ##
    if (!validateRequired($password2)) {
        $errors['password2'][] = 'Password is required.';
    } else if (!validateLength($password2, 6)) {
        $errors['password2'][] = 'Minimum password length is 6.';
    } else if (!validateNonAlphaNum($password2)) {
        $errors['password2'][] = 'Password must contain at least 1 non-alphanumeric character.';
    } else if (!validateIdentical($password1, $password2)) {
        $errors['password2'][] = 'Passwords don\'t match.';
    }
    ## return ##
    return empty($errors) ? true : false;
}

$errors = [];
$check = false;
$encrypted = '';
if ($_POST) {
    $check = validateForm($errors);
    $encrypted = password_hash($password1, PASSWORD_DEFAULT);
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
                <label for="username">username:</label>
                <input type="text" id="username" name="username" class="<?= getClass($errors, 'username') ?>" value="<?= !$check ? htmlentities($username) : '' ?>">
                <?= getErrors($errors, 'username')?>
            </div>
            <div>
                <label for="password1">password:</label>
                <input type="password" id="password1" name="password1" class="<?= getClass($errors, 'password1') ?>">
                <?= getErrors($errors, 'password1')?>
            </div>
            <div>
                <label for="password2">repeat password:</label>
                <input type="password" id="password2" name="password2" class="<?= getClass($errors, 'password2') ?>">
                <?= getErrors($errors, 'password2')?>
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
            <?= ($_POST && $check) ? "<h3>Registration successful.</h3><h3>username: ".htmlentities($username)."</h3><h3>password hash: ".htmlentities($encrypted)."</h3>" : '' ?>
        </form>
    </div>
    </body>
</html>