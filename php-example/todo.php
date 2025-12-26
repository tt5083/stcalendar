<?php
// --- 資料庫連線設定 ---
$host = 'localhost';
$db   = 'todo_db';
$user = 'root'; // 根據你的設定修改
$pass = '';     // 根據你的設定修改
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("資料庫連線失敗: " . $e->getMessage());
}

// --- 處理 POST 請求 (新增、編輯、刪除) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 新增
    if (isset($_POST['add_task']) && !empty(trim($_POST['title']))) {
        $stmt = $pdo->prepare("INSERT INTO todos (title) VALUES (?)");
        $stmt->execute([trim($_POST['title'])]);
    }
    // 刪除
    if (isset($_POST['delete_id'])) {
        $stmt = $pdo->prepare("DELETE FROM todos WHERE id = ?");
        $stmt->execute([$_POST['delete_id']]);
    }
    // 編輯 (更新)
    if (isset($_POST['update_task'])) {
        $stmt = $pdo->prepare("UPDATE todos SET title = ? WHERE id = ?");
        $stmt->execute([$_POST['title'], $_POST['id']]);
    }
    // 重新導向避免重複提交表單
    header("Location: todo.php");
    exit;
}

// 取得所有資料
$stmt = $pdo->query("SELECT * FROM todos ORDER BY created_at DESC");
$todos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8.2 RWD 待辦事項</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .todo-container {
        max-width: 600px;
        margin: 50px auto;
    }

    .done-text {
        text-decoration: line-through;
        color: gray;
    }
    </style>
</head>

<body>
    <div class="container todo-container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">我的待辦事項</h3>
                <form action="" method="POST" class="d-flex mb-4">
                    <input type="text" name="title" class="form-control me-2" placeholder="輸入新任務..." required>
                    <button type="submit" name="add_task" class="btn btn-primary">新增</button>
                </form>
                <hr>
                <ul class="list-group">
                    <?php foreach ($todos as $todo): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="w-100 me-2">
                            <form action="" method="POST" class="d-flex align-items-center"
                                id="form-<?= $todo['id'] ?>">
                                <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                                <input type="text" name="title"
                                    class="form-control form-control-sm border-0 bg-transparent"
                                    value="<?= htmlspecialchars($todo['title']) ?>" required>
                                <button type="submit" name="update_task"
                                    class="btn btn-sm btn-outline-success ms-2 d-none save-btn">儲存</button>
                            </form>
                        </div>
                        <div class="d-flex">
                            <form action="" method="POST" onsubmit="return confirm('確定要刪除嗎？')">
                                <input type="hidden" name="delete_id" value="<?= $todo['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <?php if (empty($todos)): ?>
                    <li class="list-group-item text-center text-muted">目前沒有任何任務</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <script>
    // 簡單的點擊輸入框顯示儲存按鈕
    document.querySelectorAll('input[name="title"]').forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.remove('border-0', 'bg-transparent');
            this.nextElementSibling.classList.remove('d-none');
        });
    });
    </script>
</body>

</html>