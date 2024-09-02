<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>ログインページ</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <style>
        @charset "utf-8";
        /* CSSの初期化 */
        * {
            margin: 0;
            padding: 0;
        }

        /* 全体 */
        body {
            background-image: url("IMG_1540.JPG");
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* フォーム */
        form {
            background-color: rgba(10, 5, 118, 0.5);
            width: 380px;
            height: 465px;
            margin: 50vh auto 0;
            transform: translateY(-50%);
            border-radius: 30px;
        }

        form h1 {
            color: #fff;
            text-align: center;
            padding-top: 60px;
        }

        /* アイコン */
        .far, .fas {
            color: #e55034;
            font-size: 20px;
            margin-right: 15px;
        }

        /* 入力欄 */
        form p {
            width: 300px;
            margin: 0 auto;
        }

        input {
            outline: none;
        }

        .inputMail, .inputPswd {
            width: 215px;
            height: 45px;
            border-radius: 10px;
            border: none;
            background-color: rgba(255, 255, 255, 0.6);
            padding-left: 15px;
            font-size: 18px;
            color: #000; /* 黒に変更して見やすく */
        }

        .inputMail {
            margin-top: 40px;
            margin-bottom: 25px;
        }

        .inputMail::placeholder, .inputPswd::placeholder {
            color: rgba(0, 0, 0, 0.7); /* プレースホルダーの色を調整 */
        }

        /* 送信フォーム */
        .login {
            width: 190px;
            height: 45px;
            background-color: #0cbbdb;
            display: block;
            margin: 40px auto 0; /* 修正：margin-top */
            color: #fff;
            font-weight: bold;
            text-align: center;
            line-height: 45px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        /* パスワード忘れ */
        .forget {
            width: 160px;
            margin-top: 15px;
        }

        .forgetText {
            color: #fff;
            font-size: 12px;
            text-decoration: none;
        }

        .forgetText:hover {
            color: #0cbbdb;
        }
    </style>
</head>
<body>
    <form action="#">
        <h1>Login</h1>
        <!-- 入力エリア-->
        <p><i class="far fa-envelope"></i><input class="inputMail" type="email" placeholder="Mail"></p>
        <p><i class="fas fa-key"></i><input class="inputPswd" type="password" placeholder="Password"></p>
        <input class="login" type="submit" value="LOGIN">
        <p class="forget"><a href="#" class="forgetText">パスワード忘れた方はこちら</a></p>
    </form>
</body>
</html>
//DB込みで実装しようと試行錯誤したのですが、画面が動かなくなってしまったので動いたとこまでです。
