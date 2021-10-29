<?php

  // Connexion a la bdd //
  $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
  $recup = $bdd->prepare("SELECT * FROM  tva");  // Requete sql qui va selectioner tous dans la table tva //

  $recup->execute(); // Execution de la requete //

  $tva = $recup->fetchAll() ;  // la variable tva va prendre le contenu du tableau que renvoi recup //
  foreach ($tva as $taux): // Execute une boucle n fois le nombres de colonnes dans tva  //
      if($produit[id_taux]==$taux[id]) // Si le id taux du produit correspond au id dans ta la table taux   //
    {echo $taux[taux].'%';}  // Affiche le taux //

  endforeach; // Fin de la boucle //

?>