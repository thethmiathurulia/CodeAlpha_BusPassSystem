<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "thethmi";
$password = "";
$dbname = "buspassdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Application Submitted Successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Bus Pass System</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; text-align: center; padding: 20px; }
        .container { width: 60%; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0px 4px 20px rgba(0,0,0,0.1); }
        h2 { color: #1a73e8; }
        input { width: 85%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 12px 25px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: 0.3s; }
        button:hover { background: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #f8f9fa; color: #333; }
        tr:hover { background-color: #f1f1f1; }
        .status-badge { background: #e8f5e9; color: #2e7d32; padding: 5px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>🚌 City Bus Pass Application Form</h2>
    <p>Apply for your digital bus pass easily via AWS Cloud</p>
    
    <form method="post" action="">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email Address" required><br>
        <button type="submit" name="submit">Apply Now</button>
    </form>

    <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">
    
    <h3>📋 Recent Applications (Live from Database)</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            if ($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>#".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td><span class='status-badge'>".$row['status']."</span></td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>