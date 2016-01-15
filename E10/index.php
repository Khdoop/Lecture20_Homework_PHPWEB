<?php
require_once 'minilib.php';

$letter = getValue($_POST, 'letter');
//var_dump($letter);

$words = [
    'BUTTERFLY' => 'animal',
    'APPLE' => 'fruit',
    'CAR' => 'vehicle',
    'BASKETBALL' => 'sport',
    'GREEN' => 'color',
    'RABBIT' => 'animal',
    'PLATYPUS' => 'animal',
    'ARMADILLO' => 'animal',
    'GRASSHOPPER' => 'animal',
    'MECHANIC' => 'profession',
];

if (!isset($_POST['word'])) {
    $random = getRandomWordCatMask($words, 0, 9);

    $random = explode('-', $random);
    $word = $random[0];
    $cat = $random[1];
    $mask = $random[2];
}

if (isset($_POST['word'])) {
    $word = $_POST['word'];
}
if (isset($_POST['cat'])) {
    $cat = $_POST['cat'];
}
if (isset($_POST['mask'])) {
    $mask = $_POST['mask'];
}

$errors = isset($_POST['errors']) ? $_POST['errors'] : '';

function validateForm(&$errors) {
    global $letter, $word, $mask;

    if ($letter !== null) {
        $letter = getLetter($letter);
    } else {
        return false;
    }

    if (strpos($word, $letter) === false && strpos($errors, $letter) === false) {
        $errors .= $letter;
    } else if (strpos($word, $letter) !== false) {
        $array = str_split($word);
        foreach($array as $k => $v) {
            if ($v == $letter) {
                $mask{$k} = $letter;
            }
        }
        return $mask;
    }
    return false;
}
$class = '00';
$result = false;
$flag = false;
if ($_POST) {
    $result = validateForm($errors);

    $class = strlen($errors);
    $class = sprintf("%02d", $class);
    if (strlen($errors) >= 10) {
        $flag = true;
    }
}
//var_dump($errors);
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
    <div class="wrongLetters"><?= $errors ?></div>
    <div id="image" class="<?= "slice$class" ?>"></div>
    <form action="index.php" method="post">
        <input type="hidden" name="word" value="<?= $word ?>">
        <input type="hidden" name="cat" value="<?= $cat ?>">
        <input type="hidden" name="mask" value="<?= $mask ?>">
        <input type="hidden" name="errors" value="<?= $errors ?>">
        <div class="colorMe">
            <h2 class="category"><?= $cat ?></h2>
            <h1 class="word"><?php if ($_POST && $result) echo $result; else if ($flag) echo $word; else echo $mask; ?></h1>
        </div>
        <div class="colorMe">
            <input type="radio" id="letter01" name="letter" value="letter01"><label for="letter01">A</label>
            <input type="radio" id="letter02" name="letter" value="letter02"><label for="letter02">B</label>
            <input type="radio" id="letter03" name="letter" value="letter03"><label for="letter03">C</label>
            <input type="radio" id="letter04" name="letter" value="letter04"><label for="letter04">D</label>
            <input type="radio" id="letter05" name="letter" value="letter05"><label for="letter05">E</label>
            <input type="radio" id="letter06" name="letter" value="letter06"><label for="letter06">F</label>
            <input type="radio" id="letter07" name="letter" value="letter07"><label for="letter07">G</label>
            <input type="radio" id="letter08" name="letter" value="letter08"><label for="letter08">H</label>
            <input type="radio" id="letter09" name="letter" value="letter09"><label for="letter09">I</label>
            <input type="radio" id="letter10" name="letter" value="letter10"><label for="letter10">J</label>
            <input type="radio" id="letter11" name="letter" value="letter11"><label for="letter11">K</label>
            <input type="radio" id="letter12" name="letter" value="letter12"><label for="letter12">L</label>
            <input type="radio" id="letter13" name="letter" value="letter13"><label for="letter13">M</label>
            <input type="radio" id="letter14" name="letter" value="letter14"><label for="letter14">N</label>
            <input type="radio" id="letter15" name="letter" value="letter15"><label for="letter15">O</label>
            <input type="radio" id="letter16" name="letter" value="letter16"><label for="letter16">P</label>
            <input type="radio" id="letter17" name="letter" value="letter17"><label for="letter17">Q</label>
            <input type="radio" id="letter18" name="letter" value="letter18"><label for="letter18">R</label>
            <input type="radio" id="letter19" name="letter" value="letter19"><label for="letter19">S</label>
            <input type="radio" id="letter20" name="letter" value="letter20"><label for="letter20">T</label>
            <input type="radio" id="letter21" name="letter" value="letter21"><label for="letter21">U</label>
            <input type="radio" id="letter22" name="letter" value="letter22"><label for="letter22">V</label>
            <input type="radio" id="letter23" name="letter" value="letter23"><label for="letter23">W</label>
            <input type="radio" id="letter24" name="letter" value="letter24"><label for="letter24">X</label>
            <input type="radio" id="letter25" name="letter" value="letter25"><label for="letter25">Y</label>
            <input type="radio" id="letter26" name="letter" value="letter26"><label for="letter26">Z</label>
        </div>
        <div>
            <button type="submit" <?php if ($mask == $word || $flag) {echo 'disabled';} ?>>send letter</button><br><br>
            <a href="index.php"><button type="button">reset</button></a>
        </div>
    </form>
</div>
</body>
</html>