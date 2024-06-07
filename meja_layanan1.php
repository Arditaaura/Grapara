<?php
    include "config.php";

    $sql = "SELECT no_antrian FROM antrian WHERE status = 'belum_dilayani'";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("query error: " . mysqli_error($db));
}

?>

?>


<!DOCTYPE html>
<html>
<head>
    <title>Meja_1</title>
    <link rel="stylesheet" type="text" href="">
</head>
<body>
    <h2>Pilih No Antrian dan Rekam Masalah</h2>
    <form method="POST" action="meja_layanan1.php">
        <label for="antrian">Pilih No Antrian</label>
        <select id="antrian" name="antrian" required>
            <
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $no_antrian = $row['no_antrian'];
                    echo "<option value='$no_antrian'>$no_antrian</option>";
                }
            ?>
        </select><br><br>
        <label for="Masalah">Masalah:</label><br>
        <textarea id="Masalah" name="Masalah" required></textarea><br>
        <label for="solusi">Solusi:</label><br>
        <textarea id="solusi" name="solusi" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>