/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : dbpos

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 16/11/2020 17:46:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detailmutasi
-- ----------------------------
DROP TABLE IF EXISTS `detailmutasi`;
CREATE TABLE `detailmutasi`  (
  `NoTransaksi` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `LineNum` int(11) NOT NULL,
  `KodeItem` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Qty` double(16, 2) NOT NULL,
  `Price` double(16, 2) NOT NULL,
  `LineTotal` double(16, 2) NOT NULL,
  `CreatedBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CreatedOn` datetime(6) NOT NULL,
  INDEX `FKDetail`(`NoTransaksi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detailmutasi
-- ----------------------------
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 1, '101.0001', 11.00, 13027.72, 143304.92, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 2, '101.0002', 42.00, 14000.00, 588000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 3, '101.0003', 38.00, 13532.98, 514253.36, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 4, '101.0004', 34.00, 13532.98, 460121.43, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 5, '101.0005', 2.00, 13177.72, 26355.44, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 6, '101.0006', 13.00, 9430.88, 122601.43, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 7, '101.0007', 7.00, 9431.19, 66018.35, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 8, '101.0008', 246.00, 13000.00, 3198000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 9, '101.0009', 2.00, 10000.00, 20000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 10, '101.0010', 86.00, 9435.63, 811463.76, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 11, '101.0011', 374.00, 8177.06, 3058220.58, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 12, '101.0012', 276.00, 8170.80, 2255141.63, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 13, '101.0013', 1.00, 9277.72, 9277.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 14, '101.0014', 1.00, 7853.84, 7853.84, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 15, '101.0015', 18.00, 13532.98, 243593.70, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 16, '101.0016', 37.00, 9277.72, 343275.64, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 17, '101.0017', 1.00, 9277.72, 9277.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 18, '101.0018', 21.00, 9277.72, 194832.12, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 19, '101.0019', 1.00, 13027.72, 13027.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 20, '101.0020', 42.00, 10000.00, 420000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 21, '101.0021', 1.00, 10000.00, 10000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 22, '101.0022', 2.00, 14000.00, 28000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 23, '101.0023', 22.00, 10000.00, 220000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 24, '101.0024', 1.00, 13027.72, 13027.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 25, '101.0025', 1.00, 10000.00, 10000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 26, '101.0026', 206.00, 9443.55, 1945371.53, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 27, '101.0027', 49.00, 9585.61, 469695.12, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 28, '101.0028', 80.00, 13532.98, 1082638.65, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 29, '101.0029', 34.00, 13532.98, 460121.43, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 30, '101.0030', 32.00, 9277.72, 296887.04, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 31, '101.0031', 260.00, 8166.85, 2123381.11, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 32, '101.0032', 248.00, 8469.74, 2100494.73, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 33, '101.0033', 31.00, 10000.00, 310000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 34, '101.0034', 3.00, 13177.72, 39533.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 35, '101.0035', 1.00, 13177.72, 13177.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 36, '101.0036', 14.00, 9277.72, 129888.08, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 37, '101.0037', 17.00, 10000.00, 170000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 38, '101.0038', 55.00, 10000.00, 550000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 39, '101.0039', 1.00, 9427.72, 9427.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 40, '101.0040', 2.00, 13690.88, 27381.76, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 41, '101.0041', 86.00, 10000.00, 860000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 42, '101.0042', 7.00, 14000.00, 98000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 43, '101.0043', 1.00, 10000.00, 10000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 44, '101.0044', 22.00, 9585.61, 210883.52, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 45, '101.0045', 29.00, 9585.61, 277982.83, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 46, '101.0046', 820.00, 8963.75, 7350273.46, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 47, '101.0047', 3.00, 13177.72, 39533.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 48, '101.0048', 229.00, 13000.00, 2977000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 49, '101.0049', 178.00, 13000.00, 2314000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 50, '101.0050', 3.00, 13177.72, 39533.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 51, '101.0051', 1.00, 13177.72, 13177.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 52, '101.0052', 33.00, 13177.72, 434864.76, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 53, '101.0053', 7.00, 13177.72, 92244.04, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 54, '101.0054', 190.00, 8177.06, 1553641.47, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 55, '101.0055', 3.00, 13177.72, 39533.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 56, '101.0056', 1.00, 14000.00, 14000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 57, '101.0057', 63.00, 13000.00, 819000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 58, '101.0058', 3.00, 9277.72, 27833.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 59, '101.0059', 20.00, 9277.72, 185554.40, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 60, '101.0060', 31.00, 14000.00, 434000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 61, '101.0061', 88.00, 9585.61, 843534.10, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 62, '101.0062', 77.00, 9585.61, 738092.33, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 63, '101.0063', 3.00, 9277.72, 27833.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 64, '101.0064', 4.00, 9277.72, 37110.88, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 65, '101.0065', 3.00, 9277.72, 27833.16, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 66, '101.0066', 463.00, 10000.00, 4630000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 67, '101.0067', 5.00, 13296.14, 66480.71, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 68, '101.0068', 692.00, 8167.68, 5652034.91, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 69, '101.0069', 16.00, 9427.72, 150843.52, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 70, '101.0070', 2.00, 10000.00, 20000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 71, '101.0071', 14.00, 9430.88, 132032.31, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 72, '101.0072', 36.00, 10000.00, 360000.00, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 73, '101.0073', 120.00, 9277.72, 1113326.40, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 74, '101.0074', 4.00, 13532.98, 54131.93, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 75, '101.0075', 38.00, 9277.72, 352553.36, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 76, '101.0076', 59.00, 9277.72, 547385.48, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 77, '101.0077', 1.00, 13177.72, 13177.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 78, '101.0078', 1.00, 13177.72, 13177.72, 'MNL', '2020-11-16 17:45:25.940000');
INSERT INTO `detailmutasi` VALUES ('MTIN000001', 79, '101.0079', 1.00, 13177.72, 13177.72, 'MNL', '2020-11-16 17:45:25.940000');

SET FOREIGN_KEY_CHECKS = 1;
