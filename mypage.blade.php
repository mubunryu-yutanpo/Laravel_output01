<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>切り捨て御免-マイページ-</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FFF5EB;
                color: rgb(121, 122, 126);
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        <div class="header" style="background:#B2B8A3; border-bottom:3px solid rgb(121, 122, 126); height:45px; padding:5px 10px;">
            @if (Route::has('login'))
              <div class="top-right links">
                @auth
                  <a href="{{ url('/play') }}">play</a>
                @else
                  <a href="{{ route('login') }}">ログイン</a>

                  @if (Route::has('register'))
                    <a href="{{ route('register') }}">会員登録</a>
                  @endif
                @endauth
              </div>
            @endif
        </div>
        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
          <div class="alert alert-primary text-center" role="alert">
            {{ session('flash_message') }}
          </div>
        @endif

        <!-- main -->
        <section id="main" style="max-width:980px; margin:50px auto; border:3px solid #B2B8A3; box-shadow:0 3px 6px #B2B8A3;">
          <div class="main_img" style="box-shadow:0 4px 8px rgb(121, 122, 126)">
            <img src="{{ asset('images/img2.png') }}" style="width:100%; max-height:150px; vertical-align:bottom;">
          </div>

          <div class="">
            <h3 class="" style="background:#B2B8A3; color:#fff; text-align:center; margin:0; padding:15px 0;">
              {{ $name }} さんのマイページ
            </h3>
           
            <div class="main_score_wrap">

                <div class="" style="border:2px solid #B2B8A3; width:95%; max-width:400px; margin:10px auto;">
                  <p style="background:#DEEDF0; text-align:center; margin:0; padding:5px 0;">ハイスコア</p>
                  <p class="" style="margin-left:10px; font-size:18px">30秒コース： <span style="font-weight:bold; font-size:22px;">{{ $score_30 }} </span>点</p>
                  <p class="" style="margin-left:10px; font-size:18px">60秒コース： <span style="font-weight:bold; font-size:22px;">{{ $score_60 }} </span>点</p>

                  <p style="background:#DEEDF0; text-align:center; margin:0; padding:5px 0;">称号</p>
                  <p style="font-weight:bold; font-size:22px; margin: 10px 0 10px 10px;">{{ $shogo }}</p>
                </div>

                <div class="" style="margin:15px;">
                    <a href="{{ url('/edit') }}" class="" style="color:rgb(121, 122, 126); padding:5px;">
                      ▶︎ 登録情報を変更する
                    </a>
                </div>
            </div>

          </div>
        </section>
        <!-- footer -->
        <div class="footer" style="background:rgb(121, 122, 126); height:40px; padding:10px 5px; background:#B2B8A3; border-top:3px solid rgb(121, 122, 126); ">
            footer
        </div>
</body>
</html>
