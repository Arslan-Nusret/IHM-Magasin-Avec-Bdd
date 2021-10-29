
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// Requete qui va supprimer l'entierete de la ligne avec comme filtre l'id correspondant a celui qui a etait passer en argument//
$Supp = $bdd->prepare("DELETE FROM produit WHERE id = $id");

$ok = $Supp->execute(); // Execute //

if($ok)
{echo "Le produit a bien etait supprimer";} //Affiche "Le produit a bien etait supprimer"//
else{ echo "Erreur le produit n'a pas pu etre supprimer";} //Affiche "Le produit n'a pas pu etre supprimer"//
?>