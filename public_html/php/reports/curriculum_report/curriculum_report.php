<?php
    session_start();
    require "../../../../resources/config.php";

    # create connection to database
    $mysqli = new mysqli($config['db']['amsti_01']['host']
        , $config['db']['amsti_01']['username']
        , $config['db']['amsti_01']['password']
        , $config['db']['amsti_01']['dbname']);

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">

    <head>
        <link rel="stylesheet" href="../resources/library/DataTables/Buttons/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="css/Reports.css">

        <script src="js/reports/curriculum_report.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/buttons.print.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/buttons.html5.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/pdfmake.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/vfs_fonts.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/buttons.colVis.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/jszip.min.js"></script>
        <script src="../resources/library/DataTables/Buttons/js/buttons.flash.min.js"></script>

    </head>
    <body>
        <h3>Curriculum Report</h3>
        <br><br>
<?php
    if (isset ($_SESSION['valid_email']) && ($_SESSION['valid_status']=='Admin'))
    {?>
        <table id="curriculum_report_table" class="display cell-border table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Curriculum</th>
                    <th>AMSTI</th>
                    <th>ASIM</th>
                    <th>TIM</th>
                    <th>RIC</th>
                    <th>ALSDE</th>
                    <th>LEA</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT DISTINCT(c.curriculum),
                                   SUM(c.amsti), 
                                   SUM(c.asim), 
                                   SUM(c.tim), 
                                   SUM(c.ric), 
                                   SUM(c.alsde), 
                                   SUM(c.lea) 
                            FROM curriculum_report_data c 
                            WHERE c.report_date BETWEEN '$from_date' AND '$to_date'
                            GROUP BY c.curriculum";

                    if ($result = mysqli_query($mysqli, $sql))
                    {
                        while ($row = mysqli_fetch_row($result))
                        {
                            echo
                                "<tr>"
                                ."<td>". $row[0]  ."</td>"       // Curriculum
                                ."<td>". $row[1]  ."</td>"       // AMSTI
                                ."<td>". $row[2]  ."</td>"       // ASIM
                                ."<td>". $row[3]  ."</td>"       // TIM
                                ."<td>". $row[4]  ."</td>"       // RIC
                                ."<td>". $row[5]  ."</td>"       // ALSDE
                                ."<td>". $row[6]  ."</td>"       // LEA
                                ."</tr>";
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Curriculum</th>
                    <th>AMSTI</th>
                    <th>ASIM</th>
                    <th>TIM</th>
                    <th>RIC</th>
                    <th>ALSDE</th>
                    <th>LEA</th>
                </tr>
                </tr>
            </tfoot>
        </table>
<?php
    }
    else
    {
        echo "<p><h3>You are not authorized to view this report.</h3></p>";
        echo "<p><a href='../../UserLogin.php'>User Login</a></p>";
        echo "<p><a href='../../UserLogout.php'>User Logout</a></p>";
        echo "<p><a href='../../../Home.html'>Home Page</a></p>";
    }
?>
    </body>
</html>

<?php
    mysqli_close($mysqli);
?>