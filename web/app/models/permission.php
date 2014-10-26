<?php
class permission extends \Eloquent {
    public $table = "permission";
    
    public static function remove($id)
    {
  	    $obj = permission :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return permission::find($id);
    }
  
    public static function getList()
    {
  	    return permission::get();
    }

    public static function updatepermission($id , $permission)
    {
  	     $obj = permission::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> permission = $permission;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($permission)
    {
        $obj = new permission();
        $obj -> permission = $permission;
        $obj -> save();
        return $obj -> id;
    }

}