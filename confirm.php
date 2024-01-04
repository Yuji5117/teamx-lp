<?php
// POSTデータが存在するか確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // サニタイズされたPOSTデータを変数に格納
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>内容確認 - 問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="contact-section">
        <h2>お問い合わせ内容の確認</h2>
        <form action="send.php" method="post" class="contact-form">
            <p>お名前: <?php echo $name; ?></p>
            <p>メールアドレス: <?php echo $email; ?></p>
            <p>お問い合わせ内容:</p>
            <p><?php echo nl2br($message); ?></p>
            
            <!-- hiddenフィールドにデータをセットしてPOST -->
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="message" value="<?php echo $message; ?>">
            
            <button type="submit" class="submit-btn">送信する</button>
            <button type="button" onclick="history.back();" class="back-btn">戻る</button>
        </form>
    </section>
</body>
</html>
