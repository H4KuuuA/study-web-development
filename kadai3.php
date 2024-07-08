<!-- index.php -->

<?php
session_start();

// データベースの接続情報
$host = 'localhost'; // ホスト名
$dbname = 'your_database'; // データベース名
$username = 'your_username'; // ユーザ名
$password = 'your_password'; // パスワード

// POSTメソッドでリクエストが来た場合のみ処理を行う
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザ入力の取得
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    try {
        // データベースに接続
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // ユーザの検索
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username_input]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // ユーザが存在し、パスワードが一致するかチェック
        if ($user && password_verify($password_input, $user['password'])) {
            // ログイン成功時の処理
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php'); // ログイン後のページにリダイレクト
            exit;
        } else {
            // ログイン失敗時の処理
            $error_message = "Invalid username or password.";
        }
    } catch (PDOException $e) {
        // エラー時の処理
        $error_message = "Database connection failed: " . $e->getMessage();
    }
}

// ログインフォームを表示するHTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

