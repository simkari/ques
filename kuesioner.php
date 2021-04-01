<?php
    include "koneksi.php";

$no_hitung = 1;
$sql_hitung = mysqli_query($conni, "SELECT * FROM catques");
while($data_hitung = mysqli_fetch_array($sql_hitung)){
    $id_hitung = $data_hitung[catquesid];     
    $hasil_hitung = mysqli_query($conni, "SELECT * FROM catques WHERE catquesid = '$id_hitung' ORDER BY catquesid");
    $i_hitung = 1;
    while ($r_hitung = mysqli_fetch_array($hasil_hitung)){
        $id_hitung = $data_hitung[catquesid];
        $jawaban_hitung = $_POST['jawaban'.$i_hitung.$id_hitung];
        if (empty($jawaban_hitung)){
            echo "<script lang=javascript>
                window.alert('Anda belum mengisi kuisioner atau ada kuisioner yang belum terisi..!');
                history.back();
                </script>";
            exit;
        }
        
        $i_hitung++;
    }
    echo "<br>";
    $no_hitung++;
}

$no = 1;
    $sql = mysqli_query($conni, "SELECT * FROM catques");
    //mysqli_query($conni, "INSERT INTO tcompany(companyId,companyName,companyAddress,companyPhoneHP,dateSurvey,suggestion,product)
    //VALUES('$companyId','$companyName','$companyAddress','$companyPF','$date','$suggestion','$companyProduct')");
    while($data = mysqli_fetch_array($sql)){
        $id = $data[catquesid];       
        $hasil = mysqli_query($conni, "SELECT * FROM catques WHERE catquesid = '$id' ORDER BY catquesid");
        $i = 1;
        while ($r = mysqli_fetch_array($hasil)){
            $id = $data[catquesid];
            $jawaban = $_POST['jawaban'.$i.$id];
            // echo "$i $asfa<br>";
            if ($jawaban == 'A'){
                mysqli_query($conni, "INSERT INTO ques (catquesid, jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) 
                VALUES('$r[catquesid]','$jawaban','1','0','0','0','0')");
            }   
            elseif($jawaban == 'B'){
                mysqli_query($conni, "INSERT INTO ques (catquesid, jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) 
                VALUES('$r[catquesid]','$jawaban','0','1','0','0','0')");
            }
            elseif($jawaban == 'C'){
                mysqli_query($conni, "INSERT INTO ques (catquesid, jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) 
                VALUES('$r[catquesid]','$jawaban','0','0','1','0','0')");
            }
            elseif($jawaban == 'D'){
                mysqli_query($conni, "INSERT INTO ques (catquesid, jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) 
                VALUES('$r[catquesid]','$jawaban','0','0','0','1','0')");
            }
            else{
                mysqli_query($conni, "INSERT INTO ques (catquesid, jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) 
                VALUES('$r[catquesid]','$jawaban','0','0','0','0','1')");
            }
            $i++;
        }
        echo "<br>";
        $no++;
    }
    
    echo "<center><font face='Tahoma' size='2'>
            Pelanggan yang terhormat,<br><br>
            Terima kasih atas waktu yang telah diluangkan untuk melengkapi survey yang kami sediakan. <br>
            Pendapat Anda sangat berarti bagi kami untuk meningkatkan pelayanan. <br><br>
            Hormat kami, <br><br>
            Management<br>
            wkkwkkw </font><br>
            <a href='./test.php'>
            <button  class='btn btn-lg btn-info'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
            </a>
            </center>";
    
//}


/*

    if ($_POST['jawab'] == "Jawab") {
    $jawaban    =$_POST['jawaban'];

    if ($jawaban = "A") {
        $insert =mysqli_query($conni, "INSERT INTO ques (jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) VALUES ('$jawaban','1','0','0','0','0')");
    }
    elseif ($jawaban == "B") {
        $insert =mysqli_query($conni, "INSERT INTO ques (jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) VALUES ('$jawaban','0','1','0','0','0')");
    }
    elseif ($jawaban == "C") {
        $insert =mysqli_query($conni, "INSERT INTO ques (jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) VALUES ('$jawaban','0','0','1','0','0')");
    }
    elseif ($jawaban == "D") {
        $insert =mysqli_query($conni, "INSERT INTO ques (jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) VALUES ('$jawaban','0','0','0','1','0')");
    }
    else ($jawaban == "E") {
        $insert =mysqli_query($conni, "INSERT INTO ques (jawaban,jawabA, jawabB, jawabC, jawabD, jawabE) VALUES ('$jawaban','0','0','0','0','1')");
    }
    //$insert =mysqli_query($conni, "INSERT INTO ques (jawaban) VALUES ('$jawaban')");
        if($insert){
            ?>
            <script language="JavaScript">
                alert('Jawaban berhasil dikirim!');
                document.location='./';
            </script>
        <?php
        }
        else {
            echo "<b>Oops!</b> 404 Error Server.";
        }
    } */
?>