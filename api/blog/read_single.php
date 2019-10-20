<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

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

// Get ID
$blog->id = isset($_GET['id']) ? $_GET['id'] : die();

// Set ID to update
// $blog->id = $_POST['id'];

// Get blog
if ($blog->read_single()) {
    // Create array
    $blog_arr = array(
        'id' => $blog->id,
        'header' => $blog->header,
        'content' => $blog->content,
        'image' => $blog->image,
        'author' => $blog->author,
        'created_at' => $blog->created_at,
    );

    // Make JSON
    print_r(json_encode($blog_arr));
} else {
    echo json_encode(
        array('message' => 'Blog Not Found')
    );
}
