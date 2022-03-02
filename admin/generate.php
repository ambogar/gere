<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php

    // Include config file
    require_once "../config.php";
    require_once "functions.php";

    // query buka lemari
    $dokumen = query("SELECT * FROM daftar_tamu ORDER BY id DESC");
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Daftar_Pengunjung.xls");
	?>
 
	<center>
		<h1>Daftar Pengunjung<br/>Pengadilan Agama Larantuka</h1>
        <p>Sampai <?php
                                    $today=  date('Y-m-d');
                                    $tanggal = date('Y-m-d', strtotime($today));
                                    echo tanggal_indo($tanggal, true);
                                ?>
        </p>
	</center>
 
	<table border="1">
        <tr>
            <td>No. </td>
            <td>Nama</td> 
            <td>Kelamin</td> 
            <td>Alamat</td> 
            <td> No. HP</td>
            <td>Keperluan</td> 
            <td>Time</td> 
        </tr>
		<?php $i=1;?>
        <?php foreach ($dokumen as $dok):?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $dok["nama"]; ?></td>
            <td><?php echo $dok["kelamin"]; ?></td>
            <td><?php echo $dok["alamat"]; ?></td>
            <td><?php echo $dok["nohp"]; ?></td>
             <td><?php echo $dok["keperluan"]; ?></td>
            <td>
                <?php  
                    $tanggal = date('Y-m-d', strtotime($dok["time"]));
                    echo tanggal_indo($tanggal, true);
                ?>
            </td>
        </tr>
            <?php $i++?>
            <?php endforeach?>
	</table>
</body>
</html>