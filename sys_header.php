<?php
// 設置時區
date_default_timezone_set('Asia/Taipei');

// 獲取當前月份和年份
$month = date('m');
$year = date('Y');

// 獲取當前月份的第一天是星期幾
$first_day = mktime(0, 0, 0, $month, 1, $year);
$day_of_week = date('D', $first_day);

// 獲取當前月份的天數
$num_days = date('t', $first_day);

// 創建月曆表格
$class = "big-table";
echo "<table border='1' class='$class'>";
echo "<tr><th colspan='7'>$month/$year</th></tr>";
echo "</tr>";
// 結束月曆表格
echo "</table>";
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>測試行事曆</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
