 <?php
   // Pas besoin de connexion a la bdd car deja faite dans la page rayon//
   // La varabile recup prepare la requete qui selectionne tous le contenu de la table tva //
   $recup = $bdd->prepare("SELECT * FROM  tva");

   // Execute la requete //
   $recup->execute();
   // la variable categories va prendre le contenu du tableau que renvoi recup //
   $tva = $recup->fetchAll() ;

   foreach ($tva as $taux): // Execute une boucle n fois le nombres de colonnes dans categorie  //
 ?>            <!-- Affiche le taux de tva et y attribut la valeur de l'id de la bdd -->
                <option value="<?= $taux['id'] ?>"><?php echo $taux['taux'] .'%'?> </option> <?php 
   endforeach;  // fin de la boucle //?> 