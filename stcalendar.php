<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>日</th>
                <th>一</th>
                <th>二</th>
                <th>三</th>
                <th>四</th>
                <th>五</th>
                <th>六</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
            for ($i = 0; $i < $totalCells; $i++) {
                // 開始新行
                if ($i % 7 == 0 && $i != 0) {
                    echo '</tr><tr>';
                }
                
                // 輸出空白格子（上個月的日期）
                if ($i < $firstDayOfWeek) {
                    echo '<td class="other-month"></td>';
                } 
                // 輸出當月日期
                else if ($i < $firstDayOfWeek + $daysInMonth) {
                    $currentDay = $i - $firstDayOfWeek + 1;
                    $isToday = ($currentDay == $day && $month == date('n') && $year == date('Y'));
                    
                    echo $isToday 
                        ? '<td class="today">' . $currentDay . '</td>'
                        : '<td>' . $currentDay . '</td>';
                } 
                // 輸出空白格子（下個月的日期）
                else {
                    echo '<td class="other-month"></td>';
                }
            }
            ?>
            </tr>
        </tbody>
    </table>
</body>

</html>
