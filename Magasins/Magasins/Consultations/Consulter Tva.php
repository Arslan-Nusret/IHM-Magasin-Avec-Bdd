
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connexion a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// Prepare la requete qui va tous selectionner dans la table tva //
$recup = $bdd->prepare("SELECT * FROM  tva");

$recup->execute(); // Execute //

$taux = $recup->fetchAll(); // La variable taux recupere le tableau de valeur que la requete a recuperer //

?>

<html>

<body>
    <!-- Centre tous ce qui est contenu dens cette balise -->
    <center>
        <!-- Ecris en gros "Voici Les Tva Qui Peuvent S'appliquer Dans Le Magasins"  -->
       <h1> Voici Les Tva Qui Peuvent S'appliquer Dans Le Magasins </h1> 
        <!-- Debut tableau -->
        <table>
            <!-- Premiere colonne -->
            <tr>
                <th>Code TVA</th>
            </tr>
            <?php foreach ($taux as $tva): ?> <!--  Execute une boucle n fois le nombres de colonnes dans taux   -->

            <tr>
                <td>
                    <?php echo $tva['taux'].'%' ?>  <!-- Affiche le taux de tva -->
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la Modification-->
                    <a href="../Modification/Mod_Tva.php?id=<?= $tva['id'] ?>"> Modifier</a>
                </td>
            </tr>

            <?php endforeach; ?> <!-- Fin de la boucle -->
        </table>
    </center>
</body>
</html>

