<?php
    include __DIR__ . "/../../app/models/post.php";

    function params(){
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = trim($_POST['topic']);
        $img = $_POST['img'];

        return [$title, $content, $topic, $img];
    }

    $errMsg = '';
    $id = '';
    $title = '';
    $content = '';
    $topic = '';
    $img = '';


    //Код для формы создания записи
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])){
        createPost(params());
    } else {
        $id = '';
        $title = '';
        $content = '';
        $topic = '';
    }


// Редактирование статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $post = selectOne('posts', ['id' => $id]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-edit'])){
    $id = $_POST['id'];
    
    [$title, $content, $topic, $img] = params();
    
    editPost($id, $title, $content, $topic, $img);
    
} else {
    $title = $_POST['title'];
    $img = $_POST['img'];
    $content = $_POST['content'];
    $topic = $_POST['id_topic'];
}



// Удаление статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    deletePost($id);
}

?>