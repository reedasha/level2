<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        <h2>You succefully authorized</h2>

        <form method="post" action="pr">
            {{ csrf_field() }}
            <label>Link: <input type="text" placeholder="Put repo name here" name="reposlug"></label>
            <input type="hidden" name="token" value="{{$tokeen}}">
            <input type="submit" value="Open links">
        </form>
    </div>
</div>
</body>
</html>
