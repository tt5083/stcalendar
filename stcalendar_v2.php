<?php
require 'sys_header_v2.php';
?>

<body>
    <div style="width: 100%; text-align: center">
        <a href="?year=<?php echo $prevYear; ?>&month=<?php echo $prevMonth; ?>">前一個月</a>
        <!-- 顯示年份和月份 -->
        <span><?php echo $year; ?>年 <?php echo $month; ?>月</span>
        <a href="?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>">下一個月</a>
    </div>
    <table>
        <tr>
            <th>日</th>
            <th>一</th>
            <th>二</th>
            <th>三</th>
            <th>四</th>
            <th>五</th>
            <th>六</th>
        </tr>
        <tr>
            <?php
            // 填充空白天數
            for ($i = 0; $i < $dayOfWeek; $i++) {
                echo "<td></td>";
            }

            // 輸出當月所有天數
            for ($day = 1; $day <= $daysInMonth; $day++) {
                // 當達到一周的天數時，開始新的一行
                if (($day + $dayOfWeek) % 7 == 0 || $day == $daysInMonth) {
                    $class = (date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)) == $today) ? "today" : "";
                    echo "<td class='{$class}'>{$day}</td></tr><tr>";
                } else {
                    $class = (date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)) == $today) ? "today" : "";
                    echo "<td class='{$class}'>{$day}</td>";
                }
            }
            ?>
        </tr>
    </table>
</body>

</html>
