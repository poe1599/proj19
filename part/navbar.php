<style>
    .navbar .nav-item.active {
        background-color: #86cbee;
        border-radius: 10px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">INDEX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $pageName == 'product_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="./product_list.php">產品</a>
                </li>
                <li class="nav-item <?= $pageName == 'AAAAAA' ? 'active' : '' ?>">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item <?= $pageName == 'cart' ? 'active' : '' ?>">
                    <a class="nav-link" href="./cart.php">購物車</a>
                </li>
                <li class="nav-item <?= $pageName == 'login' ? 'active' : '' ?>">
                    <a class="nav-link" href="./login.php">Login</a>
                </li>
                <li class="nav-item <?= $pageName == 'logout' ? 'active' : '' ?>">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>