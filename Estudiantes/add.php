<?php

require_once '../layout/layout.php';
require_once '../helpers/utilities.php';
require_once 'estudiante.php';
require_once '../service/IServiceBase.php';
require_once 'EstudianteServiceCookies.php';

$layout = new Layout(true);
$service = new StudentServiceCookie();
$utilities = new Utilities();


if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['career']) && isset($_POST['status']) ){  
  
  $newStudent = new Student();

  $newStudent->InicializeData(0,$_POST['name'], $_POST['lastname'], $_POST['career'], $_POST['status']);

  $service->Add($newStudent);  
  
  
  header("Location: ../index.php");
  exit();
  
}

?>

<?php $layout->printHeader(); ?>

<main role="main">

<div class="card">
  <div class="card-header">
   <a href="../index.php" class="btn btn-warning"> Volver Atras</a> Crear Nuevo Estudiante
  </div>
  <div class="card-body">

  <form action="add.php" method="POST" >
  <div class="form-group">
    <label for="name">Nombre del Estudiante</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>

  <div class="form-group">
    <label for="lastname">Apellido del Estudiante</label>
    <input type="text" class="form-control" id="lastname" name="lastname">
  </div>

  <div class="form-group">
    <label for="career">Carrera a la cual pertenece</label>
    <select class="form-control" id="career" name="career">
    
    <?php foreach($utilities->$career as $id => $text): ?>
     
        <option value="<?php echo $id ?>"> <?php echo $text; ?> </option> 


    <?php endforeach; ?>   

    </select>
  </div>

  <div class="form-group">
  Estatus del Estudiante
  <label for="status">Activo</label>
  <input type="checkbox" checked="" class="form-control" id="activo" name="status">

  <label for="status">Inactivo</label>
  <input type="checkbox"  class="form-control" id="inactivo" name="status">
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
 </form>

  </div>
</div>
</main>

<?php $layout->printFooter(); ?>

 