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
    <h1>Them tai khoan</h1>
<div class="container">
    <form action="index.php?page_layout=themtaikhoan" method="POST">
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
            <input type="radio" name="gioiTinh" id="gioi-tinh" value="1" >Nam
            <input type="radio" name="gioiTinh" id="gioi-tinh" value="0" >Nữ
        </div>
        <div class="button">
            <button>Thêm</button>
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
            $sql = "INSERT INTO `nguoi_dung`( `ten_dang_nhap`, `mat_khau`, `email`, `ho_ten` , `sdt`, `gioi_tinh`, `ngay_sinh`) 
            VALUES ('$tenDangNhap','$matKhau','$email','$hoten','$sdt','$gioitinh','$ngaysinh')";
            
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
