<?php
include_once("../db.php");
include_once("../town_city.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['name'],
    ];

    // Instantiate the Database and Student classes
    $database = new Database();
    $student = new Town_city($database);
    $student_id = $student->create($data);
    
    if ($student_id) {
        // Student record successfully created
        
        // Retrieve student details from the form
        $studentData = [
            'student_id' => $student_id, // Use the obtained student ID
            'name' => $_POST['name'],
            // Other student details fields
        ];

        // Create student details linked to the student
        $town_city = new Town_city($database);
            
            // if ($town_city->create($studentData)) {
            //     echo "Record inserted successfully.";
            // } else {
            //     echo "Failed to insert the record.";
            // }
    }

    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <title>Add Town City Name</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h1>Add Student Data</h1>
    <form action="" method="post" class="centered-form">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <input type="submit" value="Add Name">
    </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>
