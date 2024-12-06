
<?php
    session_start();
    require_once("classtaikhoan.php");

    $action = isset($_GET["action"]) ? $_GET["action"] : 0;

    if($action == 1){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $taikhoan = Taikhoan::dangnhap($user, $password);
            if ($taikhoan) {
                if ($taikhoan->thanphan == "admin") {
                    $_SESSION["ma"] = "Admin";
                    $_SESSION["manv"] = Taikhoan::GetManv($user);
                    header("Location: admin.php");
                }elseif($taikhoan->thanphan == "Nhân Viên"){
                    $_SESSION["ma"] = "Nhân Viên";
                    $_SESSION["manv"] = Taikhoan::GetManv($user);
                    header("Location: admin.php");
                }
                else {
                    $_SESSION["makh"] =Taikhoan::GetMakh($user);
                    header("Location: giaodienkh.php");
                }
            } else {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác!');</script>";
            }
        }
    }
    if($action == 2){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $repassword = $_POST['rePassword'];
            $tenkh = $_POST['tenkh'];
            $dckh = $_POST['dckh'];
            $sdt = $_POST['sdt'];
            if ($password !== $repassword) {
                echo "<script>alert('Hai mật khẩu không giống nhau!');</script>";
            } else {
                $result = Taikhoan::dangky($user, $password, $tenkh, $dckh, $sdt);
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập/Đăng ký tài khoản</title>
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="dangnhap.css?v=<?php echo time(); ?>">

</head>
<body>
    <section class="page">
    <section class="image-container">
            <!-- Hình ảnh sẽ chiếm 3/5 màn hình -->
        </section>
        
        <section class="content">
            <!-- Login Form -->
            <section id="login-form" class="auth">
                <section class="auth__header">
                    <h2>Đăng nhập</h2>
                    <span id="switch-btn1" class="switch-btn">Đăng ký</span>
                </section>
                <form class="auth__form"  action="dangnhap.php?action=1" method="post">
                    <section class="form-control">
                        <label for="usernameL">Tên đăng nhập</label>
                        <input type="text" id="usernameL" name="user" placeholder="Nhập tên đăng nhập" required>
                    </section>
                    <section class="form-control">
                        <label for="passwordL">Mật khẩu</label>
                        <input type="password" id="passwordL" name="password" placeholder="Nhập mật khẩu" required>
                    </section>
                    <input type="submit" value="Login">
                    <a href="quenmatkhau.php">Quên mật khẩu</a>
                </form>
            </section>

            <!-- Registration Form -->
            <section id="reg-form" class="auth">
                <section class="auth__header">
                    <h2>Đăng ký</h2>
                    <span id="switch-btn2" class="switch-btn">Đăng nhập</span>
                </section>
                <form class="auth__form" action="dangnhap.php?action=2" method="post">
                    <section class="form-control">
                        <label for="usernameR">Tên đăng nhập</label>
                        <input type="text" id="usernameR" name="user" placeholder="Nhập email" required>
                    </section>
                    <section class="form-control">
                        <label for="passwordR">Mật khẩu</label>
                        <input type="password" id="passwordR" name="password" placeholder="Nhập mật khẩu" required>
                    </section>
                    <section class="form-control">
                        <label for="re-password">Xác nhận mật khẩu</label>
                        <input type="password" id="re-password" name="rePassword" placeholder="Nhập lại mật khẩu" required>
                    </section>
                    <section class="form-control">
                        <label for="tenkh">Tên khách hàng</label>
                        <input type="text" id="tenkh" name="tenkh" placeholder="hoàng văn a" required>
                    </section>
                    <section class="form-control">
                        <label for="dckh">Địa chỉ</label>
                        <input type="text" id="diachi" name="dckh" placeholder="xã-huyện-tỉnh" required>
                    </section>
                    <section class="form-control">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" id="sdt" name="sdt" placeholder="0xxx-xxx-xxx" required>
                    </section>
                    <button class="auth_btn" id="btnReg" type="submit">Đăng ký</button>
                    <a href="quenmatkhau.php">Quên mật khẩu</a>
                </form>
            </section>	
        </section>
    </section>
    <script src="dangnhap.js?v=<?php echo time(); ?>"></script>
</body>
</html>
