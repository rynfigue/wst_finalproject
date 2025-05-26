<!DOCTYPE html>
<html>
<head>
    <title>Student Information System</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .left {
            background-color: red;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .left img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: white;
            margin-bottom: 20px;
            object-fit: cover;
        }
        .left h2 {
            margin: 0;
            font-size: 20px;
        }
        .right {
            width: 50%;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            margin-bottom: 10px;
            color: #1d1d1d;
        }
        .right p {
            margin-bottom: 30px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        .show-password {
            margin-bottom: 20px;
            font-size: 14px;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
        button {
            padding: 12px 25px;
            background-color: #c62828;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a32020;
        }
        .message {
            margin-top: 20px;
            font-size: 16px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <img src="uploads/reg student icon.jpg" alt="Student Icon">
        <h2>Student Information System</h2>
    </div>
    <div class="right">
        <h2>Log In</h2>

        <form method="POST">
            <input type="text" name="student_id" placeholder="Admin ID" required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <label class="show-password">
                <input type="checkbox" onclick="togglePassword()"> Show password
            </label>

            <div class="button-container">
                <button type="submit" name="login">Log In</button>
            </div>
        </form>

        <?php
        if (isset($_POST['login'])) {
            include("config.php"); 

            $id = $_POST['student_id'];
            $pass = $_POST['password'];

            if ($id === $admin_id && $pass === $admin_pass) {
               
                session_start();
                $_SESSION['admin'] = $admin_id;
                header("Location: home.php");
                exit();
            } else {
                echo "<p class='message error'>Invalid admin credentials.</p>";
            }
        }
        ?>
    </div>
</div>

<script>
function togglePassword() {
    var x = document.getElementById("password");
    x.type = (x.type === "password") ? "text" : "password";
}
</script>

</body>
</html>
