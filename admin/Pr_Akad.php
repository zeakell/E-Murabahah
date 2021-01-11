<?php
    include ('koneksi.php');
    
	if (isset($_POST['submit'])) { 
	
            $no_surat = $_POST['no_surat'];
            $id_pemb = $_POST['id_pemb'];
            $NIP = $_POST['NIP'];
            $status_akad= $_POST['status_akad'];


            $bukti_tf1 = $_FILES['bukti_tf1']['name'];
            $source =$_FILES['bukti_tf1']['tmp_name'];
            $bukti_tf = date('dmYHis').$bukti_tf1;
            $pathktp = 'buktitf/'.$bukti_tf;

            $pindah = move_uploaded_file($source, $pathktp);

            if ($pindah) {

                $sql = "insert into akad (no_surat, id_pemb, NIP, status_akad, bukti_tf) values ('$no_surat', '$id_pemb', '$NIP', '$status_akad', '$bukti_tf')";
        
                if (mysqli_query($conn, $sql) ) {
                    echo "<script>alert('Data anda berhasil tersimpan');window.location='tabel_akad.php'</script>";
                }

                else{
                    echo "Error: ". $sql . $pindah . "<br>" . mysqli_error($conn);
                }
            }
            
        }
    else
    {
        echo "Form Tidak Boleh Kosong <br>";
        echo "<a href='tmbh_akad.php'>Kembali ke Form</a>";
    }
	
?>