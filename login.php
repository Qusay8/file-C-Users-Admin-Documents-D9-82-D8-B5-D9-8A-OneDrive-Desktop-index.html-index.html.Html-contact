<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "بيانات خاطئة.";
    }
}
?>

<form method="post">
    <h2>تسجيل دخول</h2>
    <input type="text" name="username" placeholder="اسم المستخدم" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">دخول</button>
    <p><a href="register.php">إنشاء حساب</a></p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>