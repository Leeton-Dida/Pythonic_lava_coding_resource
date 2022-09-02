<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pythonic lava (admin)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 5px;
        }

        body {
            font-size: 14px;
        }
    </style>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/css/admin.css" />

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="../assets/js/adminJs.js" type="text/javascript"></script>
</head>
<?php require_once('navbar.php'); ?>

<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left"> Student content Details</h2>
                        <a href="student_content-create.php" class="btn btn-success float-right">Add New Record</a>
                        <a href="student_content-index.php" class="btn btn-info float-right mr-2">Reset View</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Back</a>
                    </div>

                    <div class="form-row">
                        <form action="student_content-index.php" method="get">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Search this table" name="search">
                            </div>
                    </div>
                    </form>
                    <br>

                    <?php
                    // Include config file
                    require_once "config.php";
                    require_once "helpers.php";

                    //Get current URL and parameters for correct pagination
                    $protocol = $_SERVER['SERVER_PROTOCOL'];
                    $domain     = $_SERVER['HTTP_HOST'];
                    $script   = $_SERVER['SCRIPT_NAME'];
                    $parameters   = $_GET ? $_SERVER['QUERY_STRING'] : "";
                    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https')
                        === FALSE ? 'http' : 'https';
                    $currenturl = $protocol . '://' . $domain . $script . '?' . $parameters;

                    //Pagination
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }

                    //$no_of_records_per_page is set on the index page. Default is 10.
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM student_content";
                    $result = mysqli_query($link, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //Column sorting on column name
                    $orderBy = array('student_id', 'content_id', 'code', 'mark');
                    $order = 'id';
                    if (isset($_GET['order']) && in_array($_GET['order'], $orderBy)) {
                        $order = $_GET['order'];
                    }

                    //Column sort order
                    $sortBy = array('asc', 'desc');
                    $sort = 'desc';
                    if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
                        if ($_GET['sort'] == 'asc') {
                            $sort = 'desc';
                        } else {
                            $sort = 'asc';
                        }
                    }

                    // Attempt select query execution
                    $sql = "SELECT * FROM student_content ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
                    $count_pages = "SELECT * FROM student_content";


                    if (!empty($_GET['search'])) {
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM student_content
                            WHERE CONCAT_WS (student_id,content_id,code,mark)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM student_content
                            WHERE CONCAT_WS (student_id,content_id,code,mark)
                            LIKE '%$search%'
                            ORDER BY $order $sort";
                    } else {
                        $search = "";
                    }

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            if ($result_count = mysqli_query($link, $count_pages)) {
                                $total_pages = ceil(mysqli_num_rows($result_count) / $no_of_records_per_page);
                            }
                            $number_of_results = mysqli_num_rows($result_count);
                            echo " " . $number_of_results . " results - Page " . $pageno . " of " . $total_pages;

                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th><a href=?search=$search&sort=&order=student_id&sort=$sort>Name</th>";
                            echo "<th><a href=?search=$search&sort=&order=content_id&sort=$sort>Lesson title</th>";
                            echo "<th><a href=?search=$search&sort=&order=code&sort=$sort>Code</th>";
                            echo "<th><a href=?search=$search&sort=&order=mark&sort=$sort>Mark</th>";

                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {

                                //get user Name from users table where id = user_id in admin table
                                $user_id = $row['student_id'];
                                $sql = "SELECT * FROM users WHERE id = $user_id";
                                $result_user = mysqli_query($link, $sql);
                                $row_user = mysqli_fetch_array($result_user);
                                $user_name = $row_user['Name'];

                                //get content Name from content table where id = content_id in admin table
                                $content_id = $row['content_id'];
                                $sql = "SELECT * FROM content WHERE id = $content_id";
                                $result_content = mysqli_query($link, $sql);
                                $row_content = mysqli_fetch_array($result_content);
                                $content_name = $row_content['lesson_title'];

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($user_name) . "</td>";
                                echo "<td>" . htmlspecialchars($content_name) . "</td>";

                                // echo "<td>" . htmlspecialchars($row['code']) . "</td>";
                                echo "<td> <textarea type='text' name='code' class='form-control' value= ". htmlspecialchars($row['code']) . ">" . htmlspecialchars($row['code']) . "</textarea></td>";

                                echo "<td>" . htmlspecialchars($row['mark']) . "</td>";
                                echo "<td>";
                                echo "<a href='student_content-read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                echo "<a href='student_content-update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='far fa-edit'></i></a>";
                                echo "<a href='student_content-delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                    ?>
                            <ul class="pagination" align-right>
                                <?php
                                $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php echo $new_url . '&pageno=1' ?>">First</a></li>
                                <li class="page-item <?php if ($pageno <= 1) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                    echo '#';
                                                                } else {
                                                                    echo $new_url . "&pageno=" . ($pageno - 1);
                                                                } ?>">Prev</a>
                                </li>
                                <li class="page-item <?php if ($pageno >= $total_pages) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                                    echo '#';
                                                                } else {
                                                                    echo $new_url . "&pageno=" . ($pageno + 1);
                                                                } ?>">Next</a>
                                </li>
                                <li class="page-item <?php if ($pageno >= $total_pages) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-item"><a class="page-link" href="<?php echo $new_url . '&pageno=' . $total_pages; ?>">Last</a>
                                </li>
                            </ul>
                    <?php
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
<footer>
    <?php require_once('../layouts/adminFooter.php'); ?>
</footer>

</html>