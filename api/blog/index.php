<html>
<body>

<h1>Show all blogs</h1>
<form action="read.php" method="POST">
  <input type="submit" value="All Blogs">
</form>

<h1>Show single blog</h1>
<form action="read_single.php" method="POST">
  ID: <input type="number" name="id"><br>
  <input type="submit" value="Show Blog">
</form>

<h1>Edit a blog</h1>
<form action="update.php" method="POST">
  ID: <input type="number" name="id"><br>
  Name: <input type="text" name="name"><br>
  Code: <input type="text" name="code"><br>
  Progression: <input type="text" name="progression"><br>
  Syllabus: <input type="text" name="syllabus"><br>
  <input type="submit" value="Send">
</form>

<h1>Delete a blog</h1>
<form action="delete.php" method="POST">
  ID: <input type="number" name="id"><br>
<input type="submit" value="Send">
</form>

<h1>Add a blog</h1>
<form action="create.php" method="POST">
  Name: <input type="text" name="name"><br>
  Code: <input type="text" name="code"><br>
  Progression: <input type="text" name="progression"><br>
  Syllabus: <input type="text" name="syllabus"><br>
  <input type="submit" value="Send">
</form>

</body>
</html>
