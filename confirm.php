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

//POSTされたデータを各変数に入れる
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$phone = isset($_POST['phone']) ? $_POST['phone'] : NULL;
$address = isset($_POST['address']) ? $_POST['address'] : NULL;
$message = isset($_POST['message']) ? $_POST['message'] : NULL;

//前後にある半角全角スペースを削除
$name = spaceTrim($name);
$email = spaceTrim($email);
$phone = spaceTrim($phone);
$address = spaceTrim($address);
$message = spaceTrim($message);

$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["phone"] = $phone;
$_SESSION["address"] = $address;
$_SESSION["message"] = $message;
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>内容確認 - 問い合わせフォーム</title>
    <link
      href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,500,900&amp;subset=japanese"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="./asset/css/style.css" />
  </head>
  <body>
    <div class="p-confirm">
      <header class="l-contact-form-header">
        <div class="l-contact-form-header__container">
          <a href="/index.html"
            ><img
              src="./asset/img/header_logo.png"
              alt="ロゴマーク"
              class="l-contact-form-header__logo"
          /></a>
        </div>
      </header>
      <section class="p-confirm__section">
        <div class="p-confirm__container">
          <h2 class="p-confirm__title">お問い合わせ内容の確認</h2>
          <div>
            <p class="p-confirm__item">
              <span class="p-confirm__label">お名前：</span>
              <span class="p-confirm__input"><?php echo $name; ?></span>
            </p>
            <p class="p-confirm__item">
              <span class="p-confirm__label">メールアドレス：</span>
              <span class="p-confirm__input"><?php echo $email; ?></span>
            </p>
            <p class="p-confirm__item">
              <span class="p-confirm__label">電話番号：</span>
              <span class="p-confirm__input"><?php echo $phone; ?></span>
            </p>
            <p class="p-confirm__item">
              <span class="p-confirm__label">住所：</span>
              <span class="p-confirm__input"><?php echo $address; ?></span>
            </p>
            <p class="p-confirm__item p-confirm__item-message">
              <span class="p-confirm__label">お問い合わせ内容：</span>
              <br />
              <br />
              <span class="p-confirm__input"
                ><?php echo nl2br($message); ?></span
              >
            </p>
            <form action="send.php" method="post" class="p-confirm__form">
              <input type="hidden" name="token" value= <?php echo escape($token); ?>>

              <!-- アクションボタン -->
              <div class="p-confirm__actions">
                <button class="p-confirm__btn p-confirm__btn-submit">
                  送信
                </button>
                <button
                  type="button"
                  onclick="history.back();"
                  class="p-confirm__btn p-confirm__btn-back"
                >
                  戻る
                </button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
