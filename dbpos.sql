/*
 Navicat Premium Data Transfer

 Source Server         : dev_aistrick
 Source Server Type    : MySQL
 Source Server Version : 100210
 Source Host           : localhost:3306
 Source Schema         : dbpos

 Target Server Type    : MySQL
 Target Server Version : 100210
 File Encoding         : 65001

 Date: 29/09/2020 19:21:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permissionname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ico` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menusubmenu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `multilevel` bit(1) NULL DEFAULT NULL,
  `separator` bit(1) NULL DEFAULT NULL,
  `order` int(255) NULL DEFAULT NULL,
  `status` bit(1) NULL DEFAULT NULL,
  `AllowMobile` bit(1) NULL DEFAULT NULL,
  `MobileRoute` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MobileLogo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES (1, 'Master User', NULL, 'fa-user', '0', b'1', b'0', 1, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (2, 'User', 'user', NULL, '1', b'1', b'0', 2, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (3, 'Role', 'role', NULL, '1', b'1', b'0', 3, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (4, 'Permission', 'permission', NULL, '1', b'1', b'0', 4, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (5, 'Master Article', NULL, 'fa-barcode', '0', b'1', b'0', 5, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (6, 'Warna', NULL, NULL, '5', b'1', b'0', 6, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (7, 'Motif', NULL, NULL, '5', b'1', b'0', 7, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (8, 'Size', NULL, NULL, '5', b'1', b'0', 8, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (9, 'Sex', NULL, NULL, '5', b'1', b'0', 9, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (10, 'Master Item', NULL, NULL, '15', b'1', b'0', 10, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (11, 'Transaksi', NULL, 'fa-shopping-cart', '0', b'1', b'0', 11, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (12, 'POS', NULL, NULL, '11', b'1', b'0', 12, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (13, 'Retur', NULL, NULL, '11', b'1', b'0', 13, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (14, 'Keep Barang', NULL, NULL, '15', b'1', b'0', 14, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (15, 'Inventory', NULL, 'fa-briefcase', '0', b'1', b'0', 15, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (16, 'Penerimaan Barang', NULL, NULL, '15', b'1', b'0', 16, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (17, 'Pengeluaran Barang', NULL, NULL, '15', b'1', b'0', 17, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (18, 'CRM', NULL, 'fa-binoculars', '0', b'1', b'0', 18, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (19, 'Sales', NULL, NULL, '18', b'1', b'0', 19, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (20, 'Customer', NULL, NULL, '18', b'1', b'0', 20, b'1', NULL, NULL, NULL);
INSERT INTO `permission` VALUES (21, 'Stock Opname', NULL, NULL, '15', b'1', b'0', 21, b'1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for permissionrole
-- ----------------------------
DROP TABLE IF EXISTS `permissionrole`;
CREATE TABLE `permissionrole`  (
  `roleid` int(11) NOT NULL,
  `permissionid` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissionrole
-- ----------------------------
INSERT INTO `permissionrole` VALUES (1, 1);
INSERT INTO `permissionrole` VALUES (1, 2);
INSERT INTO `permissionrole` VALUES (1, 3);
INSERT INTO `permissionrole` VALUES (1, 4);
INSERT INTO `permissionrole` VALUES (1, 5);
INSERT INTO `permissionrole` VALUES (1, 6);
INSERT INTO `permissionrole` VALUES (1, 7);
INSERT INTO `permissionrole` VALUES (1, 8);
INSERT INTO `permissionrole` VALUES (1, 9);
INSERT INTO `permissionrole` VALUES (1, 10);
INSERT INTO `permissionrole` VALUES (1, 11);
INSERT INTO `permissionrole` VALUES (1, 12);
INSERT INTO `permissionrole` VALUES (1, 13);
INSERT INTO `permissionrole` VALUES (1, 14);
INSERT INTO `permissionrole` VALUES (1, 15);
INSERT INTO `permissionrole` VALUES (1, 16);
INSERT INTO `permissionrole` VALUES (1, 17);
INSERT INTO `permissionrole` VALUES (1, 18);
INSERT INTO `permissionrole` VALUES (1, 19);
INSERT INTO `permissionrole` VALUES (1, 20);
INSERT INTO `permissionrole` VALUES (1, 21);
INSERT INTO `permissionrole` VALUES (8, 11);
INSERT INTO `permissionrole` VALUES (8, 12);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'SU');
INSERT INTO `roles` VALUES (8, 'Cashier');

-- ----------------------------
-- Table structure for ttest
-- ----------------------------
DROP TABLE IF EXISTS `ttest`;
CREATE TABLE `ttest`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nomor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ttest
-- ----------------------------
INSERT INTO `ttest` VALUES (1, '1002');
INSERT INTO `ttest` VALUES (2, '1003');

-- ----------------------------
-- Table structure for userrole
-- ----------------------------
DROP TABLE IF EXISTS `userrole`;
CREATE TABLE `userrole`  (
  `userid` int(11) NOT NULL,
  `roleid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of userrole
-- ----------------------------
INSERT INTO `userrole` VALUES (14, 1);
INSERT INTO `userrole` VALUES (74, 4);
INSERT INTO `userrole` VALUES (78, 2);
INSERT INTO `userrole` VALUES (79, 3);
INSERT INTO `userrole` VALUES (80, 5);
INSERT INTO `userrole` VALUES (81, 6);
INSERT INTO `userrole` VALUES (82, 4);
INSERT INTO `userrole` VALUES (84, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createdby` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createdon` datetime(0) NULL DEFAULT NULL,
  `HakAkses` int(255) NULL DEFAULT NULL COMMENT '1: admin,2: guru, 3 : murid',
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `verified` bit(1) NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `browser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (14, 'admin', 'admin', '440308e0a299d722ebc5a9459a56d27adffc7ad28688d4471fdc1c7a8324f9a5cabdcd25bae8fe71b65837f6dd33fd1a9187ff4e2b2fea10e88289b70fdb79a221Nz7VN+sVNcNv1J/4lhqE9nfn5cpZTw8zhp2ge4pY0=', 'mnl', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Procedure structure for test_error
-- ----------------------------
DROP PROCEDURE IF EXISTS `test_error`;
delimiter ;;
CREATE PROCEDURE `test_error`(id INT)
BEGIN
   DECLARE errno SMALLINT UNSIGNED DEFAULT 31001;
   SET @errmsg = '';
	 SET @count = 0 ;
	 
	 SELECT COUNT(*) INTO @count FROM ttest WHERE id = id
	 AND nomor ='1001';
	 
	 
   IF @count > 0 THEN
			SET @errmsg = 'CATCH ERROR';
      SIGNAL SQLSTATE '45000' SET
      MYSQL_ERRNO = errno,
      MESSAGE_TEXT = @errmsg;
   END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ttest
-- ----------------------------
DROP TRIGGER IF EXISTS `T_Validation`;
delimiter ;;
CREATE TRIGGER `T_Validation` AFTER INSERT ON `ttest` FOR EACH ROW CALL test_error(new.id)
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
