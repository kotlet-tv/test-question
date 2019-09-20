<?php
$db_host = "localhost";
$db_name = "test-question-db";
$db_username = "root";
$db_password = "";

$db = new PDO("mysql:host=$db_host; dbname=$db_name", $db_username, $db_password);

function get_all_comments(){
    global $db;
    $conn = $db->query("SET NAMES 'utf8'"); 
    $conn = $db->query("SET CHARACTER SET 'utf8'");
    $conn = $db->query("SET SESSION collation_connection = 'utf8_general_ci'");
    $conn = $db->query("SELECT * FROM comments ORDER BY id DESC");
    return $conn;
}

function create_comment($name, $comment){
    global $db;
    $data = date('Y-m-d H:i:s');
    $conn = $db->query("SET NAMES 'utf8'"); 
    $conn = $db->query("SET CHARACTER SET 'utf8'");
    $conn = $db->query("SET SESSION collation_connection = 'utf8_general_ci'");
    $sql = "INSERT INTO comments (id, name, comment, data) VALUES (?,?,?,?)";
    $conn= $db->prepare($sql);
    $conn->execute([NULL, $name, $comment, $data]);
}
