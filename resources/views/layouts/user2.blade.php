<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
        <nav>
            <button class="header-nav__button user2"><a href="/login">login</a></button>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>