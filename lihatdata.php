<?php
    $host   = 'localhost';
    $user   = 'root';
    $pass   = '';
    $dbName = 'mahasiswa';

    $conn = mysqli_connect($host, $user, $pass, $dbName);

    if (!$conn) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
$query = mysqli_query($conn,"SELECT * FROM datamahasiswa");

$perintah = "SELECT * FROM mahasiswa WHERE nim like '%$nim%'"
    $hasil = mysqli_query($perintah);
    $jumlah = mysql_num_rows($hasil);
    if($jumlah >0){
    echo("Data yang ditemukan : $jumlah <br><hr>");
        while($data=mysql_fetch_row($hasil)){
        echo("Nama : $data[1] <br>");
        echo("Asal : $data[2] <br>");
        }
    }
else{
echo("Maaf, data yang dicari tidak ada");
}
?>
<form action="" method="post">
    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Fakultas</th>
            <th>Asal</th>
            <th>Moto Hidup</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ 
        
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data["nama"];?></td>
            <td><?php echo $data["nim"];?></td>
            <td><?php echo $data["jenisKel"];?></td>
            <td><?php echo $data["prodi"];?></td>
            <td><?php echo $data["fakultas"];?></td>
            <td><?php echo $data["asal"];?></td>
            <td><?php echo $data["motohidup"];?></td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</form>


<a href="form.php">Input Data Baru
