<?php  
  // Connection a la bdd //
  $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
  // La varabile recup prepare la requete qui selectionne tous le contenu de la table categorie //
  $recup = $bdd->prepare("SELECT * FROM  categorie");
  //execute la requete//
  $recup->execute();


  $categories = $recup->fetchAll() ; // la variable categories va prendre le contenu du tableau que renvoi recup //

   foreach ($categories as $categorie): // Execute une boucle n fois le nombres de colonnes dans categorie  //
?>                        <!-- Affiche le nom du rayon et y attribut la valeur de l'id de la bdd -->
                         <option value="<?= $categorie['id_categorie'] ?>"><?php echo $categorie['nom']?> </option> <?php  
   endforeach; // fin de la boucle // ?> 