<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
$servername ='localhost';
$username= 'root';
$password='';
$dataBaseName='avis';
$conn= new mysqli($servername, $username, $password, $dataBaseName);
if($conn->connect_error){
    die("connection echou�e");
}
$sql2="SELECT email FROM client WHERE email='$email';";
$conn->query($sql2);
$result=$conn->query($sql2);

$sql3="SELECT nom FROM client WHERE nom='$nom';";
$conn->query($sql3);
$result3=$conn->query($sql3);

if(mysqli_num_rows($result)==0 && mysqli_num_rows($result3)==0){
    //echo "inscription réussite ";
    $sql="INSERT INTO `client` (`id_client`, `nom`, `email`, `mdp`) VALUES (NULL, '$nom', '$email', '$mdp');";
    $conn->query($sql);
    session_start();
    $_SESSION['message'] = "inscription réussi !";
    header("Location: http://localhost/isen2023/connection.php");
    exit;
}
if(mysqli_num_rows($result)!=0){
    session_start();
    $_SESSION['message'] = "Cette email est déja utilisé.";
    $conn->close();
    header("Location: http://localhost/isen2023/inscription.php");
    exit;
}
if(mysqli_num_rows($result3)!=0){
    session_start();
    $_SESSION['message'] = "Ce nom est déja utilisé.";
    $conn->close();
    header("Location: http://localhost/isen2023/inscription.php");
    exit;
}
if($mdp==''){
    session_start();
    $_SESSION['message'] = "il faut un mot de passe.";
    $conn->close();
    header("Location: http://localhost/isen2023/inscription.php");
    exit;
}
$conn->close();
}
?>