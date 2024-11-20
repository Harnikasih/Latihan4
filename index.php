<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Barang</title>
</head>
<body>
    <table border="1">
        <caption>Data Penjualan</caption>
        <tr>
            <th>No</th>
            <th>Tanggal Penjualan</th>
            <th>Nama_Produk</th>
            <th>Harga</th>
            <th>Jumlah Terjual</th>
            <th>Total_Penjualan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if(isset($_GET['filter'])){
            $query = "SELECT * FROM penjualan WHERE harga='$_GET[filter]'";
        }else{
            $query = "SELECT * FROM penjualan";
        }
        $result = $mysqli->query($query);
        $no=0;
        while($row = $result->fetch_assoc()){
            $no++;
        ?>
            <tr>
                <td><?= $no;?></td>
                <td><?= $row['Tanggal_Penjualan'];?></td>
                <td><?= $row['Nama_Produk'];?></td>
                <td><?= $row['Harga'];?></td>
                <td><?= $row['Jumlah_Terjual'];?></td>
                <td><?= $row['Total_Penjualan'];?></td>
                <td>
                    <a href="<?= 'form-edit.php?id='.$row['ID'];?>">Edit</a>
                    <a href="<?= 'hapus-data.php?id='.$row['ID'];?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <!-- Filter Button Below the Table -->
    <form action="" method="get" style="margin-top: 10px;">
        <select name="filter">
            <?php
            $q_harga = "SELECT harga FROM penjualan GROUP BY harga";
            $r_harga = $mysqli->query($q_harga);
            while($data_harga = $r_harga->fetch_assoc()){
                ?>
                <option value="<?= $data_harga['harga'];?>"><?php echo $data_harga['harga'];?></option>
            <?php
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <a href="form-data.php">Tambah Data</a>
</body>
</html>