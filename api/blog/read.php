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

// instantiate database and blog object
$database = new Database();
$db = $database->connect();

// initialize object
$blog = new Blog($db);

// query blogs
$stmt = $blog->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // blogs array
    $blogs_arr = array();
    $blogs_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['header'] to just $header only
        extract($row);

        $blog_item = array(
            "id" => $id,
            "header" => $header,
            "content" => html_entity_decode($content),
            "image" => $image,
            "author" => $author,
            "created_at" => $created_at,
        );

        array_push($blogs_arr["records"], $blog_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show blogs data in json format
    echo json_encode($blogs_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no blogs found
    echo json_encode(
        array("message" => "No blogs found.")
    );
}
