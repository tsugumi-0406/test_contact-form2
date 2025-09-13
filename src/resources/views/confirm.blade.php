  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact Form</title>
      <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
  </head>

  <body>
    <header class="header">
          <div class="header__inner">
              <h2 class="header__logo">
                  Fashionably Late
              </h2>
          </div>
      </header>

    <main>
      <div class="contact-form__content">
        <div class="contact-form__heading">
          <h2>Confirm</h2>
        </div>

        <form class="form" action="/thanks" method="post">
          @csrf
          <div class="confirm-table">
            <table class="confirm-table__inner">

              <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                  <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly hidden/>
                  <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly hidden/>
                  {{ $contact['first_name'] }}  {{ $contact['last_name'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                  <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly hidden/>
                  {{ $contact['gender'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                  <input type="email" name="email" value="{{ $contact['email'] }}" readonly hidden/>
                  {{ $contact['email'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header"></th>
                <td class="confirm-table__text">
                  <input type="tel" name="tel" value="{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}" readonly hidden/>
                  {{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header"></th>
                <td class="confirm-table__text">
                  <input type="text" name="address" value="{{ $contact['address'] }}" readonly hidden/>
                  {{ $contact['address'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header"></th>
                <td class="confirm-table__text">
                  <input type="text" name="building" value="{{ $contact['building'] }}" readonly hidden/>
                  {{ $contact['building'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header"></th>
                <td class="confirm-table__text">
                  <input type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly hidden/>
                  {{ $contact['category_name'] }}
                </td>
              </tr>

              <tr class="confirm-table__row">
                <th class="confirm-table__header"></th>
                <td class="confirm-table__text">
                  <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly class="detail" hidden/>
                  {{ $contact['detail'] }}
                </td>
              </tr>

            </table>
          </div>

          <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
          </div>
        </form>


        <div class="form__link">
          <a href="/" class="form__link-correction">修正</a>
        </div>
      </div>
    </main>
  </body>

  </html>