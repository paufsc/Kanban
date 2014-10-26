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
Route::post('/api/register', function()
{
	$email = Input::get("email", "");
	$pass = Input::get("pass", "");
	$data = user::insert($email,$pass);

    if($data != 0)
    {
        $perms = rolePermission::where("role_id","=",1)->get();
        foreach($perms as $perm)
        {
            permissionUser::insert($data,$perm->permission_id);
        }
    	return ["status"=>200];
	}
    return ["status"=>403];
});


#status
Route::get('/api/auth', function()
{
    if(Session::get("id") != null)
    {
    	return ["state"=>200, "id"=>Session::get("id"),"perms"=>Session::get("perms")];
    }
    return ["state"=>"403"];

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