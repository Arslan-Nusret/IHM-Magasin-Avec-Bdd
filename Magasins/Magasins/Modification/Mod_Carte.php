
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// La variable Mod va selectionner tous dans une colonne dans la table carte la ou l'id_carte sera = a la variable id //
$Mod = $bdd->prepare("SELECT * FROM  carte WHERE id_carte=$id");

$Mod->execute();  // Execution //
$carte=$Mod->fetch(); // La variable carte va recuperer ce que renvoi la requete //
?>

<html>
<body>
    <form method="POST">
        <!-- Debut du formulaire  -->
        <!-- Formulaire des points -->
        <label for="point">Point:</label>
        <input type="text" id="point" name="nouveau" size="20" placeholder="Point" value="<?= $carte['point']?>" />
        <!-- Formulaire des code  -->
        <label for="code">Code:</label>
        <input type="text" id="code" name="nouveau1" size="20" placeholder="Code" value="<?= $carte['code']?>" />
        <!-- Bouton qui va envoyer le formulaire -->
        <input type="submit" value="Modifier" />
        <!-- Bouton qui efface tous les champs -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>

    </form>
</body>
</html>

<?php
//Si le formulaire recupere quelque chose //
if(isset($_POST['nouveau']) and isset( $_POST['nouveau1']))
{

    $nouveau_point=$_POST['nouveau']; // Variable nouveau_point = a ce que l'on va ecire dans le formulaire point //
    $nouveau_code=$_POST['nouveau1']; // Variable nouveau_code = a ce que l'on va ecire dans le formulaire code //

    // On écrit la requête sql qui effectuera l'update sur la table carte chaque nom de colonnes est assigné a sa variable //
    $sql=$bdd->prepare("UPDATE carte SET point ='$nouveau_point', code = '$nouveau_code' WHERE id_carte = $id");
    $sql->execute(); // Execution //

    echo '<h2 style="color:blue">  Modification effectuer !  </h2>';  // Ecris " Modification effectuer !"//


}
else{
    echo '<h2 style="color:red"> Aucune modification faite ! </h2>';  // Ecris "Aucune modification faite !"//
}
?>