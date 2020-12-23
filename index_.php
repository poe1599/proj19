<?php
if (!isset($_SESSION)) {
    session_start();
}

$title = '簡單的餐點, 不簡單的味道; 一口希望, 是對生活的渴望';
?>
<?php include './index_product_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>
<style>
    .kv {
        height: 700px;
        background: url(./img/kv.webp) center center no-repeat;
        background-size: cover;
    }

    .kv_discript {
        padding: 30px;
        background-origin: content-box;
        color: #fff;
    }

    .kv_discript .discript_box h1,
    .kv_discript .discript_box h3 {
        font-weight: 900;
        text-shadow: 0.1em 0.1em 0.2em black;
    }

    .kv_img {
        padding: 0;
    }

    .kv_img img {
        width: 100%;
        object-fit: cover;
    }

    .kv_article {
        min-height: 200px;
    }

    .kv_article_content {
        text-align: center;
        font-size: 4rem;
    }
</style>
<div class="container-fluid">
    <div class="row kv">
        <div class="d-none d-lg-block col-lg-2"></div>
        <div class="col-lg-10 kv_discript d-flex justify-content-center align-items-center">
            <div class=" col discript_box">
                <h1>希望峰食堂</h1>
                <h3 class="mt-3">簡單的餐點, 不簡單的味道</h3>
                <h3>一口"希望", 是對生活的渴望</h3>
            </div>
        </div>
        <!-- <div class="col-7 kv_img">
        </div> -->
    </div>
</div>
<div class="container my-5">
    <!-- <div class="kv_article row d-flex justify-content-center align-items-center"> -->
    <div class="kv_article row ">
        <div class="kv_article_content col-12">肚子餓了嗎? 你還在等什麼?<br>
            <a class="btn btn-success" href="./product_list.php">快來看看有什麼好吃的!</a>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row m-3">
        <h3>精選餐點</h3>
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