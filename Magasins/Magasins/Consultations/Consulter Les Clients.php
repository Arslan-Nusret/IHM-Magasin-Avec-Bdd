
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connexion a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// Prepare la requete qui va tous selectionner dans la table client //
$recup = $bdd->prepare("SELECT * FROM  client");

$recup->execute();  // Execute la requete //

$clients = $recup->fetchAll();?><!-- La variable clients recupere le tableau de valeur que la requete a recuperer-->



<html>

<body> 
    <!-- Centre tous ce qui est contenu dens cette balise -->
    <center>
        <h1> Client Ayant La Carte Fidelite</h1><!-- Ecris en gros "Client Ayant La Carte Fidelite"  -->
        <table>
            <!-- Debut tableau -->
            <tr>
                <!-- Premiere colonne -->
                <th>Nom</th>
                <th>Points</th>
                <th>Code</th>
            </tr>
            <?php foreach ($clients as $client): ?><!--  Execute une boucle n fois le nombres de colonnes dans client   -->

            <tr>
                <td>
                    <?php echo $client['Nom'] ?><!-- Affiche le nom du client -->
                </td>
                <td>
                    <!-- Appele une page qui va afficher les points du client en question-->
                    <?php include'../Calcul pour les affichage des contenu des id\test_points.php' ?>
                </td>
                <td>
                    <!-- Appele une page qui va afficher le code de la carte du client en question-->
                    <?php include'../Calcul pour les affichage des contenu des id\test_code.php'?>
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la suppression-->
                    <a href="../Supression/Sup_Client.php?id=<?=$client['id_carte'] ?>"> Supprimer</a>
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la Modification-->
                    <a href="../Modification/Mod_Client.php?id=<?= $client['id_carte'] ?>"> Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?><!-- Fin de la boucle -->
        </table>
    </center>
</body>
</html>

