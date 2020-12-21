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
    }

    .kv_img {
        padding: 0;
    }

    .kv_img img {
        width: 100%;
        object-fit: cover;
    }
</style>
<div class="container-fluid">
    <div class="row my-3 kv">
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
<div class="container">
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
                                <?php for ($i = 1; $i < 6; $i++) : ?>
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

<?php include './part/script.php' ?>
<?php include './part/html_foot.php' ?>