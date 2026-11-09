<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen Mandiri PHP</title>

</head>

<body>

<div class="container">

    <h1>Eksperimen Mandiri PHP</h1>


    <!-- EKSPERIMEN 1 -->
    <div class="card">
        <h2>1. Menghitung Nilai Rata-rata</h2>

        <form method="POST">
            <input type="number" name="nilai1" placeholder="Nilai 1" required>
            <input type="number" name="nilai2" placeholder="Nilai 2" required>
            <input type="number" name="nilai3" placeholder="Nilai 3" required>

            <button type="submit" name="hitung_rata">Hitung Rata-rata</button>
            <button type="reset">Reset</button>
        </form>

        <?php
        if (isset($_POST["hitung_rata"])) {
            $nilai1 = (float)$_POST["nilai1"];
            $nilai2 = (float)$_POST["nilai2"];
            $nilai3 = (float)$_POST["nilai3"];

            $rataRata = ($nilai1 + $nilai2 + $nilai3) / 3;

            echo "<div class='hasil'>";
            echo "Nilai rata-rata: " . number_format($rataRata, 2);
            echo "</div>";
        }
        ?>
    </div>


    <!-- EKSPERIMEN 2 -->
    <div class="card">
        <h2>2. Pencarian Nama Mahasiswa dengan GET</h2>

        <?php
        $mahasiswa = ["Alya", "Bima", "Citra", "Doni"];
        ?>

        <form method="GET">
            <input type="text" name="cari" placeholder="Masukkan nama" required>
            <button type="submit">Cari Nama</button>
            <button type="reset">Reset</button>
        </form>

        <?php
        if (isset($_GET["cari"])) {
            $cari = trim($_GET["cari"]);
            $ditemukan = false;

            foreach ($mahasiswa as $nama) {
                if (stripos($nama, $cari) !== false) {
                    echo "<p>Nama ditemukan: " . htmlspecialchars($nama) . "</p>";
                    $ditemukan = true;
                }
            }

            if (!$ditemukan) {
                echo "<p>Nama tidak ditemukan.</p>";
            }
        }
        ?>
    </div>


    <!-- EKSPERIMEN 3 -->
    <div class="card">
        <h2>3. Function Format Harga Rupiah</h2>

        <?php
        function formatRupiah($harga) {
            return "Rp" . number_format($harga, 0, ",", ".");
        }

        $harga = 150000;

        echo "<div class='hasil'>";
        echo "Harga: " . formatRupiah($harga);
        echo "</div>";
        ?>
    </div>


    <!-- EKSPERIMEN 4 -->
    <div class="card">
        <h2>4. Validasi NIM</h2>

        <form method="POST">
            <input type="text" name="nim" placeholder="Masukkan NIM" required>
            <button type="submit" name="cek_nim">Validasi NIM</button>
            <button type="reset">Reset</button>
        </form>

        <?php
        if (isset($_POST["cek_nim"])) {
            $nim = trim($_POST["nim"]);

            // Ketentuan NIM: 10 digit angka
            if (ctype_digit($nim) && strlen($nim) === 10) {
                echo "<p>NIM valid: " . htmlspecialchars($nim) . "</p>";
            } else {
                echo "<p>NIM tidak valid. NIM harus terdiri dari 10 digit angka.</p>";
            }
        }
        ?>
    </div>


    <!-- EKSPERIMEN 5 -->
    <div class="card">
        <h2>5. Tombol Reset Form</h2>

        <form method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Program Studi:</label>
            <input type="text" name="prodi" required>

            <br><br>

            <button type="submit" name="kirim">Kirim Data</button>
            <button type="reset">Reset Form</button>
        </form>

        <?php
        if (isset($_POST["kirim"])) {
            $nama = trim($_POST["nama"] ?? "");
            $prodi = trim($_POST["prodi"] ?? "");

            if ($nama === "" || $prodi === "") {
                echo "<p>Semua kolom wajib diisi.</p>";
            } else {
                echo "<div class='hasil'>";
                echo "<h3>Data Diterima</h3>";
                echo "Nama: " . htmlspecialchars($nama) . "<br>";
                echo "Program Studi: " . htmlspecialchars($prodi);
                echo "</div>";
            }
        }
        ?>
    </div>

</div>

</body>
</html>