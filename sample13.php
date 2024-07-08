<!-- sample13.php -->

<?php
// データベースの接続情報
$host = 'localhost';
$port = '8889';
$dbname = 'mydb';
$username = 'root';
$password = 'root';

try {
    // データベースに接続
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQLクエリの準備と実行
    $stmt = $pdo->query('SELECT * FROM your_table'); // your_tableには実際のテーブル名を指定する
    
    // 結果の取得と表示
    echo "<h2>Data from mydb</h2>";
    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>{$row['column1']} - {$row['column2']}</li>"; // column1, column2には実際のカラム名を指定する
    }
    echo "</ul>";

} catch (PDOException $e) {
    // エラーが発生した場合の処理
    die("Database connection failed: " . $e->getMessage());
}
?>sample3
