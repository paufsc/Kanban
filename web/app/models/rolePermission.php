<?php
class rolePermission extends \Eloquent {
    public $table = "rolePermission";
    
    public static function remove($id)
    {
  	    $obj = rolePermission :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return rolePermission::find($id);
    }
  
    public static function getList()
    {
  	    return rolePermission::get();
    }

    public static function updatepermission_id($id , $permission_id)
    {
  	     $obj = rolePermission::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> permission_id = $permission_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updaterole_id($id , $role_id)
    {
  	     $obj = rolePermission::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> role_id = $role_id;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($permission_id, $role_id)
    {
        $obj = new rolePermission();
        $obj -> permission_id = $permission_id;
        $obj -> role_id = $role_id;
        $obj -> save();
        return $obj -> id;
    }

}