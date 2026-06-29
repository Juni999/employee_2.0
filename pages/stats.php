<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
    $fakana_moyenne_gen = maka_moyenne_generale();

?>
<html>
    <head>
        <title>Statistiques par emploi</title>
        <link rel="stylesheet" href="../assets/style.css">
    </head>
    <body>
    <p><div class="navbar"><a href="index.php">&larr; Retour aux départements</a></div></p>
    <h1>Statistiques par emploi</h1>

    <table border="1" class="table">
        <tr>
            <th>Emploi</th>
            <th>Hommes</th>
            <th>Femmes</th>
            <th>Total</th>
            <th>Salaire moyen</th>
            <th>Moyenne generale</th>
        </tr>
        <?php foreach ($stats as $row) { ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['nb_hommes'] ?></td>
        <td><?= $row['nb_femmes'] ?></td>
        <td><?= $row['nb_total'] ?></td>
        <td>
            <?php

    $salaire_numerique = (float) $row['salaire_moyen'];
    $salaire_formate = number_format($salaire_numerique, 0, ',', ' ') . ' €';
        if ($salaire_numerique < $fakana_moyenne_gen) {
            echo '<span style="color: green;>' . $salaire_formate . '</span>';
        } 
        else if ($salaire_numerique > $fakana_moyenne_gen) {
            echo '<span style="color: red;">' . $salaire_formate . '</span>';
        } 
        else {
            echo $salaire_formate;
        }
            ?>
        </td>
        
        <td><?= number_format($fakana_moyenne_gen, 0, ',', ' ') ?> €</td>
    </tr>
<?php } ?>
    </table>
    </body>
</html>
