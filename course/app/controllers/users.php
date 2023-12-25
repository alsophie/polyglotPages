<?php

    include("app/models/user.php");

    //Код для формы регистрации
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
        $login = trim($_POST['login']); // трим убирает пробелы
        $email = trim($_POST['email']);
        $passF = trim($_POST['pass-first']);
        $passS = trim($_POST['pass-second']);

        $errMsg = createUser($login, $email, $passF, $passS);
    } else {
        $login = '';
        $email = '';
    }

    //Код для формы авторизации
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);

        logInUser($email, $pass);
    } else {
        $email ='';
    }