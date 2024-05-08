<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class = "box1">
  <h2>Masukan Data Barang</h2>
  <form method="post">
        <input type="text" id="barang" name="barang" placeholder= "Nama Barang" required>
        <input type="number" id="harga" name="harga" placeholder= "Harga" required>
        <input type="number" id="jumlah" name="jumlah" placeholder= "Jumlah" required >
        <br><br>

        <!-- <button type="submit">Bayar</button> -->
        <input class="btn btn-primary" type="submit" value="Tambah">
        <button type="button" class="btn btn-success"><a href="bayar.php">Bayar</a></button>
        <button type="button" class="btn btn-danger"><a href = http://localhost/kasir/session2.php>Hapus Semua</a></button>
        <hr>
  </form>
</div>
  <h2>List Barang</h2>
  <table class="table table-hover">
                    <tr>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>

  <?php
  session_start();
     if(!isset($_SESSION['dataBarang'])){
        $_SESSION['dataBarang']=array();
    }
  if(isset($_POST['barang']) && isset($_POST['harga'])
        && isset($_POST['jumlah'])){
    $data = array(
        'barang' => $_POST['barang'],
        'harga' => $_POST['harga'],
        'jumlah' => $_POST['jumlah'],
    );
    array_push($_SESSION['dataBarang'], $data);
        }
  ?>

<?php
$total = 0;
    foreach($_SESSION['dataBarang'] as $index => $value){
        echo '<tr>';
        echo '<td>' . $value['barang'] . '</td>';
        echo '<td>Rp. ' . number_format($value['harga'],0,",",".") . '</td>';
        echo '<td>' . $value['jumlah'] . '</td>';
        echo '<td>Rp. '. number_format($value['harga']*$value['jumlah'],0,",",".") . '</td>';
        echo '<td><a href="?apus='.$index.'"><button type="button" class="btn btn-danger">Hapus</button></td>';
        echo '</tr>';
        $total = $total + ($value['harga'] * $value['jumlah']);
    }
    echo '<tr>';
    echo '<td colspan = "4">Total Harga</td>';
    echo '<td>Rp. ' . number_format($total,0,",",".") . '</td>';
    echo '</tr>';
    echo '</table>';
    $_SESSION['total'] = $total;



    if(isset($_GET['apus'])) {
        $index = $_GET['apus'];
        unset($_SESSION['dataBarang'][$index]);
        header("Location: http://localhost/kasir/index.php", true, 301);
        exit;
    }
?>
<p>&copy; 2024 Arya Rodman Karale. All rights reserved.</p>
</body>
</html>