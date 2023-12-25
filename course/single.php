<?php
    include 'app/controllers/topics.php';
    $post = selectOne('posts', ['id' => $_GET['post']]);
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>PolyglotPages</title>
</head>
<body>

<?php 
    include("app/include/header.php");
?>


<!-- блок main-->
<div class="container">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2><?= $post['title'] ?></h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="<?= $post['image'] ?>" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-calendar"><?= $post['created_date'] ?></i>
                </div>
                <div class="single_post_text col-12">
                    <?= $post['content'] ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- блок main END-->

<?php 
    include("app/include/footer.php");
?>
</body>
</html>
