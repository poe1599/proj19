<?php include './cart_api.php' ?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>

<style>
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

    .buyNextTime {
        border-radius: 20px;
        border: 1px solid green;
    }
</style>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2 d-flex flex-column">
            <a href="?" class="btn my-2 btn-outline-primary" name="">我的購物車</a>
            <a href="?" class="btn my-2 btn-outline-primary" name="">歷史清單</a>
        </div>
        <div class="col-md-10">
            <div class="buyThisTime my-3 p-5">
                <div>
                    <h4>本次購物清單</h4>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><a href="javascript: del_all()">
                                    <i class="fas fa-trash-alt"></i>
                                </a></i></th>
                            <th scope="col">訂單編號</th>
                            <th scope="col">商品編號</th>
                            <th scope="col">商品名</th>
                            <th scope="col">數量</th>
                            <th scope="col">價格</th>
                            <th scope="col">增改日期</th>
                            <th scope="col"><a href="javascript: all_to_next_time()">下次<i class="fas fa-arrow-circle-down"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $row) : ?>
                            <tr id="<?= $row['order_sid'] ?>">
                                <!-- 移除購買商品按鈕 -->
                                <td class="remove-icon">
                                    <a href="javascript: del_it(<?= $row['order_sid'] ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td><?= $row['order_sid'] ?></td>
                                <td><?= $row['product_sid'] ?></td>
                                <td><?= $row['product_name'] ?></td>
                                <td>
                                    <select name="quantity" onchange="quantityChange(<?= $row['order_sid'] ?>)">
                                        <!--  -->
                                        <?php for ($i = 1; $i < 6; $i++) : ?>
                                            <option value="<?= $i ?>" <?= $i == $row['quantity'] ? 'selected' : '' ?>><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['order_date'] ?></td>
                                <td>
                                    <a href="javascript: to_next_time(<?= $row['order_sid'] ?>)"><i class="fas fa-arrow-circle-down"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="row d-flex justify-content-between">
                    <h4>$NTD: <?= $total_cost ?></h4>
                    <button type="button" class="btn btn-primary" onclick="check_all()">結帳</button>
                </div>
            </div>
            <?php if ($n_row) : ?>
                <div class="buyNextTime my-3 p-5">
                    <div>
                        <h4>下次再買</h4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><a href="javascript: del_all_next_time()">
                                        <i class="fas fa-trash-alt"></i>
                                    </a></i></th>
                                <th scope="col">訂單編號</th>
                                <th scope="col">商品編號</th>
                                <th scope="col">商品名</th>
                                <th scope="col">數量</th>
                                <th scope="col">價格</th>
                                <th scope="col">增改日期</th>
                                <th scope="col"><a href="javascript: all_to_this_time()">這次<i class="fas fa-arrow-circle-up"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($n_row as $row) : ?>
                                <tr id="<?= $row['order_sid'] ?>">
                                    <!-- 移除購買商品按鈕 -->
                                    <td class="remove-icon">
                                        <a href="javascript: del_it(<?= $row['order_sid'] ?>)">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    <td><?= $row['order_sid'] ?></td>
                                    <td><?= $row['product_sid'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td>
                                        <select name="quantity" onchange="quantityChange(<?= $row['order_sid'] ?>)">
                                            <!--  -->
                                            <?php for ($i = 1; $i < 6; $i++) : ?>
                                                <option value="<?= $i ?>" <?= $i == $row['quantity'] ? 'selected' : '' ?>><?= $i ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['order_date'] ?></td>
                                    <td>
                                        <a href="javascript: to_this_time(<?= $row['order_sid'] ?>)"><i class="fas fa-arrow-circle-up"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-between">
                        <h4>$NTD: <?= $n_total_cost ?></h4>
                        <!-- <button type="button" class="btn btn-primary" onclick="check_all()">結帳</button> -->
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php include './part/script.php' ?>

<script>
    // 取消本次全部訂單
    function del_all() {
        if (confirm(`是否要取消本次全部訂單?`)) {
            location.href = 'order_modify.php?del_all=1';
        }
    }

    // 取消下次全部訂單
    function del_all_next_time() {
        if (confirm(`是否要取消下次全部訂單?`)) {
            location.href = 'order_modify.php?del_all_next_time=1';
        }
    }

    // 取消單筆訂單
    function del_it(order_sid) {
        if (confirm(`是否要取消 ${order_sid} 號訂單?`)) {
            location.href = 'order_modify.php?order_sid=' + order_sid + '&cancel=1';
        }
    }

    // 修改訂單數量
    function quantityChange(order_sid) {
        const quantity = event.currentTarget.value;
        location.href = 'order_modify.php?order_sid=' + order_sid + '&quantity=' + quantity;
    }

    // 全部下次再買
    function all_to_next_time() {
        location.href = 'order_modify.php?all_to_next_time=1';
    }

    // 單筆下次再買
    function to_next_time(order_sid) {
        location.href = 'order_modify.php?order_sid=' + order_sid + '&to_next_time=1';
    }

    // 全部這次要買
    function all_to_this_time() {
        location.href = 'order_modify.php?all_to_this_time=1';
    }

    // 單筆下次再買
    function to_this_time(order_sid) {
        location.href = 'order_modify.php?order_sid=' + order_sid + '&to_this_time=1';
    }

    // 訂單結帳(假結帳)
    function check_all() {
        if (confirm(`是否要完成結帳?`)) {
            location.href = 'order_check.php?check_all=1';
        }
    }
</script>

<?php include './part/html_foot.php' ?>