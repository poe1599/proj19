<?php
if (!isset($_SESSION)) {
    session_start();
}

$title = '簡單的餐點, 不簡單的味道; 一口希望, 是對生活的渴望';
?>
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

<?php include './part/script.php' ?>
<?php include './part/html_foot.php' ?>