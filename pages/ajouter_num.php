<?php
    include('../inc/functions.php');
    $numero_de_l_employee = $_GET['emp_no'] ?? '';
    $dept_back = $_GET['dept_no'] ?? '';
    if (isset($_GET['number_add']) && !empty($_GET['number_add'])) {
        $numero_a_ajouter = $_GET['number_add'];
        
        ajouter_numero($numero_a_ajouter, $numero_de_l_employee);
        header("Location: employees.php?dept_no=" . urlencode($dept_back));
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un numéro</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <center>
    <div class="container">
        <form action="ajouter_num.php" method="GET">
            
            <input type="hidden" name="emp_no" value="<?php echo ($numero_de_l_employee); ?>">
            <input type="hidden" name="dept_no" value="<?php echo ($dept_back); ?>">
            
            <label for="number_add">Numéro à ajouter :</label>
            <input type="text" name="number_add" id="number_add" value="Ex : 037482398" required>
            
            <button class="btn" type="submit">Ajouter</button>
        </form>
    </div>
    </center>
</body>
</html>