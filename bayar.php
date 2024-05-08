<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bayar</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
    <div class="box">
    <h1>Bayar Sekarang</h1>
    <form method="post">
        <label for="bayar">Masukkan nominal uang</label>
        <br>
        <span class="border border-success"><input type="number" id="bayar" name="bayar" placeholder= "Masukkan uang" required ></span>
        <button class="btn btn-outline-success" type="submit">Bayar</button>
    </form>
    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bayar = $_POST["bayar"];
        if($bayar < $_SESSION['total']){
            echo "Uang anda kurang " .'<b> Rp. ' . number_format($_SESSION['total'] - $bayar  ,0,",",".") . '</b> <br>';
        }
        else if($bayar > $_SESSION['total']){  
            echo "Uang anda lebih. Anda mendapat kembalian" .'<b> Rp. ' . number_format($bayar - $_SESSION['total'],0,",",".") . '</b> <br>' ;
        }
        else{
            echo "Uang anda pas. Terimakasih telah berbelanja <br>";
        }
        
    }
    echo "Total yang harus dibayar adalah " . '<b> Rp. ' . number_format($_SESSION['total'],0,",",".") . '</b>';
    ?>
    <br><br>
    <p>&copy; 2024 Arya Rodman Karale. All rights reserved.</p>
    </div>
</body>
</html>