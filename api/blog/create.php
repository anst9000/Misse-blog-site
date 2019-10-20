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
include __DIR__ . "/../models/blog.php";

// include_once "../config/database.php";
// include_once "../models/blog.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog blog object
$blog = new Blog($db);

// // Get raw bloged data
$data = json_decode(file_get_contents("php://input"));
$method = $_SERVER['REQUEST_METHOD'];
var_dump($data);
var_dump("method is " . $method);

if ($method == "POST") {
    $blog->header = $data->header;
    $blog->content = $data->content;
    $blog->image = $data->image;
    $blog->author = $data->author;

    // Create blog
    if ($blog->create()) {
        echo json_encode(
            array(
                'message' => 'Blog Created',
                'header' => $blog->header,
                'content' => $blog->content,
                'image' => $blog->image,
                'author' => $blog->author,
            )
        );
    } else {
        echo json_encode(
            array('message' => 'Blog Not Created')
        );
    }
}
