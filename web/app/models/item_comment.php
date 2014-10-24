<?php
class item_comment extends \Eloquent {
    public $table = "item_comment";
    
    public static function remove($id)
    {
  	    $obj = item_comment :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return item_comment::find($id);
    }
  
    public static function getList()
    {
  	    return item_comment::get();
    }

    public static function updateitem_id($id , $item_id)
    {
  	     $obj = item_comment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> item_id = $item_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updateuser_id($id , $user_id)
    {
  	     $obj = item_comment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> user_id = $user_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updatecomment($id , $comment)
    {
  	     $obj = item_comment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> comment = $comment;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($item_id, $user_id, $comment)
    {
        $obj = new item_comment();
        $obj -> item_id = $item_id;
        $obj -> user_id = $user_id;
        $obj -> comment = $comment;
        $obj -> save();
        return $obj -> id;
    }

}