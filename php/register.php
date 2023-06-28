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

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$email = $_POST["email"];
$lieu = $_POST["lieu"];
$motdepasse = $_POST["motdepasse"];
$admin = 0;

// Vérifier si l'email existe déjà dans la base de données
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // L'email existe déjà, afficher un message d'erreur
  echo "Login déjà existant";
} else {
  // L'email n'existe pas encore, insérer les données dans la base de données
  $sql = "INSERT INTO user (nom, email, password, lieu, admin) VALUES ('$nom', '$email', '$motdepasse', '$lieu', '$admin')";

  if ($conn->query($sql) === TRUE) {
    // Les données ont été insérées avec succès, rediriger vers la page de connexion
    echo "<br/><br/><span>Votre demande a été enregistrée !</span>";
    header('Location: ../connexion.html');
  } else {
    // Une erreur s'est produite lors de l'insertion des données, afficher un message d'erreur
    echo "Erreur : " . $sql . "<br>" . $conn->error;
  }
}

// Fermer la connexion à la base de données
$conn->close();
?>