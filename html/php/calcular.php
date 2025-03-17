<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipus = $_POST["tipus"];
    $radi = floatval($_POST["radi"]);
    $altura = floatval($_POST["altura"]);
    
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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Resultats</h1>
    <p><strong>Tipus:</strong> <?php echo ucfirst($tipus); ?></p>
    <p><strong>Radi:</strong> <?php echo $radi; ?> cm</p>
    <p><strong>Altura:</strong> <?php echo $altura; ?> cm</p>
    <p><strong>Àrea Lateral:</strong> <?php echo round($area_lateral, 2); ?> cm²</p>
    <p><strong>Àrea Total:</strong> <?php echo round($area_total, 2); ?> cm²</p>
    <p><strong>Volum:</strong> <?php echo round($volum, 2); ?> cm³</p>

    <a href="../index.html">Tornar al formulari</a>
    <a href="../style.css">Tornar al formulari</a>

</body>
</html>
