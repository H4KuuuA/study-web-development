<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>BMIと理想の体重計算</title>
</head>
<body>
    <h2>BMIと理想の体重を計算する</h2>

    <?php
    // POSTリクエストで送信された身長と体重の取得
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $height = $_POST['height'] ?? null;
        $weight = $_POST['weight'] ?? null;

        if ($height && $weight) {
            // BMIの計算
            $bmi = calculateBMI($height, $weight);
            echo "<p>BMI（Body Mass Index）: " . number_format($bmi, 1) . "</p>";

            // 理想の体重の計算
            $idealWeight = calculateIdealWeight($height);
            echo "<p>理想の体重: " . number_format($idealWeight, 1) . " kg</p>";

            // 差分の計算
            $difference = $weight - $idealWeight;
            echo "<p>理想の体重との差分: " . number_format($difference, 1) . " kg</p>";
        } else {
            echo "<p>身長と体重を正しく入力してください。</p>";
        }
    }

    // BMIを計算する関数
    function calculateBMI($height, $weight) {
        // 身長をメートルに変換
        $heightInMeters = $height / 100;
        // BMIの計算（BMI = 体重(kg) / 身長(m)^2）
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        return $bmi;
    }

    // 理想の体重を計算する関数（WHO推奨）
    function calculateIdealWeight($height) {
        // 身長をメートルに変換
        $heightInMeters = $height / 100;
        // 理想のBMIをWHO推奨の18.5とする
        $idealBMI = 18.5;
        // 理想の体重の計算（理想の体重(kg) = 理想のBMI * 身長(m)^2）
        $idealWeight = $idealBMI * ($heightInMeters * $heightInMeters);
        return $idealWeight;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="height">身長（cm）：</label>
        <input type="number" id="height" name="height" step="0.1" required>
        <br><br>
        <label for="weight">体重（kg）：</label>
        <input type="number" id="weight" name="weight" step="0.1" required>
        <br><br>
        <input type="submit" value="計算">
    </form>

</body>
</html>

