/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.3.23-MariaDB-1 : Database - BMT
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`BMT` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `BMT`;

/*Table structure for table `akad` */

DROP TABLE IF EXISTS `akad`;

CREATE TABLE `akad` (
  `no_surat` varchar(15) NOT NULL,
  `id_pemb` varchar(10) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `status_akad` varchar(15) NOT NULL,
  `bukti_tf` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`no_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akad` */

insert  into `akad`(`no_surat`,`id_pemb`,`NIP`,`status_akad`,`bukti_tf`) values 
('20200813001','PMBL004','200','Terealisasi','1308202014321520190524_082444.jpg');

/*Table structure for table `angsuran` */

DROP TABLE IF EXISTS `angsuran`;

CREATE TABLE `angsuran` (
  `no_transaksi` varchar(30) NOT NULL,
  `angsuran_ke` varchar(3) NOT NULL,
  `id_pemb` varchar(10) NOT NULL,
  `jml_bayar` varchar(9) DEFAULT NULL,
  `nama_pembayar` varchar(50) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bilang_angsuran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `angsuran` */

insert  into `angsuran`(`no_transaksi`,`angsuran_ke`,`id_pemb`,`jml_bayar`,`nama_pembayar`,`tgl_bayar`,`bilang_angsuran`) values 
('10082020001','1','PMBL001','975','GAZALI','2020-08-10','sembilan ratus tujuh puluh lima'),
('12082020002','1','PMBL003','333','FALAHI','2020-08-12','tigaratus tigapuluribu rupiah'),
('12082020003','2','PMBL003','333','FALAHI','2020-08-13','tigaratus tigapuluribu rupiah'),
('12082020004','1','PMBL004','2066666','GAZALI','2020-08-24','dua juta enam puluh ribu enam ratus enam puluh enam'),
('13082020005','1','PMBL003','333','FALAHI','2020-08-13','tigaratus tigapuluribu rupiah');

/*Table structure for table `data_keuangan` */

DROP TABLE IF EXISTS `data_keuangan`;

CREATE TABLE `data_keuangan` (
  `id_keu` varchar(10) NOT NULL,
  `NIP` varchar(12) NOT NULL,
  `peng_bersih` varchar(10) NOT NULL,
  `peng_bersih_istri` varchar(10) NOT NULL,
  `peng_tambahan` varchar(10) NOT NULL,
  `pengeluaran` varchar(10) NOT NULL,
  `jns_pembelian` varchar(25) NOT NULL,
  `jml_pembelian` varchar(10) NOT NULL,
  `nama_kreditur` varchar(50) NOT NULL,
  `tgl_tempo` date NOT NULL,
  PRIMARY KEY (`id_keu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_keuangan` */

insert  into `data_keuangan`(`id_keu`,`NIP`,`peng_bersih`,`peng_bersih_istri`,`peng_tambahan`,`pengeluaran`,`jns_pembelian`,`jml_pembelian`,`nama_kreditur`,`tgl_tempo`) values 
('KEU001','980','5000000','9000000','100000','8000000','motor','9000000','jali','2020-09-05'),
('KEU002','980','5000000','123','100000','8000000','laptop','9000000','sapa','2020-08-20');

/*Table structure for table `data_nasabah` */

DROP TABLE IF EXISTS `data_nasabah`;

CREATE TABLE `data_nasabah` (
  `NIP` int(12) NOT NULL,
  `nama_nasabah` varchar(100) NOT NULL,
  `NIK` varchar(12) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `pembelian` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_nasabah` */

insert  into `data_nasabah`(`NIP`,`nama_nasabah`,`NIK`,`password`,`tempatlahir`,`tgl_lahir`,`jk`,`no_hp`,`jabatan`,`alamat`,`pembelian`) values 
(9,'Falahi','998','123','Bogor','1994-06-07','L','1234567890','Dosen','bogor',NULL),
(200,'aryo','687','247','Bogor','2020-08-22','L','087865432432','Staff','citayam asri',NULL),
(980,'Ghazali','123456','qwe','Jakarta','2000-02-09','L','1234567890','Staff','BOGOR',NULL);

/*Table structure for table `jaminan` */

DROP TABLE IF EXISTS `jaminan`;

CREATE TABLE `jaminan` (
  `id_jaminan` varchar(10) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `id_pemb` varchar(10) DEFAULT NULL,
  `jns_jaminan` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `th_dibangun` varchar(4) DEFAULT NULL,
  `luas_bangunan` varchar(10) DEFAULT NULL,
  `luas_tanah` varchar(10) DEFAULT NULL,
  `harga_taksiran` varchar(10) DEFAULT NULL,
  `stat_tanah` varchar(15) DEFAULT NULL,
  `bentuk_surat` varchar(15) DEFAULT NULL,
  `pemilik_jaminan` varchar(50) DEFAULT NULL,
  `merk_kendaraan` varchar(15) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `no_BPKB` varchar(25) DEFAULT NULL,
  `no_mesin` varchar(25) DEFAULT NULL,
  `nama_di_BPKB` varchar(25) DEFAULT NULL,
  `harga_kendaraan` varchar(10) DEFAULT NULL,
  `bukti_jaminan` varchar(200) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status_jaminan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jaminan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jaminan` */

insert  into `jaminan`(`id_jaminan`,`NIP`,`id_pemb`,`jns_jaminan`,`alamat`,`th_dibangun`,`luas_bangunan`,`luas_tanah`,`harga_taksiran`,`stat_tanah`,`bentuk_surat`,`pemilik_jaminan`,`merk_kendaraan`,`type`,`tahun`,`warna`,`no_polisi`,`no_BPKB`,`no_mesin`,`nama_di_BPKB`,`harga_kendaraan`,`bukti_jaminan`,`tgl_terima`,`tgl_kembali`,`status_jaminan`) values 
('JAMN001','980',NULL,'BPKN Motor','','','','','','HGB','Sertifikat','','Honda','matic','2019','hitam','B 9812 AE','12313','1231313312','Ghazali','5000000',NULL,NULL,NULL,NULL),
('JAMN002','980',NULL,'BPKN Motor','','','','','','HGB','Sertifikat','','honda beat','matic','2018','merah','B 9812 AEW','1231323','12313123','Ghazali','5000000',NULL,NULL,NULL,NULL),
('JAMN003','9',NULL,'Rumah','bogor, jawa barat','2009','1 hektar','','10000','Hak Milik','Sertifikat','','','','','','','','','','',NULL,NULL,NULL,NULL),
('JAMN004','200',NULL,'BPKN Motor','','2009','1 hektar','','','HGB','Sertifikat','','Honda','matic','2018','hitam','B 9812 AE','4563454','3456754','ahan','12000000',NULL,NULL,NULL,NULL),
('JAMN005','200',NULL,'Rumah','jl. raya sawangan','2010','300 m','300','500000000','Hak Milik','Akta Jual Beli','aryo','','','','','','','','','',NULL,NULL,NULL,NULL);

/*Table structure for table `jurnal` */

DROP TABLE IF EXISTS `jurnal`;

CREATE TABLE `jurnal` (
  `id_jurnal` varchar(50) NOT NULL,
  `tgl_bayar` varchar(50) DEFAULT NULL,
  `akun` varchar(100) DEFAULT NULL,
  `debit` varchar(20) DEFAULT NULL,
  `kredit` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_peg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurnal` */

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `NIP` int(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`NIP`,`password`,`nama`,`jabatan`) values 
(98,'123qwe','Jeni Kasturi','Staff'),
(99,'123qwe','ahmad gozali','CEO'),
(100,'aw123','sobari','admin'),
(123,'','Lionel Messi','surveyor');

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pemb` varchar(10) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `namabarang` varchar(10) NOT NULL,
  `hrg_barang` varchar(10) NOT NULL,
  `persen_margin` varchar(10) NOT NULL,
  `margin` varchar(10) NOT NULL,
  `jml_pemb` varchar(10) NOT NULL,
  `durasi_pemb` varchar(8) NOT NULL,
  `angsuran` varchar(10) NOT NULL,
  `sisa_angsuran` varchar(20) DEFAULT NULL,
  `realisasi` varchar(15) NOT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `status_pemb` varchar(15) DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `tgl_pembelian` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id_pemb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id_pemb`,`NIP`,`namabarang`,`hrg_barang`,`persen_margin`,`margin`,`jml_pemb`,`durasi_pemb`,`angsuran`,`sisa_angsuran`,`realisasi`,`tgl_realisasi`,`status_pemb`,`keperluan`,`tgl_pembelian`,`tgl_selesai`) values 
('PMBL001','980','Sembako','9000','2.5%','225','11700','12','975','10725','DISETUJUI','2020-08-10','BERJALAN','keperluan rumah','2020-08-03','2020-08-10'),
('PMBL002','980','MOtor','20000','2.5%','500','25992','12','2166','0','DISETUJUI','2020-08-07','SELESAI','keperluan rumah','2020-08-12','2020-08-13'),
('PMBL003','9','Sembako','5000','2.5%','125','7992','24','333','6993','DISETUJUI','2020-08-07','BERJALAN','keperluan rumah','2020-08-12',NULL),
('PMBL004','200','MOtor','20000000','2%','400000','24799992','12','2066666','24799992','DISETUJUI','2020-08-07','BERJALAN','berdagang','2020-08-13',NULL);

/*Table structure for table `referensi` */

DROP TABLE IF EXISTS `referensi`;

CREATE TABLE `referensi` (
  `id_ref` varchar(10) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `nama_penjamin` varchar(50) NOT NULL,
  `NIK` varchar(12) NOT NULL,
  `ktp` varchar(200) DEFAULT NULL,
  `hubungan` varchar(50) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `referensi` */

insert  into `referensi`(`id_ref`,`NIP`,`nama_penjamin`,`NIK`,`ktp`,`hubungan`,`pekerjaan`,`jabatan`,`alamat`,`no_tlp`) values 
('REFR001','980','Ghazali','123','10082020153036KOSIKA.png','awda','Mahasiswa','Sekolah','dawda','123434'),
('REFR002','980','Ghazali','1234','12082020105454Picture1.JPG','DIRI SENDIRI','STAFF','BAG.AKADEMIK','BOGOR','123434'),
('REFR003','9','falahi','998','1208202011130420190908_173243.jpg','DIRI SENDIRI','STAFF','dosen','bogor','123434'),
('REFR004','200','falahi','1234','12082020114618IMG-20180107-WA0013.jpg','DIRI SENDIRI','STAFF','dosen','komplek perdagangan','085687678763'),
('REFR005','200','soni','245','12082020115825IMG-20180107-WA0013.jpg','DIRI SENDIRI','STAFF','dosen','taman raya citayam','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
