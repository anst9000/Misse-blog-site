<?php
class Poem
{

    // database connection and table name
    private $conn;
    private $table = "poems";

    // object properties
    public $id;
    public $title;
    public $body;
    public $topic;
    public $image;
    public $author;
    public $created_at;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    public function read()
    {
        // select all query
        $query = "SELECT * FROM " . $this->table .
            " ORDER BY created_at DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table .
            ' WHERE id = ?';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Bind ID
        $stmt->bindParam(1, $this->id);
        // Execute query
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->topic = $row['topic'];
            $this->image = $row['image'];
            $this->author = $row['author'];
            $this->created_at = $row['created_at'];
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table .
            ' SET title = :title,
            body = :body,
            topic = :topic,
            image = :image,
            author = :author';

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->topic = htmlspecialchars(strip_tags($this->topic));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->author = htmlspecialchars(strip_tags($this->author));
        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':topic', $this->topic);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':author', $this->author);
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Update Post
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
            SET title = :title,
            body = :body,
            topic = :topic,
            image = :image,
            author = :author
            WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->topic = htmlspecialchars(strip_tags($this->topic));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':topic', $this->topic);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':id', $this->id);
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
