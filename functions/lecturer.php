<?php


function GetStudentAssignments($lecturerId)
{
    require 'db.php';
    //get students assigned to this lecturer
    $query = "select * from assignments JOIN subjects ON assignments.subjectid=subjects.id WHERE subjectid IN (SELECT id from subjects WHERE lecturerid=" . $lecturerId . ")";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    } else {
        return false;
    }
}
