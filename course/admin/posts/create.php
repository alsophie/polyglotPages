<?php
    include "../../app/controllers/posts.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>PolyglotPages</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="http://course/admin/posts/create.php" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="http://course/admin/posts/index.php" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Добавление статьи</h2>
            </div>
            <div class="row add-post">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input value="<?=$title; ?>" name="title" type="text" class="form-control" placeholder="Название статьи" aria-label="Название статьи">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое статьи</label>
                        <textarea name="content" id="editor" class="form-control" rows="6"><?=$content; ?></textarea>
                    </div>
                    <div class="input-group col mb-4 mt-4">
                        <input name="img" type="text" class="form-control" placeholder="Ссылка на изображение" aria-label="Ссылка на изображение">
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected>Категория статьи:</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id']; ?>"><?=$topic['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="col col-6">
                        <button name="add-post" class="btn btn-primary" type="submit">Добавить статью</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- // footer -->

</body>
</html>
