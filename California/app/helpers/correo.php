<?php 
$email = "";
$name = "";
$errors = array();

class Correo extends Validator
{
    // Declaración de atributos (propiedades).
    private $correo = null;
    private $mensaje = null;
    private $asunto = null;
    private $codigo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setCodigo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->codigo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMensaje($value)
    {
        if ($this->validateText($value)) {
            $this->mensaje = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAsunto($value)
    {
        if ($this->validateText($value)) {
            $this->asunto = $value;
            return true;
        } else {
            return false;
        }
    }
 
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getCorreo()
    {
        return $this->correo;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    // Funcion para enviar el correo electronico al destino seleccionado
    public function enviarCorreo() {
        try {
            // Colocamos el correo que enviara el mensaje
            $sender = "From: californiaskateboardingsv@gmail.com";
            // Ejecutamos la funcion mail para enviar el mensaje
            if(mail($this->correo, $this->asunto, $this->mensaje, $sender)) {
                // En caso se ejecute se retorna el dato de tipo boolean, true.
                return true;
            } else {
                // En caso que ocurra un error se muestra el mensaje 
                $_SESSION['error'] = "Error al enviar el correo electrónico";
                // El retorno es false
                return false;
            }        
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        }       
    }

    // Metodo para validar que el correo del cliente existe en la base de datos.
    public function validarCorreo()
    {
        // Declaramos la sentencia que enviaremos a la base con el parametro del nombre de la tabla (dinamico)
        $sql = 'SELECT correo_cliente from public."tbClientes" where correo_cliente = ?';
        // Enviamos los parametros
        $params = array($this->correo);
        return Database::getRow($sql, $params);
    }

    // Metodo para validar el codigo enviado al correo del cliente.
    public function validarCodigo()
    {
        // Declaramos la sentencia que enviaremos a la base con el parametro del nombre de la tabla (dinamico)
        $sql = 'SELECT correo_cliente from public."tbClientes" where codigo = ? and correo_cliente = ?';
        // Enviamos los parametros
        $params = array($this->codigo,$_SESSION['mail']);
        return Database::getRow($sql, $params);
    }

    // Metodo para actualizar el codigo de confirmacion de un cliente.
    public function actualizarCodigo($codigo)
    {
        // Declaramos la sentencia que enviaremos a la base con el parametro del nombre de la tabla (dinamico)
        $sql = 'UPDATE public."tbClientes" set codigo = ? where correo_cliente = ?';
        // Enviamos los parametros
        $params = array($codigo, $this->correo);
        return Database::executeRow($sql, $params);
    }



}
?>



