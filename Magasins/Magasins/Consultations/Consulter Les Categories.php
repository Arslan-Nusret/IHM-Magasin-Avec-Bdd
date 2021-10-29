
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connexion a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// Prepare la requete qui va tous selectionner dans la table categorie //
$recup = $bdd->prepare("SELECT * FROM  categorie");

$recup->execute(); // Execute la requete //

$nom_cat = $recup->fetchAll();?><!-- La variable nom_cat recupere le tableau de valeur que la requete a recuperer-->
<html>

<body>
    <center>
        <!-- Centre tous ce qui est contenu dens cette balise -->
        <h1> Voici Les Rayons Du Magasins </h1><!-- Ecris en gros "Voici Les Rayons Du Magasins"  -->
        <table>
            <!-- Debut tableau -->
            <tr>
                <!-- Premiere colonne -->
                <th>Nom</th>
            </tr>
            <?php foreach ($nom_cat as $nom): ?><!--  Execute une boucle n fois le nombres de colonnes dans categorie   -->

            <tr>
                <td>
                    <?php echo $nom['nom'] ?><!-- Affiche le nom de la categorie  -->
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la suppression-->
                    <a href="../Supression/Sup_Categorie.php?id=<?= $nom['id_categorie'] ?>"> Supprimer</a>
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la Modification-->
                    <a href="../Modification/Mod_Categorie.php?id=<?= $nom['id_categorie'] ?>"> Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?> <!-- Fin de la boucle -->
        </table>
    </center>
</body>
</html>

