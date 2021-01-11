<?php  include('connection.php'); 

        if (isset($_POST['id_ref']) ) {

        $id_ref = $_POST['id_ref'];
        $NIP = $_POST['NIP'];
        $nama_penjamin= $_POST['nama_penjamin'];
        $NIK = $_POST['NIK'];
        $hubungan =$_POST['hubungan'];
        $pekerjaan = $_POST['pekerjaan'];
        $jabatan= $_POST['jabatan'];
        $alamat= $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];

        if (isset($_POST['ubah_foto']))
        {

        $ktp1 = $_FILES['ktp1']['name'];
        $source =$_FILES['ktp1']['tmp_name'];
        $fotoktp = date('dmYHis').$ktp1;
        $pathktp = 'img/ktpref/'.$fotoktp;
            
        $pindah = move_uploaded_file($source, $pathktp);

        if ($pindah) {
            $query = "select * from referensi where id_ref='".$id_ref."'";
            $sql = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($sql);

        if(is_file("img/ktpref/".$data['ktp1'])){
            unlink("img/ktpref/".$data['ktp1']);

        $query = "UPDATE referensi SET id_ref='$id_ref', NIP='$NIP', nama_penjamin='$nama_penjamin', NIK='$NIK', hubungan='$hubungan', pekerjaan='$pekerjaan', jabatan='$jabatan', alamat='$alamat', no_tlp='$no_tlp', ktp1='$fotoktp'  WHERE id_ref='$id_ref'"; 
        $sql =mysqli_query($conn, $query);
            if($sql) {
                header("location: data_referensi.php");
            } 
            else {
                echo "Maaf, terjadi kesalahan saat mencoba menyimpan data";
                echo "<br><a href='E_Ref.php'>Kembali ke form</a>";
            
        }
        }
        else{
                echo "Maaf, terjadi kesalahan saat mencoba menyimpan data2";
                        echo "<br><a href='E_Ref.php'>Kembali ke Form</a>";
            }
            }	
        else {
            echo "Maaf, terjadi kesalahan saat mencoba menyimpang data3";
                        echo "<br><a href='E_Ref.php'>Kembali ke Form</a>";
            }
        }
    else {
        $query =mysqli_query($conn,"UPDATE referensi SET id_ref='$id_ref', NIP='$NIP', nama_penjamin='$nama_penjamin', NIK='$NIK', hubungan='$hubungan', pekerjaan='$pekerjaan', jabatan='$jabatan', alamat='$alamat', no_tlp='$no_tlp',   WHERE id_ref='$id'"); 
        
        if($query){
            header("location: data_referensi.php");
        }
        else{
            echo "Maaf, terjadi kesalahan saat mencoba menyimpang data4";
                        echo "<br><a href='E_Ref.php'>Kembali ke Form</a>";
        }
    }
    }
    else{
    echo "Maaf, form tidak boleh kosong";
    echo "<br><a href='dfeditrumah.php'>Kembali ke Form</a>";
            }
?>
