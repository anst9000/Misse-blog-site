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
include __DIR__ . "/../models/poem.php";

// include_once "../config/database.php";
// include_once "../models/poem.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate poem poem object
$poem = new Poem($db);

// Get raw poemed data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$poem->id = $data->id;
// $poem->id = isset($_GET['id']) ? $_GET['id'] : die();
// $poem->id = $_POST['id'];

// Delete poem
if ($poem->delete()) {
    echo json_encode(
        array(
            'message' => 'Poem Deleted',
            'value' => $poem->id,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Poem Not Deleted')
    );
}
