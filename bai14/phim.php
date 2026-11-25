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
    <h1>Phim</h1>
    <div style="margin:20px 0;">
        <a class="btn-atd" href="index.php?page_layout=themphim">Them Phim</a>
    </div>
    <?php
        $sql = "select * from phim p
        join dao_dien dd
        on p.dao_dien_id = dd.id
        join phim_the_loai ptl
        on p.id = ptl.phim_id
        join the_loai tl
        on tl.id = ptl.the_loai_id";
        $result = mysqli_query($conn,$sql);
    ?>
    <?php
        $sql ="select * from phim";
        $result = mysqli_query($conn,$sql);

    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Ten Phim</th>
            <th>Quoc gia</th>
            <th>Dao dien</th>
            <th>The loai</th>
            <th>Nam</th>
            <th>Do tuoi</th>
            <th>Mo ta</th>
            <th>Chuc nang</th>
        </tr>
        <?php
            while($row= mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['ten_phim']?></td>
            <td><?php echo $row['quoc_gia']?></td>
            <td><?php echo $row['dao_dien_id']?></td>
            <td><?php echo $row['the_loai_id']?></td>
            <td><?php echo $row['nam']?></td>
            <td><?php echo $row['do_tuoi']?></td>
            <td><?php echo $row['mo_ta'] ?></td>
            <td>
                <a class="capnhat" href= "index.php?page_layout=capnhatphim&id=<?php echo $row['id']?>" >Cap nhat</a>
                <a class="xoa" href= "index.php?page_layout=xoaphim&id=<?php echo $row['id']?>" >Xoa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>