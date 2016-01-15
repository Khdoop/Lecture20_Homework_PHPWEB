<?php

$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;

if ($_POST) {
    $counter++;
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
                <input type="text" id="firstname" name="firstname">
                <input type="hidden" name="counter" value="<?= $counter ?>">
            </div>
            <div>
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname">

            </div>
            <div>
                <label for="birthdate">Date of Birth:</label>
                <input type="date" id="birthdate" name="birthdate">

            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
            <?= ($_POST && $counter) ? "<p>Submitted $counter times.</p>" : '' ?>
        </form>
    </div>
    </body>
</html>