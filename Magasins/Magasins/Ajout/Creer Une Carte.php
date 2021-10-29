
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<html>
<body> 
    <form method="POST"> <!-- Debut du formulaire  -->
        <input type="text" name="code" size="20" placeholder="Code De La Carte" />  <!-- Entrer qui recupera les code sur la carte -->
        <input type="text" name="point" size="20" placeholder="Point Sur La Carte" />  <!-- Entrer qui recuperera les points sur la carte -->
        <input type="submit" value="Envoyer" />  <!-- Bouton qui va envoyer le formulaire -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>  <!-- Bouton qui efface tous les champs -->

    </form>
</body>
</html>

<?php
  // Si aucun des champs n'est vide //
  if(isset($_POST['code']) and isset($_POST['point']))
  {

    // connexion à la base //
    $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');


    // on écrit la requête sql qui va inserer les points et le code de la carte //
    $sql = "INSERT INTO carte
                          (code,point)
      VALUES (?,?)";

    // La variable req prepare la requete ecrite dans la variable sql //
    $req=$bdd->prepare($sql);

    // Execute la requete avec comme argument un tableau avec le code de la carte et les points dessus //
    $req->execute(array($_POST['code'],$_POST['point']));

    // Ecris "Nouvelle carte creer !" //
    echo '<h2 style="color:blue">  Nouvelle carte creer ! </h2>';
  }
// Sinon Le champs est vide //
  else
  { // Ecris "Champs vide !" //
    echo '<h2 style="color:red">  Champs vide ! </h2>';
  }
?>