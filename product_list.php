<?php include './product_list_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>
<style>
    .card-title {
        overflow: hidden;
        /* white-space: nowrap; */

        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .card-text {
        overflow: hidden;
        /* white-space: nowrap; */

        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2 d-flex flex-column">
            <a href="?<?php unset($_GET['category_sid']) ?>" class="btn my-2 btn-outline-primary" name="all_product">全部餐點</a>
            <?php foreach ($category as $category) : ?>
                <a href="?category_sid=<?= $category['category_sid'] ?>" class="btn my-2 btn-outline-primary">
                    <?= $category['category_name'] ?></a>
            <?php endforeach ?>
        </div>
        <div class="col-md-10">
            <div class="d-flex">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- 移至頁首 -->
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?<?php
                                                        $params['page'] = 1;
                                                        echo http_build_query($params);
                                                        ?>">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </a>
                        </li>
                        <!-- 下一頁 -->
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?<?php
                                                        $params['page'] = $page - 1;
                                                        echo http_build_query($params);
                                                        ?>">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </a>
                        </li>
                        <!-- 改變頁數 -->
                        <!-- 限制頁面太多時, 最多只能顯示前5與後5頁 -->
                        <!-- if限制不要出現負的與超過最大上限的頁面 -->
                        <?php
                        for ($i = $page - 3; $i <= $page + 3; $i++) :
                            if ($i >= 1 && $i <= $totalPages) :
                        ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?<?php
                                                                $params['page'] = $i;
                                                                echo http_build_query($params);
                                                                ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                        <?php
                            endif;
                        endfor ?>
                        <!-- 上一頁 -->
                        <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?<?php
                                                        $params['page'] = $page + 1;
                                                        echo http_build_query($params);
                                                        ?>">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </a>
                        </li>
                        <!-- 移至頁尾 -->
                        <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?<?php
                                                        $params['page'] = $totalPages;
                                                        echo http_build_query($params);
                                                        ?>">
                                <i class="fas fa-arrow-alt-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <?php foreach ($card as $card) : ?>
                    <div class="card col-lg-6 col-xl-4 d-2">
                        <img src="./img/product/<?= $card['product_sid'] ?>.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?= $card['product_name'] ?></h6>
                            <p class="card-text"><?= $card['description'] ?></p>
                            <p class="card-text">$ <?= $card['price'] ?></p>
                            <button type="button" class="btn btn-primary">我要這個</button>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php include './part/script.php' ?>
<?php include './part/html_foot.php' ?>