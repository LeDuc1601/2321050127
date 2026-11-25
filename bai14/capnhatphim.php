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
    <h1>Cap nhat phim</h1>
<div class="container">
    <form action="index.php?page_layout=capnhatphim" method="POST">
        <div class="box">
            <input type="text" name="tenphim" id="thong-tin" placeholder="Ten Phim ">
        </div>
        <div class="box">
            <input type="text" name="quocgia" id="thong-tin"placeholder="quoc gia">
        </div>
        <div class="box">
            <input type="text" name="daodien" id="thong-tin" placeholder="dao dien">
        </div>
        <div class="box">
            <input type="date" name="nam" id="thong-tin" placeholder="nam">
        </div>
        <div class="box">
            <input type="text" name="dotuoi" id="thong-tin" placeholder="do tuoi">
        </div>
        <div class="box">
            <input type="text" name="mota" id="thong-tin" placeholder="mo ta">
        </div>
        <div class="button">
            <button>Thêm</button>
        </div>
    </form>
    <?php
        if(isset($_POST['tenphim']) && 
           isset($_POST['quocgia']) && 
           isset($_POST['daodien']) && 
           isset($_POST['nam']) && 
           isset($_POST['dotuoi']) &&
           isset($_POST['mota'])
          )
        {
            $tenphim = $_POST['tenphim'];
            $quocgia = $_POST['quocgia'];
            $daodien = $_POST['daodien'];
            $nam = $_POST['nam'];
            $dotuoi = $_POST['dotuoi'];
            $mota = $_POST['mota'];
            
            if(!empty($tenphim) && 
                !empty($quocgia) && 
                !empty($daodien) && 
                !empty($nam) && 
                !empty($dotuoi) &&
                !empty($mota)){
            $sql = "UPDATE `phim` SET `ten_phim`='$tenphim',`quoc_gia`='$quocgia',`dao_dien_id`='$daodien'
            ,`nam`='$nam',`do_tuoi`='$dotuoi',`mo_ta`='$mota' WHERE id='$id'";
            
                $result = mysqli_query($conn, $sql);

                if($result){

                    header("location: index.php?page_layout=phim");
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
