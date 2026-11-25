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
    <h1>Them The Loai</h1>
<div class="container">
    <form action="index.php?page_layout=themtheloai" method="POST">
        <div class="box">
            <input type="text" name="tentheloai" id="thong-tin" placeholder="Ten the loai">
        </div>
        
        <div class="button">
            <button>Thêm</button>
        </div>
    </form>
    <?php
        if(isset($_POST['tentheloai']))
        {
            $tentheloai = $_POST['tentheloai'];
            
            if(!empty($tentheloai)){
            $sql = "INSERT INTO `the_loai`( `ten_the_loai`) 
            VALUES ('$tentheloai')";
            
                $result = mysqli_query($conn, $sql);

                if($result){

                    header("location: index.php?page_layout=danhmuc");
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
