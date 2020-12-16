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
</style>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2 d-flex flex-column">
            <a href="?" class="btn my-2 btn-outline-primary" name="">我的購物車</a>
        </div>
        <div class="col-md-10">
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
                        <th scope="col">新增日期</th>
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
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['order_date'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="row d-flex justify-content-between">
                <a class="btn">$NTD: <span id='total_cost'>0</span></a>
                <button type="button" class="btn btn-primary">結帳</button>
            </div>
        </div>
    </div>
</div>

<?php include './part/script.php' ?>

<script>
    // 取消全部訂單
    function del_all() {
        if (confirm(`是否要取消全部訂單?`)) {
            location.href = 'order_delete.php?del_all=1';

        }
    }

    // 取消單筆訂單
    function del_it(order_sid) {
        if (confirm(`是否要取消 ${order_sid} 號訂單?`)) {
            location.href = 'order_delete.php?order_sid=' + order_sid;
        }
    }
</script>

<?php include './part/html_foot.php' ?>