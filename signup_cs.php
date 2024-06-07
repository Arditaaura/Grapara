<!DOCTYPE html> 
<html> 
<head> 
    <title>sign up cs</title> 
</head> 
 
<body> 
    <header> 
        <h3>SIGN UP CUSTOMER SERVICE</h3> 
    </header> 
 
    <form action="proses_signup_cs.php" method="POST"> 
 
        <fieldset> 
 
        <p> 
            <label for="nama">Nama: </label> 
            <input type="text" name="nama" placeholder="nama lengkap" /> 
        </p> 


        <p>
            <label for="no_meja" > Nomor Meja</label>
            <select name="no_meja">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</body>
        </p> 
        <p> 
            <label for="password">Password:</label>  
     <input type="password" name="password" 
 /> 
        </p> 
        <p> 
            <input type="submit" value="Daftar" name="daftar" /> 
        </p> 
 
        </fieldset> 
 
    </form> 
 
    </body> 
</html>