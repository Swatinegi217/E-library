<div class="offcanvas offcanvas-start w-50vh" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block fw-bold fs-4" id="offcanvas">Reading History</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


    <div class="container">
        <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="active">
                <a class="nav-link rounded-0 rounded-start-pill border" data-toggle="tab" href="#month" role="tab"> month wise</a>
            </li>
            <li class="">
                <a class="nav-link rounded-0 rounded-end-pill border" data-toggle="tab" href="#week" role="tab">week wise</a>
            </li>
        </ul>

        <div class="tab-content clearfix">
            <!-- month wise detail tab -->
            <div class="tab-pane active" id="month">

                <?php
                include '../config/database.php';

                // get email from session
                $data = $_SESSION['users'];
                $email = $data['1'];

                $search_query = "SELECT * FROM book_readed WHERE email = '$email' ";
                $result = mysqli_query($con, $search_query);
                $count = mysqli_num_rows($result); ?>
                <h6 class="my-1 text-danger text-center text-capitalize">total book readed = <?php echo $count ?></h6>

                <?php
                include '../config/connection.php';
                for ($i = 1; $i <= 12; $i++) {
                    // get month name and year
                    $month_name = date('F', mktime(0, 0, 0, $i, 1));
                    $year = date('Y');

                    // set collapse ID and aria-labelledby attributes
                    $collapse_id = 'collapse' . $i;
                    $parent_id = 'accordionFlushExample';

                    // retrieve book data for the current month
                    include '../config/connection.php';
                    $search_query = "SELECT * FROM book_readed WHERE email = '$email' AND MONTH(readed_date) = $i";
                    $result = mysqli_query($con, $search_query); ?>

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false" aria-controls="<?php echo $collapse_id; ?>">
                                    <?php echo $month_name . ' ' . $year; ?> &nbsp;<span class="badge bg-dark"><?php echo mysqli_num_rows($result); ?></span>
                                </button>
                            </h2>
                            <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $heading_id; ?>" data-bs-parent="#<?php echo $parent_id; ?>">
                                <div class="accordion-body">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        // iterate through the rows and display the book names
                                        $a = 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <div>
                                                <small class="fw-bold"><?= $a ?>.</small>
                                                <small class="fw-bold"><?= $row['bookname'] ?></small>
                                            </div>
                                            <div>
                                                <small><?= $row['readed_date'] ?></small>
                                            </div>
                                    <?php
                                            $a++;
                                        }
                                    } else {
                                        // display a message if there are no books for this month
                                        echo "<p>No books read this month</p>";
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </ul>
            </div>



            <!-- week wise detail tab -->
            <div class="tab-pane active" id="week">

                <!-- start accordion container -->
                <div class="accordion" id="accordionExample">
                    <?php
                    include '../config/connection.php';
                    $search_query = "SELECT * FROM book_readed WHERE email = '$email' ";
                    $result = mysqli_query($con, $search_query);
                    $count = mysqli_num_rows($result); ?>
                    <h6 class="my-1 text-danger text-center text-capitalize">total book readed = <?php echo $count ?></h6>

                    <?php
                    include '../config/connection.php';
                    for ($month = 1; $month <= 12; $month++) {
                        // get month name and year
                        $month_name = date('F', mktime(0, 0, 0, $month, 1));
                        $year = date('Y');

                        // get weekly book data for the current month
                        include '../config/connection.php';
                        $search_query = "SELECT WEEK(readed_date) AS week_num, DAY(readed_date) AS day_num, DATE_FORMAT(readed_date, '%W') AS day_name, GROUP_CONCAT(bookname ORDER BY readed_date SEPARATOR ', ') AS books_read 
                         FROM book_readed WHERE email = '$email' AND MONTH(readed_date) = $month AND YEAR(readed_date) = $year GROUP BY week_num, day_num ORDER BY week_num, day_num";
                        $result = mysqli_query($con, $search_query);

                        // set collapse ID and aria-labelledby attributes
                        $collapse_id = 'collapse' . $month;
                        $parent_id = 'accordionExample';

                        // generate accordion for the current month
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $week_num ?>">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapse_id ?>" aria-expanded="false" aria-controls="<?= $collapse_id ?>">
                                    <?= $month_name ?>&nbsp;<span class="badge bg-dark"><?php echo mysqli_num_rows($result); ?></span>
                                </button>
                            </h2>
                            <div id="<?= $collapse_id ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $week_num ?>" data-bs-parent="#<?= $parent_id ?>">
                                <div class="accordion-body">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $week_num = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // display weekly book data
                                            if ($week_num != $row['week_num']) {
                                                echo '<h5>Week ' . $row['week_num'] . '</h5>';
                                                $week_num = $row['week_num'];
                                            }
                                    ?>
                                            <div>
                                                <small class="fw-bold"><?= $row['day_name'] ?>, <?= $row['day_num'] ?></small><br>
                                                <small class="fw-bold"><?= $row['books_read'] ?></small>
                                            </div>
                                            <hr>
                                    <?php
                                        }
                                    } else {
                                        echo "<p>No books read this month</p>";
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>