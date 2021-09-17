<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class restauracion extends Validator
{
    //Declaración de atributos
    private $id = null;
    private $correo = null;
    private $codigo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value, 1, 50)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigo($value)
    {
        if($this->validateNaturalNumber($value, 1, 50)){
            $this->codigo = $value;
            return true;
        } else{
            return false;
        }
    }



    
    //Métodos para obtener valores de los atributos.
    
    public function getId()
    {
        return $this->id;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    

    public function ObtenerCorreo()
    {
        $sql = 'SELECT correo_usuario, codigo
        FROM public."tbUsuarios";
                WHERE correo_usuario = ?';        
        $params = array($this->correo);        
        return Database::getRow($sql, $params);
    }


}