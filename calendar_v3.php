<?php
require_once __DIR__ . "/connection/default.php";
require 'sys_header_v2.php';
/* === ① 撈本月所有事件（一次就好） === */
$startDate = sprintf('%04d-%02d-01', $year, $month);
/* 取得某月最後一天的結束時間 */
$endDate   = date('Y-m-t', strtotime($startDate));

$sql = "
    SELECT
        ca_theme,
        ca_even_str_time,
        event_date
    FROM events
    WHERE event_date BETWEEN :start AND :end
    ORDER BY ca_even_str_time
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':start' => $startDate,
    ':end'   => $endDate
]);

$events = $stmt->fetchAll();

/* === ② 整理成「日期 => 事件陣列」 === */
$eventMap = [];

foreach ($events as $event) {
    $eventMap[$event['event_date']][] = $event;
}
?>

<body>
    <?php
    echo "現在是：" . $year . "年";
    ?>
    <br>
    <?php
    echo "目前月份：" . $month;
    ?>
    <div style="display: flex;" class="big-table">
        <div style="text-align: left">
            <a href="?year=<?php echo $prevYear; ?>&month=<?php echo $prevMonth; ?>" style="text-decoration: none;"
                class="bordered-link">上一個月</a>
            <a href="?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>" style="text-decoration: none;"
                class="bordered-link">下一個月</a>
            <a href="?year=<?php echo $toyear; ?>&month=<?php echo $tomonth; ?>" style="text-decoration: none;"
                class="bordered-link">今天</a>
        </div>
        <div style="width: 80%; text-align: center">
            <!-- 顯示年份和月份 -->
            <span class="bordered-link"><?php echo $year; ?>年 <?php echo $month; ?>月</span>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" onclick="window.location.href='api/stcalendar_v2_add_page_CL.php';"">
                <i class=" bi bi-plus-circle"></i> 新增事項
            </button>
        </div>
    </div>
    <hr />
    <table class="big-table" align="center" ;>
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
                    //因應一次查找一整個月做修改
                    /* echo "<td class='{$class}'>{$day}</td>"; */
                    $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                    $class = ($date === $today) ? "today" : "";

                    echo "<td class='{$class}'>";
                    echo "<div class='day-num'>{$day}</div>";

                    /* === 顯示事件 === */
                    if (!empty($eventMap[$date])) {
                        foreach ($eventMap[$date] as $event) {
                            $time = date('H:i', strtotime($event['ca_even_str_time']));
                            $title = htmlspecialchars($event['ca_theme']);
                            echo "<div class='event-item'>{$time} {$title}</div>";
                        }
                    }

                    echo "</td>";
                }
            }
            ?>
        </tr>
    </table>
</body>