<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>名前送信フォーム</title>
</head>
<body>
    <h2>名前を送信するフォーム</h2>

    <?php
    // フォームが送信されたときの処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 名前が送信されたかどうかをチェック
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            echo "<p>あなたの名前は「{$name}」です。</p>";
        } else {
            echo "<p>名前が送信されていません。</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">名前：</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <input type="submit" value="送信">
    </form>

</body>
</html>

