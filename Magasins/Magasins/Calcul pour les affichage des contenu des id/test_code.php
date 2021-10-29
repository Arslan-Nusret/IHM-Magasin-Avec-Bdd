<?php
  // Connexion a la bdd //
  $bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
  $recup = $bdd->prepare("SELECT * FROM  carte"); // Requete sql qui va selectioner tous dans la table carte//

  $recup->execute(); // Execution de la requete //

  $cartes = $recup->fetchAll(); // la variable cartes va prendre le contenu du tableau que renvoi recup //

  foreach ($cartes as $carte):// Execute une boucle n fois le nombres de colonnes dans carte  //

      if($client[id_carte]==$carte[id_carte])   // Si l'id de la carte du client correspond a l'id de la carte que l'on a selectionner //
    {echo $carte['code'];}   //affiche le code de la carte//
  endforeach; // Fin de la boucle //

?> 