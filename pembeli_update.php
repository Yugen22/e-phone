<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("penjual_menu.php");

	if (isset($_POST["submit"])) {
        $idpembeli = $_POST["idpembeli"];
		$password = $_POST["password"];
		$namapembeli = $_POST["namapembeli"];

		$sql = "update pembeli 
                set password = '$password', namapembeli = '$namapembeli' 
                where idpembeli = '$idpembeli'";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<br><center>Berjaya kemaskini</center>";
		else
			echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
	}

    if (isset($_GET["idpembeli"]))
		$idpembeli = $_GET["idpembeli"];

	$sql = "select * from pembeli where idpembeli = '$idpembeli' ";
	$result = mysqli_query($sambungan, $sql);
	while($pembeli = mysqli_fetch_array($result)) {
		$namapembeli = $pembeli["namapembeli"];
		$password = $pembeli["password"];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PEMBELI</h3>
<form class="panjang" action="pembeli_update.php" method="post">
    <table>
        <tr>
            <td>ID Pembeli</td>
            <td><input type="text" name="idpembeli" value="<?php echo $idpembeli; ?>"></td>
        </tr>
        <tr>
            <td>Nama Pembeli</td>
            <td><input type="text" name="namapembeli" value="<?php echo $namapembeli; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>