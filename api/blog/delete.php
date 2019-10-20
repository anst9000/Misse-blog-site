<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

// Get raw bloged data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$blog->id = $data->id;
// $blog->id = isset($_GET['id']) ? $_GET['id'] : die();
// $blog->id = $_POST['id'];

// Delete blog
if ($blog->delete()) {
    echo json_encode(
        array(
            'message' => 'Blog Deleted',
            'value' => $blog->id,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Blog Not Deleted')
    );
}
