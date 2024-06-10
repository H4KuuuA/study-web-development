<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title>web開発4回目</title>
</head>
<body>
<?php
// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// 今日の日付を取得
$today = strtotime(date('Y-m-d'));

// 1年後の日付を計算
$endDate = strtotime('+1 year', $today);

// 今日から1年後までの日付を出力
$currentDate = $today;
while ($currentDate <= $endDate) {
    echo date('Y-m-d', $currentDate) . '<br>';
    $currentDate = strtotime('+1 day', $currentDate);
}
?>
</body>
</html>

