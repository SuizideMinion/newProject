<?php

/** @var PDO $pdo */
$pdo = require_once __DIR__ . '/connection.php';

$lastId = "0";
$sql = "SELECT id,username,text,created_at,channel FROM chats
WHERE created_at >= DATE_SUB(NOW(),INTERVAL 2 SECOND ) AND id > :lastId AND channel = '".$_GET['channel']."' LIMIT 1"; // created_at >= DATE_SUB(NOW(),INTERVAL 2 SECOND ) AND
$statement = $pdo->prepare($sql);

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

while (true) {
    try{
    $statement->execute(
        [':lastId' => $lastId]
    );
    while ($row = $statement->fetch()) {
      $find = array(
        '~\*(.*?)\*~s',
        '~\*\*(.*?)\*\*~s',
        '~\*\*\*(.*?)\*\*\*~s',
        '~\~\~(.*?)\~\~~s',
        '~\_\_(.*?)\_\_~s',
      );

      $replace = array(
        '<i>$1</i>',
        '<b>$1</b>',
        '<b><i>$1</i></b>',
        '<del>$1</del>',
        '<u>$1</u>',
      );
      $text = preg_replace($find,$replace,$row['text']);
      $smiles = array(
          'xD'	=> '1F602.png',
          '>:)'	=> '1F608.png',
          'x('	=> '1F616.png',
          ':(('	=> '1F62D.png',
          ';('	=> '1F622.png',
          ':*'	=> '1F618.png',
          ':))'	=> '1F606.png',
          ':D'	=> '1f605.png',
          ':-D'	=> '1f605.png',
          ':x'	=> '1F60D.png',
          '(:|'	=> '1F634.png',
          ':)'	=> '1F60A.png',
          ':-)'	=> '1F60A.png',
          ':('	=> '1F61F.png',
          ':-('	=> '1F61F.png',
          ';)'	=> '1F609.png',
          ';-)'	=> '1F609.png'
        );
        foreach($smiles as $key => $img) {
            $text = str_replace($key, '<img src="/img/emoji/'.$img.'" height="18" width="18" />', $text);
        }

        // Überprüfen ob heute die erste nachricht geschrieben wurde
        // $stmt = $pdo->prepare("SELECT * FROM chats WHERE created_at LIKE ':time%' AND channel = ':channel'");
        // $stmt->execute(array(":time" => date("Y-m-d", (time() + 120 * 60)), ":channel" => $_GET['channel']));
        // $row = $stmt->fetch();
        // if (isset($row['channel'])) $timecheck = date("Y-m-d", $row['created_at']);
        //
        // if( !isset($timecheck) OR $timecheck != date("Y-m-d", (time() + 120 * 60)))
        // {
        //     $timecheck = date("Y-m-d", (time() + 120 * 60));
        //     $newday = '<i style="color:red;"><center>'.date("Y-m-d", (time() + 120 * 60)).'</center></i>';
        // } else $newday = '';

        // Übertragung der Daten
        $data = [
            'message' => sprintf($newday.'<i title="'.$row['created_at'].'">%s</i> <b>%s</b>: %s', date("G:i", (time() + 120 * 60)), $row['username'], $text)
        ];
        echo "event: updateText\n";
        echo 'data: ' . json_encode($data);
        echo "\n\n";
        $lastId = $row['id'];
    }
}catch(Exception $e){
    echo "event: showError\n";
    echo 'data: ' . json_encode(['message' => $e->getMessage()]);
    echo "\n\n";
}
    ob_end_flush();
    flush();
    session_write_close();

    if (connection_aborted()) {
        break;
    }
    sleep(0.1);
}
