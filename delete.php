<?php 

session_start();

include_once 'conexion.php';

if (isset($_GET['id'])) {
    $database = new Conexion();
    $db = $database->open();

    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM personas WHERE idPersona = $id;";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Contacto eliminado correctamente' : 'Hubo un error al eliminar el contacto';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $database->close();
} else {
    $_SESSION['error'] = 'Selecciona un contacto a eliminar';
}

header('Location: index.php');

?>
