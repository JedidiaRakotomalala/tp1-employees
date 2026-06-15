<?php
include ("fonctions.php") ;
if (isset($_GET["departement"])) {
    $dept_no = $_GET["departement"] ;
} else {
    header('location:index.php?error=0') ;
}
$sql = "SELECT 
    a.first_name AS nom,
    a.last_name AS prenom
FROM employees a
JOIN dept_emp b ON a.emp_no = b.emp_no
JOIN departments c ON b.dept_no = c.dept_no
WHERE c.dept_no = '$dept_no' " ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTE EMPLOYES PAR DEPARTEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container py-5" style="max-width: 800px;">

    <div class="card shadow-sm border-0 mb-4 bg-dark text-white">
        <div class="card-body p-4">
            <h1 class="h4 mb-0 text-uppercase tracking-wide text-opacity-75 fs-6 text-muted">Département</h1>
            <h2 class="h2 mb-0 fw-bold">
                <?php 
                    $departement = mysqli_query(dbconnect(), "SELECT dept_name FROM departments WHERE dept_no='$dept_no'") ;
                    $row = mysqli_fetch_assoc($departement) ;
                    echo $row["dept_name"] ;
                ?>
            </h2>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-secondary text-uppercase fs-7">
                <tr>
                    <th class="px-4 py-3" style="letter-spacing: 0.5px; font-weight: 600;">Noms & Prénoms</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $listeEmployes = mysqli_query(dbconnect(), $sql) ;
                foreach ($listeEmployes as $un_employe) { ?>
                    <tr>
                        <td class="px-4 py-3 fw-medium text-secondary">
                            <?php echo $un_employe["nom"]." ".$un_employe["prenom"] ; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="index.php" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">← Retour à la liste</a>
    </div>

</body>
</html>