---
layout: post
title: php导出复杂列的excel
date: 2020-05-22
categories: excel
tags: [excel]
description: php导出复杂列的excel
---
##### 需要导出的表格如下：
<img src="./../../../../../img/excel.jpg" />
//前台处理
document.getElementById("a_export").onclick=function(){
    $("#LoadingPark").show();
    document.getElementById("does").value="exportPartyCarChangeAnalyse";
    document.frmAdd.action = cmdurl;
    document.frmAdd.submit();
    $("#LoadingPark").hide();
    return false;
}
##### //后台处理
第一步：需要引用PHPExcel.php文件
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
第二步：接收数据，合并单元格，导出表格。
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Huang")
->setLastModifiedBy("Huang")
->setTitle("数据EXCEL导出")
->setSubject("数据EXCEL导出")
->setDescription("备份数据")
->setKeywords("excel")
->setCategory("result file");
$objPHPExcel->createSheet();
$objectSheet=$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("党政机关公务用车变动情况汇总表");
$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
//设置表头
$objectSheet->setCellValue('A1', '党政机关公务用车变动情况汇总表');
$objectSheet->mergeCells("A" . 1 .':'."X" . 1);

$objectSheet->setCellValue('A2', '统计项目');
$objectSheet->mergeCells("A" . 2 .':'."B" . 3);

$objectSheet->setCellValue('C2', '合计');
$objectSheet->mergeCells("C" . 2 .':'."E" . 2);
$objectSheet->setCellValue('C3', '编制数');
$objectSheet->setCellValue('D3', '实有数');
$objectSheet->setCellValue('E3', '账面价值(万元)');

$objectSheet->setCellValue('F2', '省部级干部用车');
$objectSheet->mergeCells("F" . 2 .':'."H" . 2);
$objectSheet->setCellValue('F3', '编制数');
$objectSheet->setCellValue('G3', '实有数');
$objectSheet->setCellValue('H3', '账面价值(万元)');

$objectSheet->setCellValue('I2', '机要通信用车');
$objectSheet->mergeCells("I" . 2 .':'."K" . 2);
$objectSheet->setCellValue('I3', '编制数');
$objectSheet->setCellValue('J3', '实有数');
$objectSheet->setCellValue('K3', '账面价值(万元)');

$objectSheet->setCellValue('L2', '应急保障用车');
$objectSheet->mergeCells("L" . 2 .':'."N" . 2);
$objectSheet->setCellValue('L3', '编制数');
$objectSheet->setCellValue('M3', '实有数');
$objectSheet->setCellValue('N3', '账面价值(万元)');

$objectSheet->setCellValue('O2', '执法执勤用车');
$objectSheet->mergeCells("O" . 2 .':'."Q" . 2);
$objectSheet->setCellValue('O3', '编制数');
$objectSheet->setCellValue('P3', '实有数');
$objectSheet->setCellValue('Q3', '账面价值(万元)');

$objectSheet->setCellValue('R2', '特种专业技术用车');
$objectSheet->mergeCells("R" . 2 .':'."T" . 2);
$objectSheet->setCellValue('R3', '编制数');
$objectSheet->setCellValue('S3', '实有数');
$objectSheet->setCellValue('T3', '账面价值(万元)');

$objectSheet->setCellValue('U2', '其他公务用车');
$objectSheet->mergeCells("U" . 2 .':'."W" . 2);
$objectSheet->setCellValue('U3', '编制数');
$objectSheet->setCellValue('V3', '实有数');
$objectSheet->setCellValue('W3', '账面价值(万元)');

$objectSheet->setCellValue('X2', '备注');
$objectSheet->mergeCells("X" . 2 .':'."X" . 3);

$objectSheet->setCellValue('A4', '年初数');

$objectSheet->mergeCells("A" . 4 .':'."B" . 4);
$objectSheet->setCellValue('A5', '全年配备车辆');
$objectSheet->mergeCells("A" . 5 .':'."A" . 9);
$objectSheet->setCellValue('B5', '合计');
$objectSheet->setCellValue('B6', '购置');
$objectSheet->setCellValue('B7', '调拨');
$objectSheet->setCellValue('B8', '接受捐赠');
$objectSheet->setCellValue('B9', '其他');

$objectSheet->setCellValue('A10', '全年处置车辆');
$objectSheet->mergeCells("A" . 10 .':'."A" . 15);
$objectSheet->setCellValue('B10', '合计');
$objectSheet->setCellValue('B11', '拍卖');
$objectSheet->setCellValue('B12', '报废');
$objectSheet->setCellValue('B13', '厂家回收');
$objectSheet->setCellValue('B14', '调剂');
$objectSheet->setCellValue('B15', '其他');

$objectSheet->setCellValue('A16', '年末数');
$objectSheet->mergeCells("A" . 16 .':'."B" . 16);
//接收数据
$bianzhi_total = $_POST['bianzhi_total'];
$shiyou_total = $_POST['shiyou_total'];
$price_total = $_POST['price_total'];
$shiwubianzhi = $_POST['shiwubianzhi'];
$shiwuxianyou = $_POST['shiwuxianyou'];
$shiwuprice = $_POST['shiwuprice'];
$jiyaobianzhi = $_POST['jiyaobianzhi'];
$jiyaoxianyou = $_POST['jiyaoxianyou'];
$jiyaoprice = $_POST['jiyaoprice'];
$yingjibianzhi = $_POST['yingjibianzhi'];
$yingjixianyou = $_POST['yingjixianyou'];
$yingjiprice = $_POST['yingjiprice'];
$zhifabianzhi = $_POST['zhifabianzhi'];
$zhifaxianyou = $_POST['zhifaxianyou'];
$zhifaprice = $_POST['zhifaprice'];
$tezhongbianzhi = $_POST['tezhongbianzhi'];
$tezhongxianyou = $_POST['tezhongxianyou'];
$tezhongprice = $_POST['tezhongprice'];
$qitabianzhi = $_POST['qitabianzhi'];
$qitaxianyou = $_POST['qitaxianyou'];
$qitaprice = $_POST['qitaprice'];
$line1Remark = $_POST['line1Remark'];
//放入数据
$objectSheet->setCellValue('C' . 4, $bianzhi_total);
$objectSheet->setCellValue('D' . 4, $shiyou_total);
$objectSheet->setCellValue('E' . 4, $price_total);
$objectSheet->setCellValue('F' . 4, $shiwubianzhi);
$objectSheet->setCellValue('G' . 4, $shiwuxianyou);
$objectSheet->setCellValue('H' . 4, $shiwuprice);
$objectSheet->setCellValue('I' . 4, $jiyaobianzhi);
$objectSheet->setCellValue('J' . 4, $jiyaoxianyou);
$objectSheet->setCellValue('K' . 4, $jiyaoprice);
$objectSheet->setCellValue('L' . 4, $yingjibianzhi);
$objectSheet->setCellValue('M' . 4, $yingjixianyou);
$objectSheet->setCellValue('N' . 4, $yingjiprice);
$objectSheet->setCellValue('O' . 4, $zhifabianzhi);
$objectSheet->setCellValue('P' . 4, $zhifaxianyou);
$objectSheet->setCellValue('Q' . 4, $zhifaprice);
$objectSheet->setCellValue('R' . 4, $tezhongbianzhi);
$objectSheet->setCellValue('S' . 4, $tezhongxianyou);
$objectSheet->setCellValue('T' . 4, $tezhongprice);
$objectSheet->setCellValue('U' . 4, $qitabianzhi);
$objectSheet->setCellValue('V' . 4, $qitaxianyou);
$objectSheet->setCellValue('W' . 4, $qitaprice);
$objectSheet->setCellValue('X' . 4, $line1Remark);
//接收数据
$heji_all = $_POST["heji_all"];
$heji_price_all = $_POST["heji_price_all"];
$heji1 = $_POST["heji1"];
$heji1_price = $_POST["heji1_price"];
$heji2 = $_POST["heji2"];
$heji2_price = $_POST["heji2_price"];
$heji3 = $_POST["heji3"];
$heji3_price = $_POST["heji3_price"];
$heji4 = $_POST["heji4"];
$heji4_price = $_POST["heji4_price"];
$heji8 = $_POST["heji8"];
$heji8_price = $_POST["heji8_price"];
$hejiz = $_POST["hejiz"];
$hejiz_price = $_POST["hejiz_price"];
$line2Remark = $_POST["line2Remark"];
//放入数据
$objectSheet->setCellValue('C' . 5, "—");
$objectSheet->setCellValue('D' . 5, $heji_all);
$objectSheet->setCellValue('E' . 5, $heji_price_all);
$objectSheet->setCellValue('F' . 5, "—");
$objectSheet->setCellValue('G' . 5, $heji1);
$objectSheet->setCellValue('H' . 5, $heji1_price);
$objectSheet->setCellValue('I' . 5, "—");
$objectSheet->setCellValue('J' . 5, $heji2);
$objectSheet->setCellValue('K' . 5, $heji2_price);
$objectSheet->setCellValue('L' . 5, "—");
$objectSheet->setCellValue('M' . 5, $heji3);
$objectSheet->setCellValue('N' . 5, $heji3_price);
$objectSheet->setCellValue('O' . 5, "—");
$objectSheet->setCellValue('P' . 5, $heji4);
$objectSheet->setCellValue('Q' . 5, $heji4_price);
$objectSheet->setCellValue('R' . 5, "—");
$objectSheet->setCellValue('S' . 5, $heji8);
$objectSheet->setCellValue('T' . 5, $heji8_price);
$objectSheet->setCellValue('U' . 5, "—");
$objectSheet->setCellValue('V' . 5, $hejiz);
$objectSheet->setCellValue('W' . 5, $hejiz_price);
$objectSheet->setCellValue('X' . 5, $line2Remark);
//接收数据
$gouzhi_heji = $_POST["gouzhi_heji"];
$gouzhi_price_heji = $_POST["gouzhi_price_heji"];
$gouzhi_1 = $_POST["gouzhi_1"];
$gouzhi_price_1 = $_POST["gouzhi_price_1"];
$gouzhi_2 = $_POST["gouzhi_2"];
$gouzhi_price_2 = $_POST["gouzhi_price_2"];
$gouzhi_3 = $_POST["gouzhi_3"];
$gouzhi_price_3 = $_POST["gouzhi_price_3"];
$gouzhi_4 = $_POST["gouzhi_4"];
$gouzhi_price_4 = $_POST["gouzhi_price_4"];
$gouzhi_8 = $_POST["gouzhi_8"];
$gouzhi_price_8 = $_POST["gouzhi_price_8"];
$gouzhi_z = $_POST["gouzhi_z"];
$gouzhi_price_z = $_POST["gouzhi_price_z"];
$line3Remark = $_POST["line3Remark"];
//放入数据
$objectSheet->setCellValue('C' . 6, "—");
$objectSheet->setCellValue('D' . 6, $gouzhi_heji);
$objectSheet->setCellValue('E' . 6, $gouzhi_price_heji);
$objectSheet->setCellValue('F' . 6, "—");
$objectSheet->setCellValue('G' . 6, $gouzhi_1);
$objectSheet->setCellValue('H' . 6, $gouzhi_price_1);
$objectSheet->setCellValue('I' . 6, "—");
$objectSheet->setCellValue('J' . 6, $gouzhi_2);
$objectSheet->setCellValue('K' . 6, $gouzhi_price_2);
$objectSheet->setCellValue('L' . 6, "—");
$objectSheet->setCellValue('M' . 6, $gouzhi_3);
$objectSheet->setCellValue('N' . 6, $gouzhi_price_3);
$objectSheet->setCellValue('O' . 6, "—");
$objectSheet->setCellValue('P' . 6, $gouzhi_4);
$objectSheet->setCellValue('Q' . 6, $gouzhi_price_4);
$objectSheet->setCellValue('R' . 6, "—");
$objectSheet->setCellValue('S' . 6, $gouzhi_8);
$objectSheet->setCellValue('T' . 6, $gouzhi_price_8);
$objectSheet->setCellValue('U' . 6, "—");
$objectSheet->setCellValue('V' . 6, $gouzhi_z);
$objectSheet->setCellValue('W' . 6, $gouzhi_price_z);
$objectSheet->setCellValue('X' . 6, $line3Remark);
//接收数据
$tiaoji_heji = $_POST["tiaoji_heji"];
$tiaoji_price_heji = $_POST["tiaoji_price_heji"];
$tiaoji_1 = $_POST["tiaoji_1"];
$tiaoji_price_1 = $_POST["tiaoji_price_1"];
$tiaoji_2 = $_POST["tiaoji_2"];
$tiaoji_price_2 = $_POST["tiaoji_price_2"];
$tiaoji_3 = $_POST["tiaoji_3"];
$tiaoji_price_3 = $_POST["tiaoji_price_3"];
$tiaoji_4 = $_POST["tiaoji_4"];
$tiaoji_price_4 = $_POST["tiaoji_price_4"];
$tiaoji_8 = $_POST["tiaoji_8"];
$tiaoji_price_8 = $_POST["tiaoji_price_8"];
$tiaoji_z = $_POST["tiaoji_z"];
$tiaoji_price_z = $_POST["tiaoji_price_z"];
$line4Remark = $_POST["line4Remark"];
//放入数据
$objectSheet->setCellValue('C' . 7, "—");
$objectSheet->setCellValue('D' . 7, $tiaoji_heji);
$objectSheet->setCellValue('E' . 7, $tiaoji_price_heji);
$objectSheet->setCellValue('F' . 7, "—");
$objectSheet->setCellValue('G' . 7, $tiaoji_1);
$objectSheet->setCellValue('H' . 7, $tiaoji_price_1);
$objectSheet->setCellValue('I' . 7, "—");
$objectSheet->setCellValue('J' . 7, $tiaoji_2);
$objectSheet->setCellValue('K' . 7, $tiaoji_price_2);
$objectSheet->setCellValue('L' . 7, "—");
$objectSheet->setCellValue('M' . 7, $tiaoji_3);
$objectSheet->setCellValue('N' . 7, $tiaoji_price_3);
$objectSheet->setCellValue('O' . 7, "—");
$objectSheet->setCellValue('P' . 7, $tiaoji_4);
$objectSheet->setCellValue('Q' . 7, $tiaoji_price_4);
$objectSheet->setCellValue('R' . 7, "—");
$objectSheet->setCellValue('S' . 7, $tiaoji_8);
$objectSheet->setCellValue('T' . 7, $tiaoji_price_8);
$objectSheet->setCellValue('U' . 7, "—");
$objectSheet->setCellValue('V' . 7, $tiaoji_z);
$objectSheet->setCellValue('W' . 7, $tiaoji_price_z);
$objectSheet->setCellValue('X' . 7, $line4Remark);
//接收数据
$line5Remark = $_POST["line5Remark"];
//放入数据
$objectSheet->setCellValue('C' . 8, "—");
$objectSheet->setCellValue('D' . 8, 0);
$objectSheet->setCellValue('E' . 8, 0);
$objectSheet->setCellValue('F' . 8, "—");
$objectSheet->setCellValue('G' . 8, 0);
$objectSheet->setCellValue('H' . 8, 0);
$objectSheet->setCellValue('I' . 8, "—");
$objectSheet->setCellValue('J' . 8, 0);
$objectSheet->setCellValue('K' . 8, 0);
$objectSheet->setCellValue('L' . 8, "—");
$objectSheet->setCellValue('M' . 8, 0);
$objectSheet->setCellValue('N' . 8, 0);
$objectSheet->setCellValue('O' . 8, "—");
$objectSheet->setCellValue('P' . 8, 0);
$objectSheet->setCellValue('Q' . 8, 0);
$objectSheet->setCellValue('R' . 8, "—");
$objectSheet->setCellValue('S' . 8, 0);
$objectSheet->setCellValue('T' . 8, 0);
$objectSheet->setCellValue('U' . 8, "—");
$objectSheet->setCellValue('V' . 8, 0);
$objectSheet->setCellValue('W' . 8, 0);
$objectSheet->setCellValue('X' . 8, $line5Remark);
//接收数据
$line6Remark = $_POST["line6Remark"];
//放入数据
$objectSheet->setCellValue('C' . 9, "—");
$objectSheet->setCellValue('D' . 9, 0);
$objectSheet->setCellValue('E' . 9, 0);
$objectSheet->setCellValue('F' . 9, "—");
$objectSheet->setCellValue('G' . 9, 0);
$objectSheet->setCellValue('H' . 9, 0);
$objectSheet->setCellValue('I' . 9, "—");
$objectSheet->setCellValue('J' . 9, 0);
$objectSheet->setCellValue('K' . 9, 0);
$objectSheet->setCellValue('L' . 9, "—");
$objectSheet->setCellValue('M' . 9, 0);
$objectSheet->setCellValue('N' . 9, 0);
$objectSheet->setCellValue('O' . 9, "—");
$objectSheet->setCellValue('P' . 9, 0);
$objectSheet->setCellValue('Q' . 9, 0);
$objectSheet->setCellValue('R' . 9, "—");
$objectSheet->setCellValue('S' . 9, 0);
$objectSheet->setCellValue('T' . 9, 0);
$objectSheet->setCellValue('U' . 9, "—");
$objectSheet->setCellValue('V' . 9, 0);
$objectSheet->setCellValue('W' . 9, 0);
$objectSheet->setCellValue('X' . 9, $line6Remark);
//接收数据
$heji_1_all = $_POST["heji_1_all"];
$heji_1_price_all = $_POST["heji_1_price_all"];
$heji_1 = $_POST["heji_1"];
$heji_1_price = $_POST["heji_1_price"];
$heji_2 = $_POST["heji_2"];
$heji_2_price = $_POST["heji_2_price"];
$heji_3 = $_POST["heji_3"];
$heji_3_price = $_POST["heji_3_price"];
$heji_4 = $_POST["heji_4"];
$heji_4_price = $_POST["heji_4_price"];
$heji_8 = $_POST["heji_8"];
$heji_8_price = $_POST["heji_8_price"];
$heji_z = $_POST["heji_z"];
$heji_z_price = $_POST["heji_z_price"];
$line7Remark = $_POST["line7Remark"];
//放入数据
$objectSheet->setCellValue('C' . 10, "—");
$objectSheet->setCellValue('D' . 10, $heji_1_all);
$objectSheet->setCellValue('E' . 10, $heji_1_price_all);
$objectSheet->setCellValue('F' . 10, "—");
$objectSheet->setCellValue('G' . 10, $heji_1);
$objectSheet->setCellValue('H' . 10, $heji_1_price);
$objectSheet->setCellValue('I' . 10, "—");
$objectSheet->setCellValue('J' . 10, $heji_2);
$objectSheet->setCellValue('K' . 10, $heji_2_price);
$objectSheet->setCellValue('L' . 10, "—");
$objectSheet->setCellValue('M' . 10, $heji_3);
$objectSheet->setCellValue('N' . 10, $heji_3_price);
$objectSheet->setCellValue('O' . 10, "—");
$objectSheet->setCellValue('P' . 10, $heji_4);
$objectSheet->setCellValue('Q' . 10, $heji_4_price);
$objectSheet->setCellValue('R' . 10, "—");
$objectSheet->setCellValue('S' . 10, $heji_8);
$objectSheet->setCellValue('T' . 10, $heji_8_price);
$objectSheet->setCellValue('U' . 10, "—");
$objectSheet->setCellValue('V' . 10, $heji_z);
$objectSheet->setCellValue('W' . 10, $heji_z_price);
$objectSheet->setCellValue('X' . 10, $line7Remark);
//接收数据
$paimai_heji = $_POST["paimai_heji"];
$paimai_price_heji = $_POST["paimai_price_heji"];
$paimai_1 = $_POST["paimai_1"];
$paimai_price_1 = $_POST["paimai_price_1"];
$paimai_2 = $_POST["paimai_2"];
$paimai_price_2 = $_POST["paimai_price_2"];
$paimai_3 = $_POST["paimai_3"];
$paimai_price_3 = $_POST["paimai_price_3"];
$paimai_4 = $_POST["paimai_4"];
$paimai_price_4 = $_POST["paimai_price_4"];
$paimai_8 = $_POST["paimai_8"];
$paimai_price_8 = $_POST["paimai_price_8"];
$paimai_z = $_POST["paimai_z"];
$paimai_price_z = $_POST["paimai_price_z"];
$line8Remark = $_POST["line8Remark"];
//放入数据
$objectSheet->setCellValue('C' . 11, "—");
$objectSheet->setCellValue('D' . 11, $paimai_heji);
$objectSheet->setCellValue('E' . 11, $paimai_price_heji);
$objectSheet->setCellValue('F' . 11, "—");
$objectSheet->setCellValue('G' . 11, $paimai_1);
$objectSheet->setCellValue('H' . 11, $paimai_price_1);
$objectSheet->setCellValue('I' . 11, "—");
$objectSheet->setCellValue('J' . 11, $paimai_2);
$objectSheet->setCellValue('K' . 11, $paimai_price_2);
$objectSheet->setCellValue('L' . 11, "—");
$objectSheet->setCellValue('M' . 11, $paimai_3);
$objectSheet->setCellValue('N' . 11, $paimai_price_3);
$objectSheet->setCellValue('O' . 11, "—");
$objectSheet->setCellValue('P' . 11, $paimai_4);
$objectSheet->setCellValue('Q' . 11, $paimai_price_4);
$objectSheet->setCellValue('R' . 11, "—");
$objectSheet->setCellValue('S' . 11, $paimai_8);
$objectSheet->setCellValue('T' . 11, $paimai_price_z);
$objectSheet->setCellValue('U' . 11, "—");
$objectSheet->setCellValue('V' . 11, $paimai_z);
$objectSheet->setCellValue('W' . 11, $heji_z_price);
$objectSheet->setCellValue('X' . 11, $line8Remark);
//接收数据
$baofei_heji = $_POST["baofei_heji"];
$baofei_price_heji = $_POST["baofei_price_heji"];
$baofei_1 = $_POST["baofei_1"];
$baofei_price_1 = $_POST["baofei_price_1"];
$baofei_2 = $_POST["baofei_2"];
$baofei_price_2 = $_POST["baofei_price_2"];
$baofei_3 = $_POST["baofei_3"];
$baofei_price_3 = $_POST["baofei_price_3"];
$baofei_4 = $_POST["baofei_4"];
$baofei_price_4 = $_POST["baofei_price_4"];
$baofei_8 = $_POST["baofei_8"];
$baofei_price_8 = $_POST["baofei_price_8"];
$baofei_z = $_POST["baofei_z"];
$baofei_price_z = $_POST["baofei_price_z"];
$line9Remark = $_POST["line9Remark"];
//放入数据
$objectSheet->setCellValue('C' . 12, "—");
$objectSheet->setCellValue('D' . 12, $baofei_heji);
$objectSheet->setCellValue('E' . 12, $baofei_price_heji);
$objectSheet->setCellValue('F' . 12, "—");
$objectSheet->setCellValue('G' . 12, $baofei_1);
$objectSheet->setCellValue('H' . 12, $baofei_price_1);
$objectSheet->setCellValue('I' . 12, "—");
$objectSheet->setCellValue('J' . 12, $baofei_2);
$objectSheet->setCellValue('K' . 12, $baofei_price_2);
$objectSheet->setCellValue('L' . 12, "—");
$objectSheet->setCellValue('M' . 12, $baofei_3);
$objectSheet->setCellValue('N' . 12, $baofei_price_3);
$objectSheet->setCellValue('O' . 12, "—");
$objectSheet->setCellValue('P' . 12, $baofei_4);
$objectSheet->setCellValue('Q' . 12, $baofei_price_4);
$objectSheet->setCellValue('R' . 12, "—");
$objectSheet->setCellValue('S' . 12, $baofei_8);
$objectSheet->setCellValue('T' . 12, $baofei_price_8);
$objectSheet->setCellValue('U' . 12, "—");
$objectSheet->setCellValue('V' . 12, $baofei_z);
$objectSheet->setCellValue('W' . 12, $baofei_price_z);
$objectSheet->setCellValue('X' . 12, $line9Remark);
//接收数据
$line10Remark = $_POST["line10Remark"];
//放入数据
$objectSheet->setCellValue('C' . 13, "—");
$objectSheet->setCellValue('D' . 13, 0);
$objectSheet->setCellValue('E' . 13, 0);
$objectSheet->setCellValue('F' . 13, "—");
$objectSheet->setCellValue('G' . 13, 0);
$objectSheet->setCellValue('H' . 13, 0);
$objectSheet->setCellValue('I' . 13, "—");
$objectSheet->setCellValue('J' . 13, 0);
$objectSheet->setCellValue('K' . 13, 0);
$objectSheet->setCellValue('L' . 13, "—");
$objectSheet->setCellValue('M' . 13, 0);
$objectSheet->setCellValue('N' . 13, 0);
$objectSheet->setCellValue('O' . 13, "—");
$objectSheet->setCellValue('P' . 13, 0);
$objectSheet->setCellValue('Q' . 13, 0);
$objectSheet->setCellValue('R' . 13, "—");
$objectSheet->setCellValue('S' . 13, 0);
$objectSheet->setCellValue('T' . 13, 0);
$objectSheet->setCellValue('U' . 13, "—");
$objectSheet->setCellValue('V' . 13, 0);
$objectSheet->setCellValue('W' . 13, 0);
$objectSheet->setCellValue('X' . 13, $line10Remark);
//接收数据
$tiaoji_1_heji = $_POST["tiaoji_1_heji"];
$tiaoji_1_price_heji = $_POST["tiaoji_1_price_heji"];
$tiaoji_1_1 = $_POST["tiaoji_1_1"];
$tiaoji_1_price_1 = $_POST["tiaoji_1_price_1"];
$tiaoji_1_2 = $_POST["tiaoji_1_2"];
$tiaoji_1_price_2 = $_POST["tiaoji_1_price_2"];
$tiaoji_1_3 = $_POST["tiaoji_1_3"];
$tiaoji_1_price_3 = $_POST["tiaoji_1_price_3"];
$tiaoji_1_4 = $_POST["tiaoji_1_4"];
$tiaoji_1_price_4 = $_POST["tiaoji_1_price_4"];
$tiaoji_1_8 = $_POST["tiaoji_1_8"];
$tiaoji_1_price_8 = $_POST["tiaoji_1_price_8"];
$tiaoji_1_z = $_POST["tiaoji_1_z"];
$tiaoji_1_price_z = $_POST["tiaoji_1_price_z"];
$line11Remark = $_POST["line11Remark"];
//放入数据
$objectSheet->setCellValue('C' . 14, "—");
$objectSheet->setCellValue('D' . 14, $tiaoji_1_heji);
$objectSheet->setCellValue('E' . 14, $tiaoji_1_price_heji);
$objectSheet->setCellValue('F' . 14, "—");
$objectSheet->setCellValue('G' . 14, $tiaoji_1_1);
$objectSheet->setCellValue('H' . 14, $tiaoji_1_price_1);
$objectSheet->setCellValue('I' . 14, "—");
$objectSheet->setCellValue('J' . 14, $tiaoji_1_2);
$objectSheet->setCellValue('K' . 14, $tiaoji_1_price_2);
$objectSheet->setCellValue('L' . 14, "—");
$objectSheet->setCellValue('M' . 14, $tiaoji_1_3);
$objectSheet->setCellValue('N' . 14, $tiaoji_1_price_3);
$objectSheet->setCellValue('O' . 14, "—");
$objectSheet->setCellValue('P' . 14, $tiaoji_1_4);
$objectSheet->setCellValue('Q' . 14, $tiaoji_1_price_4);
$objectSheet->setCellValue('R' . 14, "—");
$objectSheet->setCellValue('S' . 14, $tiaoji_1_8);
$objectSheet->setCellValue('T' . 14, $tiaoji_1_price_8);
$objectSheet->setCellValue('U' . 14, "—");
$objectSheet->setCellValue('V' . 14, $tiaoji_1_z);
$objectSheet->setCellValue('W' . 14, $tiaoji_1_price_z);
$objectSheet->setCellValue('X' . 14, $line11Remark);
//接收数据
$line12Remark = $_POST["line12Remark"];
//放入数据
$objectSheet->setCellValue('C' . 15, "—");
$objectSheet->setCellValue('D' . 15, 0);
$objectSheet->setCellValue('E' . 15, 0);
$objectSheet->setCellValue('F' . 15, "—");
$objectSheet->setCellValue('G' . 15, 0);
$objectSheet->setCellValue('H' . 15, 0);
$objectSheet->setCellValue('I' . 15, "—");
$objectSheet->setCellValue('J' . 15, 0);
$objectSheet->setCellValue('K' . 15, 0);
$objectSheet->setCellValue('L' . 15, "—");
$objectSheet->setCellValue('M' . 15, 0);
$objectSheet->setCellValue('N' . 15, 0);
$objectSheet->setCellValue('O' . 15, "—");
$objectSheet->setCellValue('P' . 15, 0);
$objectSheet->setCellValue('Q' . 15, 0);
$objectSheet->setCellValue('R' . 15, "—");
$objectSheet->setCellValue('S' . 15, 0);
$objectSheet->setCellValue('T' . 15, 0);
$objectSheet->setCellValue('U' . 15, "—");
$objectSheet->setCellValue('V' . 15, 0);
$objectSheet->setCellValue('W' . 15, 0);
$objectSheet->setCellValue('X' . 15, $line12Remark);
//接收数据
$bianzhi_total_nianwei = $_POST['bianzhi_total_nianwei'];
$shiyou_total_nianwei = $_POST['shiyou_total_nianwei'];
$price_total_nianwei = $_POST['price_total_nianwei'];
$shiwubianzhi_nianwei = $_POST['shiwubianzhi_nianwei'];
$shiwuxianyou_nianwei = $_POST['shiwuxianyou_nianwei'];
$shiwuprice_nianwei = $_POST['shiwuprice_nianwei'];
$jiyaobianzhi_nianwei = $_POST['jiyaobianzhi_nianwei'];
$jiyaoxianyou_nianwei = $_POST['jiyaoxianyou_nianwei'];
$jiyaoprice_nianwei = $_POST['jiyaoprice_nianwei'];
$yingjibianzhi_nianwei = $_POST['yingjibianzhi_nianwei'];
$yingjixianyou_nianwei = $_POST['yingjixianyou_nianwei'];
$yingjiprice_nianwei = $_POST['yingjiprice_nianwei'];
$zhifabianzhi_nianwei = $_POST['zhifabianzhi_nianwei'];
$zhifaxianyou_nianwei = $_POST['zhifaxianyou_nianwei'];
$zhifaprice_nianwei = $_POST['zhifaprice_nianwei'];
$tezhongbianzhi_nianwei = $_POST['tezhongbianzhi_nianwei'];
$tezhongxianyou_nianwei = $_POST['tezhongxianyou_nianwei'];
$tezhongprice_nianwei = $_POST['tezhongprice_nianwei'];
$qitabianzhi_nianwei = $_POST['qitabianzhi_nianwei'];
$qitaxianyou_nianwei = $_POST['qitaxianyou_nianwei'];
$qitaprice_nianwei = $_POST['qitaprice_nianwei'];
$line13Remark = $_POST['line13Remark'];
//放入数据
$objectSheet->setCellValue('C' . 16, $bianzhi_total_nianwei);
$objectSheet->setCellValue('D' . 16, $shiyou_total_nianwei);
$objectSheet->setCellValue('E' . 16, $price_total_nianwei);
$objectSheet->setCellValue('F' . 16, $shiwubianzhi_nianwei);
$objectSheet->setCellValue('G' . 16, $shiwuxianyou_nianwei);
$objectSheet->setCellValue('H' . 16, $shiwuprice_nianwei);
$objectSheet->setCellValue('I' . 16, $jiyaobianzhi_nianwei);
$objectSheet->setCellValue('J' . 16, $jiyaoxianyou_nianwei);
$objectSheet->setCellValue('K' . 16, $jiyaoprice_nianwei);
$objectSheet->setCellValue('L' . 16, $yingjibianzhi_nianwei);
$objectSheet->setCellValue('M' . 16, $yingjixianyou_nianwei);
$objectSheet->setCellValue('N' . 16, $yingjiprice_nianwei);
$objectSheet->setCellValue('O' . 16, $zhifabianzhi_nianwei);
$objectSheet->setCellValue('P' . 16, $zhifaxianyou_nianwei);
$objectSheet->setCellValue('Q' . 16, $zhifaprice_nianwei);
$objectSheet->setCellValue('R' . 16, $tezhongbianzhi_nianwei);
$objectSheet->setCellValue('S' . 16, $tezhongxianyou_nianwei);
$objectSheet->setCellValue('T' . 16, $tezhongprice_nianwei);
$objectSheet->setCellValue('U' . 16, $qitabianzhi_nianwei);
$objectSheet->setCellValue('V' . 16, $qitaxianyou_nianwei);
$objectSheet->setCellValue('W' . 16, $qitaprice_nianwei);
$objectSheet->setCellValue('X' . 16, $line13Remark);
//设置列宽度
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(22);
//清除缓冲区,避免乱码
ob_end_clean();
$file_name="党政机关公务用车变动情况汇总表.xls";
$ua = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/MSIE/',$ua)) {
$file_name = str_replace('+','%20',urlencode($file_name));
}
header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename='.$file_name);
header('Cache-Control:max-age=0');
$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save( 'php://output');
exit;