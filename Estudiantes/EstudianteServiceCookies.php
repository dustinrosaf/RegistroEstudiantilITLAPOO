<?php 

class StudentServiceCookie implements IServiceBase{

    private $utilities;
    private $cookieName;

    public function __construct(){

        $this->utilities = new Utilities();
        $this->cookieName = "student";

    }

    public function GetList(){

        $listadoEstudiantes = array();

        if(isset($_COOKIE[$this->cookieName])){

            $listadoEstudiantes = json_decode($_COOKIE[$this->cookieName],false);


        }else{
            setcookie($this->cookieName,json_encode($listadoEstudiantes),$this->utilities->GetCookieTime(),"/");

        }

        return $listadoEstudiantes;
    }

    public function GetByID($id){

        $listadoEstudiantes = $this->GetList();
        $elementDecode = $this->utilities->searchProperty($listadoEstudiantes,'id',$id)[0];
        $student = new Student();
        $student->set($elementDecode);
        return $student;
    }

    public function Add($entity){

        $listadoEstudiantes = $this->GetList();

        $studentId = 1;

        if(!empty($listadoEstudiantes)){

            $lastStudent = $this->utilities->getLastElement($listadoEstudiantes);
            $studentId = $lastStudent->id + 1;

        }

        $entity->id = $studentId;

        array_push($listadoEstudiantes,$entity);

        setcookie($this->cookieName,json_encode($listadoEstudiantes),$this->utilities->GetCookieTime(),"/");

    }

    public function Update($id, $entity){

        $element = $this->getById($id);
        $listadoEstudiantes = $this->GetList();

        $elementIndex = $this->utilities->getIndexElement($listadoEstudiantes, 'id',$id);

        $listadoEstudiantes[$elementIndex] = $entity;

        setcookie($this->cookieName,json_encode($listadoEstudiantes),$this->utilities->GetCookieTime(),"/");
    }


    public function Delete($id){

        $listadoEstudiantes = $this->GetList();

        $elementIndex = $this->utilities->getIndexElement($listadoEstudiantes, 'id', $id);

        unset($listadoEstudiantes[$elementIndex]);

        $listadoEstudiantes = array_values($listadoEstudiantes);

        setcookie($this->cookieName,json_encode($listadoEstudiantes),$this->utilities->GetCookieTime(),"/");

    }

}

?>