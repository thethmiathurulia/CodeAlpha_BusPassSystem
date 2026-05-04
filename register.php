<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Pass Registration</title>
</head>
<body>
    <h2>Bus Pass Registration</h2>
    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="ඔබේ නම" required><br><br>
        <input type="email" name="email" placeholder="ඊමේල් ලිපිනය" required><br><br>
        <input type="text" name="nic" placeholder="NIC අංකය" required><br><br>
        <input type="password" name="password" placeholder="මුරපදය" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>

    <?php
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, email, nic_number, password) VALUES ('$name', '$email', '$nic', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>සාර්ථකව ලියාපදිංචි වුණා!</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>