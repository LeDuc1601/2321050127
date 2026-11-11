<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .khoi{
            border: 1px solid black;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
            background-color: antiquewhite;
            display: flex;
            text-align: center;
        }

        input{
            padding:5px 0;
            margin:10px 0;
        }

        form{
            padding:10px;
        }

        h1{
            margin:5px 0;
        }
    </style>
</head>
<body>
    <div class="khoi">
        <div class="">
            <h1>dang nhap</h1>
            <form action="dangnhap.php" method="POST">
                <div>
                    <p>ten dang nhap</p>
                    <input type="text" name="tenDangNhap" id="" placeholder= "ten dang nhap">
                </div>
                <div>
                    <p>Mat khau</P>
                    <input type="password" name="matKhau" id="" placeholder= "Mat khau">
                </div>
                <div>
                    <button type="submit">dang nhap</button>
                </div>
            </form>
        </div>
    </div>

    <?php
            
        if(isset($_POST['tenDangNhap']) && isset($_POST['matKhau']) ){
            $tenDangNhap = $_POST['tenDangNhap'];
            $matKhau = $_POST['matKhau'];
            if($tenDangNhap == "admin" && $matKhau == "123"){
                session_start();
                $_SESSION['dangnhap']="thanh cong";
                header("location: trangchu.php");
            }
            else{
                echo "ten dang nhap hoac mat khau khong chinh xac";
            }
        }


    
    ?>
</body>
</html>