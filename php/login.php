<?php  
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "agence";  
        
    // Créer une connexion à la base de données  
    $conn = new mysqli($servername, $username, $password, $dbname);  

    $email = $_POST["email"];  
    $mdp = $_POST['motdepasse']; 

    // Vérifier si l'utilisateur existe dans la base de données
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // L'utilisateur existe, vérifier le mot de passe
    $row = $result->fetch_assoc();
    if ($mdp == $row['password']) {
        // Le mot de passe est correct, démarrer une session pour l'utilisateur
        session_start();  
        $_SESSION['login'] = $row['email'];  
        $_SESSION["nom"] = $row['nom'];  
        $_SESSION["type"] = $row['admin'];  
        header('Location: ../reservation.php');  
    } else {
        // Le mot de passe est incorrect, afficher un message d'erreur
        echo 'Mot de passe incorrect';
    }
    } else {
    // L'utilisateur n'existe pas, afficher un message d'erreur
    echo 'Utilisateur non trouvé';
    }

    // Fermer la connexion à la base de données
    $conn->close();  
?>