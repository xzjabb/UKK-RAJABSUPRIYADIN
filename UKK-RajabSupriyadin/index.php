<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link rel="shortcut icon" href="gambar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
            background-image: url(bg.jpg), linear-gradient(rgba(242, 239, 231, 0.1), rgba(242, 239, 231, 0.1));
            background-color: #f2efe7;
            background-blend-mode: overlay;
            color: #f2efe7;
            line-height: 1.6;
        }



        marquee {
            color: #f2efe7;

            text-shadow: 2px 2px 4px #000000;
        }

        form {
            background-color: #2973b2;
            box-shadow: 10px 5px 5px #9acbd0;
            border-radius: 10px;
            padding: 30px;
        }

        .form-control:focus {
            border-color: #5c7285;
            box-shadow: 0 0 5px rgba(92, 114, 133, 0.5);
        }

        h2 {
            color: #f2efe7;
            text-shadow: 1px 1px 2px #000;
        }

        p {
            color: #09122c;
        }

        #hitung {
            background-color: #f2efe7;
            transition: background-color 0.5s ease-out;
            color: #09122c;
        }

        #hitung:hover {
            background-color: #5c7285;
            color: #f2efe7;
        }

        #reset {
            background-color: #872341;
            transition: background-color 0.5s ease-out;
            color: #f2efe7;
        }

        #reset:hover {
            background-color: #09122c;
            color: #f2efe7;
        }

        #hitung,
        #reset {
            font-weight: bold;
        }

        #anjay {
            color: #09122c;
            text-decoration: underline;
        }

        .text-center span {
            display: inline-block;
            color: #f2efe7;
            animation: textAnimation 2s ease-in-out infinite;
        }

        #hasil {
            background-color: #f2efe7;
        }

        @keyframes textAnimation {
            0% {
                transform: scale(1);
                color: #2973b2;
            }

            50% {
                transform: scale(1.2);
                color: #872341;
            }

            100% {
                transform: scale(1);
                color: #5c7285;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <marquee behavior="up" direction="scroll">
                    <h1>Selamat Datang.. Please Welcome..</h1>
                </marquee>
                <form method="post" class="border rounded p-4 mt-3" id="forms">
                    <h2 class="text-center p-3"><u>APP</u><span>DISKON</span></h2>
                    <label class="form-label"><b>Harga Barang</b> ( Rp. )</label>
                    <input type="number" class="form-control" placeholder="Masukan harga barang.." autocomplete="off" name="harga" step="0.1">
                    <label class="form-label"><b>Diskon Barang</b> ( % )</label>
                    <input type="number" class="form-control" placeholder="Masukan diskon barang.." autocomplete="off" name="diskon" step="0.1">
                    <button type="submit" name="hitung" id="hitung" class="btn w-100 mt-3">Hitung Diskon</button>
                    <button type="reset" id="reset" class="btn btn-secondary w-100 mt-1">Reset Diskon</button>

                    <?php
                    if (isset($_POST['hitung'])) {
                        $harga = $_POST['harga'];
                        $diskon = $_POST['diskon'];

                        if ($harga < 0) {
                            echo "<script>alert('Harga tidak boleh minus!!')</script>";
                        } elseif ($diskon < 0 || $diskon > 100) {
                            echo "<script>alert('Diskon hanya boleh 0-100!!')</script>";
                        } else {
                            $nilai_diskon = $harga * ($diskon / 100);
                            $total_harga = $harga - $nilai_diskon; ?>
                            <div class="border rounded p-2 mt-4" id="hasil">
                                <p>Harga barang : <b>Rp. <?php echo number_format($harga, 2, ',', '.'); ?></b></p>
                                <p>Total Diskon <?php echo $diskon; ?>% : <b>Rp. <?php echo number_format($nilai_diskon, 2, ',', '.'); ?></b></p>
                                <p>Harga setelah Diskon : <b>Rp. <?php echo number_format($total_harga, 2, ',', '.'); ?></b></p>
                                <button id="reset" onclick="hapus()" class="btn btn-primary w-100 mt-2">Hapus Hitungan</button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <p id="anjay" class="text-center">&copy; UKK-Rekayasa Perangkat Lunak - Rajab Supriyadin_0077724225</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function hapus() {
            var huspa = document.getElementsByid("hasil")
            huspa.remove();
        }
    </script>
</body>

</html>