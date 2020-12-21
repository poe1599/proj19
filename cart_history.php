<?php include './cart_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>

<style>
    .fa-circle {
        color: #ccc;
    }

    .remove-icon a i {
        color: #ccc;
    }

    .remove-icon a i:hover {
        color: red;
    }

    .buyThisTime {
        border-radius: 20px;
        border: 1px solid red;
    }

    .buyNextTime,
    .cartHistory {
        border-radius: 20px;
        border: 1px solid green;
        Text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2 d-flex flex-column">
            <a href="./cart.php" class="btn my-2 btn-outline-success" name="">我的購物車</a>
            <a href="./cart_history.php" class="btn my-2 btn-outline-success active" name="">歷史清單</a>
        </div>
        <div class="col-md-10">
            <?php if (!$h_row) : ?>
                <div class="cartHistory my-3 p-5">
                    <div>
                        <h4>你還沒有消費喔, 快去找點好吃的吧!</h4>
                    </div>
                </div>
            <?php else : ?>
                <div class="cartHistory my-3 p-5">
                    <div>
                        <h4>歷史購物清單</h4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><i class="fas fa-circle"></i></th>
                                <th scope="col">訂單編號</th>
                                <th scope="col">商品編號</th>
                                <th scope="col">商品名</th>
                                <th scope="col">數量</th>
                                <th scope="col">價格</th>
                                <th scope="col">結帳日期</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($h_row as $row) : ?>
                                <tr id="<?= $row['order_sid'] ?>">
                                    <!-- 移除購買商品按鈕 -->
                                    <td class="remove-icon"><i class="fas fa-circle"></i></td>
                                    <td><?= $row['order_sid'] ?></td>
                                    <td><?= $row['product_sid'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['quantity'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['check_date'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="">
                        <!-- <div class="row d-flex justify-content-between"> -->
                        <h4>您已經累計消費滿</h4>
                        <h4>$NTD: <?= $h_total_cost ?></h4>
                        <!-- <button type="button" class="btn btn-primary" onclick="check_all()">結帳</button> -->
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php include './part/script.php' ?>

<script>

</script>

<?php include './part/html_foot.php' ?>