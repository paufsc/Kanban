<?php
class item extends \Eloquent {
    public $table = "item";
    
    public static function remove($id)
    {
  	    $obj = item :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return item::find($id);
    }
  
    public static function getList()
    {
  	    return item::get();
    }

    public static function updatename($id , $name)
    {
  	     $obj = item::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> name = $name;
  		     $obj -> save();
  	     }
    }
   
    public static function updatemodelList_id($id , $modelList_id)
    {
  	     $obj = item::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> modelList_id = $modelList_id;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($name, $modelList_id)
    {
        $obj = new item();
        $obj -> name = $name;
        $obj -> modelList_id = $modelList_id;
        $obj -> save();
        return $obj -> id;
    }

}