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
        Text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;

    }

    .buyNextTime {
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
            <a href="./cart.php" class="btn my-2 btn-outline-success active" name="">我的購物車</a>
            <a href="./cart_history.php" class="btn my-2 btn-outline-success" name="">歷史清單</a>
        </div>
        <div class="col-md-10">
            <?php if (!$row) : ?>
                <div class="buyThisTime my-3 p-5">
                    <div>
                        <h4>你還沒有點餐喔, 快去找點好吃的吧!</h4>
                    </div>
                </div>
            <?php else : ?>
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
                                <th scope="col"><a href="javascript: all_to_next_time()"><i class="fas fa-arrow-circle-down"></i>下次</a></th>
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
                                            <?php for ($i = 1; $i < 11; $i++) : ?>
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
                    <div class="py-3 px-3 border-top text-right">
                        <h6>商品金額小計: $<?= $total_cost ?></h6>
                        <!-- <h6>運費: $shipping_cost</h6> -->
                    </div>
                    <form name="check_detail" onsubmit="check_all(); return false;">
                        <div class="d-flex pt-3 border-top">
                            <div class="col">
                                <div class="form-group">
                                    <label for="payment_method_sid">付款方式: </label><br>
                                    <select name="payment_method_sid" id="payment_method_sid">
                                        <option value="">請選擇付款方式</option>
                                        <option value="1">PChomePay支付連 現金 (ATM、餘額、銀行支付)</option>
                                        <option value="2">7-11取貨付款</option>
                                        <option value="3">銀行或郵局轉帳</option>
                                        <option value="4">郵局無摺存款</option>
                                        <option value="5">貨到付款</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_address">貨運地址: </label>
                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="<?= $_SESSION['member']['address'] ?>" placeholder="請填入貨運地址">
                                </div>
                            </div>
                            <div class="col text-right">
                                <h5>您本次結帳消費: $<?= $total_cost ?></h5>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <!-- <h4>$NTD: <?= $total_cost ?></h4> -->
                            <!-- <button type="submit" class="btn btn-primary" onclick="check_all()">結帳</button> -->
                            <button type="submit" class="btn btn-primary">結帳</button>
                        </div>
                    </form>
                </div>
            <?php endif ?>
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
                                <th scope="col"><a href="javascript: all_to_this_time()"><i class="fas fa-arrow-circle-up"></i>這次</a></th>
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
                                            <?php for ($i = 1; $i < 11; $i++) : ?>
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
                    <div class="py-3 px-3 border-top text-right">
                        <h6>商品金額小計: $<?= $n_total_cost ?></h6>
                        <!-- <h6>運費: $shipping_cost</h6> -->
                    </div>
                    <!-- <div class="row d-flex justify-content-between">
                        <h4>$NTD: <?= $n_total_cost ?></h4>
                    </div> -->
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php include './part/footer.php' ?>
<?php include './part/script.php' ?>

<script>
    // 取消本次全部訂單
    function del_all() {
        if (confirm(`是否要取消本次全部訂單?`)) {
            location.href = 'order_modify.api.php?del_all=1';
        }
    }

    // 取消下次全部訂單
    function del_all_next_time() {
        if (confirm(`是否要取消下次全部訂單?`)) {
            location.href = 'order_modify.api.php?del_all_next_time=1';
        }
    }

    // 取消單筆訂單
    function del_it(order_sid) {
        if (confirm(`是否要取消 ${order_sid} 號訂單?`)) {
            location.href = 'order_modify.api.php?order_sid=' + order_sid + '&cancel=1';
        }
    }

    // 修改訂單數量
    function quantityChange(order_sid) {
        const quantity = event.currentTarget.value;
        location.href = 'order_modify.api.php?order_sid=' + order_sid + '&quantity=' + quantity;
    }

    // 全部下次再買
    function all_to_next_time() {
        location.href = 'order_modify.api.php?all_to_next_time=1';
    }

    // 單筆下次再買
    function to_next_time(order_sid) {
        location.href = 'order_modify.api.php?order_sid=' + order_sid + '&to_next_time=1';
    }

    // 全部這次要買
    function all_to_this_time() {
        location.href = 'order_modify.api.php?all_to_this_time=1';
    }

    // 單筆下次再買
    function to_this_time(order_sid) {
        location.href = 'order_modify.api.php?order_sid=' + order_sid + '&to_this_time=1';
    }

    // 訂單結帳(假結帳)
    function check_all() {
        const payment_method_sid = document.querySelector('#payment_method_sid');
        const shipping_address = document.querySelector('#shipping_address');
        payment_method_sid.style.borderColor = '#eee';
        shipping_address.style.borderColor = '#eee';

        console.log(payment_method_sid.value)
        console.log(shipping_address.value)

        if (!payment_method_sid.value) {
            payment_method_sid.style.borderColor = 'red';
            return
        }
        if (!shipping_address.value) {
            shipping_address.style.borderColor = 'red';
            return
        }

        if (confirm(`是否要完成結帳?`)) {
            // location.href = 'order_check.api.php?check_all=1';

            const fd = new FormData(document.check_detail);

            fetch('order_check.api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        // 成功
                        // info.classList.remove('alert-danger');
                        // info.classList.add('alert-success');
                        // info.style.display = 'block';
                        // info.innerHTML = '註冊成功, 請重新登入';
                        // document.form_register.reset();
                    } else {
                        // 失敗
                        // ngMsg();
                        // info.innerHTML = '註冊失敗, ' + obj.error;
                    }
                })
        }
        alert('感謝您本次消費, 祝您用餐愉快!');
        location.href = 'cart.php';
    }
</script>

<?php include './part/html_foot.php' ?>