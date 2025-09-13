<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h2 class="header__logo">
                Fashionably Late
            </h2>
            @if (Auth::check())
            <div class="header__button">
              <form action="/logout" method="post">
                @csrf
                <button class="header__button-submit" type="submit">logout</button>
              </form>
            </div>
            @endif
        </div>
    </header>

    <main>
      <div class="contact-form__content">
        <div class="contact-form__heading">
          <h2>Admin</h2>
        </div>

        <form action="">
          <div class="form__button-top">
            <div class="form__group">
              <input class="form__group-text" type="text" value="名前やメールアドレスを入力してください">
            </div>
            <div class="form__group">
              <select class="form__group-gender" name="" id="">
                <option value="" selected hidden>性別</option>
                <option value="">男性</option>
                <option value="">女性</option>
                <option value="">その他</option>
              </select>
            </div>
            <div class="form__group">
              <select class="form__group-category" name="" id="">
                <option value="" selected hidden>お問い合わせの種類</option>
                <option value="">1.商品のお届けについて</option>
                <option value="">2.商品の交換について</option>
                <option value="">3.商品トラブル</option>
                <option value="">4.ショップへのお問い合わせ</option>
                <option value="">5.その他</option>
              </select>
            </div>
            <div class="form__group">
              <input class="form__group-date" type="date">
            </div>
            <div class="form__group">
              <button class="form__group-search">検索</button>
            </div>
            <div class="form__group">
              <input class="form__group-reset" type="reset" value="リセット">
            </div>
          </div>
            <div class="form__group">
              <button class="form__group-export">エクスポート</button>
            </div>
        </form>

        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
             @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact['first_name'] }}　{{ $contact['last_name'] }}</td>
                <td>{{ $contact['gender'] }}</td>
                <td>{{ $contact['email'] }}</td>
                <td>{{ $contact->category->content ?? '未設定' }}</td>
                <td>
                    <a href="#modal1" class="open">詳細</a>
                    <div id="modal1" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal1-title">
                      <a href="#" class="overlay" aria-hidden="true"></a>
                      <div class="content" role="document">
                        <div class="content__inner">
                          <div class="modal__group">
                            <p class="modal__title">お名前</p>
                            <p class="modal__content-name">山田　太郎</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">性別</p>
                            <p class="modal__content-gender">男性</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">メールアドレス</p>
                            <p class="modal__content-email">test@example.com</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">電話番号</p>
                            <p class="modal__content-tel">08012345678</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">住所</p>
                            <p class="modal__content-address">東京都</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">建物名</p>
                            <p class="modal__content-building">千駄ヶ谷マンション101</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">お問い合わせの種類</p>
                            <p class="modal__content-category">商品の交換について</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">お問い合わせの内容</p>
                            <p class="modal__content-detail">商品が違います</p>
                          </div>
                          <div class="modal__button">
                            <button class="modal__button-delete">削除</button>
                          </div>
                            <a href="#" class="close">×</a>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
       
    </main>
</body>