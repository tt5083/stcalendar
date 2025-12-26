<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="https://www.google.com" id="conditionalLink">點擊這裡</a>
    <script>
    const link = document.getElementById('conditionalLink');

    link.addEventListener('click', function(e) {
        e.preventDefault(); // 先阻止連結的默認導航行為

        // 假設我們彈出一個確認框，根據用戶的選擇決定是否繼續導航
        const userWantsToProceed = confirm('你確定要前往 Google 嗎QQ？');

        if (userWantsToProceed) {
            // 手動執行預設行為，將瀏覽器導航到指定的網址
            window.location.href = e.target.href;
        } else {
            console.log('用戶取消了導航操作');
        }
    });
    </script>
</body>

</html>
