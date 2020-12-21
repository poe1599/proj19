<?php
require './db_connect.php';

$pageName = 'login';
$title = '登入';

if (isset($_POST["account"]) || isset($_POST["password"])) {

    $sql = "SELECT * FROM `member` WHERE `account`=? AND `password`=SHA1(?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['account'],
        $_POST['password'],
    ]);

    $row = $stmt->fetch();
    if (empty($row)) {
        $errorMsg = '帳號或密碼錯誤';
    } else {
        $_SESSION['member'] = $row;
    }
}
?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>
<div class="container mt-3">
    <div class="row d-flex justify-content-center">

        <div class="col-lg-6 card ">

            <!-- 登入帳密錯誤警告 -->
            <?php if (isset($errorMsg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errorMsg ?>
                </div>
            <?php endif ?>

            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <!-- 登入畫面 -->
            <?php if (isset($_SESSION['member'])) : ?>
                <!-- 如果已經有登入的session -->
                <div class="d-flex justify-content-center my-5">
                    <img src="./uploads/member/<?= $_SESSION['member']['avatar'] ?>" alt="" id="preview" onclick="avatar.click()" style="width: 300px; min-height: 100px; background-color: #fff;">
                </div>
                <div>
                    <h3>你好, <?= $_SESSION['member']['nickname'] ?>!</h3>
                    <p><a href="logout.php">Log out</a></p>
                </div>

            <?php else : ?>
                <!-- 如果還沒有登入的session -->
                <!-- htmlentities() PHP中用來跳脫html的特殊字元 -->

                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <form method="POST">
                        <div class="form-group">
                            <label for="account">會員帳號</label>
                            <input type="text" class="form-control" id="account" name="account" value="<?php echo htmlentities($_POST["account"] ?? "") ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlentities($_POST["password"] ?? "")  ?>">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="./register.php"><button type="button" class="btn btn-secondary">註冊</button></a>
                            <button type="submit" class="btn btn-primary">登入</button>
                        </div>
                    </form>
                </div>

            <?php endif ?>
        </div>

    </div>
</div>
<?php include './part/script.php' ?>
<?php include './part/html_foot.php' ?>