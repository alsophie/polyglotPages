<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="/">PolyglotPages</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="/">Главная</a> </li>
                    <li><a href="#">О нас</a> </li>
                    <li><a href="#">Услуги</a> </li>

                    <li>
                        <?php if(isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if($_SESSION['admin']): ?>
                                    <li><a href="http://course/admin/topics/index.php">Админ панель</a> </li>
                                <?php endif; ?>
                                <li><a href="logout.php">Выход</a> </li>
                            </ul>
                        <?php else: ?>
                            <a href="log.php">
                                <i class="fa fa-user"></i>
                                Вход
                            </a>
                            <ul>
                                <li><a href="reg.php">Регистрация</a> </li>
                            </ul>
                        <?php endif; ?>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>