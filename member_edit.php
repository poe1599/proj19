<?php
// 導入驗證登入的php檔
require __DIR__ . '/is_member.php';

$pageName = 'member_edit';
$title = '編輯會員資料';

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
                    <h5 class="card-title text-center">編輯會員資料</h5>
                    <!-- 上傳圖片, 如果沒資料或抓不到檔案會是灰色底, 已經有上傳或更改會即時顯現-->
                    <div class="d-flex justify-content-center">
                        <img src="./uploads/member/<?= $_SESSION['member']['avatar'] ?>" alt="" id="preview" onclick="avatar.click()" style="width: 300px; min-height: 100px; background-color: <?php isset($_SESSION['member']['avatar']) ? '' : '#eee' ?>;">
                    </div>
                    <!-- novalidate會使表單的type限制與required均失效 -->
                    <!-- onsubmit="formCheck();return false;" 在表單送出的時候觸發 -->
                    <!-- return false 會阻止表單預設的GET -->
                    <form name="form_edit" novalidate onsubmit="formCheck(); return false;">
                        <input type="file" id="avatar" name="avatar" accept="image/*" onchange="fileChange()" style="display: none">

                        <div class="form-group">
                            <label for="account">會員帳號</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['member']['account'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nickname">暱稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" value="<?= $_SESSION['member']['nickname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= $_SESSION['member']['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="new_password">新密碼</label>
                            <input type="text" class="form-control" id="new_password" name="new_password" required>
                            <small>(如不更改請留空即可)</small>
                        </div>
                        <div class="form-group">
                            <label for="password">現在使用的密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">提交</button>
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

    function formCheck() {
        // 預設提示字隱藏, 預設通過檢查
        info.style.display = 'none';
        let isPass = true;

        if (!password.value) {
            isPass = false;
        }

        // 如果檢查沒有問題, 就POST表單的資料
        if (isPass) {
            // 如果表單有給name就直接指定name即可, 注意如果有多個表單, 須注意索引值指到的表單是否正確
            const fd = new FormData(document.form_edit);

            fetch('member_edit_api.php', {
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
                        info.innerHTML = '更新成功';
                    } else {
                        // 失敗
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = '更新失敗';
                    }
                    info.style.display = 'block';
                });
        }
    }
</script>

<?php include './part/html_foot.php' ?>