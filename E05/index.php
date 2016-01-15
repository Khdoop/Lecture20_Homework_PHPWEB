<?php

foreach($_REQUEST as $k => $v) {
    var_dump($k, $v);
    echo '<br>';
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
        <form action="index.php?&manamana=1&asdasd=55" method="post">
            <div>
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname">

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

        </form>
    </div>
    </body>
</html>