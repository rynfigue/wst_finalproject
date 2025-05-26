<?php
$id = $_GET['id'];
$xml = simplexml_load_file("students.xml");
$student = null;

foreach ($xml->student as $s) {
    if ((string)$s->id === $id) {
        $student = $s;
        break;
    }
}

if ($student):
?>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: maroon;
        color: gold;
    }

    h2 {
        border: 5px solid black;
        padding: 15px;
        background-color: black;
        color: gold;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 300px;
        margin: 50px auto;
        background-color: gold;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    form input[type="text"],
    form input[type="file"],
    form button {
        padding: 8px;
        font-size: 14px;
        border: 2px solid black;
        border-radius: 4px;
    }

    form input[type="text"]:focus,
    form input[type="file"]:focus {
        outline: none;
        border-color: maroon;
    }

    form button {
        background-color: black;
        color: gold;
        cursor: pointer;
        transition: 0.3s ease;
    }

    form button:hover {
        background-color: gold;
        color: black;
    }

    img {
        margin: 0 auto 10px;
        display: block;
        border: 3px solid black;
        border-radius: 4px;
    }

    label {
        font-weight: bold;
        color: black;
    }
</style>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $student->id ?>">
    <input type="text" name="name" value="<?= $student->name ?>" required><br>
    <img src="<?= $student->profile_picture ?>" width="100" height="100"><br>
    <label>Change Picture:</label>
    <input type="file" name="profile_picture" accept="image/*"><br>
    <input type="text" name="course" value="<?= $student->course ?>" required><br>
    <input type="text" name="year_level" value="<?= $student->year_level ?>" required><br>
    <input type="text" name="section" value="<?= $student->section ?>" required><br>
    <input type="text" name="adviser" value="<?= $student->adviser ?>" required><br>
    <input type="text" name="school_year" value="<?= $student->school_year ?>" required><br>
    <button type="submit">Update</button>
</form>
<?php else: ?>
    <p>Student not found.</p>
<?php endif; ?>
