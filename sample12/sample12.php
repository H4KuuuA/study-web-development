<!-- sample12.php -->

<?php
// セッションの開始
session_start();

// セッションに値をセット
$_SESSION['username'] = 'H4kuA'; // 例としてユーザ名をセット

echo "Session set with username: {$_SESSION['username']}";
?>

