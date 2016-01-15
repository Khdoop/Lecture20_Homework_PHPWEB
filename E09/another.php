<?php

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
$surname = isset($_POST['surname']) ? $_POST['surname'] : null;
$country = isset($_POST['country']) ? $_POST['country'] : null;
$city = isset($_POST['city']) ? $_POST['city'] : null;
$occupation = isset($_POST['occupation']) ? $_POST['occupation'] : null;

//var_dump($firstname, $surname, $country, $city, $occupation);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="css/another.css">
    </head>
    <body>
        <div>
            <div>
                <div class="label">First name: </div>
                <div><?= $firstname ?></div>
            </div>
            <div>
                <div class="label">Surname: </div>
                <div><?= $surname ?></div>
            </div>
            <div>
                <div class="label">Country: </div>
                <div><?= $country ?></div>
            </div>
            <div>
                <div class="label">City: </div>
                <div><?= $city ?></div>
            </div>
            <div>
                <div class="label">Occupation: </div>
                <div><?= $occupation ?></div>
            </div>
        </div>
    </body>
</html>