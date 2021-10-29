
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// La variable Mod va selectionner tous dans une colonne dans la table tva dans la ligne ou l'id sera = a la variable id //
$Mod = $bdd->prepare("SELECT * FROM  tva WHERE id=$id");



$Mod->execute(); // Execution //
$taux=$Mod->fetch();  // La variable carte va recuperer ce que renvoi la requete //
?>

<html>
<body>
    <!-- Debut du formulaire  -->
    <form method="POST">
        <!-- Formulaire de la tva -->
        <label for="tva">Taux:</label>
        <input type="text" id="tva" name="nouveau" size="20" placeholder="nom" value="<?=  $taux['taux']?>" />
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
    $nouveau_taux=$_POST['nouveau']; // Variable nouveau_taux = a ce que l'on va ecire dans le formulaire du taux //

    // On écrit la requête sql qui effectuera l'update sur la table tva la ou l'id sera = a l'id passer en argument //
    $sql=$bdd->prepare("UPDATE tva SET taux = $nouveau_taux WHERE id = $id");
    // Execution //
    $sql->execute();

    echo '<h2 style="color:blue">  La tva a bien etait modifier !  </h2>'; // Ecris " Modification effectuer !"//
}
else{
    echo '<h2 style="color:red"> Aucune modification faite ! </h2>'; // Ecris "Aucune modification faite !"//

}

?>