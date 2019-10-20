<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/poem.php";

// include_once "../config/database.php";
// include_once "../models/poem.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate poem poem object
$poem = new Poem($db);

// // Get raw poemed data
$data = json_decode(file_get_contents("php://input"));
$method = $_SERVER['REQUEST_METHOD'];
var_dump($data);
var_dump("method is " . $method);

if ($method == "POST") {
    $poem->title = $data->title;
    $poem->body = $data->body;
    $poem->topic = $data->topic;
    $poem->image = $data->image;
    $poem->author = $data->author;

    // Create poem
    if ($poem->create()) {
        echo json_encode(
            array(
                'message' => 'Poem Created',
                'title' => $poem->title,
                'body' => $poem->body,
                'topic' => $poem->topic,
                'image' => $poem->image,
                'author' => $poem->author,
            )
        );
    } else {
        echo json_encode(
            array('message' => 'Poem Not Created')
        );
    }
}
