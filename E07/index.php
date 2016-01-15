<?php
echo $_SERVER['HTTP_USER_AGENT']."<br>";
foreach(get_browser(null, true) as $k => $v) {
    echo "$k: $v<br>";
}

echo '<br><br>';

foreach($_SERVER as $k => $v){
    echo "$k: $v<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>

    </body>
</html>