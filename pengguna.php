<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$role = $_POST['role'];
$password = $_POST['password'];
$sql = "SELECT * FROM pengguna WHERE role = '$role' AND password = '$password'";
$query = mysqli_query($db, $sql);

    if (mysqli_num_rows($query) == 1)
    {
        $pengguna = mysqli_fetch_assoc($query);

        $_SESSION['role'] = $pengguna['role'];
        $_SESSION['id_pengguna'] = $pengguna['id_pengguna'];

        if ($pengguna['role'] == 'Admin')
        {
            header("Location: admin.php");
        }
        else if ($pengguna['role'] == 'manajer')
        {
            header("Location: admin.php");
        }
        exit;
    }
    else
    {
        echo "password yang anda masukkan salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <header>
        <div class="container">
            <img src ="layout/logophp.png" alt="GraPARI Logo" class="logo" style="width: 100px">
            <h1>Grapara Customer Service</h1>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2>Login</h2>
            <form method="POST" action="">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="Admin">Admin</option>
                    <option value="Manajer">Manajer</option>
                </select>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="masukkan password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Grapara. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
