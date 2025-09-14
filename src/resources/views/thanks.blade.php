<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>

<body>
    <main>
        <div class="thanks-main">
            <h2 class="thanks-main__back">Thank you</h2>
            <div class="thanks-main__text">
                <p>お問い合わせありがとうございました</p>
                <form class="form__button" action="/" post="get">
                    @csrf
                  <button class="form__button-submit" type="submit">確認画面</button>
                </form>
            </div>
            
        </div>
    </main>
</body>