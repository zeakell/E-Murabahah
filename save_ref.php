<?php
    include ('koneksi.php');
    
	if (isset($_POST['submit'])) { 
	
            $id_ref = $_POST['id_ref'];
            $NIP = $_POST['NIP'];
            $nama_penjamin= $_POST['nama_penjamin'];
            $NIK = $_POST['NIK'];
            $hubungan =$_POST['hubungan'];
            $pekerjaan = $_POST['pekerjaan'];
            $jabatan= $_POST['jabatan'];
            $alamat= $_POST['alamat'];
            $no_tlp = $_POST['no_tlp'];

            $ktp1 = $_FILES['ktp1']['name'];
            $source =$_FILES['ktp1']['tmp_name'];
            $ktp = date('dmYHis').$ktp1;
            $pathktp = 'img/ktpref/'.$ktp;

            $pindah = move_uploaded_file($source, $pathktp);

            if ($pindah) {

                $sql = "insert into referensi (id_ref, NIP, nama_penjamin, NIK, ktp, hubungan, pekerjaan, jabatan, alamat, no_tlp) values ('$id_ref', '$NIP', '$nama_penjamin', '$NIK', '$ktp', '$hubungan', '$pekerjaan', '$jabatan', '$alamat', '$no_tlp')";
        
                if (mysqli_query($conn, $sql) ) {
                    echo "<script>alert('Data Anda telah tersimpan');window.location='mainmenu.php'</script>";
                }

                else{
                    echo "Error: ". $sql . $pindah . "<br>" . mysqli_error($conn);
                }
            }
            
        }
    else
    {
        echo "Form Tidak Boleh Kosong <br>";
        echo "<a href='data_referensi.php'>Kembali ke Form</a>";
    }
	
?>