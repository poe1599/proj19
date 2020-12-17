<?php
// 清除$_SESSION
unset($_SESSION);
if (!isset($_SESSION)) {
    session_start();
}

$pageName = 'register';
$title = '註冊會員';

?>
<?php include './part/html_haed.php' ?>
<?php include './part/navbar.php' ?>

<style>
    form small.error_msg {
        color: red;
    }
</style>

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">

            <!-- 修改失敗警告/修改成功提示 -->
            <div class="alert alert-danger" role="alert" id="info" style="display: none;">一切都順利</div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">註冊會員</h5>
                    <!-- 上傳圖片, 如果沒資料或抓不到檔案會是灰色底, 已經有上傳或更改會即時顯現-->
                    <div class="d-flex justify-content-center">
                        <img src="" alt="" id="preview" onclick="avatar.click()" style="width: 300px; min-height: 100px; background-color:#eee;">
                    </div>
                    <!-- novalidate會使表單的type限制與required均失效 -->
                    <!-- onsubmit="formCheck();return false;" 在表單送出的時候觸發 -->
                    <!-- return false 會阻止表單預設的GET -->
                    <form name="form_register" novalidate onsubmit="formRegister(); return false;">
                        <input type="file" id="avatar" name="avatar" accept="image/*" onchange="fileChange()" style="display: none">

                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input type="text" class="form-control" id="nickname" name="nickname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">註冊</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './part/script.php' ?>

<script>
    // 及時變換圖片, 不上傳
    const avatar = document.querySelector('#avatar');
    const preview = document.querySelector('#preview');
    const reader = new FileReader();

    reader.addEventListener('load', function(event) {
        preview.src = reader.result;
        preview.style.height = 'auto';
    });

    function fileChange() {
        reader.readAsDataURL(avatar.files[0]);

        console.log(avatar.files.length);
        console.log(avatar.files[0]);
    }


    // 檢查表單送出的資料, 確認格式沒問題才會POST出去
    const info = document.querySelector('#info');

    function formRegister() {
        // 預設提示字隱藏, 預設通過檢查
        info.style.display = 'none';
        let isPass = true;

        if (!password.value) {
            isPass = false;
        }

        // 如果檢查沒有問題, 就POST表單的資料
        if (isPass) {
            // 如果表單有給name就直接指定name即可, 注意如果有多個表單, 須注意索引值指到的表單是否正確
            const fd = new FormData(document.form_register);

            fetch('register_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        // 成功
                        info.classList.remove('alert-danger');
                        info.classList.add('alert-success');
                        info.innerHTML = '註冊成功';
                    } else {
                        // 失敗
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = '帳號或信箱已經註冊';
                    }
                    info.style.display = 'block';
                });
        }
    }
</script>

<?php include './part/html_foot.php' ?>