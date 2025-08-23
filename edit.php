<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        form input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }
        form input:focus {
            border-color: #2980b9;
            box-shadow: 0 0 5px rgba(41, 128, 185, 0.4);
        }
        form button {
            width: 95%;
            padding: 12px;
            background: #2980b9;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        form button:hover {
            background: #1f6694;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
        <input type="text" name="course" value="<?php echo $student['course']; ?>" required>
        <button type="submit" name="update">✏️ Update Student</button>
    </form>
</div>
</body>
</html>
