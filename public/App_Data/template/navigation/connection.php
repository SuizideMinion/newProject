<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();

try{
    $pdo = new PDO('mysql:host=localhost;dbname=newproject;charset=utf8','userx','5Hv1fq8&');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}catch (Exception $e){

    header('Content-Type:application/json;charset=utf-8');

    http_response_code(500);
    $output = ['status'=>'failed','message' => $e->getMessage()];
    echo json_encode($output);
    exit();
}
