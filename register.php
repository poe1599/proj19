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
            <div class="alert alert-danger" role="alert" id="info" style="display: none;"></div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">註冊會員</h5>
                    <!-- 上傳圖片, 如果沒資料或抓不到檔案會是灰色底, 已經有上傳或更改會即時顯現-->
                    <div class="d-flex justify-content-center">
                        <img src="" alt="" id="preview" onclick="avatar.click()" style="min-width: 180px; max-width:300px; min-height: 200px; background: #ccc;">
                    </div>
                    <h6 class="text-center">↑請點此上傳頭像</h6>
                    <!-- novalidate會使表單的type限制與required均失效 -->
                    <!-- onsubmit="formCheck();return false;" 在表單送出的時候觸發 -->
                    <!-- return false 會阻止表單預設的GET -->
                    <form name="form_register" novalidate onsubmit="formRegister(); return false;">
                        <input type="file" id="avatar" name="avatar" accept="image/*" onchange="fileChange()" style="display: none">

                        <div class="form-group">
                            <label for="account">會員帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                            <small class="form-text error_msg" style="display: none;">請填入帳號</small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text error_msg" style="display: none;">請填入密碼</small>
                        </div>
                        <div class="form-group">
                            <label for="nickname">暱稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname">
                            <small class="form-text error_msg" style="display: none;">請填入暱稱</small>
                        </div>
                        <div class="form-group">
                            <label for="email">電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small class="form-text error_msg" style="display: none;">請填入電子信箱</small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">行動電話</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                            <small class="form-text error_msg" style="display: none;">請填入行動電話</small>
                        </div>
                        <div class="form-group">
                            <label for="address">住址</label>
                            <input type="text" class="form-control" id="address" name="address">
                            <small class="form-text error_msg" style="display: none;">請填入住址</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-outline-secondary">清空</button>
                            <button type="submit" class="btn btn-primary">註冊</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './part/footer.php' ?>
<?php include './part/script.php' ?>

<script>
    // 及時變換圖片, 不上傳
    const avatar = document.querySelector('#avatar');
    const preview = document.querySelector('#preview');
    const reader = new FileReader();

    const info = document.querySelector('#info');
    const account = document.querySelector('#account');
    const password = document.querySelector('#password');
    const nickname = document.querySelector('#nickname');
    const email = document.querySelector('#email');
    const mobile = document.querySelector('#mobile');
    const address = document.querySelector('#address');

    reader.addEventListener('load', function(event) {
        preview.src = reader.result;
        preview.style.height = 'auto';
        preview.style.background = 'transparent';
    });

    function fileChange() {
        reader.readAsDataURL(avatar.files[0]);

        console.log(avatar.files.length);
        console.log(avatar.files[0]);
    }

    // 檢查表單送出的資料, 確認格式沒問題才會POST出去
    function formRegister() {
        // 預設提示字隱藏, 預設通過檢查
        info.style.display = 'none';
        let isPass = true;

        // 失敗提示框的CSS
        function ngMsg() {
            info.classList.remove('alert-success');
            info.classList.add('alert-danger');
            info.style.display = 'block';
        }

        // 沒有填入的小提示
        function smallErrorMsg(div) {
            div.style.borderColor = 'red';
            let small = div.closest('.form-group').querySelector('small');
            small.style.display = 'block';
        }
        // 清除小提示
        function smallErrorMsgDel(div) {
            div.style.borderColor = '#ced4da';
            let small = div.closest('.form-group').querySelector('small');
            small.innerText = '';
            small.style.display = 'none';
        }

        // 檢查帳號
        if (!account.value) {
            smallErrorMsg(account)
        } else {
            smallErrorMsgDel(account)
        }

        // 檢查密碼
        if (!password.value) {
            smallErrorMsg(password)
        } else {
            smallErrorMsgDel(password)
        }

        // 檢查暱稱
        if (!nickname.value) {
            smallErrorMsg(nickname)
        } else {
            smallErrorMsgDel(nickname)
        }

        // 檢查信箱
        if (!email.value) {
            smallErrorMsg(email)
        } else {
            smallErrorMsgDel(email)
        }

        // 檢查手機
        if (!mobile.value) {
            smallErrorMsg(mobile)
        } else {
            smallErrorMsgDel(mobile)
        }

        // 檢查住址
        if (!address.value) {
            smallErrorMsg(address)
        } else {
            smallErrorMsgDel(address)
        }

        if (!account.value || !password.value || !nickname.value || !email.value || !mobile.value || !address.value) {
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
                        info.style.display = 'block';
                        info.innerHTML = '註冊成功, 請重新登入';
                        document.form_register.reset();
                    } else {
                        // 失敗
                        ngMsg();
                        info.innerHTML = '註冊失敗, ' + obj.error;
                    }
                })
        }
    }
</script>

<?php include './part/html_foot.php' ?>