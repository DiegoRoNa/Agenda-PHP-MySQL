<?php 

session_start();

include_once 'conexion.php';

if (isset($_POST['add'])) {
    $database = new Conexion();
    $db = $database->open();

    try {
        $stmt = $db->prepare("INSERT INTO personas VALUES(null, :nombre, :telefono, :email, :direccion);");

        $_SESSION['message'] = ($stmt->execute(array(
            ':nombre' => $_POST['nombre'],
            ':telefono' => $_POST['telefono'],
            ':email' => $_POST['email'],
            ':direccion' => $_POST['direccion']
        ))) ? 'Contacto agregado correctamente' : 'Hubo un error al agregar el contacto';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $database->close();
} else {
    $_SESSION['error'] = 'Rellena el formulario';
}

header('Location: index.php');

?>
