<?php
header('Access-Control-Allow-Origin: http://localhost:5173');

$gift=json_decode(file_get_contents('php://input'));
if(!empty($gift['id'])){
    include_once ('conn.php');
    
    $db = $conn->prepare('SELECT id,user_name,project_name,tel FROM users');
    $result=$db->get_result();
    if ($result->num_rows >0) {
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}

?>