<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>


        <title>切り捨て御免</title>

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

            button{
                background:none;
                border:2px solid #FFF5EB;
                border-radius:5px;
                cursor:pointer;
                color: #DEEDF0;
                font-size: 18px;
                padding:15px 25px;
                margin: 10px;
            }
            button:hover{
                color: #F4C7AB;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        <div class="header" style="background:#B2B8A3; border-bottom:3px solid rgb(121, 122, 126); height:45px; padding:5px 10px;">
            @if (Route::has('login'))
              <div class="top-right links">
                @auth
                  <a href="{{ url('/home') }}">HOME</a>
                @else
                  <a href="{{ route('login') }}">ログイン</a>

                  @if (Route::has('register'))
                    <a href="{{ route('register') }}">会員登録</a>
                  @endif
                @endauth
              </div>
            @endif
        </div>
        <!-- main -->
        <section id="main" style="max-width:980px; background:#000; border:3px solid #B2B8A3; box-shadow:0 3px 6px #B2B8A3; margin:0 auto;">
          <div class="main_img" style="padding:30px; min-height:200px;">
            <img src="{{ asset('images/img1.png') }}" style="width:100%; vertical-align:bottom; box-shadow: 0 4px 8px rgb(121 122 126); min-height:200px;">
          </div>
          <div class="main_wrap">
            <div class="" style="text-align:center; margin:30px auto 50px;">
                <button>
                  ▶︎ 30秒コース
                </button>
                <button>
                  ▶︎ 60秒コース
                </button>
            </div>
          </div>
        </section>
        <!-- footer -->
        <div id="app">
        <example-component></example-component>
        </div>
        <div class="footer" style="background:rgb(121, 122, 126); height:40px; padding:10px 5px; background:#B2B8A3; border-top:3px solid rgb(121, 122, 126); ">
            footer
        </div>
    </body>
</html>
