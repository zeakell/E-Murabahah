<?php include('connection.php');

    //cek dahulu, jika tombol simpan di klik
    if(isset($_POST['id_jaminan']) ) {
        $id=$_POST['id_jaminan'];
        $jns_jaminan= $_POST['jns_jaminan'];
		$alamat = $_POST['alamat'];
		$th_dibangun = $_POST['th_dibangun'];
		$luas_bangunan = $_POST['luas_bangunan'];
		$luas_tanah= $_POST['luas_tanah'];
		
		$harga_taksiran = $_POST['harga_taksiran'];
		$stat_tanah = $_POST['stat_tanah'];
		$bentuk_surat = $_POST['bentuk_surat'];
		$pemilik_jaminan = $_POST['pemilik_jaminan'];
		
		$merk_kendaraan = $_POST['merk_kendaraan'];
		$type = $_POST['type'];
		$tahun = $_POST['tahun'];
		$warna = $_POST['warna'];
		$no_polisi = $_POST['no_polisi'];
		
		$no_BPKB = $_POST['no_BPKB'];
		$no_mesin = $_POST['no_mesin'];
		$nama_di_BPKB= $_POST['nama_di_BPKB'];
		$harga_kendaraan = $_POST['harga_kendaraan'];
		
		
      

     //melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id


 $sql = "UPDATE jaminan SET jns_jaminan='$jns_jaminan', alamat='$alamat', th_dibangun='$th_dibangun', luas_bangunan='$luas_bangunan', luas_tanah='$luas_tanah', harga_taksiran='$harga_taksiran', stat_tanah='$stat_tanah', bentuk_surat='$bentuk_surat', pemilik_jaminan='$pemilik_jaminan', merk_kendaraan='$merk_kendaraan', type='$type', tahun='$tahun', warna='$warna', no_polisi='$no_polisi', no_BPKB='$no_BPKB', no_mesin='$no_mesin', nama_di_BPKB='$nama_di_BPKB', harga_kendaraan='$harga_kendaraan' WHERE id_jaminan='$id'";

  if (mysqli_query($conn, $sql)) {         
      echo "Record edited successfully"; 
      header("location: data_jaminan.php");   
     } else {         
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     } 
      }           
     mysqli_close($conn); ?> 
 
