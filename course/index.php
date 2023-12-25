<?php
    include 'app/controllers/topics.php';
    $posts = '';

    if (isset($_GET['category'])) {
        $categoryId = $_GET['category'];
        $posts = selectAll('posts', ['id_topic' => $categoryId]);
    } else {
        $posts = selectAll('posts');
    }
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

<!-- блок карусели START-->
<div class="container">
    
    <br>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/22.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href=""> PolyglotPages</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/20.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href=""> PolyglotPages</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <!--<img src="images/image_3.png" class="d-block w-100" alt="...">-->
                <img src="assets/images/21.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href=""> PolyglotPages</a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- блок карусели END-->

<!-- блок main-->
<div class="container">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Последние статьи</h2>
            
            <?php foreach ($posts as $post): ?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="http://course/single.php?post=<?=$post['id']?>"><?= mb_substr($post['title'], 0, 30, 'UTF-8') . '...' ?></a>
                    </h3>
                    <i class="far fa-calendar"> <?= $post['created_date'] ?></i>
                    <p class="preview-text">
                        <?= mb_substr($post['content'], 0, 150, 'UTF-8'). '...' ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

            

        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">
                
            <br>
            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="http://course/index.php">Все</a></li>
                    <?php foreach ($topics as $key => $topic): ?>
                    <li><a href="http://course/index.php?category=<?= $topic['id']; ?>"><?=$topic['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
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
