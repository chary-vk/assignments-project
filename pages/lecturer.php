<?php session_start(); ?>

<?php
require '../components/header.php';


?>



<div class="container">

    <div class="text-center">
        <h3 class="text-center">Hello ! <?php echo $_SESSION["username"]; ?></h3>
        <p>following students are submitted their assignments.</p>
    </div>


    <?php
    require '../functions/lecturer.php';
    $lecturer_id = $_SESSION["userid"];
    $data = GetStudentAssignments($lecturer_id);

    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Id</th>
                <th>Assignment</th>
                <th>Submission Date</th>
                <th>Subject Name</th>
            </tr>
        </thead>
        <tr>
            <?php
            $i = 1;
            foreach ($data as $row) {
            ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["studentid"]; ?></td>
            <td><?php echo '<a target="_blank" href=' . $row["assignmenturl"] . '>link</a>'; ?></td>
            <td><?php echo $row["notes"]; ?></td>
            <td><?php echo $row["subjectname"]; ?></td>
        </tr>
    <?php
                $i++;
            }

    ?>
    </tr>
    </table>







</div>


<?php include '../components/footer.php'; ?>