<?php 

    require_once '../helpers/utilities.php';
    require_once 'estudiante.php';
    require_once '../service/IServiceBase.php';
    require_once 'EstudianteServiceCookies.php';

    $service = new StudentServiseCookie();

    $isConstainId = isset($_GET['id']);

    if($isConstainId){

        $studentId = $_GET['id'];
        $service->Delete($studentId);   
    }

    header("Location: ../index.php");
    exit()

?>

