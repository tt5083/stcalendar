<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>活動申請表單</title>
    <style>
    body {
        font-family: "Microsoft JhengHei", sans-serif;
        padding: 20px;
        color: #333;
    }

    .form-table {
        width: 100%;
        max-width: 800px;
        border-collapse: collapse;
        margin: 0 auto;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    .form-table th,
    .form-table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
    }

    /* 左側標籤欄樣式 */
    .label-col {
        background-color: #f5f5f5;
        width: 120px;
        text-align: right;
        font-weight: bold;
        color: #555;
    }

    /* 輸入框樣式 */
    input[type="text"],
    input[type="datetime-local"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        /* 確保寬度包含 padding */
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    .submit-btn {
        display: block;
        margin: 20px auto;
        padding: 10px 30px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <h2 style="text-align: center;">活動資料填寫表</h2>
    <form action="save.php" method="post">
        <table class="form-table">
            <tr>
                <td class="label-col">活動名稱</td>
                <td><input type="text" name="event_name" required></td>
            </tr>
            <tr>
                <td class="label-col">類別</td>
                <td>
                    <select name="category">
                        <option value="講座">講座</option>
                        <option value="工作坊">工作坊</option>
                        <option value="會議">會議</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-col">申請人</td>
                <td><input type="text" name="applicant"></td>
            </tr>
            <tr>
                <td class="label-col">講師</td>
                <td><input type="text" name="lecturer"></td>
            </tr>
            <tr>
                <td class="label-col">地點名稱</td>
                <td><input type="text" name="location"></td>
            </tr>
            <tr>
                <td class="label-col">開始時間</td>
                <td><input type="datetime-local" name="start_time"></td>
            </tr>
            <tr>
                <td class="label-col">結束時間</td>
                <td><input type="datetime-local" name="end_time"></td>
            </tr>
            <tr>
                <td class="label-col">發佈人</td>
                <td><input type="text" name="publisher"></td>
            </tr>
            <tr>
                <td class="label-col">發佈時間</td>
                <td><input type="datetime-local" name="publish_time"></td>
            </tr>
            <tr>
                <td class="label-col">更新時間</td>
                <td><input type="datetime-local" name="update_time"></td>
            </tr>
            <tr>
                <td class="label-col">備註</td>
                <td><textarea name="note"></textarea></td>
            </tr>
        </table>
        <button type="submit" class="submit-btn">儲存資料</button>
    </form>
</body>

</html>
