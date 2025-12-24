<?php
require_once __DIR__ . "/../../connection/linkcfg.php";
define("cardb", "stcalendar");

define("normal_user", 1);
define("finance", 5);
define("budget_locker", 6);
define("admin", 9);

//HEADER
header('Content-Type: text/html; charset=utf-8');
if (!isset(${S})) {
    session_start();
}
function db_connect()
{
    $dsn = "mysql:host=localhost; port=3306; dbname=" . cardb . "; charset=utf8";
    $conn = new PDO($dsn, dbuser, dbpwd);
    $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
    return $conn;
}

${D} = db_connect();

// --- 處理 POST 請求 (新增、編輯、刪除) ---
/* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    header("Location: index.php");
    exit;
} */

// 取得所有資料
$stmt = $pdo->query("SELECT * FROM event ORDER BY ca_sn DESC");
$todos = $stmt->fetchAll();

?>
