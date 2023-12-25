<?php 
    include __DIR__ . "/../../app/database/db.php";


    $topics = selectAll('topics');
    $posts = selectAll('posts');

    function createPost($params) {
        [$title, $content, $topic, $img] = $params;
        if($title === '' || $content === '' || $topic === ''){
            $errMsg = 'Не все поля заполнены!';
        } elseif (mb_strlen($title, 'UTF8') < 5) {
            $errMsg = 'Название должно содержать более 5-и символов!';
        } else {
            $post = [
                'title' => $title,
                'image' => $_POST['img'],
                'content' => $content,
                'id_topic' => $topic
            ];
            $id = insert('posts', $post);
            
            $new_post = selectOne('posts', ['id' => $id]);

            header('location: http://course/admin/posts/index.php');
        }
    }

    function editPost($id, $title, $content, $topic, $img) {
        if($title === '' || $content === '' || $topic === ''){
            $errMsg = 'Не все поля заполнены!';
        } elseif (mb_strlen($title, 'UTF8') < 5) {
            $errMsg = 'Название должно содержать более 5-и символов!';
        } else {
            $post = [
                'title' => $title,
                'image' => $_POST['img'],
                'content' => $content,
                'id_topic' => $topic
            ];
    
            $ch_post = update('posts', $id, $post);
    
            header('location: http://course/admin/posts/index.php');
        }
    }

    function deletePost($id) {
        delete('posts', $id);
        header('location: http://course/admin/posts/index.php');
    }



?>