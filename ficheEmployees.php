<?php
include ("fonctions.php") ;
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
<body class="container mt-4"> <h3 class="mb-4 text-secondary">Fiche de l'employé : <?=$nom." ".$prenom?></h3>

    <?php $row = mysqli_fetch_assoc($employe); ?>
    
    <table class="table table-bordered table-striped" style="max-width: 500px;"> 
        <tbody>
            <tr>
                <th class="table-dark" style="width: 40%;">numéro d'employé</th>
                <td><?=$row["emp_no"]?></td>
            </tr>
            <tr>
                <th class="table-dark">date d'anniversaire</th>
                <td><?=$row["birth_date"]?></td>
            </tr>
            <tr>
                <th class="table-dark">nom</th>
                <td><?=$nom?></td>
            </tr>
            <tr>
                <th class="table-dark">prénom</th>
                <td><?=$prenom?></td>
            </tr>
            <tr>
                <th class="table-dark">genre</th>
                <td><?=$row["gender"]?></td>
            </tr>
            <tr>
                <th class="table-dark">date d'embauche</th>
                <td><?=$row["hire_date"]?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>