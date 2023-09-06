
<?php include '../config/database.php'; ?>
<?php
// Assuming you have already established a database connection
include '../config/database.php';
// Fetch books from the database
$sql = "SELECT * FROM bookdetail";
$result = $conn->query($sql);

// Initialize an empty array to store the fetched books
$books = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Perform deletion query
    $deleteSql = "DELETE FROM books WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $deleteId);

    if ($deleteStmt->execute()) {
        $confirmationMessage = "Book has been deleted successfully.";
    } else {
        $confirmationMessage = "Error deleting book: " . $deleteStmt->error;
    }

    $deleteStmt->close();
}
?>

<!-- Display your book list with delete buttons -->
<?php foreach ($books as $book): ?>
    <div>
        <span><?php echo $book['title']; ?></span>
        <a href="?delete_id=<?php echo $book['id']; ?>">Delete</a>
    </div>
<?php endforeach; ?>

<!-- Display confirmation message if available -->
<?php if (isset($confirmationMessage)): ?>
    <p><?php echo $confirmationMessage; ?></p>
<?php endif; ?>
