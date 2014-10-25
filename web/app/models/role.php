<?php
class role extends \Eloquent {
    public $table = "role";
    
    public static function remove($id)
    {
  	    $obj = role :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return role::find($id);
    }
  
    public static function getList()
    {
  	    return role::get();
    }

    public static function updatename($id , $name)
    {
  	     $obj = role::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> name = $name;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($name)
    {
        $obj = new role();
        $obj -> name = $name;
        $obj -> save();
        return $obj -> id;
    }

}