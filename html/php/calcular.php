<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipus = $_POST["tipus"];
    $radi = floatval($_POST["radi"]);
    $altura = isset($_POST["altura"]) ? floatval($_POST["altura"]) : 0;

    define("PI", 3.1416);

    if ($tipus == "cilindre") {
        $area_lateral = 2 * PI * $radi * $altura;
        $area_total = 2 * PI * $radi * ($radi + $altura);
        $volum = PI * pow($radi, 2) * $altura;
    } elseif ($tipus == "con") {
        $generatriu = sqrt(pow($radi, 2) + pow($altura, 2));
        $area_lateral = PI * $radi * $generatriu;
        $area_total = PI * $radi * ($radi + $generatriu);
        $volum = (PI * pow($radi, 2) * $altura) / 3;
    } elseif ($tipus == "esfera") {
        $area_total = 4 * PI * pow($radi, 2);
        $volum = (4/3) * PI * pow($radi, 3);
        $area_lateral = "N/A"; // No hi ha àrea lateral en una esfera
        $altura = "N/A"; // No es requereix per a una esfera
    } else {
        echo "Error: cos no vàlid";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats del Càlcul</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h1>Resultats</h1>
    <p><strong>Tipus:</strong> <?php echo ucfirst($tipus); ?></p>
    <p><strong>Radi:</strong> <?php echo $radi; ?> cm</p>
    <?php if ($altura !== "N/A"): ?>
        <p><strong>Altura:</strong> <?php echo $altura; ?> cm</p>
    <?php endif; ?>
    <p><strong>Àrea Lateral:</strong> <?php echo is_numeric($area_lateral) ? round($area_lateral, 2) . " cm²" : $area_lateral; ?></p>
    <p><strong>Àrea Total:</strong> <?php echo round($area_total, 2); ?> cm²</p>
    <p><strong>Volum:</strong> <?php echo round($volum, 2); ?> cm³</p>

    <a href="../index.html">Tornar al formulari</a>
</body>
</html>
