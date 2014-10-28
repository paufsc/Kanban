<?php
class modelList extends \Eloquent {
    public $table = "modelList";
    
    public static function remove($id)
    {
  	    $obj = modelList :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return modelList::find($id);
    }
  
    public static function getList()
    {
  	    return modelList::get();
    }

    public static function updatename($id , $name)
    {
  	     $obj = modelList::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> name = $name;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($name)
    {
        $obj = new modelList();
        $obj -> name = $name;
        $obj -> save();
        return $obj -> id;
    }

}