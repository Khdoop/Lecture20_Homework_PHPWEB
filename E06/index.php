<?php
require_once 'minilib.php';

$firstname = getValue($_POST, 'firstname');
$surname = getValue($_POST, 'surname');
$birthdate = getValue($_POST, 'birthdate');

function validateForm(&$errors) {
    global $firstname, $surname, $birthdate;
    ## firstname ##
    if (!validateRequired($firstname)) {
        $errors['firstname'][] = 'First name is required.';
    } else if (!validateLength($firstname, 2)) {
        $errors['firstname'][] = 'Minimum length is 2.';
    }
    ## surname ##
    if (!validateRequired($surname)) {
        $errors['surname'][] = 'Surname is required.';
    } else if (!validateLength($surname, 2)) {
        $errors['surname'][] = 'Minimum length is 2.';
    }
    ## date ##
    if (!validateRequired($birthdate)) {
        $errors['birthdate'][] = 'Date of Birth is required.';
    } else if (!validateDate($birthdate)) {
        $errors['birthdate'][] = 'Wrong date.';
    }
    ## return ##
    return empty($errors) ? true : false;
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
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname" class="<?= getClass($errors, 'firstname') ?>" value="<?= htmlentities($firstname) ?>">
                <?= getErrors($errors, 'firstname')?>
            </div>
            <div>
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" class="<?= getClass($errors, 'surname') ?>" value="<?= htmlentities($surname) ?>">
                <?= getErrors($errors, 'surname')?>
            </div>
            <div>
                <label for="birthdate">Date of Birth:</label>
                <input type="date" id="birthdate" name="birthdate" class="<?= getClass($errors, 'birthdate') ?>" value="<?= htmlentities($birthdate) ?>">
                <?= getErrors($errors, 'birthdate')?>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
            <?= ($_POST && $result) ? "<p>Registration successful.</p>" : '' ?>
        </form>
    </div>
    </body>
</html>