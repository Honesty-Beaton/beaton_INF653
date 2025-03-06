<?php
require_once('../model/database.php');
require_once('../model/assignment_db.php');
require_once('../model/course_db.php');

// Get assignment ID from the URL
$course_id = filter_input(INPUT_GET, 'courseID', FILTER_VALIDATE_INT);

if(!$course_id)
{
    echo "Invalid or missing course ID";
    exit();
}

$courseName = get_course_name($course_id);

// Get all courses
$courses = get_courses();


?>
<section>
    <h2>Update Course</h2>
    <form action="../index.php" method="post">
        <input type="hidden" name="action" value="update_course">
        <input type="hidden" name="course_id" value="<?= $course_id ?>">

        <label for="course">Course:</label>
        <select name="course_id">
            <?php foreach ($courses as $course_option) : ?>
                <option value="<?= $course_option['courseID'] ?>" <?= $course_option['courseID'] == $course_id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course_option['courseName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="courseName">Updated Course Name:</label>
        <input type="text" name="course_name" value="<?= htmlspecialchars($courseName) ?>" required>

        <button type="submit">Update</button>
    </form>
</section>
