<?php
// $isPost = isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
// if(!$isPost){
//     header('Location: ../index.php');
//     exit;
// }

/** @var PDO $pdo */
$pdo = require_once __DIR__ . '/connection.php';
header('Content-Type:application/json;charset=utf-8');

$username = $_GET['usr'];
$channel = $_GET['channel'];
$password = $_GET['pass'];
if(!$username){
    http_response_code(503);
    $output = ['status'=>'failed','message' =>'Username is not set'];
    return;
}
// $stmt = $pdo->prepare("SELECT name FROM users WHERE email=? LIMIT 1");
// $stmt->execute([$username]);
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1");
$stmt->execute(array(":email" => $username, ":password" => $password));
$row = $stmt->fetch();

if (isset($row['name']))
{
  $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);

  if (!$text) {
      $output = ['status'=>'success','message' =>'OK'];
      echo json_encode($output);
      return;
  }
  $sql = "INSERT INTO chats SET username=:username, text=:text, channel=:channel";
  try{
      $statement = $pdo->prepare($sql);
      $statement->execute([':username' => $row['name'], ':text' => $text, ':channel' => $channel]);
      $output = ['status'=>'success','message' =>'OK'];
  }catch(Exception $e){
      http_response_code(501);
      $output = ['status'=>'failed','message' => $e->getMessage()];
  }

  echo json_encode($output);
}
