<?php
include 'db_connect.php';
include 'db_functions.php';

$conn = connect_to_database();

$selected_student_ids = $_SESSION['selectedStudentIds'] ?? [];
$student_courses = fetch_student_courses($conn, $selected_student_ids);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Courses</title>

</head>
<body>
    <h1>Student Courses</h1>
    <table border="1">
        <tr>
            <th>Student ID</th>

            <th>Course Code</th>
            <th>Test 1</th>
            <th>Test 2</th>
            <th>Test 3</th>
            <th>Final Exam</th>
        </tr>
        <?php
        foreach ($student_courses as $student_course) {
            $student_id = $student_course['student_id'];

            $rowspan = count($student_course['courses']);
            $first_row = true;

            foreach ($student_course['courses'] as $course) {
                if ($first_row) {
                    echo "<td rowspan='{$rowspan}'>" . $student_id . "</td>";

                    $first_row = false;
                }
                echo "<td>" . $course['course_code'] . "</td>";
                echo "<td>" . $course['test_1'] . "</td>";
                echo "<td>" . $course['test_2'] . "</td>";
                echo "<td>" . $course['test_3'] . "</td>";
                echo "<td>" . $course['final_exam'] . "</td>";
                echo "</tr>";
            }
        }


        ?>
    </table>
    <br>
    <button onclick="window.location.href='students_list.php'">Back</button>
    <button onclick="window.location.href='display_final_grades.php'">Calculate Grades</button>

</body>
</html>
