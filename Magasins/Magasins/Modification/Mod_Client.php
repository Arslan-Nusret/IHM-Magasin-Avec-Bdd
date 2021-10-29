
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
  // Connection a la bdd //
  $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
  // La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
  $id=$_GET['id'];
  // La variable Mod va selectionner tous dans une colonne dans la table carte la ou l'id_carte sera = a la variable id //
  $Mod = $bdd->prepare("SELECT * FROM  client WHERE id_carte=$id");

  $Mod->execute(); // Execution //
  $client=$Mod->fetch(); // La variable client va recuperer ce que renvoi la requete //
?>

<html>
<body>
    <form method="POST">
        <!-- Debut du formulaire  -->
        <label for="Prenom">Prenom:</label>
        <!-- Formulaire du prenom  -->
        <input type="text" id="Prenom" name="nouveau" size="20" placeholder="Point" value="<?= $client['Nom']?>" />
        <input type="submit" value="Modifier" />  <!-- Bouton qui va envoyer le formulaire -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>

    </form>
</body>
</html>

<?php
  //Si le formulaire recupere quelque chose //
  if(isset($_POST['nouveau']))
  {
      $nouveau_prenom=$_POST['nouveau'];  // stock le resultat du formulaire dans la variable nouveau_prenom //

    // On écrit la requête sql qui effectuera l'update sur la table client la ou l'id_carte est egal a l'id passer en argument //
    $sql=$bdd->prepare("UPDATE client SET Nom ='$nouveau_prenom' WHERE id_carte = $id");
    $sql->execute(); // Execution //
    echo '<h2 style="color:blue">  Modification effectuer !  </h2>';  // Ecris " Modification effectuer !"//
  }
  else
  {
      echo '<h2 style="color:red"> Aucune modification faite ! </h2>';   // Ecris "Aucune modification faite !"//

  }

?>