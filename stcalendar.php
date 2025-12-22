<?php
require 'sys_header.php';
?>

<body>
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
//動態加上class
$class = "big-table";
echo "<table border='1' class='$class'>";
echo "<tr><th>星期日</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th></tr>";

// 填充月曆表格
echo "<tr>";
$day = 1;
for ($i = 0; $i < 7; $i++) {
    if ($day_of_week == date('D', strtotime("Sunday +{$i} days"))) {
        break;
    }
    echo "<td></td>";
}
while ($day <= $num_days) {
    if ($day_of_week == 'Sun') {
        echo "</tr><tr>";
    }
    echo "<td>$day</td>";
    $day++;
    $day_of_week = date('D', strtotime("+1 day", strtotime($day_of_week)));
}
while ($day_of_week != 'Sun') {
    echo "<td></td>";
    $day_of_week = date('D', strtotime("+1 day", strtotime($day_of_week)));
}
echo "</tr>";

// 結束月曆表格
echo "</table>";
?>
</body>

</html>
