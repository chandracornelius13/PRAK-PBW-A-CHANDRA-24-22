<?php
// biodata.php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'HEBAT';
    if ($ipk >= 3.00) return 'B AJA';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'npm' => '4524210022',
    'nama' => 'Chandra',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 4
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>

    <img 
        src="https://i.pinimg.com/736x/9a/41/20/9a412030b5e9d064089662fb0c3e9bf8.jpg" 
        alt="Presiden Joko Widodo"
        width="300"
    >

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>

</html>