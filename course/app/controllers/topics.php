<?php
    include __DIR__ . "/../../app/models/topic.php";

    function param(){
        $name = trim($_POST['name']);

        return $name;
    }

    $errMsg = '';
    $id = '';
    $name = '';

    //Код для формы создания категории
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

        createTopic(param());

    } else {
        $name = '';
    }


// Редактирование категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);

    $id = $topic['id'];
    $name = $topic['name'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    editTopic(param());
}



// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

    $id = $_GET['del_id'];
    deleteTopic($id);
}

?>