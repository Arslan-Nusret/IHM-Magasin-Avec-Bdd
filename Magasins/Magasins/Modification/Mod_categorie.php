
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connexion a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id va etre egal a l'id qu'on passe en argument //
$id=$_GET['id'];
// Requete qui selectionera tous dans la colonne dans la table categorie la ou id_categorie sera = a l'id passer en argument //
$Mod = $bdd->prepare("SELECT * FROM  categorie WHERE id_categorie=$id");

$Mod->execute(); // Execute la requete //
$nom=$Mod->fetch(); // La variable nom va recuperer ce que renvoi la requete //
?>

<html>
<body>
    <!-- Debut du formulaire  -->
    <form method="POST">
        <!-- Formulaire du nom -->
        <input type="text" name="nouveau" size="20" placeholder="nom" value="<?=  $nom['nom']?>" />
        <!-- Bouton qui va envoyer le formulaire -->
        <input type="submit" value="Modifier" />
        <!-- Bouton qui efface tous les champs -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>

    </form>
</body>
</html>

<?php

if(isset($_POST['nouveau']))
{
    $nouveau_nom=$_POST['nouveau']; // stock le resultat du formulaire dans la variable nouveau_nom //

    // on écrit la requête sql, modifi dans la table categorie le nom par la variable nouveau_nom la ou l'id_categorie est egal a celui en argument //
    $sql=$bdd->prepare("UPDATE categorie SET nom = '$nouveau_nom' WHERE id_categorie = $id;"); //
    $sql->execute();    // Execution //                                                            //note a moi les '' sont important car c'est un mot//

    echo '<h2 style="color:blue">  Modification effectuer !  </h2>'; // Ecris " Modification effectuer !"//
}
else
{
    echo '<h2 style="color:red"> Aucune modification faite ! </h2>';  // Ecris "Aucune modification faite !"//

}

?>