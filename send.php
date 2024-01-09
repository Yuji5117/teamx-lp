<?php
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// HTML特殊文字をエスケープする関数
function escape($str) {
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

//前後にある半角全角スペースを削除する関数
function spaceTrim ($str) {
    // 行頭
    $str = preg_replace('/^[ 　]+/u', '', $str);
    // 末尾
    $str = preg_replace('/[ 　]+$/u', '', $str);
    return $str;
}

//tokenを変数に入れる
$token = $_POST['token'];

// トークンを確認し、確認画面を表示
if(!(hash_equals($token, $_SESSION['token']) && !empty($token))) {
    echo "不正アクセスの可能性があります";
    exit();
}

// POSTデータをサニタイズ
function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// POSTデータが存在するか確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $address = $_SESSION["address"];
    $message = $_SESSION["message"];

    // メール送信処理
    $to = 'yuji6523ny@gmail.com';
    $subject = "{$name}様からのお問い合わせ";
    $email_content = "以下の内容でお問い合わせがありました。\n\n";
    $email_content .= "名前：{$name}\n";
    $email_content .= "メールアドレス：{$email}\n";
    $email_content .= "電話番号：{$phone}\n";
    $email_content .= "住所：{$address}\n\n";
    $email_content .= "お問い合わせ内容：\n{$message}\n";

    // 折り返しを行う
    $email_content = wordwrap($email_content, 50, "\r\n");

    // メールヘッダーを設定
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // mail関数でメールを送信
    if(mail($to, $subject, $email_content, $headers)) {
        // 送信成功時の処理
        header('Location: complete.html');
    } else {
        // 送信失敗時の処理
        echo 'メール送信に失敗しました。';
    }

    exit;
}
?>
