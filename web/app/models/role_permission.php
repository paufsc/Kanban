<?php
class role_permission extends \Eloquent {
    public $table = "role_permission";
    
    public static function remove($id)
    {
  	    $obj = role_permission :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return role_permission::find($id);
    }
  
    public static function getList()
    {
  	    return role_permission::get();
    }

    public static function updatepermission_id($id , $permission_id)
    {
  	     $obj = role_permission::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> permission_id = $permission_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updaterole_id($id , $role_id)
    {
  	     $obj = role_permission::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> role_id = $role_id;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($permission_id, $role_id)
    {
        $obj = new role_permission();
        $obj -> permission_id = $permission_id;
        $obj -> role_id = $role_id;
        $obj -> save();
        return $obj -> id;
    }

}