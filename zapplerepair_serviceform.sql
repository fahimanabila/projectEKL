-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `invoice_detail`;
CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_item` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `warranty` int(5) NOT NULL,
  `warranty_type` varchar(20) NOT NULL,
  `desc_item` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL,
  `upload_by` varchar(30) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_detail` (`id`, `name_item`, `price`, `cost_price`, `currency`, `warranty`, `warranty_type`, `desc_item`, `upload_date`, `upload_by`, `update_date`, `update_by`) VALUES
(1,	'trial',	9999.00,	0.00,	'trial',	9999,	'trial',	'trial',	'2020-05-04 21:50:13',	'fahima',	'2020-05-04 21:50:13',	'fahima'),
(2,	'trial2',	8888.00,	0.00,	'trial2',	8888,	'trial2',	'trial2',	'2020-05-04 21:51:27',	'fahima',	'2020-05-04 21:51:27',	'fahima');

DROP TABLE IF EXISTS `invoice_path`;
CREATE TABLE `invoice_path` (
  `id` int(11) NOT NULL,
  `no_service` double NOT NULL,
  `upload_date` datetime NOT NULL,
  `upload_by` varchar(20) NOT NULL,
  `file_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `item_in`;
CREATE TABLE `item_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(255) NOT NULL,
  `item_id` int(5) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty_in` int(5) NOT NULL,
  `date_in` date NOT NULL,
  `add_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `item_out`;
CREATE TABLE `item_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(255) NOT NULL,
  `item_id` int(5) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty_out` int(5) NOT NULL,
  `date_out` date NOT NULL,
  `out_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `item_retur`;
CREATE TABLE `item_retur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_id` varchar(11) NOT NULL,
  `item_id` int(5) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qty_in` int(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `date_in` date NOT NULL,
  `input_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-05-06 21:27:24
