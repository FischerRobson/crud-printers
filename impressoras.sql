/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : impressoras

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-28 12:32:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `impressora`
-- ----------------------------
DROP TABLE IF EXISTS `impressora`;
CREATE TABLE `impressora` (
  `id_impressora` int(11) NOT NULL AUTO_INCREMENT,
  `nr_serie` varchar(30) NOT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `e_bkp` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_impressora`),
  KEY `id_modelo` (`id_modelo`),
  KEY `id_setor` (`id_setor`),
  CONSTRAINT `impressora_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `impressora_ibfk_2` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id_setor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of impressora
-- ----------------------------
INSERT INTO `impressora` VALUES ('1', 'ZDEJB07K7233KJA', '1', '5', '10.10.1.42', 'N');
INSERT INTO `impressora` VALUES ('2', 'ZDEJB07K7233JBA', '1', '4', '10.10.1.60', 'N');
INSERT INTO `impressora` VALUES ('3', 'ZDEJ07K7233J9A', '1', '6', '10.10.1.62', 'N');
INSERT INTO `impressora` VALUES ('4', '765a1fa130A', '5', '17', '10.10.10.10', 'S');
INSERT INTO `impressora` VALUES ('5', 'SAF798Z7AS4C65a', '1', '1', '10.10.10.10', 'N');
INSERT INTO `impressora` VALUES ('6', '7as78fa1sf65aw', '1', '1', '10.10.10.10', 'S');
INSERT INTO `impressora` VALUES ('7', '789789789789', '4', '39', '0.0.0.0', 'S');
INSERT INTO `impressora` VALUES ('8', 'jaja77787', '3', '50', '45.45.45.45', 'S');
INSERT INTO `impressora` VALUES ('9', 'asgsdg', '1', '1', 'sdgsgsgd', 'N');
INSERT INTO `impressora` VALUES ('10', 'sgsdgsdg', '1', '1', 'sgdsdg', 'N');
INSERT INTO `impressora` VALUES ('11', 'gdsdgsgsgd', '1', '1', 'sgdsg', 'N');
INSERT INTO `impressora` VALUES ('12', 'sgsgsdgsgdsdg', '1', '1', 'sgdsgsgsgsg', 'N');
INSERT INTO `impressora` VALUES ('13', 'sgsdgsdgsdg', '1', '1', 'sgsdgsgd', 'N');
INSERT INTO `impressora` VALUES ('14', 'Testedoxiaomi', '4', '26', 'Xiaomi', 'S');
INSERT INTO `impressora` VALUES ('15', 'busca', '4', '5', 'busca', 'N');
INSERT INTO `impressora` VALUES ('16', 'Udi7×u830', '5', '43', '1.1.1.1', 'S');
INSERT INTO `impressora` VALUES ('17', 'Tonaglobo', '4', '32', '3.3.3.6', 'S');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id_lg` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nm_user` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_lg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'fischer', 'fischer', 'fischer');
INSERT INTO `login` VALUES ('2', 'maicon', 'maicao', 'maicon');
INSERT INTO `login` VALUES ('3', 'guto', 'gayzao', 'augusto');

-- ----------------------------
-- Table structure for `modelo`
-- ----------------------------
DROP TABLE IF EXISTS `modelo`;
CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_modelo` varchar(255) NOT NULL DEFAULT '',
  `nm_marca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of modelo
-- ----------------------------
INSERT INTO `modelo` VALUES ('1', 'SL-M4020ND', 'Samsung');
INSERT INTO `modelo` VALUES ('2', 'SL-M4070FR', 'Samsung');
INSERT INTO `modelo` VALUES ('3', 'GC420T', 'Zebra');
INSERT INTO `modelo` VALUES ('4', 'ZT410', 'Zebra');
INSERT INTO `modelo` VALUES ('5', 'Ricoh', 'Ricoh');

-- ----------------------------
-- Table structure for `setor`
-- ----------------------------
DROP TABLE IF EXISTS `setor`;
CREATE TABLE `setor` (
  `id_setor` int(2) NOT NULL AUTO_INCREMENT,
  `nm_setor` varchar(255) NOT NULL,
  PRIMARY KEY (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of setor
-- ----------------------------
INSERT INTO `setor` VALUES ('1', 'TI');
INSERT INTO `setor` VALUES ('2', 'Fatuamento');
INSERT INTO `setor` VALUES ('3', 'Administração');
INSERT INTO `setor` VALUES ('4', 'Nutrição');
INSERT INTO `setor` VALUES ('5', 'COL');
INSERT INTO `setor` VALUES ('6', 'Recep SUS');
INSERT INTO `setor` VALUES ('7', 'CDI SUS');
INSERT INTO `setor` VALUES ('8', 'CDI Frei');
INSERT INTO `setor` VALUES ('9', 'Laboratório');
INSERT INTO `setor` VALUES ('10', 'CECOI');
INSERT INTO `setor` VALUES ('11', 'CHAP');
INSERT INTO `setor` VALUES ('12', 'Banco de Sangue');
INSERT INTO `setor` VALUES ('13', 'Centro Obstétrico');
INSERT INTO `setor` VALUES ('14', 'Centro Cirurgico');
INSERT INTO `setor` VALUES ('15', 'Hemodiálise');
INSERT INTO `setor` VALUES ('16', 'Fármacia');
INSERT INTO `setor` VALUES ('17', 'Cartório');
INSERT INTO `setor` VALUES ('18', 'Hotelária');
INSERT INTO `setor` VALUES ('19', 'Banco de Leite');
INSERT INTO `setor` VALUES ('20', 'Neuro');
INSERT INTO `setor` VALUES ('21', 'Eletro');
INSERT INTO `setor` VALUES ('22', 'Hemodinâmica');
INSERT INTO `setor` VALUES ('23', 'Manutenção');
INSERT INTO `setor` VALUES ('24', 'Financeiro');
INSERT INTO `setor` VALUES ('25', 'CERTO 1');
INSERT INTO `setor` VALUES ('26', 'CERTO 2');
INSERT INTO `setor` VALUES ('27', 'Recep Frei');
INSERT INTO `setor` VALUES ('28', 'Internação SUS');
INSERT INTO `setor` VALUES ('29', 'Internação Frei');
INSERT INTO `setor` VALUES ('30', 'RH ');
INSERT INTO `setor` VALUES ('31', 'RH/Qualidade');
INSERT INTO `setor` VALUES ('32', 'UTQ');
INSERT INTO `setor` VALUES ('33', 'UTI Adulto');
INSERT INTO `setor` VALUES ('34', 'UTI Infantil');
INSERT INTO `setor` VALUES ('35', 'Pediátria');
INSERT INTO `setor` VALUES ('36', 'Biomédic');
INSERT INTO `setor` VALUES ('37', ' UTI Neonatal');
INSERT INTO `setor` VALUES ('38', 'Hospital de Ensino');
INSERT INTO `setor` VALUES ('39', 'CCIH');
INSERT INTO `setor` VALUES ('40', 'Almoxarifado');
INSERT INTO `setor` VALUES ('41', 'Recebimento');
INSERT INTO `setor` VALUES ('42', 'Medicina Ocupacional');
INSERT INTO `setor` VALUES ('43', 'UTQ Amb');
INSERT INTO `setor` VALUES ('44', 'Recrutamento');
INSERT INTO `setor` VALUES ('45', 'Serviço Social');
INSERT INTO `setor` VALUES ('46', 'Multi');
INSERT INTO `setor` VALUES ('47', 'SUS Infantil');
INSERT INTO `setor` VALUES ('48', '2A');
INSERT INTO `setor` VALUES ('49', '2B');
INSERT INTO `setor` VALUES ('50', '3A');
INSERT INTO `setor` VALUES ('51', '3C');
INSERT INTO `setor` VALUES ('52', '4A');
