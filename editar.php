<?php 

session_start();

include_once 'conexion.php';

if (isset($_POST['edit'])) {
    $database = new Conexion();
    $db = $database->open();

    try {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];

        $sql = "UPDATE personas SET nombre = '$nombre', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE idPersona = $id;";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Contacto actualizado correctamente' : 'Hubo un error al actualizar el contacto';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $database->close();
} else {
    $_SESSION['error'] = 'Rellena el formulario';
}

header('Location: index.php');

?>
