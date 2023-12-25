<?php 
    include __DIR__ . "/../../app/database/db.php";


    $topics = selectAll('topics');

    function createTopic($name) {
                
        if($name === ''){
            $errMsg = 'Поле не заполнено!';
        } elseif (mb_strlen($name, 'UTF8') < 2) {
            $errMsg = 'Название должно содержать более 2-х символов!';
        } else {
            $existence = selectOne('topics', ['name' => $name]);

            if($existence) {
                $errMsg = 'Такая категория уже есть!';
            } else {
                $topic = [
                    'name' => $name
                ];
                $id = insert('topics', $topic);
                
                $categ = selectOne('topics', ['id' => $id]);

                header('location: http://course/admin/topics/index.php');
            }
        }
    }

    function editTopic($name) {
        if($name === ''){
            $errMsg = 'Поле не заполнено!';
        } elseif (mb_strlen($name, 'UTF8') < 2) {
            $errMsg = 'Название должно содержать более 2-х символов!';
        } else {
            $topic = [
                'name' => $name
            ];
            $id = $_POST['id'];
            
            $topic_id = update('topics', $id,$topic);
    
            header('location: http://course/admin/topics/index.php');
        }
    }

    function deleteTopic($id) {
        delete('topics', $id);
        header('location: http://course/admin/topics/index.php');
    }
?>