<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $check->execute([$username]);

    if ($check->rowCount() > 0) {
        $error = "الاسم مستخدم من قبل.";
    } else {
        $insert = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $insert->execute([$username, $password]);
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }
}
?>

<form method="post">
    <h2>إنشاء حساب</h2>
    <input type="text" name="username" placeholder="اسم المستخدم" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">إنشاء</button>
    <p><a href="login.php">تسجيل دخول</a></p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>