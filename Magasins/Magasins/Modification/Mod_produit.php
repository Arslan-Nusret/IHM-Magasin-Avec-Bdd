
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// La variable Mod va selectionner tous dans une colonne dans la table produit la ou l'id sera = a la variable id //
$Mod = $bdd->prepare("SELECT * FROM  produit WHERE id=$id");
// Execution//
$Mod->execute();
// La variable prduit va recuperer ce que renvoi la requete //
$produit=$Mod->fetch();
?>

<html>
<body>
    <form method="POST">
        <!-- Debut du formulaire  -->
        <p>
            <label for="categorie"> Rayon:</label>
            <!-- Entrer a liste deroulante qui va afficher tous les rayons disponible en  faisant appel a une page -->
            <select size="1" id="categorie" name="nouveau">
                <!-- Appel la page Rayon.php -->
                <?php include'../Affichage tva et rayon/Rayon.php'?>
         </select>
        </p>
        <p>
            <!-- Plusieurs formulaire appartenant a toutes les colonnes de la table produit -->
            <label for="produit">Nom:</label>
            <input type="text" id="produit" name="nouveau1" placeholder="Produit" value="<?= $produit['nom']?>" />
        </p>
        <p>
            <label for="codebarre">Code Barre:</label>
            <input type="text" id="codebarre" name="nouveau2" placeholder="Code Barre" value="<?= $produit['code_barre']?>" />
        </p>
        <p>
            <label for="Poids">Poids:</label>
            <input type="text" id="Poids" name="nouveau3" placeholder="Poids" value="<?= $produit['poids']?>" />
        </p>
        <p>
            <label for="quantite">Quantite:</label>
            <input type="text" id="quantite" name="nouveau4" placeholder="Quantite" value="<?= $produit['quantite']?>" />
        </p>
        <p>
            <label for="prix">Prix:</label>
            <input type="text" id="prix" name="nouveau5" placeholder="Prix ht en e" value="<?= $produit['prix_ht']?>" />
        </p>
        <p>
            <label for="remise">Remise:</label>
            <input type="text" id="remise" name="nouveau6" placeholder="Remise en %" value="<?= $produit['remise']?>" />
        </p>
        <p>
            <label for="tva">TVA:</label>
            <!-- Entrer a liste deroulante qui va afficher toutes les tva possible en  faisant appel a une page -->
            <select size="1" id="tva" name="nouveau7">
                <!-- Appel la page Tva.php -->
                <?php include'../Affichage tva et rayon/Tva.php'?>
            </select>
        </p>



        <!-- Bouton qui va envoyer le formulaire -->
        <input type="submit" value="Modifier" />
        <!-- Bouton qui efface tous les champs -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>

    </form><!-- Fin de formulaire -->
</body>
</html>

<?php
  //Si le formulaire recupere quelque chose //
  if(isset($_POST['nouveau']) and isset( $_POST['nouveau1']) and isset( $_POST['nouveau2']) and isset( $_POST['nouveau3']) and isset( $_POST['nouveau4']) and isset( $_POST['nouveau5']) and isset( $_POST['nouveau6']) and isset( $_POST['nouveau7']))
  {
    $nouveau_rayon=$_POST['nouveau'];   // La variable nouveau rayon est egal au formulaire portant le nom nouveau //
    $nouveau_nom=$_POST['nouveau1'];    // C'est la même chose mais pour le reste de la table chaque nouveau correspond a un des formulaire //
    $nouveau_code=$_POST['nouveau2'];
    $nouveau_poids=$_POST['nouveau3'];
    $nouveau_quantite=$_POST['nouveau4'];
    $nouveau_prix=$_POST['nouveau5'];
    $nouveau_remise=$_POST['nouveau6'];
    $nouveau_taux=$_POST['nouveau7'];

    // On écrit la requête sql qui effectuera l'update sur la table produit chaque nom de colonnes est assigné a sa variable //
    $modifier=$bdd->prepare("UPDATE produit SET id_categorie ='$nouveau_rayon', code_barre = '$nouveau_code', nom = '$nouveau_nom',
                                          poids = '$nouveau_poids',     quantite = '$nouveau_quantite', prix_ht = '$nouveau_prix',
                                          remise = '$nouveau_remise', id_taux = '$nouveau_taux'        WHERE id = $id");
    $modifier->execute(); // Execution //

    echo '<h2 style="color:blue">  Modification effectuer !  </h2>'; // Ecris " Modification effectuer !"//


  }
  else
  {
      echo '<h2 style="color:red"> Aucune modification faite ! </h2>';  // Ecris "Aucune modification faite !"//
  }

?>