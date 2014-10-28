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

Route::group(array('before' => 'auth'), function() {
    Route::group(array('before' => 'isAdmin'), function() {
        Route::get("/api/list/all", function () {
            return ["state"=>200,"list"=> item::getList()];
        });
        Route::get("/api/user/all", function () {
            return ["state"=>200,"list"=> user::select(["id","email"])->get()];
        });
        Route::post("/api/list/new", function () {
            if(item::insert(Input::get("name",""),1) != 0)
                return ["state"=>200];
            else
                return ["state"=>403];
        });
        Route::post("/api/job/assign", function () {
            $userid = Input::get("user_id",0);
            $itemid = Input::get("item_id",0);
            if( userItem::insert($userid,$itemid) != 0)
                return ["state"=>200];
            return ["state"=>403];
        });
        Route::delete("/api/job/assign/{uid}/{id}", function ($userid,$itemid) {
             $data = userItem::where("user_id","=",$userid)
                ->where("item_id","=",$itemid)->get();
             if(count($data) > 0)
             {
                 userItem::remove($data[0]->id);
                 return ["state"=>200];
             }
            return ["state"=>403];
        });
    });
    Route::post('/api/item/drop',function ()
    {
        $list_id = Input::get("list_id",0);
        $item_id = Input::get("item_id",0);
        item::updatemodelList_id($item_id,$list_id);
        return ["state"=>200];
    });
    #logout
    Route::delete('/api/auth', function()
    {
        Session::clear();
        return ["state"=>200];
    });
    Route::get("/api/list",function()
    {
       return ["state"=>200,"data"=>modelList::getList()];
    });
    Route::get("/api/list/my",function()
    {
       $user_id = Session::get("id");
       if (is_array($user_id)) {
            $user_id = $user_id[0];
       } 
       return ["state"=>200,"list"=> userItem::getUserList($user_id ) ];
    });
});
#register
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
    	return ["state"=>200];
	}
    return ["state"=>403];
});
#auth state
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
	$data = user::login($email,$pass);
	if(count($data) > 0)
	{
		Session::set("id", $data[0]->id);
		Session::push("perms",permissionUser::where("user_id","=",$data[0]->id)->get());
        return ["state"=>200];
	}
    return ["state"=>403];
});
Route::get('/', function()
{
    return View::make("hello");
});