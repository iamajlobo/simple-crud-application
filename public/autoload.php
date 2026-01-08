<?php

function myAutoloader($class){
    $root = __DIR__ . "/../app/";
    $folders = ['models/','controllers/','core/','helpers/'];
    $ext = ".class.php";

    foreach($folders as $folder){
        $file_path = $root . $folder . $class . $ext;
        if(file_exists($file_path)){
            include_once $file_path;
            return;
        }
    }
}