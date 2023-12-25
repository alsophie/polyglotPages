<?php 
    include __DIR__ . "/../../app/database/db.php";
    $errMsg = '';


    $topics = selectAll('topics');
    $posts = selectAll('posts');

    function createUser($login, $email, $passF, $passS) {

        if($login === '' || $email === '' || $passF === ''){
            $errMsg = 'Не все поля заполнены!';
        } elseif (mb_strlen($login, 'UTF8') < 2) {
            $errMsg = 'Логин должен быть более 2-х символов!';
        } elseif ($passF !== $passS) {
            $errMsg = 'Пароли не свопадают!';
        } else {
            $existence = selectOne('users', ['email' => $email]);

            if($existence) {
                $errMsg = 'Пользователь с данной почтой уже зарегистрирован!';
            } else {
                $pass = password_hash($passF, PASSWORD_DEFAULT);
                $post = [
                    'admin' => 0,
                    'username' => $login,
                    'email' => $email,
                    'password' => $pass
                ];
                $id = insert('users', $post);
                
                $user = selectOne('users', ['id' => $id]);

                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];


                if($_SESSION['admin']) {
                    header('location: http://course/admin/posts/index.php');
                } else {
                    header('location: http://course/');
                }
            }
        }
        return $errMsg;
    }

    function logInUser($email, $pass) {
        if($email === '' || $pass === ''){
            $errMsg = 'Не все поля заполнены!';
        } else {
            $existence = selectOne('users', ['email' => $email]);
            if($existence && password_verify($pass, $existence['password'])) {
                $_SESSION['id'] = $existence ['id'];
                $_SESSION['login'] = $existence ['username'];
                $_SESSION['admin'] = $existence ['admin'];

                if($_SESSION['admin']) {
                    header('location: http://course/admin/posts/index.php');
                } else {
                    header('location: http://course/');
                }
            } else {
                $errMsg = 'Почта или пароль введены неверно!';
            }
        }
    }

?>