<?php
include("sambungan.php"); 
if(isset($_POST["submit"])) {    
    $idpembeli = $_POST["idpembeli"];
    $password = $_POST["password"];
    $namapembeli = $_POST["namapembeli"];

    // Check if the entry already exists
    $checkQuery = "SELECT COUNT(*) FROM pembeli WHERE idpembeli = '$idpembeli'";
    $checkResult = mysqli_query($sambungan, $checkQuery);
    $count = mysqli_fetch_array($checkResult)[0];

    if ($count > 0) {
        // Entry already exists, handle the error
        echo "<script>alert('PILIH ID LAIN.ID YANG ANDA MASUKKAN TELAH WUJUD')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        // Entry doesn't exist, proceed with the insert
        $sql = "INSERT INTO pembeli (idpembeli, password, namapembeli) VALUES ('$idpembeli', '$password', '$namapembeli')";
        $result = mysqli_query($sambungan, $sql);
        
        if ($result) {
            echo "<script>alert('Berjaya signup')</script>";
        } else {
            echo "<script>alert('Tidak berjaya signup')</script>";
        }
        
        echo "<script>window.location='index.php'</script>";
    }
}
?> 


<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<body>
    <center><br>
        <img src="imej/tajuk.png">
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pembeli</td>
            <td><input required type="text" 
            name="idpembeli" placeholder="P065"  
            pattern="[A-Z0-9]{4}" 
            oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
            oninput="this.setCustomValidity('')">
            </td>
        </tr>
        <tr>
            <td>Nama Pembeli</td>
            <td><input type="text" name="namapembeli"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
    </table>
    
    <button class="tambah" type="submit" name="submit">Daftar</button>
    <button class="batal" type="button" onclick="window.location='index.php'">Batal</button>
</form>
</body>