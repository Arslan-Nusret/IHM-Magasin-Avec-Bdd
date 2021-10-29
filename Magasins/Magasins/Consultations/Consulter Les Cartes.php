
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connexion a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
$recup = $bdd->prepare("SELECT * FROM  carte");  // prepare la requete qui va tous selectionner dans la table carte //

$recup->execute(); // Execurte la requete //

$cartes = $recup->fetchAll();?><!-- La variable cartes recupere le tableau de valeur que la requete a recuperer-->
<html>

<body>
    <center>
        <h1> Les Cartes De Fidelite Existantes </h1><!-- Ecris en gros "Les Cartes De Fidelite Existantes " -->
        <table>
            <!-- Debut du tableau -->
            <tr>
                <!-- Première ligne -->
                <th>Id</th>
                <th>Code</th>
                <th>Attention Ne Supprimer Que Les Cartes Qui Ne Sont Affecter A Personne!!!</th>
            </tr>

            <?php foreach ($cartes as $carte): ?><!--  Execute une boucle n fois le nombres de colonnes dans carte   -->

            <tr>
                <td>
                    <!-- Deuxieme ligne -->
                    <?php echo $carte['id_carte'] ?><!-- Affiche l'id de la carte -->

                </td>
                <td>
                    <?php echo $carte['code']?><!-- Affiche le code de la carte  -->

                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la suppression-->
                    <a href="../Supression/Sup_Carte.php?id=<?= $carte['id_carte'] ?>"> Supprimer</a>
                </td>
                <td>
                    <!-- Mot cliquable qui pointera vers la page qui se chargera de la Modification-->
                    <a href="../Modification/Mod_Carte.php?id=<?= $carte['id_carte'] ?>"> Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?><!-- Fin de la boucle -->
        </table>
    </center>
</body>
</html>

