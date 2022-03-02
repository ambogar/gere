<?php

// Include config file
require_once "../config.php";


// functions tables

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}

//tanggal indo

function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

function counting_hari (){
    global $conn;
	$today = date("Y-m-d");
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu WHERE time='$today'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
        echo count($rows);

}

function counting_bulan (){
    global $conn;
	$today = date("Y-m");
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu WHERE time LIKE '%$today%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
        echo count($rows);

}

function counting_tahun (){
    global $conn;
	$today = date("Y");
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu WHERE time LIKE '%$today%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
        echo count($rows);

}

function counting_total (){
    global $conn;
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
        echo count($rows);

}

function data_chart($month){
    global $conn;

    $year = date('Y');
    $date = "$year-$month";
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu WHERE time LIKE '%$date%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
    echo count($rows);

}

function data_keperluan($keperluan){
    global $conn;
    $query = mysqli_query($conn,"SELECT * FROM daftar_tamu WHERE keperluan LIKE '%$keperluan%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
    echo count($rows);

}

function delete ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM daftar_tamu WHERE id=$id" );
}


?>