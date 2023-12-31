<?php
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// トークン生成
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = sha1(random_bytes(30));
}

// HTML特殊文字をエスケープする関数
function escape($str) {
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>問い合わせページ</title>
    <link rel="stylesheet" href="./asset/css/style.css" />
  </head>
  <body>
    <div class="p-contact-form">
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
      <form action="confirm.php" method="post" class="p-contact-form__form">
        <h2 class="p-contact-form__heading">お問い合わせ</h2>

        <label for="name" class="p-contact-form__label"
          >お名前<span class="p-contact-form__required-mark">*</span></label
        >
        <input
          type="text"
          id="name"
          class="p-contact-form__input"
          name="name"
          placeholder="お名前"
          required
        />

        <label for="email" class="p-contact-form__label"
          >メールアドレス<span class="p-contact-form__required-mark"
            >*</span
          ></label
        >
        <input
          type="email"
          id="email"
          class="p-contact-form__input"
          name="email"
          placeholder="メールアドレス"
          required
        />

        <label for="phone" class="p-contact-form__label">電話番号</label>
        <input
          type="tel"
          id="phone"
          class="p-contact-form__input"
          name="phone"
          placeholder="電話番号(任意)"
        />

        <label for="address" class="p-contact-form__label">住所</label>
        <input
          type="text"
          id="address"
          class="p-contact-form__input"
          name="address"
          placeholder="住所(任意)"
        />

        <label for="message" class="p-contact-form__label"
          >お問い合わせ内容<span class="p-contact-form__required-mark"
            >*</span
          ></label
        >
        <textarea
          id="message"
          class="p-contact-form__textarea"
          name="message"
          placeholder="お問い合わせ内容を入力してください"
          rows="5"
          required
        ></textarea>

        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
        <div class="p-contact-form__button-container">
          <button type="submit" class="p-contact-form__button">確認画面へ</button>
        </div>
      </form>
    </div>
  </body>
</html>
