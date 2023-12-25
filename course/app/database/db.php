<?php
    session_start();
    require('connect.php');


    function tt($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        exit();
    }

    //Проверка выполнения запроса к БД
    function dbCheckError($query) {
        $errinfo = $query->errorInfo();
        if($errinfo[0] !== PDO::ERR_NONE) {
            echo $errinfo[2];
            exit();
        }
        return true;
    }

    //Запрос на получение данных с одной таблицы
    function selectAll($table, $params = []) {
        global $pdo;
        $sql = "SELECT * FROM $table";
        if(!empty($params)) {
            $sql .= " WHERE ";
            $paramKeys = array_keys($params);
            $lastKey = end($paramKeys);
            foreach ($params as $key => $val) {
                if (!is_numeric($val)) {
                    $val = $pdo->quote($val); // Оборачиваем строковые значения в кавычки
                }
                $sql .= "$key = $val";
                if ($key !== $lastKey) {
                    $sql .= " AND ";
                }
            }
        }

        $query = $pdo->prepare($sql);
        $query->execute();

        dbCheckError($query);

        return $query->fetchAll();
    }

    //Запрос на получение одной строки с выбранной таблицы
    function selectOne($table, $params = []) {
        global $pdo;
        $sql = "SELECT * FROM $table";
        if(!empty($params)) {
            $sql .= " WHERE ";
            $paramKeys = array_keys($params);
            $lastKey = end($paramKeys);
            foreach ($params as $key => $val) {
                if (!is_numeric($val)) {
                    $val = $pdo->quote($val); // Оборачиваем строковые значения в кавычки
                }
                $sql .= "$key = $val";
                if ($key !== $lastKey) {
                    $sql .= " AND ";
                }
            }
        }

        $query = $pdo->prepare($sql);
        $query->execute();

        dbCheckError($query);

        return $query->fetch();
    }

    //Запись в таблицу БД
    function insert($table, $params) {
        global $pdo;
        
        $i = 0;
        $coll = '';
        $mask = '';
        foreach($params as $key => $value) {
            if($i === 0) {
                $coll = $coll . $key;
                $mask = $mask . $pdo->quote($value);
            }else {
                $coll = $coll . ", $key";
                $mask = $mask . ", " . $pdo->quote($value);
            }
            $i++;
        }

        $sql = "INSERT INTO $table ($coll) VALUES ($mask);";

        $query = $pdo->prepare($sql);
        $query->execute($params);
        dbCheckError($query);
        return $pdo->lastInsertId();
    }

    //Обновление строки в таблице
    function update($table, $id, $params) {
        global $pdo;
        
        $i = 0;
        $str = '';
        foreach($params as $key => $value) {
            if($i === 0) {
                $str = $str . $key . " = " . $pdo->quote($value);
            }else {
                $str = $str . ", " . $key . " = " . $pdo->quote($value);
            }
            $i++;
        }

        $sql = "UPDATE $table SET $str WHERE id = $id";

        $query = $pdo->prepare($sql);
        $query->execute($params);
        dbCheckError($query);    
    }

    //Обновление строки в таблице
    function delete($table, $id) {
        global $pdo;

        $sql = "DELETE FROM $table WHERE id = $id";

        $query = $pdo->prepare($sql);
        $query->execute();
        dbCheckError($query);
    }

?>