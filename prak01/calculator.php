<?php
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

            case '/':
            if ($b == 0) {
                $pesan = 'kalo nol gaboleh dibagi';
            }
            else {
                $hasil = $a / $b;
            }
            break;
        default:
        $pesan = 'op tidak valid';
    }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kalkulator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>kalulator aja</h1>
    <form method="post">
        <input type="number" step="any" name="a" required>
        <select name="operator">
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
        </select> 
         <input type="number" step="any" name="b" required> <br>
         <button type="submit">Hitung</button>
    </form>
    <?php if ($pesan): ?>
        <p><?= htmlspecialchars($pesan) ?></p>
    <?php elseif ($hasil !== null): ?>
        <p>Hasil : <?= htmlspecialchars((string)$hasil) ?></p>
        <?php endif; ?>
    
</body>
</html>