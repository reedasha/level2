<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #cce5ff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
                font-size: 36px;
            }

            .flex-center {
                align-items: left;
                display: flex;
                justify-content: center;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 80px;
            }

            input[type=text],  input[type=password]{
                width: 100%;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #555;
                border-radius: 4px;
            }
            input[type=submit] {
                background-color: #007bff;
                border: none;
                color: white;
                padding: 16px 32px;
                border-radius: 8px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
                font-size: 20px;
                -webkit-transition-duration: 0.2s; /* Safari */
                transition-duration: 0.2s;
            }
            input[type=submit]:hover {
                background-color: #ffffff; /* Green */
                color: black;
            }

            h3 {
                margin: 30px 0 0;
            }


        </style>
    </head>
    <body>
        <div class="flex-center">


            <div class="content">
                <div class="title m-b-md">
                    Tool for Pull Requests
                </div>

                <div class="cont">
                    <h3>Authorize</h3>
                    <form method="post" action="auth">
                        {{ csrf_field() }}

                        <label>Username: <input type="text" placeholder="Put username" name="username"></label><br>
                        <label>Password: <input type="password" placeholder="Put password" name="password"></label><br>

                        <label>Client_id: <input type="text" placeholder="Put client id" name="client_id"></label><br>
                        <label>Client_secret: <input type="text" placeholder="Put client secret" name="secret"></label><br>

                        <input type="submit" value="Login"><br>
                    </form>

                    <h3>Open PR of public repos</h3>
                    <form method="get" action="pr">
                        {{ csrf_field() }}
                        <label>Link: <input type="text" placeholder="Put repo name here" name="reposlug"></label><br>
                        <input type="submit" value="Open"><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
