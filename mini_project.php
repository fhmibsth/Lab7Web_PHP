
<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    // Validasi data
    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    // Jika tidak ada kesalahan
    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Mahasiswa</title>
    <sstyle>
        body {
            font-family: Arial;
            background: #f1f5f9;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 18px;
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST">

        <label>Nama Mahasiswa</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Program Studi</label>
        <input type="text" name="prodi" required>

        <label>Semester</label>
        <input type="number" name="semester"
               min="1" max="14" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit">Kirim Data</button>
        <button type="reset">Reset</button>

    </form>

    <?php if ($error): ?>

        <h3 class="error">Terjadi Kesalahan:</h3>

        <?php foreach ($error as $pesan): ?>
            <p class="error">
                <?= htmlspecialchars($pesan) ?>
            </p>
        <?php endforeach; ?>

    <?php elseif ($data): ?>

        <h3>Data Mahasiswa Berhasil Dikirim</h3>

        <p>Nama:
            <?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p>NIM:
            <?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p>Program Studi:
            <?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p>Semester:
            <?= htmlspecialchars((string)$data["semester"]) ?>
        </p>

        <p>Email:
            <?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?>
        </p>

    <?php endif; ?>

</div>

</body>
</html>
