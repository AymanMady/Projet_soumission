<?php
include_once "../connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matiere_id = $_POST["matiere_id"];
    $enseignant_id = $_POST["enseignant_id"];

    // Vérifier si la matière et l'enseignant existent dans la base de données
    $matiere_query = "SELECT * FROM matiere WHERE id_matiere = $matiere_id";
    $enseignant_query = "SELECT * FROM enseignant WHERE id_ens = $enseignant_id";
    $matiere_result = mysqli_query($conn, $matiere_query);
    $enseignant_result = mysqli_query($conn, $enseignant_query);

    if (mysqli_num_rows($matiere_result) > 0 && mysqli_num_rows($enseignant_result) > 0) {
        // Vérifier si l'enseignant est déjà affecté à la matière
        $check_query = "SELECT * FROM enseigner WHERE id_matiere = '$matiere_id' AND id_ens = '$enseignant_id' ";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "L'enseignant est déjà affecté à cette matière.";
        } else {
            // Effectuer l'affectation en insérant une nouvelle ligne dans la table "enseigner"
            $insert_query = "INSERT INTO enseigner (id_matiere, id_ens) VALUES ($matiere_id, $enseignant_id)";

            if (mysqli_query($conn, $insert_query)) {
                echo "Affectation réussie !";
                header("location: matiere.php");
            } else {
                echo "Erreur lors de l'affectation : " . mysqli_error($conn);
            }
        }
    } else {
        echo "La matière ou l'enseignant n'existe pas dans la base de données.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
