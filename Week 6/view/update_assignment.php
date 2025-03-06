<?php
require_once('../model/database.php');
require_once('../model/assignment_db.php');
require_once('../model/course_db.php');

// Get assignment ID from the URL
$assignment_id = filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);

if (!$assignment_id) {
    $error = "Invalid assignment ID.";
    include('view/error.php');
    exit();
}

// Get all assignments
$assignments = get_assignments_by_course(null); // Get all assignments
$courses = get_courses();

// Find the specific assignment
$assignment = null;
foreach ($assignments as $a) {
    if ($a['ID'] == $assignment_id) {
        $assignment = $a;
        break;
    }
}

if (!$assignment) {
    $error = "Assignment not found.";
    include('view/error.php');
    exit();
}
?>
<section>
    <h2>Update Assignment</h2>
    <form action="../index.php" method="post"> <!-- Submit to index.php -->
        <input type="hidden" name="action" value="update_assignment"> <!-- Action for controller -->
        <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>"> <!-- Assignment ID -->

        <label for="course">Course:</label>
        <select name="course_id">
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID'] ?>" <?= $assignment['courseName'] == $course['courseName'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['courseName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="description">Description:</label>
        <input type="text" name="description" value="<?= htmlspecialchars($assignment['Description']) ?>" required>

        <button type="submit">Update</button>
    </form>
</section>

