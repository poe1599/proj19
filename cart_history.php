<?php include './cart_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>

<style>
    td {
        max-width: 200px;
        Text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .fa-circle {
        color: #ccc;
    }

    .remove-icon a i {
        color: #ccc;
    }

    .remove-icon a i:hover {
        color: red;
    }

    .buyThisTime,
    .cartHistorySearch {
        border-radius: 20px;
        border: 1px solid red;
        Text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
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
            <form class="w-100 my-5">
                <label for="date_after">從~起</label><br>
                <input class="btn btn-info my-2 w-100" type="date" name="date_after" id="date_after"><br>
                <label for="date_before">到~止</label><br>
                <input class="btn btn-info my-2 w-100" type="date" name="date_before" id="date_before"><br>
                <button class="btn btn-primary my-2 w-100" type="submit">搜尋</button>
            </form>
        </div>
        <div class="col-md-10">
            <?php if ($t_row) : ?>
                <div class="cartHistorySearch my-3 p-5">
                    <div>
                        <h4>結帳明細</h4>
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
                            <?php foreach ($t_row as $row) : ?>
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
                    <div class="py-3 px-3 border-top text-right">
                        <h6>商品金額小計: $<?= $t_total_cost ?></h6>
                        <!-- <h6>運費: $shipping_cost</h6> -->
                    </div>
                    <div class="d-flex pt-3 border-top">
                        <div class="col">
                            <div class="form-group">
                                <label for="payment_method">付款方式: </label>
                                <input type="text" class="form-control" id="payment_method" name="payment_method" value="<?= $detail_row['payment_method'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">貨運地址: </label>
                                <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="<?= $detail_row['shipping_address'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col text-right">
                            <h5>您本次結帳消費: $<?= $t_total_cost ?></h5>
                        </div>
                    </div>
                    <!-- <div class="py-3 px-3 border-top text-right">
                        <h6>商品金額小計: $<?= $t_total_cost ?></h6>
                        <h6>運費: $shipping_cost</h6>
                    </div>
                    <div class="d-flex">
                        <div class="col">
                            <h5>付款方式: </h5>
                            <h5>貨運地址: $shipping_address</h5>
                        </div>
                        <div class="col text-right">
                            <h5>您本次結帳消費: $XXX</h5>
                        </div>
                    </div> -->
                </div>
            <?php endif ?>
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
                                    <!-- 搜尋紀錄按鈕 -->
                                    <td class="history-icon">
                                        <a href="?check_date=<?= $row['check_date'] ?>">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
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
<?php include './part/footer.php' ?>
<?php include './part/script.php' ?>

<script>

</script>

<?php include './part/html_foot.php' ?>