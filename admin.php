<?php
    include("config.php");
    //include("proses_admin.php");
    $info='';
    if(isset($_POST['daftarcs'])){
        $nama = $_POST['nama'];
        $pass = $_POST['password'];
        $sql="SELECT * FROM customer_service WHERE nama ='$nama'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result)>0){
            $info = 'username sudah ada';
        }else{
            $sql="INSERT INTO customer_service (nama, password) VALUES ('$nama', '$pass')";
            $query = mysqli_query($db,$sql);
        } 
    }

    if(isset($_POST['daftarm'])){
        $nama = $_POST['nama'];
        $pass = $_POST['password'];

        $sql="SELECT * FROM manager WHERE nama ='$nama'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result)>0){
            $info = 'username sudah ada';
        }else{
            $sql="INSERT INTO manager (nama, password) VALUES ('$nama', '$pass')";
            $query = mysqli_query($db,$sql);
        }  
    }

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $role = $_POST['role'];
        if($role == 'cs'){
            $sql="SELECT * FROM customer_service WHERE id_cs ='$id' AND nama like '%$nama%'";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                $sql="DELETE FROM customer_service WHERE id_cs ='$id'";
                $query = mysqli_query($db,$sql);
            }else{
                $info = 'akun tidak ada';
            }  
        }
        if($role == 'm'){
            $sql="SELECT * FROM manager WHERE id ='$id' AND nama like '%$nama%'";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                $sql="DELETE FROM manager WHERE id ='$id'";
                $query = mysqli_query($db,$sql);
            }else{
                $info = 'akun tidak ada';
            }  
        }
    }

    if(isset($_POST['ubah'])){
        $id = $_POST['id'];
        $data = $_POST['data'];
        $role = $_POST['role'];
        $kolom = $_POST['kolom'];
        if($role == 'cs'){
            $sql="SELECT * FROM customer_service WHERE id_cs ='$id'";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                if($kolom=='nama'){
                    $sql= "UPDATE customer_service SET nama ='$data' WHERE id_cs ='$id'";
                    $query = mysqli_query($db,$sql);
                }
                if($kolom =='password'){
                    $sql= "UPDATE customer_service SET password ='$data' WHERE id_cs ='$id'";
                    $query = mysqli_query($db,$sql);
                }
            }else{
                $info = 'akun tidak ada';
            }  
        }
        if($role == 'm'){
            $sql="SELECT * FROM manager WHERE id ='$id'";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                if($kolom=='nama'){
                    $sql= "UPDATE manager SET nama ='$data' WHERE id ='$id'";
                    $query = mysqli_query($db,$sql);
                }
                if($kolom =='password'){
                    $sql= "UPDATE manager SET password ='$data' WHERE id ='$id'";
                    $query = mysqli_query($db,$sql);
                }
            }else{
                $info = 'akun tidak ada';
            }  
        }
    }

    if(isset($_POST["showcs"])){
        $sql="SELECT * FROM customer_service";
        $result=mysqli_query($db,$sql);
    }

    if(isset($_POST["showm"])){
        $sql="SELECT * FROM manager";
        $result=mysqli_query($db,$sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="admin.php" method="POST">
            <fieldset>
                <legend>create akun CS</legend>
                <input type="text" name="nama" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" name="daftarcs">daftar</button>
                <?php
                    if(isset($_POST['daftarcs'])){
                        echo $info;
                    }
                ?>
            </fieldset>
        </form>
        <br>
        <form action="admin.php" method="POST">
            <fieldset>
                <legend>create akun MANAGER</legend>
                <input type="text" name="nama" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" name="daftarm">daftar</button>
                <?php
                    if(isset($_POST['daftarm'])){
                        echo $info;
                    }
                ?>
            </fieldset>
        </form>
        <br>
        <form action="admin.php" method="POST">
            <fieldset>
                <legend>create akun MANAGER</legend>
                <SELECTION>
                    <label><input type="radio" name="role" value="cs">customer service</label>
                    <label><input type="radio" name="role" value="m">manager</label>
                </SELECTION>
                <input type="text" name="id" placeholder="id" required>
                <input type="text" name="nama" placeholder="username" required>
                <button type="submit" name="hapus">hapus</button>
                <?php
                    if(isset($_POST['hapus'])){
                        echo $info;
                    }
                ?>
            </fieldset>
        </form>
        <br>
        <form action="admin.php" method="POST">
            <fieldset>
                <legend>ubah data</legend>
                <SELECTION>
                    <label><input type="radio" name="role" value="cs">customer service</label>
                    <label><input type="radio" name="role" value="m">manager</label>
                </SELECTION>
                <br>
                <SELECTION>
                    <label><input type="radio" name="kolom" value="nama">ubah username</label>
                    <label><input type="radio" name="kolom" value="password">ubah password</label>
                </SELECTION>
                <input type="text" name="id" placeholder="id" required>
                <input type="text" name="data" placeholder="data baru" required>
                <button type="submit" name="ubah">ubah</button>
                <?php
                    if(isset($_POST['ubah'])){
                        echo $info;
                    }
                ?>
            </fieldset>
        </form>
        <br>
        <form action="admin.php" method="POST">
                <button type="submit" name="showcs">lihat akun CS</button>
        </form>
        <?php
            if (isset($_POST['showcs']) && $result) {
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>ID Customer Service</th><th>nama</th><th>password</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id_cs'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '</tr>';
                }
            }
        ?>
        <form action="admin.php" method="POST">
                <button type="submit" name="showm">lihat akun MANAGER</button>
        </form>
        <?php
            if (isset($_POST['showm']) && $result) {
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>ID Manager</th><th>nama</th><th>password</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '</tr>';
                }
            }
        ?>
    </main>
    
</body>
</html>