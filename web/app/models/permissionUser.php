<?php
class permissionUser extends \Eloquent {
    public $table = "permissionUser";
    
    public static function remove($id)
    {
  	    $obj = permissionUser :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return permissionUser::find($id);
    }
  
    public static function getList()
    {
  	    return permissionUser::get();
    }

    public static function updateuser_id($id , $user_id)
    {
  	     $obj = permissionUser::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> user_id = $user_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updatepermission_id($id , $permission_id)
    {
  	     $obj = permissionUser::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> permission_id = $permission_id;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($user_id, $permission_id)
    {
        $obj = new permissionUser();
        $obj -> user_id = $user_id;
        $obj -> permission_id = $permission_id;
        $obj -> save();
        return $obj -> id;
    }

}