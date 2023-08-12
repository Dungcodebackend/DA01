<?php
session_start();
ob_start();
$arr = [];
if(!empty($_SERVER['REQUEST_METHOD']=="POST")){
    $userName = $_POST['userName'];
    $nameCLB = $_POST['nameCLB'];
    $codeCLB = $_POST['codeCLB'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $codePhone = $_POST['codePhone'];
    $submit = 0 ;
  if(empty( $_POST['check'])){
      $arr['check'] = false;
      $submit =1;
  }else{
      $arr['check'] = true;
  }
  if(!preg_match("/^[a-z0-9-_]{10,}$/",$userName)){
      $arr['username'] = false;
      $submit =1;
  }else{
      $arr['username'] = true;
  }
  if(!preg_match("/^[\d\w\-_\. ]+[\d\w]+$/u",$nameCLB)){
      $arr['nameCLB'] = false;
      $submit =1;
  }
  else{
      $arr['nameCLB'] = true;
  }
  if(!preg_match("/^[A-Z]+[\d]+$/",$codeCLB)){
      $arr['codeCLB'] = false;
      $submit =1;
  }
  else{
      $arr['codeCLB'] = true;
  }

  if(!preg_match("~^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^&\*\(\)-\+]).{8,}$~",$password)){
      $arr['password'] = false;
      $submit =1;
  }
  else{
      $arr['password'] = true;
  }
  if(!preg_match("~^(\+84)|0[\w]{9}$~",$phone)){
      $arr['phone'] = false;
      $submit =1;
  }
  else{
      $arr['phone'] = true;
  }
  if(!preg_match("~^[0-9]{6}$~",$codePhone)){
      $arr['codePhone'] = false;
      $submit =1;
  }
  else{
      $arr['codePhone'] = true;
  }

}else{

}
?>
<div class="formregister">
    <div class="register">
        <h3>ĐĂNG KÝ QUẢN LÝ</h3>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <p>Tên đăng nhập :</p>
            <input type="text" name="userName" class="">
            <?php
              if(isset($_POST['userName']))
               echo $arr['username']? "":"<span class='error'>Lỗi :<br>- Không được bỏ trống<br>- Phải đủ 10 ký tự và không chứa ký tự đặc biệt</span>";
            ?>
            <p>Tên CLB :</p>
            <input type="text" name="nameCLB" class="">
            <?php
            if(isset($_POST['nameCLB']))
                echo $arr['nameCLB']? "":"<span class='error'>Lỗi :<br>- Không được bỏ trống<br>- Không chứa ký tự đặc biệt trừ (-)<br>- Không được kết thúc bằng ký tự đặc biệt</span>";
            ?>
            <p>Tạo mã CLB :</p>
            <input type="text" name="codeCLB" class="">
            <?php
            if(isset($_POST['codeCLB']))
                echo $arr['codeCLB']? "":"<span class='error'>Lỗi :<br>- Không được bỏ trống<br>- Viết bằng chữ in hoa và có số<br>- Kết thúc bằng chữ số</span>";
            ?>
            <p>Mật khẩu :</p>
            <input type="password" name="password" class="">
            <?php
            if(isset($_POST['codeCLB']))
                echo $arr['codeCLB']? "":"<span class='error'>Lỗi :<br>- Không được bỏ trống<br>- Có 2 chữ in hoa <br>- Có 2 chữ in thường<br>- Có 2 có chữ số<br>- Có chứa 1 ký tự đặc biệt<br>- Lớn hơn 8 ký tự</span>";
            ?>
            <p>Số điện thoại :</p>
            <input type="number" name="phone" class="">
            <?php
            if(isset($_POST['phone']))
                echo $arr['phone']? "":"<span class='error'>Lỗi :<br>- Phải là số</span>";
            ?>
            <p>Mã xác nhận:</p>
            <div style="height: 30px; display: flex;align-items: flex-end;">
                <input type="text" name="codePhone" class="confirm">
                <input type="button" class="send" value="Gửi lại">
            </div>
            <?php
            if(isset($_POST['codePhone']))
                echo $arr['codePhone']? "":"<span class='error'>Lỗi :<br>- Mã xác nhận không đúng</span>";
            ?>
            <div style="padding-top: 2px;display: flex;align-items: center;">
                <input type="checkbox" name="check" id="">
                <a href=""><span style="padding-top:5px;margin: 0;">Đồng ý với mọi điều khoản & dịch vụ</span></a>
            </div>
            <?php
            if(isset($arr['check']))
                echo $arr['check']? "":"<span class='error'>Lỗi :<br>- Bạn chưa đồng ý với các điều khoản & dịch vụ</span>";
            ?>
            <p style="text-align: right;padding-right: 80px;margin-top: 20px;"><input type="submit" class="submitregister" value="ĐĂNG KÝ"></p>
        </form>
    </div>
</div>
