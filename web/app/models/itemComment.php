<?php
class itemComment extends \Eloquent {
    public $table = "itemComment";
    
    public static function remove($id)
    {
  	    $obj = itemComment :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return itemComment::find($id);
    }
  
    public static function getList()
    {
  	    return itemComment::get();
    }

    public static function updateitem_id($id , $item_id)
    {
  	     $obj = itemComment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> item_id = $item_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updateuser_id($id , $user_id)
    {
  	     $obj = itemComment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> user_id = $user_id;
  		     $obj -> save();
  	     }
    }
   
    public static function updatecomment($id , $comment)
    {
  	     $obj = itemComment::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> comment = $comment;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($item_id, $user_id, $comment)
    {
        $obj = new itemComment();
        $obj -> item_id = $item_id;
        $obj -> user_id = $user_id;
        $obj -> comment = $comment;
        $obj -> save();
        return $obj -> id;
    }

}