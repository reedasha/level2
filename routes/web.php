<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pr', 'PullrequestController@show');

Route::post('/pr', 'PullrequestController@show_private');

Route::post('/auth', function () {
    $client_id = $_POST["client_id"];
    $secret = $_POST["secret"];

    $user= $_POST["username"];
    $password = $_POST["password"];

    $data = exec("curl -X POST -u \"" .$client_id .":" .$secret ."\" https://bitbucket.org/site/oauth2/access_token -d grant_type=password -d username=".$user ." -d password=" .$password ."");
    $xml = json_decode($data);

    if(property_exists ($xml, 'access_token'))
    {
        $token = $xml->access_token;
        return view('auth', ['tokeen' => $token]);
    }
    else
        {
        print("Invalid credentials. Please try again!");
        return view('welcome');
    }

});


