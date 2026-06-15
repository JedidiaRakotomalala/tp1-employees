<?php
include ("fonctions.php") ;
    if (isset($_GET["error"])) {
        echo "erreur" ;
    }

$sql = "SELECT 
    a.dept_no AS dept_no,
    a.dept_name AS departement,
    c.first_name AS nom,
    c.last_name AS prenom
FROM departments a
JOIN dept_manager b ON a.dept_no = b.dept_no
JOIN employees c ON b.emp_no = c.emp_no
WHERE b.to_date = '9999-01-01'" ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTE DE DEPARTEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4"> <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark"> <tr>
                <th>departement</th>
                <th>manager_name</th>
                <th>liste des employes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dept = mysqli_query(dbconnect(), $sql) ;
            foreach ($dept as $un_dept) { ?>
            <tr>
                <td><?php echo $un_dept["departement"] ?></td>
                <td><a href="ficheEmployees.php?employe_nom=<?=$un_dept["nom"]?>&employe_prenom=<?=$un_dept["prenom"]?>"><?php echo $un_dept["nom"]." ".$un_dept["prenom"] ?></a></td>
                <td><a href="listEmployees.php?departement=<?=$un_dept["dept_no"]?>">employes</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>