<?php
$search =1;

  if(!empty($_SERVER['REQUEST_METHOD'] == "POST")){
      $search = mb_strtoupper($_POST['search'],"UTF-8");
  }
?>

<section>
    <h2>DANH SÁCH THÀNH VIÊN</h2><hr>
    <div class="search">
        <form action="<?php echo $_SERVER['PHP_SELF']?> " method="post">
            <input type="text" name="search" id="search__search"  placeholder="Tìm kiếm ...">
            <button type="submit" class="search__buttom">
                <i class="fa-solid fa-magnifying-glass fa-2xs" style="color: #121111;"></i>
            </button>
        </form>
    </div>
    <table border="1" >
        <thead>
        <th>Mã SV</th>
        <th>Họ và Tên</th>
        <th>Giới Tính</th>
        <th>Năm Sinh</th>
        <th>Thông Tin Chi Tiết</th>
        </thead>
        <?php
        if(isset($_SESSION['dbname']) && $_SESSION['dbname']){
        $usersever = 'localhost';
        $username =  $_SESSION['dbname'];
        $name =   'root';
        $pass = '';
        $conn = new PDO("mysql:host=$usersever;dbname=$username",$name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT id,hoVaTen,gioiTinh,namSinh  FROM $username.thanhvien ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
                if(empty($kq)){
                    echo "<tr><td colspan='5' style='font-size:24px;font-weight:700;text-align: center'>Danh Sách Trống</td></tr>";
                }else{
                    if($search == 1){
                    foreach ($kq as $key => $item ){
                    ?>
                    <tr>
                        <td><?php echo strtoupper($item['id'])  ?></td>
                        <td><?php echo mb_strtoupper($item['hoVaTen'],"UTF-8") ?></td>
                        <td><?php echo mb_strtoupper($item['gioiTinh'],"UTF-8") ?></td>
                        <td><?php echo str_replace('-','/',strtoupper($item['namSinh'])) ?></td>
                        <td><a href="">Chi tiết</a></td>
                    </tr>
                <?php
                      }
                    }else{

                        foreach ($kq as $key => $item ){
                            if($search == strtoupper($item['id']) || $search == mb_strtoupper($item['hoVaTen'],"UTF-8") || $search ==  str_replace('-','/',strtoupper($item['namSinh']))){
                                ?>
                                <tr>
                                    <td><?php echo strtoupper($item['id'])  ?></td>
                                    <td><?php echo mb_strtoupper($item['hoVaTen'],"UTF-8") ?></td>
                                    <td><?php echo mb_strtoupper($item['gioiTinh'],"UTF-8") ?></td>
                                    <td><?php echo str_replace('-','/',strtoupper($item['namSinh'])) ?></td>
                                    <td><a href="">Chi tiết</a></td>
                                </tr>
                               <?php
                                }
                        }
                    }
                }
        }
                ?>
    </table>
</section>