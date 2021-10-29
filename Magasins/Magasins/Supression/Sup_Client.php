
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->

<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// Requete qui va supprimer l'entierete de la ligne de la table client avec comme filtre l'id correspondant a celui qui a etait passer en argument//
$Supp = $bdd->prepare("DELETE  FROM  client WHERE id_carte=$id");
// Supprime aussi la carte qui est associé au client //
$Supp1 = $bdd->prepare("DELETE FROM  carte  WHERE id_carte=$id");



$ok  = $Supp->execute(); //Execute les 2 requete //
$ok1 = $Supp1->execute();

if($ok and $ok1)// Si les requete on etait executer //
{echo "Le client a bien etait supprimer";} //Affiche "Le client a bien etait supprimer"//
else{ echo "Erreur le client n'a pas pu etre supprimer";} //Affiche "Le client n'a pas pu etre supprimer"//
?>