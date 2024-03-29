<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
    <style>
        @import url('https://rsms.me/inter/inter-ui.css');
        ::selection {
            background: #2D2F36;
        }
        ::-webkit-selection {
            background: #2D2F36;
        }
        ::-moz-selection {
            background: #2D2F36;
        }
        body {
            background: white;
            font-family: 'Inter UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .page {
            background: #e2e2e5;
            display: flex;
            flex-direction: column;
            height: calc(100% - 40px);
            position: absolute;
            place-content: center;
            width: calc(100% - 40px);
        }
        @media (max-width: 767px) {
            .page {
                height: auto;
                margin-bottom: 20px;
                padding-bottom: 20px;
            }
        }
        .container {
            display: flex;
            height: 320px;
            margin: 0 auto;
            width: 640px;
        }
        @media (max-width: 767px) {
            .container {
                flex-direction: column;
                height: 630px;
                width: 320px;
            }
        }
        .left {
            background: white;
            height: calc(100% - 40px);
            top: 20px;
            position: relative;
            width: 50%;
        }
        @media (max-width: 767px) {
            .left {
                height: 100%;
                left: 20px;
                width: calc(100% - 40px);
                max-height: 270px;
            }
        }
        .login {
            font-size: 50px;
            font-weight: 900;
            margin: 50px 40px 40px;
        }
        .eula {
            color: #999;
            font-size: 14px;
            line-height: 1.5;
            margin: 40px;
        }
        .right {
            background: #474A59;
            box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
            color: #F1F1F2;
            position: relative;
            width: 50%;
        }
        @media (max-width: 767px) {
            .right {
                flex-shrink: 0;
                height: 100%;
                width: 100%;
                max-height: 350px;
            }
        }
        svg {
            position: absolute;
            top: 90px;
            width: 320px;
        }

        .svg2{
            top:0;
        }

        path {
            fill: none;
            stroke: url(#linearGradient);;
            stroke-width: 4;
            stroke-dasharray: 240 1386;
        }
        .form {
            margin: 40px;
            position: absolute;
        }
        label {
            color:  #c2c2c5;
            display: block;
            font-size: 14px;
            height: 16px;
            margin-top: 20px;
            margin-bottom: 5px;
        }
        input {
            background: transparent;
            border: 0;
            color: #f2f2f2;
            font-size: 15px;
            height: 30px;
            line-height: 30px;
            outline: none !important;
            width: 100%;
        }
        input::-moz-focus-inner {
            border: 0;
        }
        #submit {
            color: #707075;
            margin-top: 27px;
            transition: color 300ms;
        }
        #submit:focus {
            color: #f2f2f2;
        }
        #submit:active {
            color: #d0d0d2;
        }

    </style>
</head>
<body>
<div class="page">
    <div class="container">
        <div class="left">
            <div class="login">Login</div>
            <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
        </div>
        <div class="right">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @if($errors->any())
                        <div class="text-red-500">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <input type="submit" id="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
