<?php
// Question 1 : Afficher les informations sur l’étudiant
$etudiant = [
    "nom" => "Khabarate",
    "prenom" => "Marwa",
    "matricule" => "MKK5",
];
echo "<h2>Question 1 : Étudiant</h2>";
foreach ($etudiant as $key => $value) {
    echo "<p>$key : $value</p>";
}

// Question 2 : Ajouter et modifier la clé 'note'
$etudiant["note"] = 17;
echo "<h2>Question 2 : Étudiant avec Note</h2>";
echo "<p>Note ajoutée : {$etudiant['note']}</p>";

// Question 3 : Produits avec prix
$listeProduits = [
    ["nom" => "Produit A", "prix" => 10],
    ["nom" => "Produit B", "prix" => 20],
    ["nom" => "Produit C", "prix" => 30],
];
echo "<h2>Question 3 : Produits</h2>";
foreach ($listeProduits as $produit) {
    echo "<p>{$produit['nom']} : {$produit['prix']} €</p>";
}

// Question 4 : Moyenne des scores des étudiants
$scoreEtudiants = [15, 18, 20, 17, 16];
$moyenne = array_sum($scoreEtudiants) / count($scoreEtudiants);
echo "<h2>Question 4 : Moyenne des Scores</h2>";
echo "<p>Moyenne : $moyenne</p>";

// Question 5 : Population des pays
$pop_pays = [
    "Maroc" => 12345678,
    "France" => 87654321,
    "Etats-Unis" => 56784321,
    "Canada" => 43215678,
];
arsort($pop_pays);
echo "<h2>Question 5 : Population des Pays</h2>";
foreach ($pop_pays as $key => $value) {
    echo "<p>$key : $value habitants</p>";
}

// Question 6 et 7 : Formulaire 'Nom' et 'Âge'
if (isset($_POST['question6']) || isset($_POST['question7'])) {
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    if (isset($_POST['question7']) && $age <= 0) {
        echo "<h2>Erreur</h2><p>L'âge doit être un entier positif.</p>";
    } else {
        echo "<h2>Bienvenue</h2><p>Bienvenue, $nom, vous avez $age ans !</p>";
    }
}

// Question 8 : Couleur préférée
if (isset($_POST['question8'])) {
    $couleur = $_POST['couleur'];
    echo "<h2>Couleur Préférée</h2><p>Votre couleur préférée est : $couleur</p>";
}

// Question 9 : Somme de deux nombres
if (isset($_GET['question9'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $somme = $num1 + $num2;
    echo "<h2>Somme</h2><p>La somme de $num1 et $num2 est : $somme</p>";
}

// Question 10 : Type de compte
if (isset($_POST['question10'])) {
    $compte = $_POST['compte'];
    if ($compte === "Administrateur") {
        echo "<h2>Type de Compte</h2><p>Bienvenue, administrateur !</p>";
    } else {
        echo "<h2>Type de Compte</h2><p>Bienvenue, utilisateur simple !</p>";
    }
}
?>
