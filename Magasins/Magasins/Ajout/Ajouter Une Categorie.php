
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<html>
<body>
    <form method="POST" >  <!-- Debut du formulaire  -->

        <!-- Entrer qui recuperera le nom de la categorie -->
        <label for="categorie">Categorie: </label>  <input type="text" id="categorie" name="nom" size="20" placeholder="Nom" /> 
         <input type="submit" value="Envoyer" />  <!-- Bouton qui va envoyer le formulaire -->
         <button type="reset"   value="BouttonReset"    name="ResetChamps">   Vider les champs</button>  <!-- Bouton qui efface tous les champs -->
       
    </form>
</body>
</html>

<?php
  // Si le champs nom n'est pas vide //
  if(isset($_POST['nom']))
  {
    // La variable nom prend le resultat du formulaire //
    $nom=$_POST['nom'];
    // Connexion à la base de données //
    $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');


    // On écrit la requête qui va ajouter le nom le categorie //
    $sql = "INSERT INTO categorie
                         (nom)
     VALUES (?)";

    // La variable req prepare la requete ecrite dans la variable sql //
    $req=$bdd->prepare($sql);
    // Execute la requete avec comme argument la variable nom //
    $req->execute([$nom]);

    // Ecris "Votre nouveau rayon a etait ajouter !" //
    echo '<h2 style="color:blue">  Votre nouveau rayon a etait ajouter !</h2>';
  }
  // Sinon Le champs est vide //
  else
  {  // Ecris "Champs vide !" //
     echo '<h2 style="color:red">  Champs vide ! </h2>';
  }
?>