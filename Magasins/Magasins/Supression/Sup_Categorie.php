
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<?php
// Connection a la bdd //
$bdd = new PDO('mysql:host=localhost;dbname=magasins;charset=utf8', 'root', '');
// La variable id recupere la variable qui a etait passé en argument elle aussi appelé id//
$id=$_GET['id'];
// Requete qui va supprimer l'entierete de la ligne avec comme filtre l'id correspondant a celui qui a etait passer en argument//
$Supp = $bdd->prepare("DELETE FROM  categorie WHERE id_categorie=$id");

$ok = $Supp->execute(); // Execute la requete //

if($ok) // Si la requete a etait executer //
{echo "La categorie a bien etait supprimer";}  //Affiche "La categorie a bien etait supprimer"//
else{ echo "Erreur la categorie n'a pas pu etre supprimer";} //Sinon Affiche "Erreur la categorie n'a pas pu etre supprimer"//
?>