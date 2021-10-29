<?php
  // Connexion a la bdd //
  $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
  $recup = $bdd->prepare("SELECT * FROM  categorie"); // Requete sql qui va selectioner tous dans la table categorie//

  $recup->execute(); // Execution de la requete //

  $categories = $recup->fetchAll() ;  // la variable categories va prendre le contenu du tableau que renvoi recup //
  foreach ($categories as $categorie):  // Execute une boucle n fois le nombres de colonnes dans categorie  //

      if($produit[id_categorie]==$categorie[id_categorie]) // Si id categorie du produit est le meme que l'id de la table categorie alors ecrire le nom de la categorie //
      {echo $categorie['nom'];}  // Ecris le nom de la categorie //
  endforeach; // Fin de la boucle //

?>