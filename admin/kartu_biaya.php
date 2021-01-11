<?php
include 'koneksi.php';



$id_pemb = $_GET['id_pemb'];

$sql = mysqli_query($conn, "SELECT data_nasabah.nama_nasabah, data_nasabah.NIP, data_nasabah.alamat, pembelian.id_pemb from pembelian inner join data_nasabah on pembelian.NIP=data_nasabah.NIP where pembelian.id_pemb='$id_pemb'");
$row = mysqli_fetch_array($sql);


$x = $row['id_pemb'];
$NIP = $row['NIP'];
$nama_nasabah = $row['nama_nasabah'];
$alamat = $row['alamat'];


$document = file_get_contents("kartu_biaya.rtf");
$document = str_replace("#NOBIAYA", $x, $document);
$document = str_replace("#IDANGGOTA", $NIP, $document);
$document = str_replace("#NAMA", $nama_nasabah, $document);
$document = str_replace("#ALAMAT", $alamat, $document);


header("Content-type: application/msword");
header("Content-disposition: inline; filename=kartu_pembelian.doc");
header("Content-length: ".strlen($document));
echo $document;

?>