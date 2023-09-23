<?php

class BageConcat
{
    private $number;
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function loop()
    {
        $number = $this->number;
        $countCombine = 0;
        $result = [];

        $validate = $this->validate($number);

        if (count($validate) > 0) {
            return $validate;
        }

        for ($i=1; $i <= $number; $i++) { 
            $res = [];
            if ($countCombine < 2) {
                if ($i % 3 == 0) {
                    $res[] = "Bage";
                } 
                if ($i % 5 == 0) {
                    $res[] = "Concat";
                }
            } else {
                if ($i % 5 == 0) {
                    $res[] = "Bage";
                } 
                if ($i % 3 == 0) {
                    $res[] = "Concat";
                }
            }
            
            $result[$i] = implode(' ', $res);

            if (count($res) > 1) {
                $countCombine++;
            }

            if ($countCombine == 5) {
                $result['selesai'] = '--looping selesai--';
                break;
            }
        }

        return $result;
    }

    private function validate($number)
    {
        $err = [];

        if ($number == "") {
            $err[] = 'jumlah perulangan harus diisi!';
        }

        if (!is_numeric($number)) {
            $err[] = 'jumlah perulangan harus berupa angka!';
        }

        return $err;
    }
}

$number = "";
$loops = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];

    $class = new BageConcat($number);
    $loops = $class->loop();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bage Concat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center mb-3">
        <ul class="navbar-nav">
            <span class="navbar-brand" href="#">Bage Concat</span>
        </ul>
    </nav>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="comment">jumlah perulangan :</label>
                <div class="input-group mb-3">
                    <input type="text" name="number" class="form-control" value="<?= $number ?>" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary">Mulai perulangan</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card mt-3">
            <div class="card-header">Hasil</div>
            <div class="card-body">
            <?php
                foreach ($loops as $key => $value) {
                    echo "$key . $value<br>";
                }
            ?>
            </div>
        </div>
    </div>
    
</body>
</html>
