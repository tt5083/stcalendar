<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增活動事項</title>
    <link rel="stylesheet" type="text/css" href="../css/add_page.css">
</head>

<body>
    <h2 style="text-align: center;">活動資料填寫表</h2>
    <form action="../connection/links.php" method="post" name="add_event">
        <table class=" form-table">
            <tr>
                <td class="label-col">活動名稱</td>
                <td><input type="text" name="ca_even_name" required></td>
            </tr>
            <tr>
                <td class="label-col">類別</td>
                <td>
                    <select name="ca_type">
                        <option value="講座">講座</option>
                        <option value="工作坊">工作坊</option>
                        <option value="課程">課程</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-col">申請人</td>
                <td><input type="text" name="ca_applicant"></td>
            </tr>
            <tr>
                <td class="label-col">講師</td>
                <td><input type="text" name="ca_lecturer"></td>
            </tr>
            <tr>
                <td class="label-col">地點名稱</td>
                <td><input type="text" name="location"></td>
            </tr>
            <tr>
                <td class="label-col">開始時間</td>
                <td><input type="datetime-local" name="ca_even_st_time"></td>
            </tr>
            <tr>
                <td class="label-col">結束時間</td>
                <td><input type="datetime-local" name="ca_even_end_time"></td>
            </tr>
            <tr>
                <td class="label-col">發佈人</td>
                <td><input type="text" name="ca_publisher"></td>
            </tr>
            <tr>
                <td class="label-col">發佈時間</td>
                <td><input type="datetime-local" name="ca_ct_time"></td>
            </tr>
            <tr>
                <td class="label-col">更新時間</td>
                <td><input type="datetime-local" name="ca_up_time"></td>
            </tr>
            <tr>
                <td class="abel-col">備註</td>
                <td><textarea name="ca_note"></textarea></td>
            </tr>
        </table>
        <button type="submit" class="submit-btn">儲存資料</button>
    </form>
</body>

</html>
