<?php
  // POSTデータをサニタイズ
  function sanitize($data) {
      return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
  }

  $name = sanitize($_POST['name'] ?? '');
  $email = sanitize($_POST['email'] ?? '');
  $phone = sanitize($_POST['phone'] ?? '');
  $address = sanitize($_POST['address'] ?? '');
  $message = sanitize($_POST['message'] ?? '');
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
              <!-- hiddenフィールドにデータをセットしてPOST -->
              <input type="hidden" name="name" value="<?php echo $name; ?>" />
              <input type="hidden" name="email" value="<?php echo $email; ?>" />
              <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
              <input type="hidden" name="address" value="<?php echo $address; ?>" />
              <input
                type="hidden"
                name="message"
                value="<?php echo $message; ?>"
              />

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
