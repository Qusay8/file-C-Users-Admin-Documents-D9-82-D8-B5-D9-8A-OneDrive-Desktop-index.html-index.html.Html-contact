<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>موقعي</title>
    <style>
        .auth-bar {
            background-color: #f0f0f0;
            padding: 15px;
            text-align: right;
        }
        a {
            margin-left: 15px;
            padding: 8px 12px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="auth-bar">
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        مرحباً <?= htmlspecialchars($_SESSION['username']) ?> |
        <a href="logout.php">تسجيل خروج</a>
    <?php else: ?>
        <a href="login.php">تسجيل دخول</a>
        <a href="register.php">إنشاء حساب</a>
    <?php endif; ?>
</div>

<h1>أهلاً بك في الموقع</h1>
<p>هذا الموقع مفتوح للجميع، لكن بعض الميزات تحتاج تسجيل دخول.</p>

<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <p>🎉 أنت مسجل الدخول، ويمكنك الوصول إلى الخصائص الخاصة.</p>
<?php endif; ?>

</body>
</html>