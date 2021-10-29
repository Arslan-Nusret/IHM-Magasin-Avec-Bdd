
<?php include '../Header.html'; ?><!-- inclus a cette page la page html contenant la barre de navigation -->


<html>
<body>

    <form method="POST" action="Ajouter Un Produit.php">
        <!-- Debut du formulaire  -->

        <!-- Entrer a liste deroulante qui va afficher tous les rayons disponible en  faisant appel a une page -->
        <p>
            <label for="categorie"> Rayon:</label>
            <select size="1" id="categorie" name="rayon">
                <!-- Appel la page Rayon.php -->
                <?php include'../Affichage tva et rayon/Rayon.php'?>
            </select>
        </p>
        <!-- Plusieurs formulaire appartenant a toutes les colonnes de la table produit -->
        <p> <label for="produit">Nom:         </label> <input type="text" id="produit" name="nom" placeholder="Produit" /></p>
            
        <p> <label for="codebarre">Code Barre </label> <input type="text" id="codebarre" name="code" placeholder="Code barre" /> </p>
        
        <p> <label for="poids">Poids:         </label> <input type="text" id="poids" name="poids" placeholder="Poids en kg" /> </p>
            
        <p> <label for="quantite">Quantite:   </label><input type="text" id="quantite" name="quantite" placeholder="Quantite" /> </p>
        
        <p> <label for="prix">Prix:           </label><input type="text" id="prix" name="prix" placeholder="Prix ht en e" /> </p>
       
        <p> <label for="remise">Remise:       </label> <input type="text" id="remise" name="remise" placeholder="Remise en %" /> </p>
         
        <!-- Entrer a liste deroulante qui va afficher toutes les tva possible en  faisant appel a une page -->
        <p>
            <label for="tva">TVA:</label>
            <select size="1" id="tva" name="tva">
                <!-- Appel la page Tva.php -->
                <?php include'../Affichage tva et rayon/Tva.php'?>
            </select>
        </p>

        <input type="submit" value="Envoyer" /><!-- Bouton qui va envoyer le formulaire -->
        <!-- Bouton qui efface tous les champs -->
        <button type="reset" value="BouttonReset" name="ResetChamps"> Vider les champs</button>

    </form><!-- Fin de formulaire -->
</body>
</html>

<?php
// Si aucun des champs n'est vides//
if(isset($_POST['rayon']) and isset($_POST['nom']) and isset($_POST['code']) and isset($_POST['poids']) and isset($_POST['quantite'])and isset($_POST['prix'])and isset($_POST['remise'])and isset($_POST['tva']))
{
    // On écrit la requête sql qui insere les informations du formulaire dans la table produit //
    $sql = "INSERT INTO produit
                          (id_categorie,nom,code_barre,poids,quantite,prix_ht,remise,id_taux)
      VALUES (?,?,?,?,?,?,?,?)";

    // La variable req prepare la requete ecrite dans la variable sql //
    $req=$bdd->prepare($sql);
    // Execute la requete avec comme argument un tableau avec toutes les attributs dont un produit a besoin //
    $req->execute(array($_POST['rayon'],$_POST['nom'],$_POST['code'],$_POST['poids'],$_POST['quantite'],$_POST['prix'],$_POST['remise'],$_POST['tva']));


    // Ecris "Un nouveau produit a bien etait ajouter !" //
    echo '<h2 style="color:blue">  Un nouveau produit a bien etait ajouter ! </h2>';
}
// Sinon un des champs est vide //
else
{  // Ecris "Tous les champs doivent etre completer !" //
    echo '<h2 style="color:red"> Tous les champs doivent etre completer ! </h2>';


}
?>