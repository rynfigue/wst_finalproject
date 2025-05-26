<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: maroon;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        h2, h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .student-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .student-card {
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 6px;
            background-color: gold;
        }

        .student-card img {
            width: 90px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .student-card div {
            margin: 4px 0;
            font-size: 14px;
        }

        .student-card strong {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .student-card .actions {
            margin-top: 10px;
        }

        .student-card .actions a {
   	 margin: 0 5px;
   	 text-decoration: none;
    	 color: gold;
	 background-color: black;
   	 border: 5px solid black;
   	 padding: 4px 8px;
   	 border-radius: 4px;
    	font-size: 13px;
}


        .student-card .actions a:hover {
            text-decoration: underline;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 300px;
        }

        form input,
        form button {
            padding: 8px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .student-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .student-grid {
                grid-template-columns: 1fr;
            }
        }
	h2{
	border: 5px solid black;
	padding: 15px;
	background-color: black;
	color: gold;
}
    </style>
</head>
<body>
    <div class="container">

        <h2>Student List</h2>

        <div class="student-grid">
            <?php
            $xml = simplexml_load_file("students.xml") or die("Failed to load XML.");
            foreach ($xml->student as $student) {
                echo "<div class='student-card'>";
                echo "<img src='{$student->profile_picture}' alt='Profile'>";
                echo "<strong>Name: {$student->name}</strong>";
                echo "<div>Course: {$student->course}</div>";
                echo "<div>Year Level/Section: {$student->year_level}{$student->section}</div>";
                echo "<div>Adviser: {$student->adviser}</div>";
                echo "<div>School Year: {$student->school_year}</div>";
                echo "<div class='actions'>";
                echo "<a href='edit.php?id={$student->id}'>Edit</a>";
                echo "<a href='delete.php?id={$student->id}'>Delete</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <h2>Add Student</h2>
        <form action="create.php" method="POST" enctype="multipart/form-data">
	    <h3>Picture</h3>
	    <input type="file" name="profile_picture" accept="image/*" required>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="course" placeholder="Course" required>
            <input type="text" name="year_level" placeholder="Year Level" required>
            <input type="text" name="section" placeholder="Section" required>
            <input type="text" name="adviser" placeholder="Adviser" required>
            <input type="text" name="school_year" placeholder="School Year" required>
            <button type="submit">Add Student</button>
        </form>
    </div>
</body>
</html>
