<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul{
            list-style: none;
            display: flex;
            gap:10px;
            background-color:blue;
            padding:20px;
        }

        a{
            text-decoration:none;
            color:white;
        }

    </style>

</head>
<body>

    <?php
        session_start();
        if(isset($_SESSION['dangnhap'])){
            header("location: index.php" && $_SESSION['dangnhap']=="thanhcong");
        }
        include 'connect.php';
    ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?page_layout=trangchu">Trang Chu</a></li>
                <li><a href="index.php?page_layout=taikhoan">Tai Khoan</a></li>
                <li><a href="index.php?page_layout=danhmuc">Danh Muc</a></li>
                <li><a href="index.php?page_layout=phim">Phim</a></li>
            </ul>
        </nav>
    </header>

    <?php
        // echo $_GET['page_layout'];
        if(isset($_GET['page_layout'])){
            $page= $_GET['page_layout'];
            switch($page){
                case'trangchu';
                    include 'trangchu.php';
                    break;
                case'taikhoan';
                    include 'taikhoan.php';
                    break;
                case'danhmuc';
                    include 'danhmuc.php';
                    break;
                case'phim';
                    include 'phim.php';
                    break;
                case'themtaikhoan';
                    include 'themtaikhoan.php';
                    break;
            }
        }
    ?>
</body>
</html>