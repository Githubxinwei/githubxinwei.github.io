<?php
/*
* Created by PhpStorm
* User: Xin Wei
* Date: 2021/8/5 0005 
* Time: 13:44
* Desc:国家及地区MySQL数据
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
---
layout: post
title: 国家及地区MySQL数据
date: 2021-05-22
categories: mysql
tags: [mysql]
description: 国家及地区MySQL数据
---

    建表

    CREATE TABLE `world_map` (
    `id` int(11) NOT NULL,
    `name` varchar(50) DEFAULT NULL,
    `code` char(4) DEFAULT NULL,
    `pid` int(11) DEFAULT NULL,
    `layer` smallint(6) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    国家

    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (1, '中国', 'CHN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (2, '阿尔巴尼亚', 'ALB', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (3, '阿尔及利亚', 'DZA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (4, '阿富汗', 'AFG', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (5, '阿根廷', 'ARG', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (6, '阿联酋', 'ARE', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (7, '阿鲁巴', 'ABW', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (8, '阿曼', 'OMN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (9, '阿塞拜疆', 'AZE', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (10, '阿森松岛', 'ASC', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (11, '埃及', 'EGY', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (12, '埃塞俄比亚', 'ETH', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (13, '爱尔兰', 'IRL', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (14, '爱沙尼亚', 'EST', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (15, '安道尔', 'AND', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (16, '安哥拉', 'AGO', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (17, '安圭拉', 'AIA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (18, '安提瓜岛和巴布达', 'ATG', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (19, '奥地利', 'AUT', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (20, '奥兰群岛', 'ALA', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (21, '澳大利亚', 'AUS', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (22, '巴巴多斯岛', 'BRB', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (23, '巴布亚新几内亚', 'PNG', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (24, '巴哈马', 'BHS', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (25, '巴基斯坦', 'PAK', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (26, '巴拉圭', 'PRY', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (27, '巴勒斯坦', 'PSE', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (28, '巴林', 'BHR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (29, '巴拿马', 'PAN', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (30, '巴西', 'BRA', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (31, '白俄罗斯', 'BLR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (32, '百慕大', 'BMU', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (33, '保加利亚', 'BGR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (34, '北马里亚纳群岛', 'MNP', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (35, '贝宁', 'BEN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (36, '比利时', 'BEL', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (37, '冰岛', 'ISL', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (38, '波多黎各', 'PRI', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (39, '波兰', 'POL', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (40, '波斯尼亚和黑塞哥维那', 'BIH', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (41, '玻利维亚', 'BOL', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (42, '伯利兹', 'BLZ', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (43, '博茨瓦纳', 'BWA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (44, '不丹', 'BTN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (45, '布基纳法索', 'BFA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (46, '布隆迪', 'BDI', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (47, '布韦岛', 'BVT', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (48, '朝鲜', 'PRK', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (49, '丹麦', 'DNK', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (50, '德国', 'DEU', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (51, '东帝汶', 'TLS', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (52, '多哥', 'TGO', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (53, '多米尼加', 'DMA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (54, '多米尼加共和国', 'DOM', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (55, '俄罗斯', 'RUS', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (56, '厄瓜多尔', 'ECU', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (57, '厄立特里亚', 'ERI', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (58, '法国', 'FRA', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (59, '法罗群岛', 'FRO', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (60, '法属波利尼西亚', 'PYF', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (61, '法属圭亚那', 'GUF', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (62, '法属南部领地', 'ATF', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (63, '梵蒂冈', 'VAT', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (64, '菲律宾', 'PHL', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (65, '斐济', 'FJI', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (66, '芬兰', 'FIN', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (67, '佛得角', 'CPV', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (68, '弗兰克群岛', 'FLK', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (69, '冈比亚', 'GMB', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (70, '刚果共和国', 'COG', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (71, '刚果民主共和国', 'COD', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (72, '哥伦比亚', 'COL', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (73, '哥斯达黎加', 'CRI', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (74, '格恩西岛', 'GGY', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (75, '格林纳达', 'GRD', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (76, '格陵兰', 'GRL', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (77, '格鲁吉亚', 'GEG', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (78, '古巴', 'CUB', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (79, '瓜德罗普', 'GLP', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (80, '关岛', 'GUM', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (81, '圭亚那', 'GUY', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (82, '哈萨克斯坦', 'KAZ', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (83, '海地', 'HTI', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (84, '韩国', 'KOR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (85, '荷兰', 'NLD', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (86, '荷属安地列斯', 'ANT', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (87, '赫德和麦克唐纳群岛', 'HMD', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (88, '黑山', 'MEG', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (89, '洪都拉斯', 'HND', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (90, '基里巴斯', 'KIR', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (91, '吉布提', 'DJI', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (92, '吉尔吉斯斯坦', 'KGZ', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (93, '几内亚', 'GIN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (94, '几内亚比绍', 'GNB', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (95, '加拿大', 'CAN', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (96, '加纳', 'GHA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (97, '加蓬', 'GAB', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (98, '柬埔寨', 'KHM', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (99, '捷克', 'CZE', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100, '津巴布韦', 'ZWE', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (101, '喀麦隆', 'CMR', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (102, '卡塔尔', 'QAT', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (103, '开曼群岛', 'CYM', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (104, '科科斯群岛', 'CCK', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (105, '科摩罗', 'COM', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (106, '科特迪瓦', 'CIV', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (107, '科威特', 'KWT', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (108, '克罗地亚', 'HRV', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (109, '肯尼亚', 'KEN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (110, '库克群岛', 'COK', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (111, '拉脱维亚', 'LVA', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (112, '莱索托', 'LSO', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (113, '老挝', 'LAO', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (114, '黎巴嫩', 'LBN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (115, '立陶宛', 'LTU', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (116, '利比里亚', 'LBR', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (117, '利比亚', 'LBY', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (118, '列支敦士登', 'LIE', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (119, '留尼汪岛', 'REU', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (120, '卢森堡', 'LUX', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (121, '卢旺达', 'RWA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (122, '罗马尼亚', 'ROU', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (123, '马达加斯加', 'MDG', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (124, '马尔代夫', 'MDV', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (125, '马耳他', 'MLT', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (126, '马拉维', 'MWI', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (127, '马来西亚', 'MYS', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (128, '马里', 'MLI', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (129, '马其顿', 'MKD', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (130, '马绍尔群岛', 'MHL', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (131, '马提尼克', 'MTQ', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (132, '马约特岛', 'MYT', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (133, '曼岛', 'IMN', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (134, '毛里求斯', 'MUS', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (135, '毛里塔尼亚', 'MRT', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (136, '美国', 'USA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (137, '美属萨摩亚', 'ASM', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (138, '美属外岛', 'UMI', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (139, '蒙古', 'MNG', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (140, '蒙特塞拉特', 'MSR', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (141, '孟加拉国', 'BGD', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (142, '秘鲁', 'PER', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (143, '密克罗尼西亚', 'FSM', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (144, '缅甸', 'MMR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (145, '摩尔多瓦', 'MDA', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (146, '摩洛哥', 'MAR', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (147, '摩纳哥', 'MCO', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (148, '莫桑比克', 'MOZ', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (149, '墨西哥', 'MEX', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (150, '纳米比亚', 'NAM', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (151, '南非', 'ZAF', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (152, '南极洲', 'ATA', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (153, '南乔治亚和南桑德威奇群岛', 'SGS', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (154, '瑙鲁', 'NRU', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (155, '尼泊尔', 'NPL', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (156, '尼加拉瓜', 'NIC', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (157, '尼日尔', 'NER', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (158, '尼日利亚', 'NGA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (159, '纽埃', 'NIU', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (160, '挪威', 'NOR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (161, '诺福克', 'NFK', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (162, '帕劳群岛', 'PLW', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (163, '皮特凯恩', 'PCN', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (164, '葡萄牙', 'PRT', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (165, '乔治亚', 'GEO', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (166, '日本', 'JPN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (167, '瑞典', 'SWE', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (168, '瑞士', 'CHE', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (169, '萨尔瓦多', 'SLV', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (170, '萨摩亚', 'WSM', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (171, '塞尔维亚', 'SCG', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (172, '塞拉利昂', 'SLE', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (173, '塞内加尔', 'SEN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (174, '塞浦路斯', 'CYP', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (175, '塞舌尔', 'SYC', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (176, '沙特阿拉伯', 'SAU', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (177, '圣诞岛', 'CXR', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (178, '圣多美和普林西比', 'STP', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (179, '圣赫勒拿', 'SHN', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (180, '圣基茨和尼维斯', 'KNA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (181, '圣卢西亚', 'LCA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (182, '圣马力诺', 'SMR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (183, '圣皮埃尔和米克隆群岛', 'SPM', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (184, '圣文森特和格林纳丁斯', 'VCT', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (185, '斯里兰卡', 'LKA', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (186, '斯洛伐克', 'SVK', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (187, '斯洛文尼亚', 'SVN', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (188, '斯瓦尔巴和扬马廷', 'SJM', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (189, '斯威士兰', 'SWZ', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (190, '苏丹', 'SDN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (191, '苏里南', 'SUR', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (192, '所罗门群岛', 'SLB', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (193, '索马里', 'SOM', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (194, '塔吉克斯坦', 'TJK', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (195, '泰国', 'THA', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (196, '坦桑尼亚', 'TZA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (197, '汤加', 'TON', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (198, '特克斯和凯克特斯群岛', 'TCA', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (199, '特里斯坦达昆哈', 'TAA', NULL, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (200, '特立尼达和多巴哥', 'TTO', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (201, '突尼斯', 'TUN', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (202, '图瓦卢', 'TUV', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (203, '土耳其', 'TUR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (204, '土库曼斯坦', 'TKM', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (205, '托克劳', 'TKL', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (206, '瓦利斯和福图纳', 'WLF', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (207, '瓦努阿图', 'VUT', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (208, '危地马拉', 'GTM', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (209, '美属维尔京群岛', 'VIR', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (210, '英属维尔京群岛', 'VGB', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (211, '委内瑞拉', 'VEN', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (212, '文莱', 'BRN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (213, '乌干达', 'UGA', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (214, '乌克兰', 'UKR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (215, '乌拉圭', 'URY', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (216, '乌兹别克斯坦', 'UZB', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (217, '西班牙', 'ESP', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (218, '希腊', 'GRC', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (219, '新加坡', 'SGP', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (220, '新喀里多尼亚', 'NCL', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (221, '新西兰', 'NZL', 306, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (222, '匈牙利', 'HUN', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (223, '叙利亚', 'SYR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (224, '牙买加', 'JAM', 304, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (225, '亚美尼亚', 'ARM', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (226, '也门', 'YEM', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (227, '伊拉克', 'IRQ', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (228, '伊朗', 'IRN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (229, '以色列', 'ISR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (230, '意大利', 'ITA', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (231, '印度', 'IND', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (232, '印度尼西亚', 'IDN', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (233, '英国', 'GBR', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (234, '英属印度洋领地', 'IOT', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (235, '约旦', 'JOR', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (236, '越南', 'VNM', 301, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (237, '赞比亚', 'ZMB', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (238, '泽西岛', 'JEY', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (239, '乍得', 'TCD', 303, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (240, '直布罗陀', 'GIB', 302, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (241, '智利', 'CHL', 305, 2);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (242, '中非共和国', 'CAF', 303, 2);
    七大洲

    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (301, '亚洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (302, '欧洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (303, '非洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (304, '北美洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (305, '南美洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (306, '大洋洲', NULL, 0, 1);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (307, '南极洲', NULL, 0, 1);
    中国地区划分

    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100001, '华北', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100002, '东北', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100003, '华东', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100004, '中南', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100005, '西南', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100006, '西北', NULL, 1, 3);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (100007, '港澳台', NULL, 1, 3);
    国内省直辖市

    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (110000, '北京', NULL, 100001, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (120000, '天津', NULL, 100001, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (130000, '河北', NULL, 100001, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (140000, '山西', NULL, 100001, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (150000, '内蒙古', NULL, 100001, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (210000, '辽宁', NULL, 100002, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (220000, '吉林', NULL, 100002, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (230000, '黑龙江', NULL, 100002, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (310000, '上海', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (320000, '江苏', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (330000, '浙江', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (340000, '安徽', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (350000, '福建', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (360000, '江西', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (370000, '山东', NULL, 100003, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (410000, '河南', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (420000, '湖北', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (430000, '湖南', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (440000, '广东', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (450000, '广西', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (460000, '海南', NULL, 100004, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (500000, '重庆', NULL, 100005, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (510000, '四川', NULL, 100005, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (520000, '贵州', NULL, 100005, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (530000, '云南', NULL, 100005, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (540000, '西藏', NULL, 100005, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (610000, '陕西', NULL, 100006, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (620000, '甘肃', NULL, 100006, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (630000, '青海', NULL, 100006, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (640000, '宁夏', NULL, 100006, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (650000, '新疆', NULL, 100006, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (710000, '台湾', NULL, 100007, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (810000, '香港', NULL, 100007, 4);
    INSERT INTO `world_map` (`id`, `name`, `code`, `pid`, `layer`) VALUES (820000, '澳门', NULL, 100007, 4);