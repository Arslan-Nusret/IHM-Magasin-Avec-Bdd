
<?php include '../Header.html'; ?>  <!-- inclus a cette page la page html contenant la barre de navigation -->
 

<html>
<body> 
      <form method="POST"> <!-- Debut du formulaire  -->

         <input type="text" name="nom" size="20" placeholder="Prenom" />    <!-- Entrer qui recuperera le prenom du client -->
          <select size="1" name="id"> <!-- Entrer a liste deroulante qui execute une requete visant a recuperer tous les id de carte existant -->
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', ''); // Connection a la bdd //

                // Prepare la requete recup qui contient la connexion a la bdd qui va aller chercher tous ceux que contient la table carte  //

                $recup = $bdd->prepare("SELECT * FROM  carte"); 

                $recup->execute(); // Execute la variable recup et donc la requete //

                $cartes = $recup->fetchAll(); // la variable cartes va prendre le contenu du tableau que renvoi recup //
                
                foreach($cartes as $carte): // Execute une boucle n fois le nombres de colonnes  //
                ?>         <!-- Affiche l'id de la carte et attribut la valeur de l'id_carte chosis qui sera attribuer au client -->
                          <option value="<?= $carte['id_carte'] ?>"><?php echo $carte['id_carte'] ?> </option> <?php  endforeach; //Fin de boucle//  ?>
<         </select>
        <input type="submit" value="Envoyer" /> <!-- Bouton qui va envoyer le formulaire -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button> <!-- Bouton qui efface tous les champs -->

    </form>
</body>
</html>

<?php
// Si aucun des champs n'est vides//
if(isset($_POST['nom']) and isset($_POST['id']))
{
    // On écrit la requête sql qui insere les informations du formulaire dans la table client //
    $sql = "INSERT INTO client
                          (id_carte,Nom)
      VALUES (?,?)";

    // La variable req prepare la requete ecrite dans la variable sql //
    $req=$bdd->prepare($sql);
    // Execute la requete avec comme argument un tableau avec l'id de la carte et le prenom du client //
    $req->execute(array($_POST['id'],$_POST['nom']));

    // Ecris "Nouveau client ajouter !" //
    echo '<h2 style="color:blue"> Nouveau client ajouter ! </h2>';
}
// Sinon un des champs est vide //
else
{  // Ecris "Echec de l ajout champs vide !" //
    echo '<h2 style="color:red"> Echec de l ajout champs vide ! </h2>';
}

?>