
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
    $sql_theloai = "SELECT * FROM the_loai";
    $result_theloai = mysqli_query($conn, $sql_theloai);
    ?>
    <?php
    $sql_daodien = "SELECT * FROM dao_dien";
    $result_daodien = mysqli_query($conn, $sql_daodien);
    ?>
    <h1>Them phim</h1>
<div class="container">
    <form action="index.php?page_layout=themphim" method="POST" enctype="multipart/form-data">
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
            <button>Thêm</button>
        </div>
    </form>
    <?php
     if(   isset($_POST['tenPhim']) && 
           isset($_POST['quocGia']) && 
           isset($_POST['ngaySanXuat']) && 
           isset($_POST['daoDienId']) && 
           isset($_POST['doTuoi']) &&
           isset($_POST['the_loai']) &&
           isset($_POST['moTa']) &&
           isset($_POST['trailer'])
           ) 
        {

        $tenPhim = $_POST['tenPhim'];
        $quocGia = $_POST['quocGia'];
        $daoDienId = $_POST['daoDienId'];
        $theLoai = $_POST['the_loai'];
        $ngaySanXuat = $_POST['ngaySanXuat'];
        $doTuoi = $_POST['doTuoi'];
        $moTa = $_POST['moTa'];
        $trailer = $_POST['trailer'];
        

        if (
            !empty($tenPhim) &&
            !empty($quocGia) &&
            !empty($daoDienId) &&
            !empty($theLoai) &&
            !empty($ngaySanXuat) &&
            !empty($doTuoi) &&
            !empty($moTa) &&
            !empty($trailer) 
            
        ) {

                #########Bắt đầu xử lý thêm ảnh
                // Xử lý ảnh
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Kiểm tra xem file ảnh có hợp lệ không
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "File không phải là ảnh.";
                        $uploadOk = 0;
                    }
                }

                // Kiểm tra nếu file đã tồn tại
                if (file_exists($target_file)) {
                    echo "File này đã tồn tại trên hệ thông";
                    $uploadOk = 2;
                }

                // Kiểm tra kích thước file
                // if ($_FILES["fileToUpload"]["size"] > 500000) {
                //     echo "File quá lớn";
                //     $uploadOk = 0;
                // }

                // Cho phép các định dạng file ảnh nhất định
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                    $uploadOk = 0;
                }
                
                #########Kết thúc xử lý ảnh
                if($uploadOk == 0){
                    echo "File của bạn chưa được tải lên";
                }else{
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            // Bước 1: Thêm phim vào bảng phim
            $sql = "INSERT INTO phim
            (ten_phim, quoc_gia, dao_dien_id, nam, do_tuoi, mo_ta,poster,trailer)
            VALUES
            ('$tenPhim', '$quocGia', '$daoDienId',
            '$ngaySanXuat', '$doTuoi', '$moTa','$target_file','$trailer')";

            $result = mysqli_query($conn, $sql);

            if ($result) {

                // Lấy ID phim vừa được thêm
                $phimId = mysqli_insert_id($conn);

                // Bước 2: Thêm thể loại vào bảng phim_the_loai
                $sql_theloai = "INSERT INTO phim_the_loai
                (phim_id, the_loai_id)
                VALUES
                ('$phimId', '$theLoai')";

                $result_theloai = mysqli_query($conn, $sql_theloai);

                if ($result_theloai) {
                    echo '<script>
                        window.location.href="index.php?page_layout=phim";
                    </script>';
                    exit;
                } else {
                    echo "Lỗi thêm thể loại: " . mysqli_error($conn);
                }

            } else {
                echo "Lỗi thêm phim: " . mysqli_error($conn);
            }

        } else {
            echo "<p style='color:red'>Vui lòng nhập đầy đủ thông tin!</p>";
        }
    }}}
    ?>
</div>
</body>
</html>