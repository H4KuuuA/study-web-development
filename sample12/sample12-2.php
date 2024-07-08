<?php
// sessionを開始する
session_start();

// セッションから値を取得する
if (isset($_SESSION['username'])) {
    echo 'セッションに保存されているユーザ名: ' . $_SESSION['username'];
} else {
    echo 'セッションにユーザ名がセットされていません。';
}
?>

