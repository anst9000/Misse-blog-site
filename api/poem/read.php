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

// instantiate database and poem object
$database = new Database();
$db = $database->connect();

// initialize object
$poem = new Poem($db);

// query poems
$stmt = $poem->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // poems array
    $poems_arr = array();
    $poems_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['header'] to just $header only
        extract($row);

        $poem_item = array(
            "id" => $id,
            "title" => $title,
            "body" => html_entity_decode($body),
            "topic" => $topic,
            "image" => $image,
            "author" => $author,
            "created_at" => $created_at
        );

        array_push($poems_arr["records"], $poem_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show poems data in json format
    echo json_encode($poems_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no poems found
    echo json_encode(
        array("message" => "No poems found.")
    );
}
