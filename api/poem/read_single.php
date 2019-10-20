<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

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

// Get ID
$poem->id = isset($_GET['id']) ? $_GET['id'] : die();

// Set ID to update
// $poem->id = $_POST['id'];

// Get poem
if ($poem->read_single()) {
    // Create array
    $poem_arr = array(
        'id' => $poem->id,
        'title' => $poem->title,
        'body' => $poem->body,
        'topic' => $poem->topic,
        'image' => $poem->image,
        'author' => $poem->author,
        'created_at' => $poem->created_at,
    );

    // Make JSON
    print_r(json_encode($poem_arr));
} else {
    echo json_encode(
        array('message' => 'Poem Not Found')
    );
}
