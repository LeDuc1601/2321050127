
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
            height: 650px;
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

        select{
            width: 310px;
            height: 40px;
            margin:20px 0 0 0;
            text-align: center;
            border: 1px solid black;    
            border-radius: 5px;        
        }
        
    </style>
</head>
<body>
   <?php
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id <= 0) {
            die("ID phim không hợp lệ!");
        }
    ?>
    
    <?php
    $sql_theloai = "SELECT * FROM the_loai";
    $result_theloai = mysqli_query($conn, $sql_theloai);
    ?>
    <?php
    $sql_daodien = "SELECT * FROM dao_dien";
    $result_daodien = mysqli_query($conn, $sql_daodien);
    ?>
    <h1>Cập nhật phim</h1>
<div class="container">
    <form action="index.php?page_layout=capnhatphim&id=<?php echo $id; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="box">
            <input type="text" name="tenPhim" id="thong-tin" placeholder="Ten Phim">
        </div>
        <div class="box">
            <input type="text" name="quocGia" id="thong-tin"placeholder="Quoc Gia">
        </div>
        <div class="box">
            <select name="daoDienId" id="thong-tin">
                <?php
                    while($row = mysqli_fetch_array($result_daodien))
                    {
                ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['ho_ten']; ?>
                    </option>
                <?php
                    }
                ?>
            </select>
        </div>

        <div class="box">
            <select name="the_loai" id="the_loai">
                <?php
                    while($row = mysqli_fetch_array($result_theloai))
                    {
                ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['ten_the_loai']; ?>
                    </option>
                <?php
                    }
                ?>
            </select>
        </div>

        <div class="box">
            <input type="date" name="ngaySanXuat" id="thong-tin" placeholder="Ngay San Xuat">
        </div>
        <div class="box">
            <input type="text" name="doTuoi" id="thong-tin" placeholder="Do Tuoi">
        </div>
        <div class="box">
            <input type="text" name="moTa" id="thong-tin"placeholder="Mo Ta">
        </div>
        <div class="box">
            <input type="file" name="fileToUpload" id="thong-tin"placeholder="Poster">
        </div>
        <div class="box">
            <input type="text" name="trailer" id="thong-tin"placeholder="trailer ">
        </div>
        <div class="button">
            <button>cập nhật</button>
        </div>
    </form>
    <?php
    $id = 0;

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
    } elseif (isset($_POST['id'])) {
        $id = intval($_POST['id']);
    }

    if ($id <= 0) {
        die("Không nhận được ID phim!");
    }
    ?>
    <?php
         if(isset($_POST['tenPhim']) && 
           isset($_POST['quocGia']) && 
           isset($_POST['ngaySanXuat']) && 
           isset($_POST['daoDienId']) && 
           isset($_POST['doTuoi']) &&
           isset($_POST['the_loai']) &&
           isset($_POST['moTa']) &&
           isset($_POST['poster']) &&
           isset($_POST['trailer']) ) 
        {

        $tenPhim = $_POST['tenPhim'];
        $quocGia =$_POST['quocGia'];
        $daoDienId = $_POST['daoDienId'];
        $theLoai = $_POST['the_loai'];
        $ngaySanXuat = $_POST['ngaySanXuat'];
        $doTuoi = $_POST['doTuoi'];
        $moTa = $_POST['moTa'];
        $moTa = $_POST['poster'];
        $trailer = $_POST['trailer'];

        if (
            !empty($tenPhim) &&
            !empty($quocGia) &&
            !empty($ngaySanXuat) &&
            !empty($daoDienId) &&
            !empty($doTuoi) &&
            !empty($theLoai) &&
            !empty($moTa) &&
            !empty(poster) &&
            !empty($trailer)
        ) {

                if (!empty($_FILES['poster']['name'])) {
                $poster = "uploads/" . basename($_FILES['poster']['name']);
                move_uploaded_file($_FILES['poster']['tmp_name'], $poster);
                // Cập nhật bảng phim

                $sql_update = "UPDATE phim SET
                ten_phim = '$tenPhim',
                quoc_gia = '$quocGia',
                dao_dien_id = '$daoDienId',
                nam = '$ngaySanXuat',
                do_tuoi = '$doTuoi',
                mo_ta = '$moTa'
                poster = '$poster'
                trailer = '$trailer'
                WHERE id = $id";
                }
                else{
                $sql_update = "UPDATE phim SET
                ten_phim = '$tenPhim',
                quoc_gia = '$quocGia',
                dao_dien_id = '$daoDienId',
                nam = '$ngaySanXuat',
                do_tuoi = '$doTuoi',
                mo_ta = '$moTa'
                trailer = '$trailer'
                WHERE id = $id";

                $result_update = mysqli_query($conn, $sql_update);
                }
                if ($result_update) {

                // Cập nhật thể loại
                $sql_update_theloai = "UPDATE phim_the_loai
                                        SET the_loai_id = $theLoai
                                        WHERE phim_id = $id";

                $result_update_theloai = mysqli_query($conn, $sql_update_theloai);

                if ($result_update_theloai) {
                    echo "<script>
                        window.location.href='index.php?page_layout=phim';
                    </script>";
                    exit;
                } else {
                    echo "Lỗi cập nhật thể loại: " . mysqli_error($conn);
                }

            } else {
                echo "Lỗi cập nhật phim: " . mysqli_error($conn);
            }

        } else {
            echo "<p style='color:red'>Vui lòng nhập đầy đủ thông tin!</p>";
        }
    }
    ?>
</div>
</body>
</html>