<?php
class user_item extends \Eloquent {
    public $table = "user_item";
    
    public static function remove($id)
    {
  	    $obj = user_item :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return user_item::find($id);
    }
  
    public static function getList()
    {
  	    return user_item::get();
    }

    public static function updateuser_id($id , $user_id)
    {
  	     $obj = user_item::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> user_id = $user_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updateitem($id , $item)
    {
  	     $obj = user_item::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> item = $item;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($user_id, $item)
    {
        $obj = new user_item();
        $obj -> user_id = $user_id;
        $obj -> item = $item;
        $obj -> save();
        return $obj -> id;
    }

}