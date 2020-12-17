<style>
    .navbar .nav-item.active {
        background-color: #86cbee;
        border-radius: 10px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">希望峰食堂</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $pageName == 'product_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="./product_list.php">今日菜單</a>
                </li>
                <li class="nav-item <?= $pageName == 'AAAAAA' ? 'active' : '' ?>">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['member'])) : ?>
                    <li class="nav-item <?= $pageName == 'cart' ? 'active' : '' ?>">
                        <a class="nav-link" href="./cart.php">購物車</a>
                    </li>
                    <li class="nav-item <?= $pageName == 'member_edit' ? 'active' : '' ?>">
                        <a class="nav-link" href="./member_edit.php"><?= $_SESSION['member']['nickname'] ?></a>
                    </li>
                    <li class="nav-item <?= $pageName == 'logout' ? 'active' : '' ?>">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item <?= $pageName == 'login' ? 'active' : '' ?>">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                    <li class="nav-item <?= $pageName == 'register' ? 'active' : '' ?>">
                        <a class="nav-link" href="./register.php">Register</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>