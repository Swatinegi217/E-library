<?php 
include '../config/database.php';

// Constants for pagination
$recordsPerPage = 3; // Number of records to display per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number

// Handle sorting
$orderBy = 'bookname'; // Default sorting column
$orderDirection = 'ASC'; // Default sorting direction

if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'asc') {
        $orderDirection = 'ASC';
    } elseif ($_GET['sort'] === 'desc') {
        $orderDirection = 'DESC';
    }
}


// Calculate the offset for the SQL query
$offset = ($page - 1) * $recordsPerPage;

// Define the search query
$search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search input
$search = mysqli_real_escape_string($con, $search); // Prevent SQL injection

// Modify the SQL query to include the search filter
$sql = "SELECT * FROM bookdetail WHERE bookname LIKE '%$search%' ORDER BY $orderBy $orderDirection LIMIT $offset, $recordsPerPage";  
$result = mysqli_query($con, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tiq1k4L8YsR7L0Yq1K5y0ArlUXlGfIs/J6j16sMNKCq2Oz8eodBTtz7rzzpXvcp+wOYxlXfzpm0j4FWh9y4TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container my-5">
       
    <div class="card">
        <?php include '../helper/sort.php';?>
            <div class="row mx-auto justify-content-center">
                <?php
                if ($result->num_rows > 0) {
                    // Fetch each row as an associative array
                    while ($book = $result->fetch_assoc()) {
                        // Now you can use the $book associative array to populate the template
                ?>
                        <div class="book-container px-5 py-5 mx-5 mt-5">
                            <div class="image">
                                <img src="../uploadimg/<?= $book['uploadimgDB']; ?>" alt="Book Image">
                            </div>
                            <h5 class="book-title"><?php echo $book['bookname']; ?></h5>
                            <div class="des">
                                <h5 class="text-truncate author-name"><?php echo $book['authorname']; ?></h5>
                                <a class="btn text-dark mt-auto align-self-end fw-bold px-1 py-0 text-decoration-none" type="button" style="background-color: wheat;" href="../pages/readmore.php?id=<?= $book['id']; ?>">detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No books found";
                } ?>
            </div>
        </div>
    </div>

         
        
        <!-- Pagination links -->
        <?php
$totalRecords = mysqli_num_rows(mysqli_query($con, "SELECT * FROM bookdetail"));
$totalPages = ceil($totalRecords / $recordsPerPage);

echo '<ul class="pagination justify-content-center">';

// Create the "Previous" button
if ($page > 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
}

for ($i = 1; $i <= $totalPages; $i++) {
    $active = ($i == $page) ? 'active' : '';
    echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
}

// Create the "Next" button
if ($page < $totalPages) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
}

echo '</ul>';
?>

</body>
</html>