<?php
date_default_timezone_set('Asia/Taipei');

// 檢查GET請求中是否有年份和月份參數，如果有則使用，否則使用當前年份和月份
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

// 計算前一個月和下一個月的年份和月份
$prevMonth = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
$prevYear = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
$nextMonth = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
$nextYear = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));

// 其他變數初始化...
$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year); // 取得這個月第一天的 timestamp
$dayOfWeek = date('w', $firstDayOfMonth); // 第一天是星期幾
$daysInMonth = date('t', $firstDayOfMonth); // 這個月總共有幾天
$today = date('Y-m-d'); // 今天是幾號
$toyear = date('Y'); // 今天幾年
$tomonth = date('m'); // 今天幾月
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>行事曆V3</title>
    <link rel="stylesheet" type="text/css" href="css/style_v2.css">
</head>
