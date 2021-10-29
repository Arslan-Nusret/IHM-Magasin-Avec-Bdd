
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connexion a la bdd //
            $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
            // Requete sql qui selectionne tous dans la table produit //
            $recup = $bdd->prepare("SELECT * FROM  produit");

            $recup->execute();  // Execution de la requete //

            $produits = $recup->fetchAll();  // La variable produits recupere le tableau de valeur que la requete a recuperer //
?>


<html>
<body>
    <center>
        <!-- Centre tous ce qui est contenu dens cette balise -->
        <h1>Produits Disponibles</h1><!-- Ecris en gros "Produits Disponibles"  -->
        <table>
            <!-- Debut tableau -->
            <tr>
                <!-- Premiere colonne -->
                <th>Nom</th>
                <th>Poids</th>
                <th>Quantite</th>
                <th>Rayon</th>
                <th>Prix hors taxe</th>
                <th>Remise</th>
                <th>Taux de la taxe</th>
                <th>Code-barre</th>
            </tr>
            <?php
            foreach ($produits as $produit): ?><!--  Execute une boucle n fois le nombres de colonnes dans client   -->
            <tr>
                <td>
                    <?php echo $produit['nom'] ?><!-- Affiche le nom du produit -->
                </td>
                <td>
                    <?php echo $produit['poids'].'kg'  ?><!-- Affiche le poids du produit -->
                </td>
                <td>
                    <?php echo $produit['quantite'] ?><!-- Affiche la quantite du produit -->
                </td>
                <td>
                    <!-- Appel une page qui va afficher le rayon du produit -->
                    <?php include'../Calcul pour les affichage des contenu des id\test_rayon.php'  ?>
                </td>
                <td>
                    <?php echo $produit['prix_ht'].'e' ?><!-- Affiche le prix du produit -->
                </td>
                <td>
                    <?php echo $produit['remise'].'%'  ?><!-- Affiche la remise  du produit -->
                </td>
                <td>
                    <!-- Appel une page qui va afficher le taux de tva  du produit -->
                    <?php include'../Calcul pour les affichage des contenu des id\test_tva.php' ?>
                </td>
                <td>
                    <?php echo $produit['code_barre'] ?><!-- Affiche le code barre -->
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la suppression-->
                    <a href="../Supression/Sup_Produit.php?id=<?= $produit['id'] ?>"> Supprimer</a>
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la Modification-->
                    <a href="../Modification/Mod_produit.php?id=<?= $produit['id'] ?>"> Modifier</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    </center>



</body>
</html>

