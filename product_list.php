<?php include './product_list_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>
<style>

</style>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-2 d-flex flex-column category_list">
            <a href="?<?php unset($_GET['category_sid']) ?>" class="btn my-2 btn-outline-success <?= !$category_sid ? 'active' : '' ?>" name="all_product">全部餐點</a>
            <?php foreach ($category as $category) : ?>
                <a href="?category_sid=<?= $category['category_sid'] ?>" class="btn my-2 btn-outline-success <?= $category_sid == $category['category_sid'] ? 'active' : '' ?>">
                    <?= $category['category_name'] ?></a>
            <?php endforeach ?>
        </div>
        <div class="col-lg-10">

            <form class="form-inline my-2 my-lg-0 d-flex justify-content-end">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="你想吃什麼?" value="<?= $search ?>" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">找出來</button>
            </form>

            <div class="pageLink">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
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
                        <!-- 限制頁面太多時, 最多只能顯示前3與後3頁 -->
                        <!-- if限制不要出現負的與超過最大上限的頁面 -->
                        <?php
                        for ($i = $page - 3; $i <= $page + 3; $i++) :
                            if ($i >= 1 && $i <= $totalPages) :
                        ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?> d-none d-md-block">
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
                        <img src="./img/product/<?= $card['product_sid'] ?>.jpg" class="card-img-top mt-3" alt="...">
                        <div class="card-body">
                            <div class="card-content">
                                <h6 class="card-title"><?= $card['product_name'] ?></h6>
                                <p class="card-text"><?= $card['description'] ?></p>
                            </div>
                            <p class="card-text">$ <?= $card['unit_price'] ?></p>
                            <form class="thisForm">
                                <div class="d-flex justify-content-between">
                                    <input type="text" name="product_sid" value="<?= $card['product_sid'] ?>" style="display: none;">
                                    <select name="quantity" class="btn btn-outline-success">
                                        <?php for ($i = 1; $i < 11; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                    <a class="btn btn-primary" <?= !isset($_SESSION['member']) ? 'href="./login.php"' : 'onclick="order_this(event)"' ?> role="button">我要這個</a>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="pageLink">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
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
                        <!-- 限制頁面太多時, 最多只能顯示前3與後3頁 -->
                        <!-- if限制不要出現負的與超過最大上限的頁面 -->
                        <?php
                        for ($i = $page - 3; $i <= $page + 3; $i++) :
                            if ($i >= 1 && $i <= $totalPages) :
                        ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?> d-none d-md-block">
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
        </div>
    </div>
</div>
<?php include './part/footer.php' ?>
<?php include './part/script.php' ?>
<script>
    // 發出訂單
    function order_this(event, product_sid) {
        const orderNum = document.querySelector('#order_num');
        const sideOrderNum = document.querySelector('#side_order_num');
        const fd = new FormData(event.currentTarget.closest('.d-flex').closest('.thisForm'));
        fetch('order_insert.api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    // 新增成功
                    // 購物車數量修改
                    orderNum.innerHTML = obj.order_num;
                    orderNum.classList.add('d-inline-block');
                    orderNum.classList.remove('d-none');

                    sideOrderNum.innerHTML = '<i class="fas fa-shopping-cart mr-2"></i>' + obj.order_num;
                    sideOrderNum.classList.add('d-inline-block');
                    sideOrderNum.classList.remove('d-none');
                } else {
                    // 新增失敗
                }
            });
    }
</script>
<?php include './part/html_foot.php' ?>