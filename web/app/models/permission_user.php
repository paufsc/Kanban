<?php
class permission_user extends \Eloquent {
    public $table = "permission_user";
    
    public static function remove($id)
    {
  	    $obj = permission_user :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return permission_user::find($id);
    }
  
    public static function getList()
    {
  	    return permission_user::get();
    }

    public static function updateuser_id($id , $user_id)
    {
  	     $obj = permission_user::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> user_id = $user_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updatepermission_id($id , $permission_id)
    {
  	     $obj = permission_user::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> permission_id = $permission_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updateitem_id($id , $item_id)
    {
  	     $obj = permission_user::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> item_id = $item_id;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($user_id, $permission_id, $item_id)
    {
        $obj = new permission_user();
        $obj -> user_id = $user_id;
        $obj -> permission_id = $permission_id;
        $obj -> item_id = $item_id;
        $obj -> save();
        return $obj -> id;
    }

}