/*
MySQL Backup
Source Server Version: 5.1.31
Source Database: ozy
Date: 2/3/2023 14:36:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `produk`
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `youtube` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` enum('admin','kasir','pelanggan') DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `produk` VALUES ('1','DAIHATSU ROCKY','MT','135000000','car-rent-1.png','ini cuman test ya bro','','on'), ('2','DAIHATSU TERIOS 2022','MT','190000000','car-rent-2.png','test aja lagi bro','','on'), ('3','DAIHATSU SIRION','CVT MT','155000000','car-rent-3.png','test','','off');
INSERT INTO `user` VALUES ('1','admin','admin','admin','Admin');
