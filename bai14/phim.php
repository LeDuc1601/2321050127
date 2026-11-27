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
        tr, th, td {
            border: 1px solid black;
        }
        .btn-add{
            background-color: green;
            padding: 10px;
        }
        .capnhatphim{
            background-color: green;
            border-radius:5px;
        }
        .xoaphim{
            background-color: red;
            border-radius:5px;
        }
    </style>
</head>
<body>
    <h1>Phim</h1>
    <div style="margin:20px 0;">
        <a class="btn-add" href="index.php?page_layout=themphim">Them Phim</a>
    </div>
    <?php
        $sql = "SELECT 
            p.id AS phim_id,
            p.ten_phim,
            p.quoc_gia,
            dd.ho_ten,
            p.nam,
            p.do_tuoi,
            p.mo_ta,
            p.poster,
            p.trailer,
            tl.ten_the_loai
        FROM phim p
        JOIN dao_dien dd ON p.dao_dien_id = dd.id
        JOIN phim_the_loai ptl ON p.id = ptl.phim_id
        JOIN the_loai tl ON tl.id = ptl.the_loai_id";

$result = mysqli_query($conn, $sql);
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Ten phim</th>
            <th>Quoc gia</th>
            <th>Dao dien id</th>
            <th>Nam san xuat</th>
            <th>Do tuoi</th>
            <th>Mo ta</th>
            <th>Ten The Loai</th>
            <th>poster</th>
            <th>trailer</th>
            <th>Chuc nang</th>
        </tr>
    <?php
        while($row = mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?php echo $row['phim_id']?></td>
            <td><?php echo $row['ten_phim']?></td>
            <td><?php echo $row['quoc_gia']?></td>
            <td><?php echo $row['ho_ten']?></td>
            <td><?php echo $row['nam']?></td>
            <td><?php echo $row['do_tuoi']?></td>
            <td><?php echo $row['mo_ta']?></td>
            <td><?php echo $row['ten_the_loai']?></td>
            <td><img src="<?php echo $row['poster']?>" style="width:200px ; height:100px;"></td>
            <td><?php echo $row['trailer']?></td>
            <td>
                <a href="index.php?page_layout=capnhatphim&id=<?php echo $row['phim_id']?>" class="capnhatphim">Cap nhat</a>
                <a href="index.php?page_layout=xoaphim&id=<?php echo $row['phim_id']?>" class="xoaphim">Xoa</a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>