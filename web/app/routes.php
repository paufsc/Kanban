<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
    #logout
    Route::delete('/api/auth', function()
    {
        Session::clear();
        return ["status"=>200];
    });

});

#status
Route::post('/api/auth', function()
{
	$email = Input::get("email", "");
	$pass = Input::get("pass", "");
    if(user::insert($user,$pass) != 0)
    {
    	return ["status"=>200];
	}
    return ["status"=>403];
});


#status
Route::get('/api/auth', function()
{
    if(Session::get("id") != null)
    {
    	return ["id"=>Session::get("id"),"perms"=>Session::get("perms")];
    }
});
#login
Route::post('/api/auth', function()
{
	$email = Input::get("email", "");
	$pass = Input::get("pass", "");
	$data = User::login($email,$pass);
	if(count($data) > 0)
	{

		Session::push("id", $data[0]->id);
		Session::push("perms",permissionUser::where("user_id","=",$data[0]->id)->get());
        return ["status"=>200];
	}
    return ["status"=>403];

});
Route::get('/', function()
{
    return View::make("hello");
});