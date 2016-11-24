/*
Navicat MySQL Data Transfer

Source Server         : MySQL to Navicat
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : db_reservasi_hotel

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-09-14 12:17:24
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `tb_setting` VALUES ('8', 'bg_img', 'Florida-Hotel-Orlando-Night.jpg');
