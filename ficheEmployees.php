<?php
if (isset($_GET["employe_nom"]) && isset($_GET["employe_prenom"])) {
    $nom = $_GET["employe_nom"] ;
    $prenom = $_GET["employe_prenom"] ;
    $sql = "SELECT * FROM employees WHERE first_name='$nom' AND last_name='$prenom'" ;
    $employe = mysqli_query(dbconnect(), $sql) ;
} else {
    header("location:index.php?error=0") ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FICHE EMPLOYEES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container py-5" style="max-width: 600px;">

    <?php $row = mysqli_fetch_assoc($employe); ?>

    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
        
        <div class="card-header bg-dark text-white p-4 text-center">
            <div class="text-uppercase tracking-wider small text-muted mb-1">Fiche Collaborateur</div>
            <h3 class="h4 mb-0 fw-bold"><?= htmlspecialchars($nom . " " . $prenom) ?></h3>
        </div>
        
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 px-4">
                    <span class="text-secondary fw-medium">ID Employé</span>
                    <span class="badge bg-secondary rounded-pill fs-6 fw-normal">#<?=$row["emp_no"]?></span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 px-4">
                    <span class="text-secondary fw-medium">Date de naissance</span>
                    <span class="text-dark fw-semibold"><?=$row["birth_date"]?></span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 px-4">
                    <span class="text-secondary fw-medium">Genre</span>
                    <span class="text-dark fw-semibold">
                        <?= ($row["gender"] === 'M') ? '👤 Masculin' : (($row["gender"] === 'F') ? '🎪 Féminin' : $row["gender"]) ?>
                    </span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 px-4">
                    <span class="text-secondary fw-medium">Date d'embauche</span>
                    <span class="text-dark fw-semibold"><?=$row["hire_date"]?></span>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4 px-2">
        <a href="index.php" class="btn btn-link text-secondary text-decoration-none btn-sm">← Accueil</a>
        <a href="javascript:history.back()" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Retour</a>
    </div>

</body>
</html>