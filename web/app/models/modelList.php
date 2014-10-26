<?php
class modelList extends \Eloquent {
    public $table = "list";
    
    public static function remove($id)
    {
  	    $obj = list :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return list::find($id);
    }
  
    public static function getList()
    {
  	    return list::get();
    }

    public static function updatename($id , $name)
    {
  	     $obj = list::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> name = $name;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($name)
    {
        $obj = new list();
        $obj -> name = $name;
        $obj -> save();
        return $obj -> id;
    }

}