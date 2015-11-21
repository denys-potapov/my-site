---
layout: default
title: |
    <?php
        $russian = isset($_GET['ru-translit']) || isset($_GET['ru']);
        echo $russian ? 'Генератор хороших паролей' : 'Good password generator';
    ?>

---

<div class="hero-unit">
<?php

require 'vendor/autoload.php';

use Barzo\Password\Generator;

$password = false;

if (isset($_GET['ru'])) {
    $password = Generator::generateRu();
}

if (isset($_GET['ru-translit'])) {
    $password = Generator::generateRuTranslit();
}

if (isset($_GET['de'])) {
    $password = Generator::generateDe();
}

if (!$password) {
    $password = Generator::generateEn();
}

if ($russian) {
    echo "
       <h1>Генератор хороших паролей</h1>
       <p>
       Пароли, которые легко запомнить, но сложно подобрать.
       Идея из <a href='http://xkcd.ru/936/'>комикса xkcd </a>. 
       Исходный код на <a href='https://github.com/denys-potapov/password-generator'>github</a>.
       </p>
    ";
    echo "<h2>$password</h2>";
    echo "<p>Этот пароль немного сложней подобрать чем <i>]J!7g8@V_U</i></p>";
} else {
    echo "
        <h1>Good password generator</h1>
        <p>
        Easy to remember, but hard to quess passwords.
        Inspired by <a href='http://xkcd.com/936/'>xkcd comic</a>.
        Source on <a href='https://github.com/denys-potapov/password-generator'>github</a>.
        </p>
    ";
    echo "<h2>$password</h2>";
    echo "<p>This password is little harder to gues then <i>]J!7g8@V_U</i></p>";
}
?>

<p style="text-align: center;">
<div class="btn-group">
    <a class="btn btn-primary btn-large" href="?en">English</a>
    <a class="btn btn-primary btn-large" href="?de">German</a>
    <a class="btn btn-primary btn-large" href="?ru">Russian</a>
    <a class="btn btn-primary btn-large" href="?ru-translit">Russain transliterated</a>
</div>
</div>