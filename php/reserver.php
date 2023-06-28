<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agence";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
  die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
session_start();
// Récupérer les données du formulaire
$date = $_POST["date"];
$email = $_POST["email"];
$lieu = $_POST["lieu"];
$etat = "En attente";
$nom = $_SESSION['nom'];

// L'email n'existe pas encore, insérer les données dans la base de données
$sql = "INSERT INTO reservation (id, nom, lieu, etat, date) VALUES ('', '$nom', '$lieu', '$etat', '$date')";

if ($conn->query($sql) === TRUE) {
  // Les données ont été insérées avec succès, rediriger vers la page de connexion
  echo "<br/><br/><span>Votre demande a été enregistrée !</span>";
  header('Location: ../reservation.php');
} else {
  // Une erreur s'est produite lors de l'insertion des données, afficher un message d'erreur
  echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>