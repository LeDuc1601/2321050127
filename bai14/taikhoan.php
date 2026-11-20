<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
        }
        tr,th,td{
            border: 1px solid black;
        }
        .btn-atd{
            background-color:green;
            padding:10px;
        
        }
        .capnhat{
            background-color:green;
            border-radius:5px;
        }
        .xoa{
            background-color:red;
            border-radius:5px;
        }
    </style>
</head>
<body>
    <h1>Tai Khoan</h1>
    <div style="margin:20px 0;">
        <a class="btn-atd" href="index.php?page_layout=themtaikhoan">Them tai khoan</a>
    </div>
    <?php
        $sql ="select * from nguoi_dung";
        $result = mysqli_query($conn,$sql);

    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Ten dang nhap</th>
            <th>email</th>
            <th>Ho ten</th>
            <th>Ngay sinh</th>
            <th>SDT</th>
            <th>Gioi tinh</th>
            <th>Chuc nang</th>
        </tr>
        <?php
            while($row= mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['ten_dang_nhap']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['ho_ten']?></td>
            <td><?php echo $row['ngay_sinh']?></td>
            <td><?php echo $row['sdt']?></td>
            <td><?php echo $row['gioi_tinh']==true?"Nam":"Nu" ?></td>
            <td>
                <a class="capnhat" href= "index.php?page_layout=capnhattaikhoan&id=<?php echo $row['id']?>" >Cap nhat</a>
                <a class="xoa" href= "index.php?page_layout=xoataikhoan&id=<?php echo $row['id']?>" >Xoa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>