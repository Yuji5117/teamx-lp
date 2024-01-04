<?php
// POSTデータが存在するか確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // サニタイズされたPOSTデータを変数に格納
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // メール送信処理（省略）
    // mail($to, $subject, $message, $headers);

    // 送信完了ページへリダイレクト
    header('Location: complete.html');
    exit;
}
?>
