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

        <form action="/admin/search" method="get">
          @csrf
          <div class="form__button-top">
            <div class="form__group">
              <input class="form__group-text" type="text" placeholder="名前やメールアドレスを入力してください"  name="keyword">
            </div>
            <div class="form__group">
              <div class="form__group-gender">
                <select class="select__gender" name="gender" id="">
                  <option value="" selected hidden>性別</option>
                  <option value="男性">男性</option>
                  <option value="女性">女性</option>
                  <option value="その他">その他</option>
                </select>
              </div>
            </div>
            <div class="form__group">
              <div class="form__group-category">
                <select class="select__category" name="category_id" id="">
                  <option value="" selected hidden>お問い合わせの種類</option>
                  <option value="1">商品のお届けについて</option>
                  <option value="2">商品の交換について</option>
                  <option value="3">商品トラブル</option>
                  <option value="4">ショップへのお問い合わせ</option>
                  <option value="5">その他</option>
                </select>
                </div>
            </div>
            <div class="form__group">
              <div class="form__group-date">
                <input class="input__date" type="date" name="created_at" value="{{ request('created_at') }}">
              </div>
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
              {{ $contacts->links() }}
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
                            <p class="modal__content-name">{{ $contact['first_name'] }}　{{ $contact['last_name'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">性別</p>
                            <p class="modal__content-gender">{{ $contact['gender'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">メールアドレス</p>
                            <p class="modal__content-email">{{ $contact['email'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">電話番号</p>
                            <p class="modal__content-tel">{{ $contact['tel'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">住所</p>
                            <p class="modal__content-address">{{ $contact['address'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">建物名</p>
                            <p class="modal__content-building">{{ $contact['building'] }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">お問い合わせの種類</p>
                            <p class="modal__content-category">{{ $contact->category->content ?? '未設定' }}</p>
                          </div>
                          <div class="modal__group">
                            <p class="modal__title">お問い合わせの内容</p>
                            <p class="modal__content-detail">{{ $contact['detail'] }}</p>
                          </div>
                          <form action="/admin/delete" method="POST">
                            @method('DELETE')
                            @csrf
                          <div class="modal__button">
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                            <button class="modal__button-delete">削除</button>
                          </div>
                          </form>
                          @csrf
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