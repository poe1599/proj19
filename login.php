<?php
$pageName = 'login';
$title = '登入';
?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>
<div class="container">
    <div class="row d-flex justify-content-center">

        <div class="col-6 card ">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">登入</h5>
                <form>
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" class="form-control" id="account" name="account">
                        <small></small>
                    </div>
                    <div class="form-group">
                        <label for="passsord">Password</label>
                        <input type="password" class="form-control" id="passsord" name="passsord">
                        <small></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php include './part/script.php' ?>
<?php include './part/html_foot.php' ?>