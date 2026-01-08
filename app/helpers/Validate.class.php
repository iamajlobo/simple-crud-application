<?php 

class Validate {
    private static array $errors = [];
    
    public static function validateInput($input){
        [
         'first_name'=>$first_name,
         'last_name' =>$last_name,
         'email' => $email,
         'course' => $course   
        ] = $input;
        
        #Check if empty
        if( empty($first_name) || empty($last_name) || empty($email) || empty($course)) self::$errors[] = "All fields are required!";
        
        return self::$errors;
    }
}