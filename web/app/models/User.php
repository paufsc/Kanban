<?php
class user extends \Eloquent {
    public $table = "user";
    public static function login($email,$pass)
    {
      return user::where("email","=",$email)
      ->where("password","=",$pass)->get();
    }
    
    public static function remove($id)
    {
  	    $obj = user :: find($id);
  	    if(count($obj) > 0)
  	    {
		    return $obj -> delete();
  	    }
    }

    public static function getOne($id)
    {
  	    return user::find($id);
    }
  
    public static function getList()
    {
  	    return user::get();
    }

    public static function updateemail($id , $email)
    {
  	     $obj = user::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> email = $email;
  		     $obj -> save();
  	     }
    }
   
    public static function updatepassword($id , $password)
    {
  	     $obj = user::getOne($id);
  	     if(count($obj) > 0)
  	     {
   		     $obj -> password = $password;
  		     $obj -> save();
  	     }
    }
     
    public static function insert($email, $password)
    {
        $obj = new user();
        $obj -> email = $email;
        $obj -> password = $password;
        $obj -> save();
        return $obj -> id;
    }

}