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

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="../assets/js/adminJs.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>
<?php require_once('navbar.php'); ?>

<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">Assignments Details</h2>
                        <a href="assignment-create.php" class="btn btn-success float-right">Add New Record</a>
                        <a href="assignment-index.php" class="btn btn-info float-right mr-2">Reset View</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Back</a>
                    </div>

                    <div class="form-row">
                        <form action="assignment-index.php" method="get">
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

                    $total_pages_sql = "SELECT COUNT(*) FROM assignment";
                    $result = mysqli_query($link, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //Column sorting on column name
                    $orderBy = array('week_id', 'name', 'description', 'due_date');
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
                    $sql = "SELECT * FROM assignment ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
                    $count_pages = "SELECT * FROM assignment";


                    if (!empty($_GET['search'])) {
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM assignment
                            WHERE CONCAT_WS (week_id,name,description,due_date)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM assignment
                            WHERE CONCAT_WS (week_id,name,description,due_date)
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
                            echo "<th><a href=?search=$search&sort=&order=week_id&sort=$sort>Week</th>";
                            echo "<th><a href=?search=$search&sort=&order=name&sort=$sort>Assignment title</th>";
                            echo "<th><a href=?search=$search&sort=&order=description&sort=$sort>Description</th>";
                            echo "<th><a href=?search=$search&sort=&order=due_date&sort=$sort>Due date</th>";

                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {

                                //get week Name from weeks table where id = week_id in admin table
                                $week_id = $row['week_id'];
                                $sql = "SELECT * FROM weeks WHERE id = $week_id";
                                $result_week = mysqli_query($link, $sql);
                                $row_week = mysqli_fetch_array($result_week);
                                $week_name = $row_week['week_name'];

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($week_name) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";

                                echo "<td> <textarea type='text' name='description' class='form-control' value= " . htmlspecialchars($row['description']) . ">" . htmlspecialchars($row['description']) . "</textarea></td>";

                                echo "<td>" . htmlspecialchars($row['due_date']) . "</td>";
                                echo "<td>";
                                echo "<a href='assignment-read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                echo "<a href='assignment-update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='far fa-edit'></i></a>";
                                echo "<a href='assignment-delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
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