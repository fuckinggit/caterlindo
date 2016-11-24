/*
Navicat MySQL Data Transfer

Source Server         : MySQL to Navicat
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : db_caterlindo_hrm

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-11-21 15:42:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_admin` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `tipe_admin` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` varchar(3) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `username` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_buat` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_edit` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `session_id` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_admin`,`kd_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', '001', '0', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '09-11-2016', null, '63td8ogfb7lc8dob7uhscbp5t7');
INSERT INTO `tb_admin` VALUES ('8', '002', '0', '', 'qodris', 'bc2179f485e17694f5fd3a4022a032a2', '1', '09-11-2016', null, null);

-- ----------------------------
-- Table structure for `tb_bagian`
-- ----------------------------
DROP TABLE IF EXISTS `tb_bagian`;
CREATE TABLE `tb_bagian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_bagian` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `kd_unit` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_bagian` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_bagian
-- ----------------------------
INSERT INTO `tb_bagian` VALUES ('3', '02', '01', 'Marking');
INSERT INTO `tb_bagian` VALUES ('4', '03', '01', 'Bending');
INSERT INTO `tb_bagian` VALUES ('5', '04', '01', 'Assembling');
INSERT INTO `tb_bagian` VALUES ('6', '05', '01', 'Finishing');
INSERT INTO `tb_bagian` VALUES ('7', '06', '01', 'Packing');
INSERT INTO `tb_bagian` VALUES ('8', '07', '01', 'Finish Good');
INSERT INTO `tb_bagian` VALUES ('9', '08', '01', 'Gudang');
INSERT INTO `tb_bagian` VALUES ('10', '09', '01', 'QC');
INSERT INTO `tb_bagian` VALUES ('11', '10', '01', 'Maintenance');
INSERT INTO `tb_bagian` VALUES ('12', '11', '01', 'General/Driver');

-- ----------------------------
-- Table structure for `tb_bahasa`
-- ----------------------------
DROP TABLE IF EXISTS `tb_bahasa`;
CREATE TABLE `tb_bahasa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_bahasa` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_bahasa` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_bahasa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_bahasa
-- ----------------------------
INSERT INTO `tb_bahasa` VALUES ('1', '01', 'Bahasa Inggris');

-- ----------------------------
-- Table structure for `tb_bank`
-- ----------------------------
DROP TABLE IF EXISTS `tb_bank`;
CREATE TABLE `tb_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nm_bank` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_akun` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `no_rekening` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_bank
-- ----------------------------
INSERT INTO `tb_bank` VALUES ('1', 'BCA', 'PT Caterlindo', '3521456784');

-- ----------------------------
-- Table structure for `tb_contoh`
-- ----------------------------
DROP TABLE IF EXISTS `tb_contoh`;
CREATE TABLE `tb_contoh` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_bagian` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `thn` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `nik_karyawan` varchar(9) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_contoh
-- ----------------------------
INSERT INTO `tb_contoh` VALUES ('1', '05', '97', '001', '05.97.001');
INSERT INTO `tb_contoh` VALUES ('2', '05', '97', '003', '05.97.003');
INSERT INTO `tb_contoh` VALUES ('3', '04', '97', '004', '04.97.004');
INSERT INTO `tb_contoh` VALUES ('4', '10', '98', '006', '10.98.006');
INSERT INTO `tb_contoh` VALUES ('5', '02', '99', '007', '02.99.007');
INSERT INTO `tb_contoh` VALUES ('6', '05', '99', '008', '05.99.008');
INSERT INTO `tb_contoh` VALUES ('7', '04', '99', '009', '04.99.009');
INSERT INTO `tb_contoh` VALUES ('8', '07', '99', '010', '07.99.010');
INSERT INTO `tb_contoh` VALUES ('9', '05', '99', '012', '05.99.012');
INSERT INTO `tb_contoh` VALUES ('10', '04', '99', '014', '04.99.014');
INSERT INTO `tb_contoh` VALUES ('11', '08', '99', '015', '08.99.015');
INSERT INTO `tb_contoh` VALUES ('12', '03', '99', '016', '03.99.016');
INSERT INTO `tb_contoh` VALUES ('13', '10', '00', '017', '10.00.017');
INSERT INTO `tb_contoh` VALUES ('14', '06', '01', '025', '06.01.025');
INSERT INTO `tb_contoh` VALUES ('15', '04', '01', '027', '04.01.027');
INSERT INTO `tb_contoh` VALUES ('16', '09', '02', '028', '09.02.028');
INSERT INTO `tb_contoh` VALUES ('17', '06', '02', '029', '06.02.029');
INSERT INTO `tb_contoh` VALUES ('18', '04', '03', '030', '04.03.030');
INSERT INTO `tb_contoh` VALUES ('19', '05', '03', '032', '05.03.032');
INSERT INTO `tb_contoh` VALUES ('20', '05', '03', '035', '05.03.035');
INSERT INTO `tb_contoh` VALUES ('21', '05', '04', '038', '05.04.038');
INSERT INTO `tb_contoh` VALUES ('22', '09', '04', '039', '09.04.039');
INSERT INTO `tb_contoh` VALUES ('23', '05', '04', '040', '05.04.040');
INSERT INTO `tb_contoh` VALUES ('24', '09', '04', '041', '09.04.041');
INSERT INTO `tb_contoh` VALUES ('25', '06', '04', '046', '06.04.046');
INSERT INTO `tb_contoh` VALUES ('26', '04', '04', '052', '04.04.052');
INSERT INTO `tb_contoh` VALUES ('27', '04', '04', '053', '04.04.053');
INSERT INTO `tb_contoh` VALUES ('28', '02', '06', '059', '02.06.059');
INSERT INTO `tb_contoh` VALUES ('29', '06', '06', '060', '06.06.060');
INSERT INTO `tb_contoh` VALUES ('30', '02', '07', '070', '02.07.070');
INSERT INTO `tb_contoh` VALUES ('31', '05', '07', '074', '05.07.074');
INSERT INTO `tb_contoh` VALUES ('32', '03', '07', '075', '03.07.075');
INSERT INTO `tb_contoh` VALUES ('33', '06', '08', '077', '06.08.077');
INSERT INTO `tb_contoh` VALUES ('34', '08', '08', '078', '08.08.078');
INSERT INTO `tb_contoh` VALUES ('35', '04', '08', '079', '04.08.079');
INSERT INTO `tb_contoh` VALUES ('36', '02', '10', '087', '02.10.087');
INSERT INTO `tb_contoh` VALUES ('37', '02', '10', '090', '02.10.090');
INSERT INTO `tb_contoh` VALUES ('38', '06', '11', '093', '06.11.093');
INSERT INTO `tb_contoh` VALUES ('39', '07', '11', '095', '07.11.095');
INSERT INTO `tb_contoh` VALUES ('40', '03', '11', '096', '03.11.096');
INSERT INTO `tb_contoh` VALUES ('41', '07', '12', '098', '07.12.098');
INSERT INTO `tb_contoh` VALUES ('42', '05', '12', '101', '05.12.101');
INSERT INTO `tb_contoh` VALUES ('43', '08', '12', '102', '08.12.102');
INSERT INTO `tb_contoh` VALUES ('44', '06', '12', '104', '06.12.104');
INSERT INTO `tb_contoh` VALUES ('45', '05', '12', '107', '05.12.107');
INSERT INTO `tb_contoh` VALUES ('46', '11', '13', '109', '11.13.109');
INSERT INTO `tb_contoh` VALUES ('47', '11', '13', '117', '11.13.117');
INSERT INTO `tb_contoh` VALUES ('48', '03', '13', '120', '03.13.120');
INSERT INTO `tb_contoh` VALUES ('49', '11', '14', '163', '11.14.163');
INSERT INTO `tb_contoh` VALUES ('50', '04', '14', '164', '04.14.164');
INSERT INTO `tb_contoh` VALUES ('51', '04', '14', '165', '04.14.165');
INSERT INTO `tb_contoh` VALUES ('52', '02', '14', '166', '02.14.166');
INSERT INTO `tb_contoh` VALUES ('53', '02', '14', '167', '02.14.167');
INSERT INTO `tb_contoh` VALUES ('54', '03', '14', '168', '03.14.168');
INSERT INTO `tb_contoh` VALUES ('55', '11', '14', '169', '11.14.169');
INSERT INTO `tb_contoh` VALUES ('56', '09', '14', '171', '09.14.171');
INSERT INTO `tb_contoh` VALUES ('57', '02', '14', '172', '02.14.172');
INSERT INTO `tb_contoh` VALUES ('58', '03', '14', '173', '03.14.173');
INSERT INTO `tb_contoh` VALUES ('59', '06', '14', '174', '06.14.174');
INSERT INTO `tb_contoh` VALUES ('60', '06', '14', '175', '06.14.175');
INSERT INTO `tb_contoh` VALUES ('61', '06', '14', '176', '06.14.176');
INSERT INTO `tb_contoh` VALUES ('62', '06', '14', '178', '06.14.178');
INSERT INTO `tb_contoh` VALUES ('63', '03', '14', '180', '03.14.180');
INSERT INTO `tb_contoh` VALUES ('64', '05', '14', '181', '05.14.181');
INSERT INTO `tb_contoh` VALUES ('65', '04', '14', '182', '04.14.182');
INSERT INTO `tb_contoh` VALUES ('66', '05', '14', '183', '05.14.183');
INSERT INTO `tb_contoh` VALUES ('67', '05', '14', '184', '05.14.184');
INSERT INTO `tb_contoh` VALUES ('68', '06', '14', '185', '06.14.185');
INSERT INTO `tb_contoh` VALUES ('69', '04', '14', '186', '04.14.186');
INSERT INTO `tb_contoh` VALUES ('70', '04', '14', '187', '04.14.187');
INSERT INTO `tb_contoh` VALUES ('71', '03', '14', '188', '03.14.188');
INSERT INTO `tb_contoh` VALUES ('72', '02', '14', '189', '02.14.189');
INSERT INTO `tb_contoh` VALUES ('73', '04', '14', '190', '04.14.190');
INSERT INTO `tb_contoh` VALUES ('74', '08', '14', '191', '08.14.191');
INSERT INTO `tb_contoh` VALUES ('75', '05', '14', '194', '05.14.194');
INSERT INTO `tb_contoh` VALUES ('76', '05', '14', '195', '05.14.195');
INSERT INTO `tb_contoh` VALUES ('77', '02', '14', '196', '02.14.196');
INSERT INTO `tb_contoh` VALUES ('78', '02', '14', '197', '02.14.197');
INSERT INTO `tb_contoh` VALUES ('79', '02', '14', '199', '02.14.199');
INSERT INTO `tb_contoh` VALUES ('80', '03', '14', '200', '03.14.200');
INSERT INTO `tb_contoh` VALUES ('81', '09', '14', '201', '09.14.201');
INSERT INTO `tb_contoh` VALUES ('82', '03', '14', '202', '03.14.202');
INSERT INTO `tb_contoh` VALUES ('83', '03', '14', '203', '03.14.203');
INSERT INTO `tb_contoh` VALUES ('84', '03', '14', '204', '03.14.204');
INSERT INTO `tb_contoh` VALUES ('85', '06', '14', '206', '06.14.206');
INSERT INTO `tb_contoh` VALUES ('86', '04', '14', '208', '04.14.208');
INSERT INTO `tb_contoh` VALUES ('87', '03', '14', '209', '03.14.209');
INSERT INTO `tb_contoh` VALUES ('88', '06', '14', '210', '06.14.210');
INSERT INTO `tb_contoh` VALUES ('89', '05', '14', '212', '05.14.212');
INSERT INTO `tb_contoh` VALUES ('90', '11', '14', '215', '11.14.215');
INSERT INTO `tb_contoh` VALUES ('91', '02', '14', '216', '02.14.216');
INSERT INTO `tb_contoh` VALUES ('92', '10', '15', '222', '10.15.222');
INSERT INTO `tb_contoh` VALUES ('93', '03', '15', '223', '03.15.223');
INSERT INTO `tb_contoh` VALUES ('94', '05', '15', '224', '05.15.224');
INSERT INTO `tb_contoh` VALUES ('95', '08', '15', '227', '08.15.227');
INSERT INTO `tb_contoh` VALUES ('96', '04', '15', '228', '04.15.228');
INSERT INTO `tb_contoh` VALUES ('97', '05', '15', '237', '05.15.237');
INSERT INTO `tb_contoh` VALUES ('98', '06', '15', '238', '06.15.238');
INSERT INTO `tb_contoh` VALUES ('99', '04', '15', '239', '04.15.239');
INSERT INTO `tb_contoh` VALUES ('100', '04', '15', '241', '04.15.241');
INSERT INTO `tb_contoh` VALUES ('101', '05', '15', '242', '05.15.242');
INSERT INTO `tb_contoh` VALUES ('102', '04', '15', '244', '04.15.244');
INSERT INTO `tb_contoh` VALUES ('103', '11', '15', '247', '11.15.247');
INSERT INTO `tb_contoh` VALUES ('104', '11', '15', '250', '11.15.250');
INSERT INTO `tb_contoh` VALUES ('105', '04', '15', '251', '04.15.251');
INSERT INTO `tb_contoh` VALUES ('106', '04', '15', '253', '04.15.253');
INSERT INTO `tb_contoh` VALUES ('107', '11', '15', '254', '11.15.254');
INSERT INTO `tb_contoh` VALUES ('108', '04', '15', '255', '04.15.255');
INSERT INTO `tb_contoh` VALUES ('109', '05', '15', '257', '05.15.257');
INSERT INTO `tb_contoh` VALUES ('110', '04', '16', '261', '04.16.261');
INSERT INTO `tb_contoh` VALUES ('111', '04', '16', '262', '04.16.262');
INSERT INTO `tb_contoh` VALUES ('112', '04', '16', '263', '04.16.263');
INSERT INTO `tb_contoh` VALUES ('113', '04', '16', '264', '04.16.264');
INSERT INTO `tb_contoh` VALUES ('114', '04', '16', '265', '04.16.265');
INSERT INTO `tb_contoh` VALUES ('115', '04', '16', '266', '04.16.266');
INSERT INTO `tb_contoh` VALUES ('116', '04', '16', '267', '04.16.267');
INSERT INTO `tb_contoh` VALUES ('117', '04', '16', '268', '04.16.268');
INSERT INTO `tb_contoh` VALUES ('118', '04', '16', '269', '04.16.269');

-- ----------------------------
-- Table structure for `tb_general_affair`
-- ----------------------------
DROP TABLE IF EXISTS `tb_general_affair`;
CREATE TABLE `tb_general_affair` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_general` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_general` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_tipe` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_mulai` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_akhir` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `attachment` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_admin` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_reminder` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `status_reminder` enum('0','1','2') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_general_affair
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_general_info`
-- ----------------------------
DROP TABLE IF EXISTS `tb_general_info`;
CREATE TABLE `tb_general_info` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nm_info` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `ket` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_general_info
-- ----------------------------
INSERT INTO `tb_general_info` VALUES ('1', 'Kode_Perusahaan', 'CTL081116000001');
INSERT INTO `tb_general_info` VALUES ('2', 'Nama_Perusahaan', 'CATERLINDO');
INSERT INTO `tb_general_info` VALUES ('3', 'Kode_Pajak', '213512');
INSERT INTO `tb_general_info` VALUES ('4', 'No_Registrasi', '231351');
INSERT INTO `tb_general_info` VALUES ('5', 'No_Telp', '2135151515');
INSERT INTO `tb_general_info` VALUES ('6', 'email', 'abc@yahoo.com');
INSERT INTO `tb_general_info` VALUES ('7', 'No_Fax', '531351');
INSERT INTO `tb_general_info` VALUES ('8', 'Nama_Jalan_1', 'Jln. Bagus Sekali');
INSERT INTO `tb_general_info` VALUES ('9', 'Nama_Jalan_2', 'jkacbak');
INSERT INTO `tb_general_info` VALUES ('10', 'Kode_Negara', 'WNI');
INSERT INTO `tb_general_info` VALUES ('11', 'Kode_Provinsi', '15');
INSERT INTO `tb_general_info` VALUES ('12', 'Kode_Kota', '151');
INSERT INTO `tb_general_info` VALUES ('13', 'Kode_Pos', '643211');
INSERT INTO `tb_general_info` VALUES ('14', 'catatan', 'chjba');

-- ----------------------------
-- Table structure for `tb_hakaksesuser`
-- ----------------------------
DROP TABLE IF EXISTS `tb_hakaksesuser`;
CREATE TABLE `tb_hakaksesuser` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_lvluser` enum('0','1') COLLATE latin1_general_ci DEFAULT '0',
  `fc_idmenu` char(5) COLLATE latin1_general_ci DEFAULT '',
  `fc_idsubmenu` char(5) COLLATE latin1_general_ci DEFAULT '',
  `fc_idsubsubmenu` char(5) COLLATE latin1_general_ci DEFAULT '',
  `fc_operator` char(50) COLLATE latin1_general_ci DEFAULT '',
  PRIMARY KEY (`fc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_hakaksesuser
-- ----------------------------
INSERT INTO `tb_hakaksesuser` VALUES ('1', '0', '1', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('2', '0', '2', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('3', '0', '3', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('4', '0', '4', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('5', '0', '5', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('6', '0', '6', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('8', '0', '17', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('9', '0', '18', '', '', 'ADMIN');
INSERT INTO `tb_hakaksesuser` VALUES ('10', '0', '19', '', '', 'ADMIN');

-- ----------------------------
-- Table structure for `tb_hari_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `tb_hari_kerja`;
CREATE TABLE `tb_hari_kerja` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nm_hari` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `jm_kerja` enum('0','1','2') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_hari_kerja
-- ----------------------------
INSERT INTO `tb_hari_kerja` VALUES ('1', 'senin', '0');
INSERT INTO `tb_hari_kerja` VALUES ('2', 'selasa', '0');
INSERT INTO `tb_hari_kerja` VALUES ('3', 'rabu', '0');
INSERT INTO `tb_hari_kerja` VALUES ('4', 'kamis', '0');
INSERT INTO `tb_hari_kerja` VALUES ('5', 'jumat', '0');
INSERT INTO `tb_hari_kerja` VALUES ('6', 'sabtu', '2');
INSERT INTO `tb_hari_kerja` VALUES ('7', 'minggu', '2');

-- ----------------------------
-- Table structure for `tb_hari_libur`
-- ----------------------------
DROP TABLE IF EXISTS `tb_hari_libur`;
CREATE TABLE `tb_hari_libur` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `deskripsi` tinytext COLLATE latin1_general_ci,
  `tgl_libur` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_hari_libur
-- ----------------------------
INSERT INTO `tb_hari_libur` VALUES ('1', 'Hari Natal', '25-12-2016');

-- ----------------------------
-- Table structure for `tb_info_perusahaan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_info_perusahaan`;
CREATE TABLE `tb_info_perusahaan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_perusahaan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nm_perusahaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_pajak` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `no_registrasi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `no_telp` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `no_fax` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_jalan1` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_jalan2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_negara` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_provinsi` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_kota` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_pos` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `catatan` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_info_perusahaan
-- ----------------------------
INSERT INTO `tb_info_perusahaan` VALUES ('1', 'CTL081116000001', 'CATERLINDO', '213512', '231351', '2135151515', 'abc@yahoo.com', '531351', 'hasbjbaj', 'jkacbak', 'WNI', '15', '151', '643211', 'chjba');

-- ----------------------------
-- Table structure for `tb_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_unit` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `kd_bagian` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_jabatan` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_jabatan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `deskripsi` text COLLATE latin1_general_ci,
  `spesifikasi` text COLLATE latin1_general_ci,
  `catatan` text COLLATE latin1_general_ci,
  `kd_gaji` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `frekuensi` enum('0','1','2','3') COLLATE latin1_general_ci DEFAULT NULL,
  `tipe_gaji` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `jml_gaji` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_jabatan
-- ----------------------------
INSERT INTO `tb_jabatan` VALUES ('3', '01', '02', '01', 'Leader', '-', '-', '-', '02', '3', '1', '300000');

-- ----------------------------
-- Table structure for `tb_karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE `tb_karyawan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_karyawan` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `nik_karyawan` varchar(9) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nm_karyawan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `jekel` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `status_nikah` enum('0','1','2') COLLATE latin1_general_ci DEFAULT NULL,
  `kebangsaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_jalan_1` text COLLATE latin1_general_ci,
  `alamat_jalan_2` text COLLATE latin1_general_ci,
  `kd_provinsi` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_kota` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kdpos` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `negara` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_rumah` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_mobile` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_kantor` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `email_utama` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `email_lain` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_unit` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_bagian` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_jabatan` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_status_kerja` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_kat_pekerjaan` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `kd_lokasi_perusahaan` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_mulai_kontrak` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_habis_kontrak` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `det_kontrak` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_bank` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `no_rekening` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pas_foto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_karyawan`,`nik_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_karyawan
-- ----------------------------
INSERT INTO `tb_karyawan` VALUES ('1', '001', '05.97.001', 'KASIDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '1997-07-07', '', '', '', '', '1', '8290278504', '');
INSERT INTO `tb_karyawan` VALUES ('2', '003', '05.97.003', 'SUPANGADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '1997-07-07', '', '', '', '', '1', '8640073986', '');
INSERT INTO `tb_karyawan` VALUES ('3', '004', '04.97.004', 'SUROSO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '1997-07-27', '', '', '', '', '1', '8290139661', '');
INSERT INTO `tb_karyawan` VALUES ('4', '006', '10.98.006', 'AGUS DARMAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '10', '', '01', '', '1998-11-01', '', '', '', '', '1', '2581697751', '');
INSERT INTO `tb_karyawan` VALUES ('5', '007', '02.99.007', 'HADI SUROSO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '1999-02-23', '', '', '', '', '1', '0884252624', '');
INSERT INTO `tb_karyawan` VALUES ('6', '008', '05.99.008', 'SUTRISNO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '1999-03-01', '', '', '', '', '1', '0884252632', '');
INSERT INTO `tb_karyawan` VALUES ('7', '009', '04.99.009', 'MUHAMMAD SANTOSO HANAFI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '1999-03-25', '', '', '', '', '1', '8290142041', '');
INSERT INTO `tb_karyawan` VALUES ('8', '010', '07.99.010', 'PENAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '07', '', '01', '', '1999-03-25', '', '', '', '', '1', '8290246904', '');
INSERT INTO `tb_karyawan` VALUES ('9', '012', '05.99.012', 'YOYOK SUPRIYANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '1999-03-29', '', '', '', '', '1', '8290141851', '');
INSERT INTO `tb_karyawan` VALUES ('10', '014', '04.99.014', 'MUANAM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '1999-06-14', '', '', '', '', '1', '8290255393', '');
INSERT INTO `tb_karyawan` VALUES ('11', '015', '08.99.015', 'MUSTOPO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '08', '', '01', '', '1999-06-14', '', '', '', '', '1', '8290140839', '');
INSERT INTO `tb_karyawan` VALUES ('12', '016', '03.99.016', 'DEDDY SUSILO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '1999-08-16', '', '', '', '', '1', '8290140570', '');
INSERT INTO `tb_karyawan` VALUES ('13', '017', '10.00.017', 'MUKMAN HADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '10', '', '01', '', '2000-01-08', '', '', '', '', '1', '8290140642', '');
INSERT INTO `tb_karyawan` VALUES ('14', '025', '06.01.025', 'TASWI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2001-02-15', '', '', '', '', '1', '8290140235', '');
INSERT INTO `tb_karyawan` VALUES ('15', '027', '04.01.027', 'MONI KUSTONO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2001-06-25', '', '', '', '', '1', '8290149411', '');
INSERT INTO `tb_karyawan` VALUES ('16', '028', '09.02.028', 'MALIK SYAIFUDIN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '09', '', '02', '', '2002-01-03', '', '', '', '', '1', '8290142246', '');
INSERT INTO `tb_karyawan` VALUES ('17', '029', '06.02.029', 'CATUR HARIYADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2002-11-18', '', '', '', '', '1', '8290210683', '');
INSERT INTO `tb_karyawan` VALUES ('18', '030', '04.03.030', 'DONI ISMAIL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2003-04-01', '', '', '', '', '1', '8290247251', '');
INSERT INTO `tb_karyawan` VALUES ('19', '032', '05.03.032', 'RAGIL SUTADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2003-04-01', '', '', '', '', '1', '8290247161', '');
INSERT INTO `tb_karyawan` VALUES ('20', '035', '05.03.035', 'MUJI HARIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2003-05-12', '', '', '', '', '1', '8290223149', '');
INSERT INTO `tb_karyawan` VALUES ('21', '038', '05.04.038', 'AGUS SUGIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2004-02-10', '', '', '', '', '1', '8290278539', '');
INSERT INTO `tb_karyawan` VALUES ('22', '039', '09.04.039', 'DEVI DADIYANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '09', '', '01', '', '2004-02-10', '', '', '', '', '1', '8290306265', '');
INSERT INTO `tb_karyawan` VALUES ('23', '040', '05.04.040', 'DHADIK PUJIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2004-02-10', '', '', '', '', '1', '8290306036', '');
INSERT INTO `tb_karyawan` VALUES ('24', '041', '09.04.041', 'JEFRI SUSANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '09', '', '01', '', '2004-02-10', '', '', '', '', '1', '8290278521', '');
INSERT INTO `tb_karyawan` VALUES ('25', '046', '06.04.046', 'BURHANNUDDIN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2004-03-29', '', '', '', '', '1', '8290294780', '');
INSERT INTO `tb_karyawan` VALUES ('26', '052', '04.04.052', 'SOELEMAN YUDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2004-06-23', '', '', '', '', '1', '8290306176', '');
INSERT INTO `tb_karyawan` VALUES ('27', '053', '04.04.053', 'DATAR TRIBELA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2004-06-29', '', '', '', '', '1', '8290278491', '');
INSERT INTO `tb_karyawan` VALUES ('28', '059', '02.06.059', 'M HAQIQI FIRMANSYAH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2006-10-12', '', '', '', '', '1', '1840438321', '');
INSERT INTO `tb_karyawan` VALUES ('29', '060', '06.06.060', 'SLAMET SUGENG NURIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2006-10-12', '', '', '', '', '1', '1840410362', '');
INSERT INTO `tb_karyawan` VALUES ('30', '070', '02.07.070', 'YULI ANDRIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2007-05-30', '', '', '', '', '1', '2710799973', '');
INSERT INTO `tb_karyawan` VALUES ('31', '074', '05.07.074', 'HANI PAMINTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2007-12-02', '', '', '', '', '1', '2140616349', '');
INSERT INTO `tb_karyawan` VALUES ('32', '075', '03.07.075', 'HERI WIBOWO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2007-12-03', '', '', '', '', '1', '8220621473', '');
INSERT INTO `tb_karyawan` VALUES ('33', '077', '06.08.077', 'SLAMET HADI SUNYOTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2008-02-25', '', '', '', '', '1', '0885443520', '');
INSERT INTO `tb_karyawan` VALUES ('34', '078', '08.08.078', 'TAUFIK H', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '08', '', '01', '', '2008-09-17', '', '', '', '', '1', '1840482746', '');
INSERT INTO `tb_karyawan` VALUES ('35', '079', '04.08.079', 'M ULUL AZMI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2008-09-22', '', '', '', '', '1', '1840410371', '');
INSERT INTO `tb_karyawan` VALUES ('36', '087', '02.10.087', 'KARYANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2010-02-08', '', '', '', '', '1', '2890666593', '');
INSERT INTO `tb_karyawan` VALUES ('37', '090', '02.10.090', 'M YUSUF PRAYOGI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2010-11-01', '', '', '', '', '1', '0183485480', '');
INSERT INTO `tb_karyawan` VALUES ('38', '093', '06.11.093', 'NURUL ANSORI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2011-03-08', '', '', '', '', '1', '1840485567', '');
INSERT INTO `tb_karyawan` VALUES ('39', '095', '07.11.095', 'VICKY HARYANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '07', '', '01', '', '2011-09-27', '', '', '', '', '1', '1840499657', '');
INSERT INTO `tb_karyawan` VALUES ('40', '096', '03.11.096', 'EKO CAHYO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2011-10-03', '', '', '', '', '1', '1840485711', '');
INSERT INTO `tb_karyawan` VALUES ('41', '098', '07.12.098', 'M KHOZIN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '07', '', '02', '', '2012-01-02', '', '', '', '', '1', '1840499452', '');
INSERT INTO `tb_karyawan` VALUES ('42', '101', '05.12.101', 'ALFIAN ARDIANSYAH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2012-01-02', '', '', '', '', '1', '1840519526', '');
INSERT INTO `tb_karyawan` VALUES ('43', '102', '08.12.102', 'JAYADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '08', '', '01', '', '2012-01-02', '', '', '', '', '1', '1840485575', '');
INSERT INTO `tb_karyawan` VALUES ('44', '104', '06.12.104', 'SULISWANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '01', '', '2012-02-08', '', '', '', '', '1', '1840485460', '');
INSERT INTO `tb_karyawan` VALUES ('45', '107', '05.12.107', 'M KOMARI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2012-10-08', '', '', '', '', '1', '2140686576', '');
INSERT INTO `tb_karyawan` VALUES ('46', '109', '11.13.109', 'KURNAINI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '02', '', '2013-01-02', '', '', '', '', '1', '1840485729', '');
INSERT INTO `tb_karyawan` VALUES ('47', '117', '11.13.117', 'PONCO HARI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '01', '', '2013-01-02', '', '', '', '', '1', '1840499631', '');
INSERT INTO `tb_karyawan` VALUES ('48', '120', '03.13.120', 'M RIFQI MACHMUDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2013-01-02', '', '', '', '', '1', '1840503921', '');
INSERT INTO `tb_karyawan` VALUES ('49', '163', '11.14.163', 'MISWANTO SAPUTRA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '01', '', '2014-02-03', '', '', '', '', '1', '8290403473', '');
INSERT INTO `tb_karyawan` VALUES ('50', '164', '04.14.164', 'M WASIS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2014-05-02', '', '', '', '', '1', '1840514206', '');
INSERT INTO `tb_karyawan` VALUES ('51', '165', '04.14.165', 'SUSANDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2014-05-02', '', '', '', '', '1', '2710950671', '');
INSERT INTO `tb_karyawan` VALUES ('52', '166', '02.14.166', 'CANDRA PURWANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2014-05-02', '', '', '', '', '1', '1030467571', '');
INSERT INTO `tb_karyawan` VALUES ('53', '167', '02.14.167', 'AINUL KHABIB', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '01', '', '2014-05-02', '', '', '', '', '1', '1840492164', '');
INSERT INTO `tb_karyawan` VALUES ('54', '168', '03.14.168', 'ADIBI IRAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2014-05-02', '', '', '', '', '1', '1840513447', '');
INSERT INTO `tb_karyawan` VALUES ('55', '169', '11.14.169', 'RENDY GUSMAN PRIYONO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '02', '', '2014-06-11', '', '', '', '', '1', '1840700115', '');
INSERT INTO `tb_karyawan` VALUES ('56', '171', '09.14.171', 'FANDI EDITIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '09', '', '02', '', '2014-09-08', '', '', '', '', '1', '1840601729', '');
INSERT INTO `tb_karyawan` VALUES ('57', '172', '02.14.172', 'WAHYU AGUNG PRIHANTANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-09-08', '', '', '', '', '1', '1840601524', '');
INSERT INTO `tb_karyawan` VALUES ('58', '173', '03.14.173', 'NUR WANCAHYONO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2014-09-08', '', '', '', '', '1', '1840644380', '');
INSERT INTO `tb_karyawan` VALUES ('59', '174', '06.14.174', 'WIDIYANTO LAKSONO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-15', '', '', '', '', '1', '1840618532', '');
INSERT INTO `tb_karyawan` VALUES ('60', '175', '06.14.175', 'ANGGA ARIDIANSYAH R', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-15', '', '', '', '', '1', '1840618524', '');
INSERT INTO `tb_karyawan` VALUES ('61', '176', '06.14.176', 'KHOLID ASHARI PRASETYO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-15', '', '', '', '', '1', '1410523961', '');
INSERT INTO `tb_karyawan` VALUES ('62', '178', '06.14.178', 'MIDHAS AGATHA NARIS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-15', '', '', '', '', '1', '1840616904', '');
INSERT INTO `tb_karyawan` VALUES ('63', '180', '03.14.180', 'AHMAD NASRULLOH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840644371', '');
INSERT INTO `tb_karyawan` VALUES ('64', '181', '05.14.181', 'ADITYA BRAMANDA FERDIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-09-22', '', '', '', '', '1', '6720389582', '');
INSERT INTO `tb_karyawan` VALUES ('65', '182', '04.14.182', 'WINEDY FATHURRAHMAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840644398', '');
INSERT INTO `tb_karyawan` VALUES ('66', '183', '05.14.183', 'ANDIK ERWANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-09-22', '', '', '', '', '1', '2650294907', '');
INSERT INTO `tb_karyawan` VALUES ('67', '184', '05.14.184', 'HAKIM IRFAUL FADHLI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840622963', '');
INSERT INTO `tb_karyawan` VALUES ('68', '185', '06.14.185', 'COK TRIMARYONO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-22', '', '', '', '', '1', '2710971865', '');
INSERT INTO `tb_karyawan` VALUES ('69', '186', '04.14.186', 'KOSA ARDINANTA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840657848', '');
INSERT INTO `tb_karyawan` VALUES ('70', '187', '04.14.187', 'NUR IMAM WASIS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2014-09-22', '', '', '', '', '1', '2710968058', '');
INSERT INTO `tb_karyawan` VALUES ('71', '188', '03.14.188', 'MOHAMMAD ARIS NURKOMARI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840621606', '');
INSERT INTO `tb_karyawan` VALUES ('72', '189', '02.14.189', 'HAMID HANAFI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840657902', '');
INSERT INTO `tb_karyawan` VALUES ('73', '190', '04.14.190', 'WIDI RESTU SANTOSO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2014-09-22', '', '', '', '', '1', '1470479406', '');
INSERT INTO `tb_karyawan` VALUES ('74', '191', '08.14.191', 'OKTAVIAN HARDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '08', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840598027', '');
INSERT INTO `tb_karyawan` VALUES ('75', '194', '05.14.194', 'BAYU PAMUNGKAS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-09-22', '', '', '', '', '1', '2710934323', '');
INSERT INTO `tb_karyawan` VALUES ('76', '195', '05.14.195', 'DANI ARI SETIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840594056', '');
INSERT INTO `tb_karyawan` VALUES ('77', '196', '02.14.196', 'WISNU IFAN RISKIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840601222', '');
INSERT INTO `tb_karyawan` VALUES ('78', '197', '02.14.197', 'IFAN MAULANA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840590077', '');
INSERT INTO `tb_karyawan` VALUES ('79', '199', '02.14.199', 'ADE IVAN PERDANA PUTRA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840601061', '');
INSERT INTO `tb_karyawan` VALUES ('80', '200', '03.14.200', 'MUHAMMAD AFRAN ARDANI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840598019', '');
INSERT INTO `tb_karyawan` VALUES ('81', '201', '09.14.201', 'SAMSUL ANAM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '09', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840594188', '');
INSERT INTO `tb_karyawan` VALUES ('82', '202', '03.14.202', 'MOCHAMAD FAJAR SODIQ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840644363', '');
INSERT INTO `tb_karyawan` VALUES ('83', '203', '03.14.203', 'MOHAMAD SAMSUL ARIFIN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840599023', '');
INSERT INTO `tb_karyawan` VALUES ('84', '204', '03.14.204', 'INDRA JAYA PRASTYA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840598035', '');
INSERT INTO `tb_karyawan` VALUES ('85', '206', '06.14.206', 'DIDIK HERMAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840585987', '');
INSERT INTO `tb_karyawan` VALUES ('86', '208', '04.14.208', 'SUGIANTO EFENDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840612224', '');
INSERT INTO `tb_karyawan` VALUES ('87', '209', '03.14.209', 'IFUL YUSRO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '02', '', '2014-09-22', '', '', '', '', '1', '1840585511', '');
INSERT INTO `tb_karyawan` VALUES ('88', '210', '06.14.210', 'MOCH.RIZAL ARDIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2014-09-22', '', '', '', '', '1', '0183830268', '');
INSERT INTO `tb_karyawan` VALUES ('89', '212', '05.14.212', 'MAMAN FIRMANSYAH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2014-10-01', '', '', '', '', '1', '2500265593', '');
INSERT INTO `tb_karyawan` VALUES ('90', '215', '11.14.215', 'DEDIK SETIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '01', '', '2014-10-01', '', '', '', '', '1', '1840594170', '');
INSERT INTO `tb_karyawan` VALUES ('91', '216', '02.14.216', 'ARDIANUS FERRYANTO SAMSUDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '02', '', '02', '', '2014-10-01', '', '', '', '', '1', '1010933532', '');
INSERT INTO `tb_karyawan` VALUES ('92', '222', '10.15.222', 'DIDIT PRASETYO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '10', '', '02', '', '2015-01-05', '', '', '', '', '1', '1840647303', '');
INSERT INTO `tb_karyawan` VALUES ('93', '223', '03.15.223', 'MISBACHUL ULUM FIRMANSYAH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '03', '', '01', '', '2015-01-19', '', '', '', '', '1', '2710962874', '');
INSERT INTO `tb_karyawan` VALUES ('94', '224', '05.15.224', 'SUWANDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '01', '', '2015-02-02', '', '', '', '', '1', '2710781926', '');
INSERT INTO `tb_karyawan` VALUES ('95', '227', '08.15.227', 'MOHAMAD SILVIA RUBIANTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '08', '', '02', '', '2015-03-09', '', '', '', '', '1', '2710993338', '');
INSERT INTO `tb_karyawan` VALUES ('96', '228', '04.15.228', 'DWI ANDITA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-03-13', '', '', '', '', '1', '1840657864', '');
INSERT INTO `tb_karyawan` VALUES ('97', '237', '05.15.237', 'ARI SUGIARTO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2015-06-25', '', '', '', '', '1', '1840638304', '');
INSERT INTO `tb_karyawan` VALUES ('98', '238', '06.15.238', 'LUKITO RAHARJO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '06', '', '02', '', '2015-07-10', '', '', '', '', '1', '1840657899', '');
INSERT INTO `tb_karyawan` VALUES ('99', '239', '04.15.239', 'ERVIN BAGUS SETIAWAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '01', '', '2015-07-27', '', '', '', '', '1', '1840657881', '');
INSERT INTO `tb_karyawan` VALUES ('100', '241', '04.15.241', 'ILHAM ABILLA ARROHMAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-07-28', '', '', '', '', '1', '1840492385', '');
INSERT INTO `tb_karyawan` VALUES ('101', '242', '05.15.242', 'IKHWAN SUBOWO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2015-08-03', '', '', '', '', '1', '1840657872', '');
INSERT INTO `tb_karyawan` VALUES ('102', '244', '04.15.244', 'YUDHA NURDYANSYAH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-08-05', '', '', '', '', '1', '1840657856', '');
INSERT INTO `tb_karyawan` VALUES ('103', '247', '11.15.247', 'ACHMAD BACHRUL SYAIFUDDIN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '02', '', '2015-09-02', '', '', '', '', '1', '2710919278', '');
INSERT INTO `tb_karyawan` VALUES ('104', '250', '11.15.250', 'DANU YUWANTORO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '02', '', '2015-09-11', '', '', '', '', '1', '2710919260', '');
INSERT INTO `tb_karyawan` VALUES ('105', '251', '04.15.251', 'MOCH WIDODO SATRIYO UTOMO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-09-15', '', '', '', '', '1', '1840696703', '');
INSERT INTO `tb_karyawan` VALUES ('106', '253', '04.15.253', 'MIFTAHUL HUDA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-09-21', '', '', '', '', '1', '1840668394', '');
INSERT INTO `tb_karyawan` VALUES ('107', '254', '11.15.254', 'MOCH FARID ARIDLO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '11', '', '02', '', '2015-09-21', '', '', '', '', '1', '2710919286', '');
INSERT INTO `tb_karyawan` VALUES ('108', '255', '04.15.255', 'ISAL MAULANA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2015-09-21', '', '', '', '', '1', '2710919235', '');
INSERT INTO `tb_karyawan` VALUES ('109', '257', '05.15.257', 'SUBEQI MARANTIKA AFANDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '05', '', '02', '', '2015-11-02', '', '', '', '', '1', '6140348340', '');
INSERT INTO `tb_karyawan` VALUES ('110', '261', '04.16.261', 'Adhitia Oktafian', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '', '', '');
INSERT INTO `tb_karyawan` VALUES ('111', '262', '04.16.262', 'MASHURI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '1', '1840578409', '');
INSERT INTO `tb_karyawan` VALUES ('112', '263', '04.16.263', 'RAMA RIZKI ALVIAN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '1', '1840608448', '');
INSERT INTO `tb_karyawan` VALUES ('113', '264', '04.16.264', 'ANDIK HARDIANTO MAS\'UD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '1', '1840700361', '');
INSERT INTO `tb_karyawan` VALUES ('114', '265', '04.16.265', 'Yoda Wahyu Ginanjar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '', '', '');
INSERT INTO `tb_karyawan` VALUES ('115', '266', '04.16.266', 'AHMAD ADFANDI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-05', '', '', '', '', '1', '1840668416', '');
INSERT INTO `tb_karyawan` VALUES ('116', '267', '04.16.267', 'BAMBANG SUMANTRI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-18', '', '', '', '', '1', '2711029763', '');
INSERT INTO `tb_karyawan` VALUES ('117', '268', '04.16.268', 'Saiful Rizal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-18', '', '', '', '', '', '', '');
INSERT INTO `tb_karyawan` VALUES ('118', '269', '04.16.269', 'GANANG FAHRUL ROZI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', '04', '', '02', '', '2016-01-19', '', '', '', '', '1', '2711026802', '');
INSERT INTO `tb_karyawan` VALUES ('142', '270', '09.16.270', 'Iki coba', '0', '0', 'WNI', 'COba', 'test', '15', '151', '75643', null, '085768684545', '', '', 'coba@email.com', '', '01', '09', '', '02', '', '2016-11-13', '01', '2016-11-01', '2018-11-30', 'asd', null, null, null);

-- ----------------------------
-- Table structure for `tb_kat_pekerjaan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_kat_pekerjaan`;
CREATE TABLE `tb_kat_pekerjaan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_kat_pekerjaan` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_kat_pekerjaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_kat_pekerjaan
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_kota`
-- ----------------------------
DROP TABLE IF EXISTS `tb_kota`;
CREATE TABLE `tb_kota` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_negara` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kd_provinsi` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kd_kota` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nm_kota` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_kota
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_kpi`;
CREATE TABLE `tb_kpi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_kpi` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_komponen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nilai_max` int(5) DEFAULT NULL,
  `nilai_min` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_kpi
-- ----------------------------
INSERT INTO `tb_kpi` VALUES ('1', 'KPI161016000001', 'Disiplin', '5', '3');
INSERT INTO `tb_kpi` VALUES ('2', 'KPI161016000002', 'Loyalitas', '10', '1');
INSERT INTO `tb_kpi` VALUES ('4', 'KPI161016000003', 'Teamwork', '8', '1');
INSERT INTO `tb_kpi` VALUES ('5', 'KPI241016000001', 'Kerapian', '10', '3');

-- ----------------------------
-- Table structure for `tb_lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_lokasi`;
CREATE TABLE `tb_lokasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_lokasi_perusahaan` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nm_lokasi_perusahaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_negara` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_provinsi` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_kota` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat` text COLLATE latin1_general_ci,
  `kd_pos` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `no_telp` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `no_fax` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `catatan` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`,`kd_lokasi_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_lokasi
-- ----------------------------
INSERT INTO `tb_lokasi` VALUES ('1', '01', 'Perusahaan Pusat', 'WNI', '15', '151', 'qwerty', '12345', '085749929919', '058412344', 'Ini adalah perusahaan pusat');

-- ----------------------------
-- Table structure for `tb_membership`
-- ----------------------------
DROP TABLE IF EXISTS `tb_membership`;
CREATE TABLE `tb_membership` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_membership` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_membership` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_membership`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_membership
-- ----------------------------
INSERT INTO `tb_membership` VALUES ('1', '01', 'BPJS Kesehatan');
INSERT INTO `tb_membership` VALUES ('2', '02', 'BPJS Ketenagakerjaan');

-- ----------------------------
-- Table structure for `tb_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu` (
  `fc_idmenu` int(5) NOT NULL AUTO_INCREMENT,
  `fc_urutan` int(5) DEFAULT NULL,
  `fv_menu` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fc_link` varchar(90) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_title` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fv_class` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`fc_idmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_menu
-- ----------------------------
INSERT INTO `tb_menu` VALUES ('1', '1', 'Dashboard', '?p=dashboard', 'Home', 'fa fa-dashboard', 'Y');
INSERT INTO `tb_menu` VALUES ('4', '4', 'Profil', '?p=profil_data', 'Dosen', 'fa fa-user', 'Y');
INSERT INTO `tb_menu` VALUES ('5', '8', 'Setting', '?p=setting', 'setting', 'fa fa-cogs', 'Y');
INSERT INTO `tb_menu` VALUES ('6', '9', 'Logout', '?p=logout', 'LOGOUT', 'fa fa-sign-out', 'Y');
INSERT INTO `tb_menu` VALUES ('3', '3', 'Pim', 'javascript:;', 'PIM', 'fa fa-list', 'Y');
INSERT INTO `tb_menu` VALUES ('2', '2', 'Admin', 'javascript:;', 'Data admin', 'fa fa-users', 'Y');
INSERT INTO `tb_menu` VALUES ('17', '5', 'General Affairs', '?p=general_data', 'General Affairs', 'fa fa-list', 'Y');
INSERT INTO `tb_menu` VALUES ('18', '6', 'Master Kalendar', 'javascript:;', 'Master Kalendar', 'fa fa-calendar', 'Y');
INSERT INTO `tb_menu` VALUES ('19', '7', 'KPI', 'javascript:;', 'KPI', 'fa fa-check', 'Y');

-- ----------------------------
-- Table structure for `tb_negara`
-- ----------------------------
DROP TABLE IF EXISTS `tb_negara`;
CREATE TABLE `tb_negara` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_negara` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nm_negara` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_negara
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_pendidikan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_pendidikan`;
CREATE TABLE `tb_pendidikan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pendidikan` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `lvl_pendidikan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_pendidikan
-- ----------------------------
INSERT INTO `tb_pendidikan` VALUES ('1', '01', 'SMA');

-- ----------------------------
-- Table structure for `tb_sertifikasi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_sertifikasi`;
CREATE TABLE `tb_sertifikasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_sertifikasi` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_sertifikasi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_sertifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_sertifikasi
-- ----------------------------
INSERT INTO `tb_sertifikasi` VALUES ('1', '01', 'Microsoft Word Learning Point');

-- ----------------------------
-- Table structure for `tb_setting`
-- ----------------------------
DROP TABLE IF EXISTS `tb_setting`;
CREATE TABLE `tb_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nm_setting` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `setting` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_setting
-- ----------------------------
INSERT INTO `tb_setting` VALUES ('1', 'header_title', 'SIM HRM');
INSERT INTO `tb_setting` VALUES ('2', 'main_title', 'SIM HRM');
INSERT INTO `tb_setting` VALUES ('3', 'home_title', 'SIM HRM');
INSERT INTO `tb_setting` VALUES ('4', 'favicon', 'favicon.png');
INSERT INTO `tb_setting` VALUES ('5', 'login_title', 'LOGIN ADMINISTRATOR SIM HRM');
INSERT INTO `tb_setting` VALUES ('6', 'thn_mulai', '2016');
INSERT INTO `tb_setting` VALUES ('7', 'footer_title', 'SIM HRM');
INSERT INTO `tb_setting` VALUES ('8', 'bg_img', '49207_computer_programming.jpg');

-- ----------------------------
-- Table structure for `tb_skill`
-- ----------------------------
DROP TABLE IF EXISTS `tb_skill`;
CREATE TABLE `tb_skill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_skill` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_skill` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `deskripsi` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`,`kd_skill`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_skill
-- ----------------------------
INSERT INTO `tb_skill` VALUES ('1', '01', 'Microsoft Office', 'Bisa mengoperasikan program komputer Microsoft Office seperti Word, Excel, dan Powerpoint.');

-- ----------------------------
-- Table structure for `tb_status_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_kerja`;
CREATE TABLE `tb_status_kerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_status_kerja` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_status_kerja` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_status_kerja`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_status_kerja
-- ----------------------------
INSERT INTO `tb_status_kerja` VALUES ('14', '01', 'Permanen');
INSERT INTO `tb_status_kerja` VALUES ('15', '02', 'Kontrak');

-- ----------------------------
-- Table structure for `tb_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `tb_submenu`;
CREATE TABLE `tb_submenu` (
  `fc_idsubmenu` int(5) NOT NULL AUTO_INCREMENT,
  `fc_idmenu` int(5) NOT NULL,
  `fc_urutan` int(5) DEFAULT NULL,
  `fv_menu` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fc_link` varchar(90) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_title` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fv_class` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`fc_idsubmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_submenu
-- ----------------------------
INSERT INTO `tb_submenu` VALUES ('1', '2', '1', 'Manajemen User', 'javascript:;', 'Manajement User', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('2', '2', '2', 'Jabatan', 'javascript:;', 'Jabatan', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('3', '2', '4', 'Perusahaan', 'javascript:;', 'Perusahaan', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('4', '2', '5', 'Kualifikasi', 'javascript:;', 'Kualifikasi', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('5', '2', '6', 'Kewarganegaraan', '?p=kewarganegaraan_data', 'Kewarganegaraan', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('6', '3', '1', 'Data Pegawai', '?p=pegawai_data', 'Data Pegawai', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('9', '19', '1', 'Komponen KPI', '?p=komponen_data', 'Komponen KPI', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('10', '19', '2', 'Evaluasi Karyawan', '?p=evaluasi_data', 'Evualuasi Karyawan', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('11', '2', '3', 'Manajemen Gaji', 'javascript:;', 'Manajemen Gaji', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('12', '2', '7', 'Tipe General Affair', '?p=tipe_general_data', 'General Affair', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('13', '18', '1', 'Data Cuti', 'javascript:;', 'Data Cuti', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('14', '18', '2', 'Set Hari Kerja', '?p=hari_kerja_data', 'Set Hari Kerja', null, 'Y');
INSERT INTO `tb_submenu` VALUES ('15', '18', '3', 'Set Hari Libur', '?p=hari_libur_data', 'Set Hari Libur', null, 'Y');

-- ----------------------------
-- Table structure for `tb_subsubmenu`
-- ----------------------------
DROP TABLE IF EXISTS `tb_subsubmenu`;
CREATE TABLE `tb_subsubmenu` (
  `fc_idsubsubmenu` int(5) NOT NULL AUTO_INCREMENT,
  `fc_idsubmenu` int(5) NOT NULL,
  `fc_urutan` int(5) DEFAULT NULL,
  `fv_menu` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fc_link` varchar(90) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_title` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fv_class` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`fc_idsubsubmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_subsubmenu
-- ----------------------------
INSERT INTO `tb_subsubmenu` VALUES ('1', '1', '1', 'Data User', '?p=admin_data', 'Data User', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('2', '2', '3', 'Data Jabatan', '?p=jabatan_data', 'Jabatan', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('3', '2', '2', 'Data Bagian', '?p=bagian_data', 'Bagian', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('19', '13', '2', 'Laporan Cuti', '?p=laporan_cuti_data', 'Laporan Cuti', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('5', '2', '4', 'Status Karyawan', '?p=status_data', 'Status', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('6', '2', '5', 'Kategori Pekerjaan', '?p=kategori_data', 'kategori', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('20', '2', '1', 'Data Unit', '?p=unit_data', 'Unit', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('8', '3', '1', 'Informasi Umum', '?p=informasi_data', 'Informasi Umum', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('9', '3', '2', 'Lokasi', '?p=lokasi_data', 'Lokasi', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('11', '4', '1', 'Keahlian', '?p=keahlian_data', 'Keahlian', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('12', '4', '2', 'Pendidikan', '?p=pendidikan_data', 'Pendidikan', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('13', '4', '3', 'Sertifikat', '?p=sertifikat_data', 'Sertifikat', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('14', '4', '4', 'Bahasa', '?p=bahasa_data', 'Bahasa', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('15', '4', '5', 'Membership', '?p=membership_data', 'MemberShip', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('17', '11', '1', 'Master Gaji', '?p=master_gaji_data', 'Master Gaji', null, 'Y');
INSERT INTO `tb_subsubmenu` VALUES ('18', '13', '1', 'Master Cuti', '?p=master_cuti_data', 'Master Cuti', null, 'Y');

-- ----------------------------
-- Table structure for `tb_tipe_ga`
-- ----------------------------
DROP TABLE IF EXISTS `tb_tipe_ga`;
CREATE TABLE `tb_tipe_ga` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tipe_ga` varchar(50) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tipe_ga
-- ----------------------------
INSERT INTO `tb_tipe_ga` VALUES ('1', 'KENDARAAN', 'MELIPUTI MOBIL,Surat2 DLL');

-- ----------------------------
-- Table structure for `tb_unit`
-- ----------------------------
DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_unit` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nm_unit` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tb_unit
-- ----------------------------
INSERT INTO `tb_unit` VALUES ('1', '01', 'Produksi');
INSERT INTO `tb_unit` VALUES ('3', '02', 'Staff');

-- ----------------------------
-- Table structure for `td_gaji`
-- ----------------------------
DROP TABLE IF EXISTS `td_gaji`;
CREATE TABLE `td_gaji` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_gaji` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kd_bagian` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_jabatan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nilai_gaji` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of td_gaji
-- ----------------------------
INSERT INTO `td_gaji` VALUES ('9', '01', '04', '05', '1500000');
INSERT INTO `td_gaji` VALUES ('10', '02', '04', '05', '1500000');
INSERT INTO `td_gaji` VALUES ('11', '01', '03', '03', '1400000');
INSERT INTO `td_gaji` VALUES ('12', '02', '01', '01', '1250000');

-- ----------------------------
-- Table structure for `td_karyawan_bahasa`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_bahasa`;
CREATE TABLE `td_karyawan_bahasa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_bahasa` int(5) DEFAULT NULL,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` enum('0','1','2') COLLATE latin1_general_ci DEFAULT NULL,
  `kefasihan` enum('0','1','2','3') COLLATE latin1_general_ci DEFAULT NULL,
  `komentar` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_bahasa
-- ----------------------------

-- ----------------------------
-- Table structure for `td_karyawan_cuti`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_cuti`;
CREATE TABLE `td_karyawan_cuti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_cuti` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `tgl_cuti` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_cuti
-- ----------------------------

-- ----------------------------
-- Table structure for `td_karyawan_gaji`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_gaji`;
CREATE TABLE `td_karyawan_gaji` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_gaji` char(2) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` char(3) COLLATE latin1_general_ci DEFAULT NULL,
  `frekuensi` enum('0','1','2','3') COLLATE latin1_general_ci DEFAULT NULL,
  `jml_gaji` int(20) DEFAULT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `tipe_gaji` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_gaji
-- ----------------------------
INSERT INTO `td_karyawan_gaji` VALUES ('1', '01', '001', '3', '3082500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('2', '01', '003', '3', '3551250', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('3', '01', '004', '3', '3082500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('4', '01', '006', '3', '3337500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('5', '01', '007', '3', '3200000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('6', '01', '008', '3', '3077500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('7', '01', '009', '3', '3297750', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('8', '01', '010', '3', '3077500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('9', '01', '012', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('10', '01', '014', '3', '3077500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('11', '01', '015', '3', '3200000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('12', '01', '016', '3', '3200000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('13', '01', '017', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('14', '01', '025', '3', '3200000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('15', '01', '027', '3', '3072500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('16', '01', '028', '3', '3200000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('17', '01', '029', '3', '3070000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('18', '01', '030', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('19', '01', '032', '3', '3067500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('20', '01', '035', '3', '3067500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('21', '01', '038', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('22', '01', '039', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('23', '01', '040', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('24', '01', '041', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('25', '01', '046', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('26', '01', '052', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('27', '01', '053', '3', '3065000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('28', '01', '059', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('29', '01', '060', '3', '3060000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('30', '01', '070', '3', '3057500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('31', '01', '074', '3', '3057500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('32', '01', '075', '3', '3057500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('33', '01', '077', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('34', '01', '078', '3', '3055000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('35', '01', '079', '3', '3055000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('36', '01', '087', '3', '3050000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('37', '01', '090', '3', '3050000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('38', '01', '093', '3', '3047500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('39', '01', '095', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('40', '01', '096', '3', '3100000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('41', '01', '098', '3', '3045000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('42', '01', '101', '3', '3045000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('43', '01', '102', '3', '3045000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('44', '01', '104', '3', '3045000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('45', '01', '107', '3', '3045000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('46', '01', '109', '3', '3042500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('47', '01', '117', '3', '3042500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('48', '01', '120', '3', '3042500', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('49', '01', '163', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('50', '01', '164', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('51', '01', '165', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('52', '01', '166', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('53', '01', '167', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('54', '01', '168', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('55', '01', '169', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('56', '01', '171', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('57', '01', '172', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('58', '01', '173', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('59', '01', '174', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('60', '01', '175', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('61', '01', '176', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('62', '01', '178', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('63', '01', '180', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('64', '01', '181', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('65', '01', '182', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('66', '01', '183', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('67', '01', '184', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('68', '01', '185', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('69', '01', '186', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('70', '01', '187', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('71', '01', '188', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('72', '01', '189', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('73', '01', '190', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('74', '01', '191', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('75', '01', '194', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('76', '01', '195', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('77', '01', '196', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('78', '01', '197', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('79', '01', '199', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('80', '01', '200', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('81', '01', '201', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('82', '01', '202', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('83', '01', '203', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('84', '01', '204', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('85', '01', '206', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('86', '01', '208', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('87', '01', '209', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('88', '01', '210', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('89', '01', '212', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('90', '01', '215', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('91', '01', '216', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('92', '01', '222', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('93', '01', '223', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('94', '01', '224', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('95', '01', '227', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('96', '01', '228', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('97', '01', '237', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('98', '01', '238', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('99', '01', '239', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('100', '01', '241', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('101', '01', '242', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('102', '01', '244', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('103', '01', '247', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('104', '01', '250', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('105', '01', '251', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('106', '01', '253', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('107', '01', '254', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('108', '01', '255', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('109', '01', '257', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('110', '01', '261', '3', '3040000', '', '0');
INSERT INTO `td_karyawan_gaji` VALUES ('111', '01', '262', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('112', '01', '263', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('113', '01', '264', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('114', '01', '265', '3', '3040000', '', '0');
INSERT INTO `td_karyawan_gaji` VALUES ('115', '01', '266', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('116', '01', '267', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('117', '01', '268', '3', '3040000', '', '0');
INSERT INTO `td_karyawan_gaji` VALUES ('118', '01', '269', '3', '3040000', '', '1');
INSERT INTO `td_karyawan_gaji` VALUES ('473', '01', '270', '3', '3040000', '', '1');

-- ----------------------------
-- Table structure for `td_karyawan_keahlian`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_keahlian`;
CREATE TABLE `td_karyawan_keahlian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_skill` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `thn_pengalaman` char(6) COLLATE latin1_general_ci DEFAULT NULL,
  `komentar` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_keahlian
-- ----------------------------

-- ----------------------------
-- Table structure for `td_karyawan_kontak_lain`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_kontak_lain`;
CREATE TABLE `td_karyawan_kontak_lain` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_kontak_lain` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `hubungan` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_rumah` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_mobile` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `telp_kantor` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_kontak_lain
-- ----------------------------
INSERT INTO `td_karyawan_kontak_lain` VALUES ('1', '271', 'Pak', 'Keluarga', '(021) 676767', '', '');

-- ----------------------------
-- Table structure for `td_karyawan_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_kpi`;
CREATE TABLE `td_karyawan_kpi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_kpi` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nilai` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_kpi
-- ----------------------------
INSERT INTO `td_karyawan_kpi` VALUES ('1', 'KPI161016000001', '001', '5');
INSERT INTO `td_karyawan_kpi` VALUES ('2', 'KPI161016000002', '001', '10');
INSERT INTO `td_karyawan_kpi` VALUES ('3', 'KPI161016000003', '001', '6');
INSERT INTO `td_karyawan_kpi` VALUES ('4', 'KPI241016000001', '001', '7');

-- ----------------------------
-- Table structure for `td_karyawan_mutasi`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_mutasi`;
CREATE TABLE `td_karyawan_mutasi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_mutasi` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `kd_karyawan` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `nik_lama` varchar(9) COLLATE latin1_general_ci DEFAULT NULL,
  `nik_baru` varchar(9) COLLATE latin1_general_ci DEFAULT NULL,
  `bagian_lama` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `jabatan_lama` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `bagian_baru` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `jabatan_baru` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_mutasi` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_mutasi`,`kd_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_mutasi
-- ----------------------------
INSERT INTO `td_karyawan_mutasi` VALUES ('1', '001/HRD-CAT/SK/XI/2016', '270', '07.16.270', '03.16.270', '07', '', '03', '', '15-11-2016');
INSERT INTO `td_karyawan_mutasi` VALUES ('2', '002/HRD-CAT/SK/XI/2016', '270', '03.16.270', '06.16.270', '03', '', '06', '', '15-11-2016');
INSERT INTO `td_karyawan_mutasi` VALUES ('3', '001/HRD-CAT/SK/XI/2017', '270', '06.16.270', '09.16.270', '06', '', '09', '', '15-11-2017');

-- ----------------------------
-- Table structure for `td_karyawan_pengalaman_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_pengalaman_kerja`;
CREATE TABLE `td_karyawan_pengalaman_kerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_perusahaan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_jabatan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_masuk` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_keluar` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `komentar` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_pengalaman_kerja
-- ----------------------------

-- ----------------------------
-- Table structure for `td_karyawan_riwayat_pendidikan`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_riwayat_pendidikan`;
CREATE TABLE `td_karyawan_riwayat_pendidikan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pendidikan` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_institusi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `program_studi` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `lama_studi` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `gpa` float(5,2) DEFAULT NULL,
  `thn_mulai` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `thn_akhir` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_riwayat_pendidikan
-- ----------------------------

-- ----------------------------
-- Table structure for `td_karyawan_tanggungan`
-- ----------------------------
DROP TABLE IF EXISTS `td_karyawan_tanggungan`;
CREATE TABLE `td_karyawan_tanggungan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_karyawan` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_tanggungan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `hubungan` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_karyawan_tanggungan
-- ----------------------------
INSERT INTO `td_karyawan_tanggungan` VALUES ('1', '271', 'Test', '1', '09-10-1994');

-- ----------------------------
-- Table structure for `td_organisasi`
-- ----------------------------
DROP TABLE IF EXISTS `td_organisasi`;
CREATE TABLE `td_organisasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_main_organisasi` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kd_sub_organisasi` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of td_organisasi
-- ----------------------------
INSERT INTO `td_organisasi` VALUES ('1', '01', '02');
INSERT INTO `td_organisasi` VALUES ('2', '02', '03');

-- ----------------------------
-- Table structure for `tm_cuti`
-- ----------------------------
DROP TABLE IF EXISTS `tm_cuti`;
CREATE TABLE `tm_cuti` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_cuti` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `nm_cuti` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `thn_periode` varchar(4) COLLATE latin1_general_ci DEFAULT NULL,
  `lama_cuti` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tm_cuti
-- ----------------------------
INSERT INTO `tm_cuti` VALUES ('1', '00001', 'Cuti Karyawan', '2016', '4');
INSERT INTO `tm_cuti` VALUES ('2', '00002', 'Cuti Karyawan', '2017', '4');

-- ----------------------------
-- Table structure for `tm_gaji`
-- ----------------------------
DROP TABLE IF EXISTS `tm_gaji`;
CREATE TABLE `tm_gaji` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_gaji` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nm_gaji` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `min_gaji` int(15) DEFAULT NULL,
  `max_gaji` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tm_gaji
-- ----------------------------
INSERT INTO `tm_gaji` VALUES ('1', '01', 'Gaji Pokok', '0', '10000000');
INSERT INTO `tm_gaji` VALUES ('2', '02', 'Tunjangan Jabatan', '0', '1000000');
INSERT INTO `tm_gaji` VALUES ('3', '03', 'Tunjangan Masa Kerja', '0', '1000000');
INSERT INTO `tm_gaji` VALUES ('4', '04', 'Tunjangan  Perfomance', '0', '1000000');
INSERT INTO `tm_gaji` VALUES ('5', '05', 'Jamsostek', '0', '1000000');
INSERT INTO `tm_gaji` VALUES ('6', '06', 'BPJS', '0', '1000000');

-- ----------------------------
-- Table structure for `tm_karyawan_cuti`
-- ----------------------------
DROP TABLE IF EXISTS `tm_karyawan_cuti`;
CREATE TABLE `tm_karyawan_cuti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_cuti` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `kd_karyawan` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `tgl_input` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`kd_cuti`,`kd_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tm_karyawan_cuti
-- ----------------------------

-- ----------------------------
-- Table structure for `tm_kota`
-- ----------------------------
DROP TABLE IF EXISTS `tm_kota`;
CREATE TABLE `tm_kota` (
  `fc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fc_kdprop` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fc_kdkota` char(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fv_nmkota` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=368 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tm_kota
-- ----------------------------
INSERT INTO `tm_kota` VALUES ('6', '01', '013', 'Kab. Aceh Selatan');
INSERT INTO `tm_kota` VALUES ('7', '01', '021', 'Kab. Aceh Tenggara');
INSERT INTO `tm_kota` VALUES ('8', '01', '036', 'Kab. Aceh Timur');
INSERT INTO `tm_kota` VALUES ('9', '01', '044', 'Kab. Aceh Tengah');
INSERT INTO `tm_kota` VALUES ('10', '01', '052', 'Kab. Aceh Barat');
INSERT INTO `tm_kota` VALUES ('11', '01', '067', 'Kab. Aceh Besar');
INSERT INTO `tm_kota` VALUES ('12', '01', '075', 'Kab. Pidie');
INSERT INTO `tm_kota` VALUES ('13', '01', '083', 'Kab. Aceh Utara');
INSERT INTO `tm_kota` VALUES ('14', '01', '091', 'Kab. Bireuen');
INSERT INTO `tm_kota` VALUES ('15', '01', '102', 'Kab. Aceh Singkil');
INSERT INTO `tm_kota` VALUES ('16', '01', '117', 'Kab. Simeulue');
INSERT INTO `tm_kota` VALUES ('17', '01', '156', 'Kab. Nagan Raya');
INSERT INTO `tm_kota` VALUES ('18', '01', '713', 'Kota Banda Aceh');
INSERT INTO `tm_kota` VALUES ('19', '01', '721', 'Kota Sabang');
INSERT INTO `tm_kota` VALUES ('20', '01', '736', 'Kota Lhokseumawe');
INSERT INTO `tm_kota` VALUES ('21', '01', '744', 'Kota Langsa');
INSERT INTO `tm_kota` VALUES ('22', '02', '016', 'Kab. Nias');
INSERT INTO `tm_kota` VALUES ('23', '02', '024', 'Kab. Tapanuli Selatan');
INSERT INTO `tm_kota` VALUES ('24', '02', '032', 'Kab. Tapanuli Tengah');
INSERT INTO `tm_kota` VALUES ('25', '02', '047', 'Kab. Tapanuli Utara');
INSERT INTO `tm_kota` VALUES ('26', '02', '055', 'Kab. Labuhan Batu');
INSERT INTO `tm_kota` VALUES ('27', '02', '063', 'Kab. Asahar');
INSERT INTO `tm_kota` VALUES ('28', '02', '071', 'Kab. Simalungan');
INSERT INTO `tm_kota` VALUES ('29', '02', '086', 'Kab. Dairi');
INSERT INTO `tm_kota` VALUES ('30', '02', '094', 'Kab. Karo');
INSERT INTO `tm_kota` VALUES ('31', '02', '105', 'Kab. Deli Serdang');
INSERT INTO `tm_kota` VALUES ('32', '02', '113', 'Kab. Langkat');
INSERT INTO `tm_kota` VALUES ('33', '02', '121', 'Kab. Toba Samosir');
INSERT INTO `tm_kota` VALUES ('34', '02', '136', 'Kab. Mandailing Natal');
INSERT INTO `tm_kota` VALUES ('35', '02', '716', 'Kota Sibolga');
INSERT INTO `tm_kota` VALUES ('36', '02', '724', 'Kota Tanjung Balai');
INSERT INTO `tm_kota` VALUES ('37', '02', '732', 'Kota Pematang Sianta');
INSERT INTO `tm_kota` VALUES ('38', '02', '747', 'Kota Tebingtinggi');
INSERT INTO `tm_kota` VALUES ('39', '02', '755', 'Kota Medan');
INSERT INTO `tm_kota` VALUES ('40', '02', '763', 'Kota Binjai');
INSERT INTO `tm_kota` VALUES ('41', '02', '771', 'Kota Pematang Sidempuan');
INSERT INTO `tm_kota` VALUES ('42', '03', '021', 'Kab. Pesisir Selatan');
INSERT INTO `tm_kota` VALUES ('43', '03', '027', 'Kab. Solok');
INSERT INTO `tm_kota` VALUES ('44', '03', '035', 'Kab. Sawah Lunto');
INSERT INTO `tm_kota` VALUES ('45', '03', '043', 'Kab. Tanah Datar');
INSERT INTO `tm_kota` VALUES ('46', '03', '051', 'Kab. Padang Pariaman');
INSERT INTO `tm_kota` VALUES ('47', '03', '066', 'Kab. Agam');
INSERT INTO `tm_kota` VALUES ('48', '03', '074', 'Kab. Limapuluhkota');
INSERT INTO `tm_kota` VALUES ('49', '03', '082', 'Kab. Paiaman');
INSERT INTO `tm_kota` VALUES ('50', '03', '097', 'Kab. Kepulauan Mentawai');
INSERT INTO `tm_kota` VALUES ('51', '03', '101', 'Kab. Dharmasraya');
INSERT INTO `tm_kota` VALUES ('52', '03', '712', 'Kota Padang');
INSERT INTO `tm_kota` VALUES ('53', '03', '727', 'Kota Solok');
INSERT INTO `tm_kota` VALUES ('54', '03', '735', 'Kota Sawah Lunto');
INSERT INTO `tm_kota` VALUES ('55', '03', '743', 'Kota Padang Panjang');
INSERT INTO `tm_kota` VALUES ('56', '03', '751', 'Kota Bukit Tinggi');
INSERT INTO `tm_kota` VALUES ('57', '03', '766', 'Kota Payakumbuh');
INSERT INTO `tm_kota` VALUES ('58', '03', '774', 'Kota Pariaman');
INSERT INTO `tm_kota` VALUES ('59', '04', '015', 'Kab. Indragiri Hulu');
INSERT INTO `tm_kota` VALUES ('60', '04', '023', 'Kab. Indragiri Hilir');
INSERT INTO `tm_kota` VALUES ('61', '04', '031', 'Kab. Kepulauan Riau');
INSERT INTO `tm_kota` VALUES ('62', '04', '046', 'Kab. Kampar');
INSERT INTO `tm_kota` VALUES ('63', '04', '054', 'Kab. Bengkalis');
INSERT INTO `tm_kota` VALUES ('64', '04', '062', 'Kab. Kediri');
INSERT INTO `tm_kota` VALUES ('65', '04', '077', 'Kab. Kuantan Singingi');
INSERT INTO `tm_kota` VALUES ('66', '04', '085', 'Kab. Natuna');
INSERT INTO `tm_kota` VALUES ('67', '04', '093', 'Kab. Siak');
INSERT INTO `tm_kota` VALUES ('68', '04', '104', 'Kab. Rokan Hilir');
INSERT INTO `tm_kota` VALUES ('69', '04', '112', 'Kab. Rokan Hulu');
INSERT INTO `tm_kota` VALUES ('70', '04', '127', 'Kab. Pelalawan');
INSERT INTO `tm_kota` VALUES ('71', '04', '715', 'Kota Pekanbaru');
INSERT INTO `tm_kota` VALUES ('72', '04', '723', 'Kota Batam');
INSERT INTO `tm_kota` VALUES ('73', '04', '731', 'Kota Dumai');
INSERT INTO `tm_kota` VALUES ('74', '04', '746', 'Kota Tanjung Pinang');
INSERT INTO `tm_kota` VALUES ('75', '05', '011', 'Kab. Kerinci');
INSERT INTO `tm_kota` VALUES ('76', '05', '034', 'Kab. Batanghari');
INSERT INTO `tm_kota` VALUES ('77', '05', '065', 'Kab. Sarolangun');
INSERT INTO `tm_kota` VALUES ('78', '05', '073', 'Kab. Merangin');
INSERT INTO `tm_kota` VALUES ('79', '05', '081', 'Kab. Tanjung Jabung Timur');
INSERT INTO `tm_kota` VALUES ('80', '05', '096', 'Kab. Tanjung Jabung Barat');
INSERT INTO `tm_kota` VALUES ('81', '05', '107', 'Kab. Muaro Jambi');
INSERT INTO `tm_kota` VALUES ('82', '05', '115', 'Kab. Bango');
INSERT INTO `tm_kota` VALUES ('83', '05', '123', 'Kab. Tebo');
INSERT INTO `tm_kota` VALUES ('84', '05', '711', 'Kota Jambi');
INSERT INTO `tm_kota` VALUES ('85', '06', '014', 'Kab. Ogan Komering Ulu');
INSERT INTO `tm_kota` VALUES ('86', '06', '022', 'Kab. Ogan Komering Ilir');
INSERT INTO `tm_kota` VALUES ('87', '06', '037', 'Kab. Muara Enim');
INSERT INTO `tm_kota` VALUES ('88', '06', '045', 'Kab. Lahat');
INSERT INTO `tm_kota` VALUES ('89', '06', '053', 'Kab. Musi Rawas');
INSERT INTO `tm_kota` VALUES ('90', '06', '061', 'Kab. Musi Banyuasin');
INSERT INTO `tm_kota` VALUES ('91', '06', '714', 'Kota Palembang');
INSERT INTO `tm_kota` VALUES ('92', '06', '737', 'Kota Prabumulih');
INSERT INTO `tm_kota` VALUES ('93', '06', '745', 'Kota Pagaralam');
INSERT INTO `tm_kota` VALUES ('94', '06', '753', 'Kota Lubuklinggau');
INSERT INTO `tm_kota` VALUES ('95', '07', '017', 'Kab. Bengkulu Selatan');
INSERT INTO `tm_kota` VALUES ('96', '07', '025', 'Kab. Rejanglebong');
INSERT INTO `tm_kota` VALUES ('97', '07', '033', 'Kab. Bengkulu Utara');
INSERT INTO `tm_kota` VALUES ('98', '07', '717', 'Kota Bengkulu');
INSERT INTO `tm_kota` VALUES ('99', '08', '013', 'Kab. Lampung Selatan');
INSERT INTO `tm_kota` VALUES ('100', '08', '021', 'Kab. Lampung Tengah');
INSERT INTO `tm_kota` VALUES ('101', '08', '036', 'Kab. Lampung Utara');
INSERT INTO `tm_kota` VALUES ('102', '08', '044', 'Kab. Lampung Barat');
INSERT INTO `tm_kota` VALUES ('103', '08', '052', 'Kab. Tanggamus');
INSERT INTO `tm_kota` VALUES ('104', '08', '067', 'Kab. Tulang Bawang');
INSERT INTO `tm_kota` VALUES ('105', '08', '075', 'Kab. Lampung Timur');
INSERT INTO `tm_kota` VALUES ('106', '08', '083', 'Kab. Way Kanan');
INSERT INTO `tm_kota` VALUES ('107', '08', '713', 'Kota Bandar Lampung');
INSERT INTO `tm_kota` VALUES ('108', '08', '721', 'Kota Metro');
INSERT INTO `tm_kota` VALUES ('109', '09', '016', 'Kab. Bangka');
INSERT INTO `tm_kota` VALUES ('110', '09', '024', 'Kab. Belitung');
INSERT INTO `tm_kota` VALUES ('111', '09', '716', 'Kota Pangkal Pinang');
INSERT INTO `tm_kota` VALUES ('112', '10', '014', 'Kab. Pandeglang');
INSERT INTO `tm_kota` VALUES ('113', '10', '022', 'Kab. Lebak');
INSERT INTO `tm_kota` VALUES ('114', '10', '037', 'Kab. Tangerang');
INSERT INTO `tm_kota` VALUES ('115', '10', '045', 'Kab. Serang');
INSERT INTO `tm_kota` VALUES ('116', '10', '714', 'Kota Tangerang');
INSERT INTO `tm_kota` VALUES ('117', '10', '722', 'Kota Cilegon');
INSERT INTO `tm_kota` VALUES ('118', '11', '717', 'Jakarta Selatan');
INSERT INTO `tm_kota` VALUES ('119', '11', '725', 'Jakarta Timur');
INSERT INTO `tm_kota` VALUES ('120', '11', '733', 'Jakarta Pusat');
INSERT INTO `tm_kota` VALUES ('121', '11', '741', 'Jakarta Barat');
INSERT INTO `tm_kota` VALUES ('122', '11', '756', 'Jakarta Utara');
INSERT INTO `tm_kota` VALUES ('123', '12', '036', 'Kab. Bogor');
INSERT INTO `tm_kota` VALUES ('124', '12', '044', 'Kab. Sukabumi');
INSERT INTO `tm_kota` VALUES ('125', '12', '052', 'Kab. Cianjur');
INSERT INTO `tm_kota` VALUES ('126', '12', '067', 'Kab. Bandung');
INSERT INTO `tm_kota` VALUES ('127', '12', '075', 'Kab. Garut');
INSERT INTO `tm_kota` VALUES ('128', '12', '083', 'Kab. Tasikmalaya');
INSERT INTO `tm_kota` VALUES ('129', '12', '091', 'Kab. Ciamis');
INSERT INTO `tm_kota` VALUES ('130', '12', '102', 'Kab. Kuningan');
INSERT INTO `tm_kota` VALUES ('131', '12', '117', 'Kab. Cirebon');
INSERT INTO `tm_kota` VALUES ('132', '12', '125', 'Kab. Majalengka');
INSERT INTO `tm_kota` VALUES ('133', '12', '133', 'Kab. Sumedang');
INSERT INTO `tm_kota` VALUES ('134', '12', '141', 'Kab. Indramayu');
INSERT INTO `tm_kota` VALUES ('135', '12', '156', 'Kab. Subang');
INSERT INTO `tm_kota` VALUES ('136', '12', '164', 'Kab. Purwakarta');
INSERT INTO `tm_kota` VALUES ('137', '12', '172', 'Kab. Karawang');
INSERT INTO `tm_kota` VALUES ('138', '12', '187', 'Kab. Bekasi');
INSERT INTO `tm_kota` VALUES ('139', '12', '713', 'Kota Bogor');
INSERT INTO `tm_kota` VALUES ('140', '12', '721', 'Kota Sukabumi');
INSERT INTO `tm_kota` VALUES ('141', '12', '736', 'Kota Bandung');
INSERT INTO `tm_kota` VALUES ('142', '12', '744', 'Kota Cirebon');
INSERT INTO `tm_kota` VALUES ('143', '12', '767', 'Kota Bekasi');
INSERT INTO `tm_kota` VALUES ('144', '12', '775', 'Kota Depok');
INSERT INTO `tm_kota` VALUES ('145', '12', '783', 'Kota Cimahi');
INSERT INTO `tm_kota` VALUES ('146', '12', '791', 'Kota Tasikmalaya');
INSERT INTO `tm_kota` VALUES ('147', '13', '016', 'Kab. Cilacap');
INSERT INTO `tm_kota` VALUES ('148', '13', '024', 'Kab. Banyumas');
INSERT INTO `tm_kota` VALUES ('149', '13', '032', 'Kab. Purbalingga');
INSERT INTO `tm_kota` VALUES ('150', '13', '047', 'Kab. Banjarnegara');
INSERT INTO `tm_kota` VALUES ('151', '13', '055', 'Kab. Kebumen');
INSERT INTO `tm_kota` VALUES ('152', '13', '063', 'Kab. Purworejo');
INSERT INTO `tm_kota` VALUES ('153', '13', '071', 'Kab. Wonosobo');
INSERT INTO `tm_kota` VALUES ('154', '13', '086', 'Kab. Magelang');
INSERT INTO `tm_kota` VALUES ('155', '13', '094', 'Kab. Boyolali');
INSERT INTO `tm_kota` VALUES ('156', '13', '105', 'Kab. Klaten');
INSERT INTO `tm_kota` VALUES ('157', '13', '113', 'Kab. Sukoharjo');
INSERT INTO `tm_kota` VALUES ('158', '13', '121', 'Kab. Wonogiri');
INSERT INTO `tm_kota` VALUES ('159', '13', '136', 'Kab. Karanganyar');
INSERT INTO `tm_kota` VALUES ('160', '13', '144', 'Kab. Sragen');
INSERT INTO `tm_kota` VALUES ('161', '13', '152', 'Kab. Grobogan');
INSERT INTO `tm_kota` VALUES ('162', '13', '167', 'Kab. Blora');
INSERT INTO `tm_kota` VALUES ('163', '13', '175', 'Kab. Rembang');
INSERT INTO `tm_kota` VALUES ('164', '13', '183', 'Kab. Pati');
INSERT INTO `tm_kota` VALUES ('165', '13', '191', 'Kab. Kudus');
INSERT INTO `tm_kota` VALUES ('166', '13', '202', 'Kab. Jepara');
INSERT INTO `tm_kota` VALUES ('167', '13', '217', 'Kab. Demak');
INSERT INTO `tm_kota` VALUES ('168', '13', '225', 'Kab. Semarang');
INSERT INTO `tm_kota` VALUES ('169', '13', '233', 'Kab. Temanggung');
INSERT INTO `tm_kota` VALUES ('170', '13', '241', 'Kab. Kendal');
INSERT INTO `tm_kota` VALUES ('171', '13', '256', 'Kab. Batang');
INSERT INTO `tm_kota` VALUES ('172', '13', '264', 'Kab. Pekalongan');
INSERT INTO `tm_kota` VALUES ('173', '13', '272', 'Kab. Pemalang');
INSERT INTO `tm_kota` VALUES ('174', '13', '287', 'Kab. Tegal');
INSERT INTO `tm_kota` VALUES ('175', '13', '295', 'Kab. Brebes');
INSERT INTO `tm_kota` VALUES ('176', '13', '716', 'Kota Magelang');
INSERT INTO `tm_kota` VALUES ('177', '13', '724', 'Kota Surakarta');
INSERT INTO `tm_kota` VALUES ('178', '13', '732', 'Kota Salatiga');
INSERT INTO `tm_kota` VALUES ('179', '13', '747', 'Kota Semarang');
INSERT INTO `tm_kota` VALUES ('180', '13', '755', 'Kota Pekalongan');
INSERT INTO `tm_kota` VALUES ('181', '13', '763', 'Kota Tegal');
INSERT INTO `tm_kota` VALUES ('182', '14', '012', 'Kab. Kulonprogo');
INSERT INTO `tm_kota` VALUES ('183', '14', '027', 'Kab. Bantul');
INSERT INTO `tm_kota` VALUES ('184', '14', '035', 'Kab. Gunungkidul');
INSERT INTO `tm_kota` VALUES ('185', '14', '043', 'Kab. Sleman');
INSERT INTO `tm_kota` VALUES ('186', '14', '712', 'Kota Yogyakarta');
INSERT INTO `tm_kota` VALUES ('187', '15', '015', 'Kab. Pacitan');
INSERT INTO `tm_kota` VALUES ('188', '15', '023', 'Kab. Ponorogo');
INSERT INTO `tm_kota` VALUES ('189', '15', '031', 'Kab. Trenggalek');
INSERT INTO `tm_kota` VALUES ('190', '15', '046', 'Kab. Tulungagung');
INSERT INTO `tm_kota` VALUES ('191', '15', '054', 'Kab. Blitar');
INSERT INTO `tm_kota` VALUES ('192', '15', '062', 'Kab. Kediri');
INSERT INTO `tm_kota` VALUES ('193', '15', '077', 'Kab. Malang');
INSERT INTO `tm_kota` VALUES ('194', '15', '085', 'Kab. Lumajang');
INSERT INTO `tm_kota` VALUES ('195', '15', '093', 'Kab. Jember');
INSERT INTO `tm_kota` VALUES ('196', '15', '104', 'Kab. Banyuwangi');
INSERT INTO `tm_kota` VALUES ('197', '15', '112', 'Kab. Bondowoso');
INSERT INTO `tm_kota` VALUES ('198', '15', '127', 'Kab. Situbondo');
INSERT INTO `tm_kota` VALUES ('199', '15', '135', 'Kab. Probolinggo');
INSERT INTO `tm_kota` VALUES ('200', '15', '143', 'Kab. Pasuruan');
INSERT INTO `tm_kota` VALUES ('201', '15', '151', 'Kab. Sidoarjo');
INSERT INTO `tm_kota` VALUES ('202', '15', '166', 'Kab. Mojokerto');
INSERT INTO `tm_kota` VALUES ('203', '15', '174', 'Kab. Jombang');
INSERT INTO `tm_kota` VALUES ('204', '15', '182', 'Kab. Nganjuk');
INSERT INTO `tm_kota` VALUES ('205', '15', '197', 'Kab. Madiun');
INSERT INTO `tm_kota` VALUES ('206', '15', '201', 'Kab. Magetan');
INSERT INTO `tm_kota` VALUES ('207', '15', '216', 'Kab. Ngawi');
INSERT INTO `tm_kota` VALUES ('208', '15', '224', 'Kab. Bojonegoro');
INSERT INTO `tm_kota` VALUES ('209', '15', '232', 'Kab. Tuban');
INSERT INTO `tm_kota` VALUES ('210', '15', '247', 'Kab. Lamongan');
INSERT INTO `tm_kota` VALUES ('211', '15', '255', 'Kab. Gresik');
INSERT INTO `tm_kota` VALUES ('212', '15', '263', 'Kab. Bangkalan');
INSERT INTO `tm_kota` VALUES ('213', '15', '271', 'Kab. Sampang');
INSERT INTO `tm_kota` VALUES ('214', '15', '286', 'Kab. Pamekasan');
INSERT INTO `tm_kota` VALUES ('215', '15', '294', 'Kab. Sumenep');
INSERT INTO `tm_kota` VALUES ('216', '15', '715', 'Kota Kediri');
INSERT INTO `tm_kota` VALUES ('217', '15', '723', 'Kota Blitar');
INSERT INTO `tm_kota` VALUES ('218', '15', '731', 'Kota Malang');
INSERT INTO `tm_kota` VALUES ('219', '15', '746', 'Kota Probolinggo');
INSERT INTO `tm_kota` VALUES ('220', '15', '754', 'Kota Pasuruan');
INSERT INTO `tm_kota` VALUES ('221', '15', '762', 'Kota Mojokerto');
INSERT INTO `tm_kota` VALUES ('222', '15', '777', 'Kota Madiun');
INSERT INTO `tm_kota` VALUES ('223', '15', '785', 'Kota Surabaya');
INSERT INTO `tm_kota` VALUES ('224', '15', '793', 'Kota Batu');
INSERT INTO `tm_kota` VALUES ('225', '16', '014', 'Kab. Jembrana');
INSERT INTO `tm_kota` VALUES ('226', '16', '022', 'Kab. Tabanan');
INSERT INTO `tm_kota` VALUES ('227', '16', '037', 'Kab. Badung');
INSERT INTO `tm_kota` VALUES ('228', '16', '045', 'Kab. Gianyar');
INSERT INTO `tm_kota` VALUES ('229', '16', '053', 'Kab. Klungkung');
INSERT INTO `tm_kota` VALUES ('230', '16', '061', 'Kab. Bangli');
INSERT INTO `tm_kota` VALUES ('231', '16', '076', 'Kab. Karangasem');
INSERT INTO `tm_kota` VALUES ('232', '16', '084', 'Kab. Buleleng');
INSERT INTO `tm_kota` VALUES ('233', '16', '714', 'Kota Denpasar');
INSERT INTO `tm_kota` VALUES ('234', '17', '017', 'Kab. Lombok Barat');
INSERT INTO `tm_kota` VALUES ('235', '17', '025', 'Kab. Lombok Tengah');
INSERT INTO `tm_kota` VALUES ('236', '17', '033', 'Kab. Lombok Timur');
INSERT INTO `tm_kota` VALUES ('237', '17', '041', 'Kab. Sumbawa');
INSERT INTO `tm_kota` VALUES ('238', '17', '056', 'Kab. Dompu');
INSERT INTO `tm_kota` VALUES ('239', '17', '064', 'Kab. Bima');
INSERT INTO `tm_kota` VALUES ('240', '17', '717', 'Kota Mataram');
INSERT INTO `tm_kota` VALUES ('241', '18', '013', 'Kab. Sumba Barat');
INSERT INTO `tm_kota` VALUES ('242', '18', '021', 'Kab. Sumba Timur');
INSERT INTO `tm_kota` VALUES ('243', '18', '036', 'Kab. Kupang');
INSERT INTO `tm_kota` VALUES ('244', '18', '044', 'Kab. Timor Tengah Selatan');
INSERT INTO `tm_kota` VALUES ('245', '18', '052', 'Kab. Timor Tengah Utara');
INSERT INTO `tm_kota` VALUES ('246', '18', '067', 'Kab. Belu');
INSERT INTO `tm_kota` VALUES ('247', '18', '075', 'Kab. Alor');
INSERT INTO `tm_kota` VALUES ('248', '18', '083', 'Kab. Flores Timur');
INSERT INTO `tm_kota` VALUES ('249', '18', '091', 'Kab. Sikka');
INSERT INTO `tm_kota` VALUES ('250', '18', '102', 'Kab. Ende');
INSERT INTO `tm_kota` VALUES ('251', '18', '117', 'Kab. Ngada');
INSERT INTO `tm_kota` VALUES ('252', '18', '125', 'Kab. Manggarai');
INSERT INTO `tm_kota` VALUES ('253', '18', '133', 'Kab. Lembata');
INSERT INTO `tm_kota` VALUES ('254', '18', '711', 'Kota Kupang');
INSERT INTO `tm_kota` VALUES ('255', '19', '016', 'Kab. Sambas');
INSERT INTO `tm_kota` VALUES ('256', '19', '024', 'Kab. Pontianak');
INSERT INTO `tm_kota` VALUES ('257', '19', '032', 'Kab. Sanggau');
INSERT INTO `tm_kota` VALUES ('258', '19', '047', 'Kab. Ketapang');
INSERT INTO `tm_kota` VALUES ('259', '19', '055', 'Kab. Sintang');
INSERT INTO `tm_kota` VALUES ('260', '19', '063', 'Kab. Kapuas Hulu');
INSERT INTO `tm_kota` VALUES ('261', '19', '071', 'Kab. Bengkayang');
INSERT INTO `tm_kota` VALUES ('262', '19', '086', 'Kab. Landak');
INSERT INTO `tm_kota` VALUES ('263', '19', '716', 'Kota Pontianak');
INSERT INTO `tm_kota` VALUES ('264', '19', '724', 'Kota Singkawang');
INSERT INTO `tm_kota` VALUES ('265', '20', '012', 'Kab. Kota Waringin Barat');
INSERT INTO `tm_kota` VALUES ('266', '20', '027', 'Kab. Kota Waringin Timur');
INSERT INTO `tm_kota` VALUES ('267', '20', '043', 'Kab. Kapuas');
INSERT INTO `tm_kota` VALUES ('268', '20', '051', 'Kab. Barito Selatan');
INSERT INTO `tm_kota` VALUES ('269', '20', '074', 'Kab. Barito Utara');
INSERT INTO `tm_kota` VALUES ('270', '20', '082', 'Kab. Gunung Mas');
INSERT INTO `tm_kota` VALUES ('271', '20', '712', 'Kota Palangkaraya');
INSERT INTO `tm_kota` VALUES ('272', '21', '015', 'Kab. Tanah Laut');
INSERT INTO `tm_kota` VALUES ('273', '21', '023', 'Kab. Kota Baru');
INSERT INTO `tm_kota` VALUES ('274', '21', '031', 'Kab. Banjar');
INSERT INTO `tm_kota` VALUES ('275', '21', '046', 'Kab. Barito Kual');
INSERT INTO `tm_kota` VALUES ('276', '21', '054', 'Kab. Tapin');
INSERT INTO `tm_kota` VALUES ('277', '21', '062', 'Kab. Kediri');
INSERT INTO `tm_kota` VALUES ('278', '21', '077', 'Kab. Hulu Sei Tengah');
INSERT INTO `tm_kota` VALUES ('279', '21', '085', 'Kab. Hulu Sei Utara');
INSERT INTO `tm_kota` VALUES ('280', '21', '093', 'Kab. Tabolong');
INSERT INTO `tm_kota` VALUES ('281', '21', '715', 'Kota Banjarmasin');
INSERT INTO `tm_kota` VALUES ('282', '21', '723', 'Kota Banjar Baru');
INSERT INTO `tm_kota` VALUES ('283', '22', '011', 'Kab. Pasir');
INSERT INTO `tm_kota` VALUES ('284', '22', '026', 'Kab. Kutai');
INSERT INTO `tm_kota` VALUES ('285', '22', '034', 'Kab. Berau');
INSERT INTO `tm_kota` VALUES ('286', '22', '042', 'Kab. Bulungan');
INSERT INTO `tm_kota` VALUES ('287', '22', '057', 'Kab. Nunukan');
INSERT INTO `tm_kota` VALUES ('288', '22', '065', 'Kab. Kutai Timur');
INSERT INTO `tm_kota` VALUES ('289', '22', '073', 'Kab. Malinau');
INSERT INTO `tm_kota` VALUES ('290', '22', '081', 'Kab. Kutai Barat');
INSERT INTO `tm_kota` VALUES ('291', '22', '711', 'Kota Balikpapan');
INSERT INTO `tm_kota` VALUES ('292', '22', '726', 'Kota Samarinda');
INSERT INTO `tm_kota` VALUES ('293', '22', '734', 'Kata Tarakan');
INSERT INTO `tm_kota` VALUES ('294', '22', '742', 'Kota Bontang');
INSERT INTO `tm_kota` VALUES ('295', '23', '015', 'Kab. Gorontalo');
INSERT INTO `tm_kota` VALUES ('296', '23', '023', 'Kab. Boalemo');
INSERT INTO `tm_kota` VALUES ('297', '23', '715', 'Kota Gorontalo');
INSERT INTO `tm_kota` VALUES ('298', '24', '026', 'Kab. Bolaang Mongondow');
INSERT INTO `tm_kota` VALUES ('299', '24', '034', 'Kab. Minahasa');
INSERT INTO `tm_kota` VALUES ('300', '24', '042', 'Kab. Sangihe Talaud');
INSERT INTO `tm_kota` VALUES ('301', '24', '726', 'Kota Manado');
INSERT INTO `tm_kota` VALUES ('302', '24', '734', 'Kota Bitung');
INSERT INTO `tm_kota` VALUES ('303', '25', '022', 'Kab. Poso');
INSERT INTO `tm_kota` VALUES ('304', '25', '037', 'Kab. Donggala');
INSERT INTO `tm_kota` VALUES ('305', '25', '053', 'Kab. Banggai Kepulauan');
INSERT INTO `tm_kota` VALUES ('306', '25', '061', 'Kab. Banggai Kepulauan');
INSERT INTO `tm_kota` VALUES ('307', '25', '076', 'Kab. Buol');
INSERT INTO `tm_kota` VALUES ('308', '25', '084', 'Kab. Toli-toli');
INSERT INTO `tm_kota` VALUES ('309', '25', '092', 'Kab. Morowa\'i');
INSERT INTO `tm_kota` VALUES ('310', '25', '103', 'Kab. Parigi Moutong');
INSERT INTO `tm_kota` VALUES ('311', '25', '714', 'Kota Palu');
INSERT INTO `tm_kota` VALUES ('312', '27', '017', 'Kab. Selayar');
INSERT INTO `tm_kota` VALUES ('313', '27', '025', 'Kab. Bulukumba');
INSERT INTO `tm_kota` VALUES ('314', '27', '033', 'Kab. Bantaeng');
INSERT INTO `tm_kota` VALUES ('315', '27', '041', 'Kab. Jeneponto');
INSERT INTO `tm_kota` VALUES ('316', '27', '056', 'Kab. Takalar');
INSERT INTO `tm_kota` VALUES ('317', '27', '064', 'Kab. Gowa');
INSERT INTO `tm_kota` VALUES ('318', '27', '072', 'Kab. Sinjai');
INSERT INTO `tm_kota` VALUES ('319', '27', '087', 'Kab. Bone');
INSERT INTO `tm_kota` VALUES ('320', '27', '095', 'Kab. Maros');
INSERT INTO `tm_kota` VALUES ('321', '27', '106', 'Kab. Pangkajene Kepulauan');
INSERT INTO `tm_kota` VALUES ('322', '27', '114', 'Kab. Barru');
INSERT INTO `tm_kota` VALUES ('323', '27', '122', 'Kab. Soppeng');
INSERT INTO `tm_kota` VALUES ('324', '27', '137', 'Kab. Wajo');
INSERT INTO `tm_kota` VALUES ('325', '27', '145', 'Kab. Sidenreng Rappang');
INSERT INTO `tm_kota` VALUES ('326', '27', '153', 'Kab. Pinrang');
INSERT INTO `tm_kota` VALUES ('327', '27', '161', 'Kab. Enrekang');
INSERT INTO `tm_kota` VALUES ('328', '27', '176', 'Kab. Luwu');
INSERT INTO `tm_kota` VALUES ('329', '27', '184', 'Kab. Tana Toraja');
INSERT INTO `tm_kota` VALUES ('330', '27', '192', 'Kab. Polewali Mamasa');
INSERT INTO `tm_kota` VALUES ('331', '27', '203', 'Kab. Majene');
INSERT INTO `tm_kota` VALUES ('332', '27', '211', 'Kab. Mamaju');
INSERT INTO `tm_kota` VALUES ('333', '27', '226', 'Kab. Luwu Utara');
INSERT INTO `tm_kota` VALUES ('334', '27', '717', 'Kota Makasar');
INSERT INTO `tm_kota` VALUES ('335', '27', '725', 'Kota Pare-pare');
INSERT INTO `tm_kota` VALUES ('336', '27', '733', 'Kota Palopo');
INSERT INTO `tm_kota` VALUES ('337', '28', '013', 'Kab. Buton');
INSERT INTO `tm_kota` VALUES ('338', '28', '021', 'Kab. Muna');
INSERT INTO `tm_kota` VALUES ('339', '28', '036', 'Kab. Kendari');
INSERT INTO `tm_kota` VALUES ('340', '28', '044', 'Kab. Kolaka');
INSERT INTO `tm_kota` VALUES ('341', '28', '713', 'Kota Kendari');
INSERT INTO `tm_kota` VALUES ('342', '28', '721', 'Kota Bau-bau');
INSERT INTO `tm_kota` VALUES ('343', '29', '013', 'Kab. Maluku Tenggara');
INSERT INTO `tm_kota` VALUES ('344', '29', '021', 'Kab. Maluku Tengah');
INSERT INTO `tm_kota` VALUES ('345', '29', '052', 'Kab. Buru');
INSERT INTO `tm_kota` VALUES ('346', '29', '067', 'Kab. Maluku Tenggara Barat');
INSERT INTO `tm_kota` VALUES ('347', '29', '713', 'Kota Ambon');
INSERT INTO `tm_kota` VALUES ('348', '30', '015', 'Kab. Maluku Utara');
INSERT INTO `tm_kota` VALUES ('349', '30', '023', 'Kab. Halmahera Tengah');
INSERT INTO `tm_kota` VALUES ('350', '30', '715', 'Kota Ternate');
INSERT INTO `tm_kota` VALUES ('351', '31', '011', 'Kab. Jayapura');
INSERT INTO `tm_kota` VALUES ('356', '31', '014', 'Kab. Biak Numfor');
INSERT INTO `tm_kota` VALUES ('361', '31', '017', 'Kab. Sorong');
INSERT INTO `tm_kota` VALUES ('357', '31', '022', 'Kab. Yapen Waropen');
INSERT INTO `tm_kota` VALUES ('362', '31', '025', 'Kab. Manokwari');
INSERT INTO `tm_kota` VALUES ('352', '31', '026', 'Kab. Jayawijaya');
INSERT INTO `tm_kota` VALUES ('363', '31', '033', 'Kab. Fak-fak');
INSERT INTO `tm_kota` VALUES ('353', '31', '034', 'Kab. Puncak Jaya');
INSERT INTO `tm_kota` VALUES ('358', '31', '037', 'Kab. Mimika');
INSERT INTO `tm_kota` VALUES ('354', '31', '042', 'Kab. Merauke');
INSERT INTO `tm_kota` VALUES ('359', '31', '045', 'Kab. Nabire');
INSERT INTO `tm_kota` VALUES ('360', '31', '053', 'Kab. Panini');
INSERT INTO `tm_kota` VALUES ('355', '31', '711', 'Kota Jayapura');
INSERT INTO `tm_kota` VALUES ('364', '31', '717', 'Kota Sorong');
INSERT INTO `tm_kota` VALUES ('365', '99', '999', 'LUAR NEGERI');

-- ----------------------------
-- Table structure for `tm_organisasi`
-- ----------------------------
DROP TABLE IF EXISTS `tm_organisasi`;
CREATE TABLE `tm_organisasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_organisasi` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nm_organisasi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `deskripsi` text COLLATE latin1_general_ci,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tm_organisasi
-- ----------------------------
INSERT INTO `tm_organisasi` VALUES ('1', '01', 'Kepala', 'Iki ndas e', '0');
INSERT INTO `tm_organisasi` VALUES ('2', '02', 'Leher', 'Iki gulu bos', '1');
INSERT INTO `tm_organisasi` VALUES ('3', '03', 'Badan', 'Iki awak', '2');

-- ----------------------------
-- Table structure for `tm_prop`
-- ----------------------------
DROP TABLE IF EXISTS `tm_prop`;
CREATE TABLE `tm_prop` (
  `fc_id` int(10) NOT NULL AUTO_INCREMENT,
  `fc_branch` char(9) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fc_kdprop` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fv_nmprop` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tm_prop
-- ----------------------------
INSERT INTO `tm_prop` VALUES ('1', null, '01', 'Nanggroe Aceh D.');
INSERT INTO `tm_prop` VALUES ('2', null, '02', 'Sumatera Utara');
INSERT INTO `tm_prop` VALUES ('3', null, '03', 'Sumatra Barat');
INSERT INTO `tm_prop` VALUES ('4', null, '04', 'Riau');
INSERT INTO `tm_prop` VALUES ('5', null, '05', 'Jambi');
INSERT INTO `tm_prop` VALUES ('6', null, '06', 'Sumatera Selatan');
INSERT INTO `tm_prop` VALUES ('7', null, '07', 'Bengkulu');
INSERT INTO `tm_prop` VALUES ('8', null, '08', 'Lampung');
INSERT INTO `tm_prop` VALUES ('9', null, '09', 'Kep. Bangka Belitung');
INSERT INTO `tm_prop` VALUES ('10', null, '10', 'Banten');
INSERT INTO `tm_prop` VALUES ('11', null, '11', 'DKI Jakarta');
INSERT INTO `tm_prop` VALUES ('12', null, '12', 'Jawa Barat');
INSERT INTO `tm_prop` VALUES ('13', null, '13', 'Jawa Tengah');
INSERT INTO `tm_prop` VALUES ('14', null, '14', 'D.I. Yogyakarta');
INSERT INTO `tm_prop` VALUES ('15', null, '15', 'Jawa Timur');
INSERT INTO `tm_prop` VALUES ('16', null, '16', 'Bali');
INSERT INTO `tm_prop` VALUES ('17', null, '17', 'Nusa Tenggara Barat');
INSERT INTO `tm_prop` VALUES ('18', null, '18', 'Nusa Tenggara Timur');
INSERT INTO `tm_prop` VALUES ('19', null, '19', 'Kalimantan Barat');
INSERT INTO `tm_prop` VALUES ('20', null, '20', 'Kalimantan Tengah');
INSERT INTO `tm_prop` VALUES ('21', null, '21', 'Kalimantan Selatan');
INSERT INTO `tm_prop` VALUES ('22', null, '22', 'Kalimantan Timur');
INSERT INTO `tm_prop` VALUES ('23', null, '23', 'Gorontalo');
INSERT INTO `tm_prop` VALUES ('24', null, '24', 'Sulawesi Utara');
INSERT INTO `tm_prop` VALUES ('25', null, '25', 'Sulawesi Tengah');
INSERT INTO `tm_prop` VALUES ('26', null, '27', 'Sulawesi Selatan');
INSERT INTO `tm_prop` VALUES ('27', null, '28', 'Sulawesi Tenggara');
INSERT INTO `tm_prop` VALUES ('28', null, '29', 'Maluku');
INSERT INTO `tm_prop` VALUES ('29', null, '30', 'Maluku Utara');
INSERT INTO `tm_prop` VALUES ('30', null, '31', 'Papua');
INSERT INTO `tm_prop` VALUES ('31', null, '44', 'OK');
INSERT INTO `tm_prop` VALUES ('32', null, '99', 'Luar Negeri');

-- ----------------------------
-- Table structure for `tm_shift_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `tm_shift_kerja`;
CREATE TABLE `tm_shift_kerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kd_shift` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nm_shift` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `jm_mulai` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `jm_habis` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `durasi` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `waktu_gilir` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of tm_shift_kerja
-- ----------------------------
