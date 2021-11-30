<?php
// Import script autoload agar bisa menggunakan library
require_once('./vendor/autoload.php');
// Import library
use Firebase\JWT\JWT;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
if($_COOKIE['Mendoan']){
    $access_token = $_COOKIE['Mendoan'];
    try{
    $payload= \Firebase\JWT\JWT::decode($access_token, $_ENV['ACCESS_TOKEN_SECRET'], ['HS256']);
            } catch(Exception $exception){
              header('location:index.php'); 
            }
}else{
    header('location:index.php'); 
}
?>