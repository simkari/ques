<html>
<head>
    <title>Tutorial Membuat Radio Button di PHP MySQL</title>
</head>
<body>
    <!-- h3>Form Input Radio Button</h3>
        <form action="kuesioner.php" method="POST"> 
            <table border="0">
                <tr>
                    <td>1. Sejauh pemahaman Anda, seberapa mudah aplikasi ini digunakan?</td>
                </tr>
                <tr>
                    <td><input type="radio" name="jawaban" value="A"/>Sangat Baik</td>
                </tr>
                <tr>
                    <td><input type="radio" name="jawaban" value="B"/>Baik</td>
                </tr>
                <tr>
                    <td><input type="radio" name="jawaban" value="C"/>Cukup</td>
                </tr>
                <tr>
                    <td><input type="radio" name="jawaban" value="D"/>Buruk</td>
                </tr>
                <tr>
                    <td><input type="radio" name="jawaban" value="E"/>Sangat Buruk</td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="jawab" value="Jawab"/></td>
                </tr>
            </table>
        </form -->
<center>
<a href="./index-allsurvey.php">Hasil Survey</a> || <a href="./index-perques.php">Hasil Survey berdasarkan Kategori</a>
</center>

<h3>Form Input Radio Button</h3>
<?php
include "koneksi.php";
error_reporting(7);
$no = 1;
$sql = mysqli_query($conni, "SELECT * FROM catques");
while($data = mysqli_fetch_array($sql)){
$id = $data[catquesid];

$hasil = mysqli_query($conni, "SELECT * FROM catques WHERE catquesid = '$id' ORDER BY catquesid");
                                                  
  $i = 1;
  while ($r = mysqli_fetch_array($hasil)){
  		echo "
        <form action='kuesioner.php' method='POST'> 
            <table border='0'>
                <tr>
                    <td>$no. $data[categori]</td>
                </tr>
                <tr>
                    <td><input type='radio' name='jawaban$i$data[catquesid]' value='A'/>Sangat Baik</td>
                </tr>
                <tr>
                    <td><input type='radio' name='jawaban$i$data[catquesid]' value='B'/>Baik</td>
                </tr>
                <tr>
                    <td><input type='radio' name='jawaban$i$data[catquesid]' value='C'/>Cukup</td>
                </tr>
                <tr>
                    <td><input type='radio' name='jawaban$i$data[catquesid]' value='D'/>Buruk</td>
                </tr>
                <tr>
                    <td><input type='radio' name='jawaban$i$data[catquesid]' value='E'/>Sangat Buruk</td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
                <tr>
  		";
        //echo "[ini adl : jawaban$i$data[catquesid]";

        $i++;
  }
 echo "<br>";
 $no++;

 }
 ?>
 				<td><input type='submit' name='jawab' value='Jawab'/></td>
                </tr>
            </table>
        </form>

</body>
</html>