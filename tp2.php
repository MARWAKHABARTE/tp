<?php
// 1. Tableau associatif des employés et calcul du salaire moyen
$employes = [
    ["nom" => "marwa", "poste" => "Développeuse", "salaire" => 10000],
    ["nom" => "LEILA", "poste" => "DRH", "salaire" => 18000],
    ["nom" => "Mohamed", "poste" => "Technicien", "salaire" => 7000],
    ["nom" => "Salma", "poste" => "DF", "salaire" => 19000],
    ["nom" => "ghali", "poste" => "Technicien", "salaire" => 5000]
];

function calculerSalaireMoyen($employes) {
    $somme = 0;
    foreach ($employes as $employe) {
        $somme += $employe['salaire'];
    }
    return $somme / count($employes);
}
echo "Salaire moyen des employés : " . calculerSalaireMoyen($employes) . " MAD<br>";

// 2. Recherche dynamique d'un employé
if (isset($_POST['nomEmp'])) {
    $nomEmp = $_POST['nomEmp'];
    $trouve = false;
    foreach ($employes as $employe) {
        if (strcasecmp($employe['nom'], $nomEmp) === 0) {
            echo "Employé trouvé :<br>Nom : {$employe['nom']}<br>Poste : {$employe['poste']}<br>Salaire : {$employe['salaire']}<br>";
            $trouve = true;
            break;
        }
    }
    if (!$trouve) echo "Employé non trouvé.<br>";
}

// 3. Vérification du formulaire de connexion
$utilisateurs = [
    ["email" => "ex1@exemple.com", "motDePasse" => "1234"],
    ["email" => "ex2@exemple.com", "motDePasse" => "4321"]
];
if (isset($_POST['email']) && isset($_POST['motDePasse'])) {
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $authentifie = false;

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['motDePasse'] === $motDePasse) {
            echo "Connexion réussie !<br>";
            $authentifie = true;
            break;
        }
    }
    if (!$authentifie) echo "Email ou mot de passe incorrect.<br>";
}

// 4. Calcul du total du panier
$panier = [
    ["nom" => "Produit 1", "quantite" => 7, "prix" => 700],
    ["nom" => "Produit 2", "quantite" => 2, "prix" => 500]
];
$totalPanier = 0;
foreach ($panier as $produit) {
    $totalPanier += $produit['quantite'] * $produit['prix'];
}
echo "Total du panier : " . $totalPanier . " MAD<br>";

// 5. Soumission des commentaires
$commentaires = [];
if (isset($_POST['commentaire'])) {
    $nouveauCommentaire = [
        "contenu" => $_POST['commentaire'],
        "date" => date("Y-m-d H:i:s")
    ];
    $commentaires[] = $nouveauCommentaire;
    echo "Commentaire soumis : {$nouveauCommentaire['contenu']} le {$nouveauCommentaire['date']}<br>";
}

// 6. Recherche de la ville avec la température la plus élevée
$villes = [
    "Casablanca" => 88,
    "Marrakech" => 77,
    "Rabat" => 66
];
$villeMax = "";
$tempMax = PHP_INT_MIN;
foreach ($villes as $ville => $temp) {
    if ($temp > $tempMax) {
        $tempMax = $temp;
        $villeMax = $ville;
    }
}
echo "La ville ayant la température la plus élevée est $villeMax avec $tempMax°C<br>";

// 7. Lecture d'un fichier CSV (simulation)
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
    $fichierCSV = fopen($_FILES['csvFile']['tmp_name'], 'r');
    $produitsCSV = [];
    while (($ligne = fgetcsv($fichierCSV)) !== false) {
        $produitsCSV[] = ["nom" => $ligne[0], "prix" => $ligne[1], "quantite" => $ligne[2]];
    }
    fclose($fichierCSV);

    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    foreach ($produitsCSV as $produit) {
        echo "<tr><td>{$produit['nom']}</td><td>{$produit['prix']}</td><td>{$produit['quantite']}</td></tr>";
    }
    echo "</table>";
}

// 8. Gestion des produits sélectionnés
if (isset($_POST['produits'])) {
    $produits = [
        ["nom" => "Produit 1", "prix" => 700],
        ["nom" => "Produit 2", "prix" => 600],
        ["nom" => "Produit 3", "prix" => 500]
    ];
    $total = 0;
    echo "Produits sélectionnés :<br>";
    foreach ($_POST['produits'] as $index) {
        $total += $produits[$index]['prix'];
        echo $produits[$index]['nom'] . " - " . $produits[$index]['prix'] . " MAD<br>";
    }
    echo "Total : $total MAD<br>";
}

// 9. Moyennes des étudiants
$etudiants = [
    "Salma" => ["Maths" => 20, "Physique" => 20, "Français" => 16],
    "Afnane" => ["Maths" => 13, "Physique" => 16, "Français" => 19],
    "Sara" => ["Maths" => 16, "Physique" => 19, "Français" => 10]
];
foreach ($etudiants as $nom => $notes) {
    $sommeNotes = array_sum($notes);
    $moyenne = $sommeNotes / count($notes);
    echo "Étudiant : $nom ; Moyenne : $moyenne<br>";
}

// 10. Gestion des utilisateurs
if (isset($_POST['action'])) {
    $utilisateurs = [
        ["id" => 1, "nom" => "Nisrine", "email" => "nisrine@example.com"],
        ["id" => 2, "nom" => "Assia", "email" => "assia@example.com"]
    ];

    $action = $_POST['action'];
    if ($action === "ajouter") {
        $nouvelUtilisateur = [
            "id" => count($utilisateurs) + 1,
            "nom" => $_POST['nom'],
            "email" => $_POST['email']
        ];
        $utilisateurs[] = $nouvelUtilisateur;
        echo "Utilisateur ajouté : " . json_encode($nouvelUtilisateur) . "<br>";
    } elseif ($action === "modifier") {
        foreach ($utilisateurs as &$utilisateur) {
            if ($utilisateur['id'] == $_POST['id']) {
                $utilisateur['nom'] = $_POST['nouveauNom'];
                $utilisateur['email'] = $_POST['nouveauEmail'];
                echo "Utilisateur modifié : " . json_encode($utilisateur) . "<br>";
                break;
            }
        }
    } elseif ($action === "supprimer") {
        foreach ($utilisateurs as $index => $utilisateur) {
            if ($utilisateur['id'] == $_POST['id']) {
                unset($utilisateurs[$index]);
                echo "Utilisateur supprimé.<br>";
                break;
            }
        }
    }
}
?>
