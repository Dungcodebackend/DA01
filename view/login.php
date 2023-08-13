<?php
$st=1;
if(!empty($_SERVER['REQUEST_METHOD'] == 'POST')){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $usersever = 'localhost';
        $name =   'root';
        $pass = '';
        $conn = new PDO("mysql:host=$usersever;dbname=sqladmin",$name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT username,password,dbclb FROM sqladmin.formds ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        foreach ($kq as $item){
            if($item['username']==$username && $item['password']==$password){
                $_SESSION['dbname'] = strtolower($item['dbclb']);
                header("location: indexContent.php");
            }
        }
        $st = 0;

    }catch (PDOException $e){
        echo $e->getMessage();
    }

}




?>

<div class="formlogin">
    <div class="login">
        <h3>ĐĂNG NHẬP QUẢN LÝ</h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <p>Tên đăng nhập :</p>
            <input type="text" name="username" class="">
            <p>Mật khẩu :</p>
            <input type="password" name="password" class="">
            <div>
                <?php
                echo $st==1?"":"<span class='error'><br>Tên đắng nhập hoặc mật khẩu không đúng</span>";
              ?>
            </div>
            <a href=""><p style="padding-top:5px;margin: 0;">Quên mật khẩu ?</p></a>
            <p style="text-align: right;padding-right: 80px;margin-top: 20px;"><input type="submit" class="submitlogin" value="Đăng Nhập"></p>
        </form>
    </div>
</div>
