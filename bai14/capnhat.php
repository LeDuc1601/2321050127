<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        }
        .container{
            height: 400px;
        }
        form{
            width: 500px;
            height: 500px;
            margin: auto;
            text-align: center;
            border: 1px solid black;
            border-radius: 10px;
            background-color: wheat;
        }
        .button{
            
            margin: auto;
        }
        #thong-tin{
            width: 300px;
            height: 30px;
            margin-top: 30px;
            border-radius: 5px;
        }
        #gioi-tinh{
            width: 50px;
            height: 15px;
            margin-top: 10px;
        }
        .gt{
            text-align: center;
        }
        .button{
            text-align: center;
            margin-top: 20px;
        }
        button{
            width: 300px;
            height: 40px;
            font-size: 100%;
            background-color: green;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php
       $id = $_GET['id'];
        $sql = "SELECT * FROM nguoi_dung WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $nguoiDung = mysqli_fetch_assoc($result);
    ?>
    <h1>cap nhat tai khoan</h1>
<div class="container">
    <form action="index.php?page_layout=capnhattaikhoan&id=<?php echo $id ?>" method="POST">
        <div class="box">
            <input type="text" name="tenDangNhap" id="thong-tin" placeholder="Ten Dang Nhap">
        </div>
        <div class="box">
            <input type="text" name="matKhau" id="thong-tin"placeholder="Mat Khau">
        </div>
        <div class="box">
            <input type="email" name="email" id="thong-tin" placeholder="Email">
        </div>
        <div class="box">
            <input type="text" name="hoten" id="thong-tin" placeholder="ho ten">
        </div>
        <div class="box">
            <input type="date" name="ngaySinh" id="thong-tin" placeholder="Ngay Sinh">
        </div>
        <div class="box">
            <input type="text" name="soDienThoai" id="thong-tin" placeholder="So Dien Thoai">
        </div>
        <div class="gt">
            <input type="radio" name="gioiTinh" id="gioi-tinh" value="1" checked>Nam
            <input type="radio" name="gioiTinh" id="gioi-tinh" value="0">Nữ
        </div>
        <div class="button">
            <button>Cap nhat</button>
        </div>
    </form>
    <?php
        if(isset($_POST['tenDangNhap']) && 
           isset($_POST['matKhau']) && 
           isset($_POST['email']) && 
           isset($_POST['hoten']) && 
           isset($_POST['ngaySinh']) &&
           isset($_POST['soDienThoai']) &&
           isset($_POST['gioiTinh']))
        {
            $tenDangNhap = $_POST['tenDangNhap'];
            $matKhau = $_POST['matKhau'];
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaySinh'];
            $sdt = $_POST['soDienThoai'];
            $gioitinh = $_POST['gioiTinh'];
            if(!empty($tenDangNhap) && 
                !empty($matKhau) && 
                !empty($email) && 
                !empty($hoten) && 
                !empty($ngaysinh) &&
                !empty($sdt)){
            $sql = "UPDATE `nguoi_dung` SET `ten_dang_nhap`='$tenDangNhap',`mat_khau`='$matKhau',`email`='$email'
            ,`ho_ten`='$hoten',`ngay_sinh`='$ngaysinh',`sdt`='$sdt',`gioi_tinh`='$gioitinh' WHERE id='$id'";
            
                $result = mysqli_query($conn, $sql);

                if($result){

                    header("location: index.php?page_layout=taikhoan");
                }else{
                    echo "Them nguoi dung that bai";
                }
            }
            else{
                //người dùng nhập thiếu thông tin
                echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
            }
        }
    ?>
</div>
</body>
</html>
