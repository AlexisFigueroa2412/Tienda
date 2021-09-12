<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $alias = null;
    private $clave = null;
    private $estado = null;
    private $exito = null;
    private $intentos = null;
    private $fecha = null;

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

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
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

    public function setAlias($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->alias = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getIntentos()
    {
        return $this->intentos;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
        
    // Función que nos sirve para guardar el historial de la sesiones
    public function registerSession()
    {   // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        // Se guardan las variables necesarias
        $date = date('Y-m-d');
        $hora = date('G:H:s');
        // Se guarda la consulta que nos permitirá registar la sesión
        $sql = 'INSERT INTO public."tbSesionesPv"(
            fecha_sesion, exito, id_usuario,hora)
            VALUES (?, ?, ?, ?);';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($date, $this->exito, $this->id,$hora);
        //Se retorna el resultado de ejecutar la consulta en el método "executeRow"
        return Database::executeRow($sql, $params);
    }

    public function checkUser($alias)
    {
        $sql = 'SELECT id_usuario FROM public."tbUsuarios" WHERE alias_usuario = ?';
        $params = array($alias);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->alias = $alias;
            return true;
        } else {
            return false;
        }
    }

    // Función para verificar la cantidad de intentos de sesión realizados
    public function checkIntentos()
     {
        // Se guardan las variables a utilizar(fecha y éxito)
        $sesion = 'false';
        // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        // Se guarda la consulta sql que pedirá la cantidad de sesiones fallidas
        $sql = 'SELECT count(id_sesion) as intentos
            FROM public."tbSesionesPv"
            where exito = ? and fecha_sesion = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($sesion,$date);
        // Se verifica si la consulta devolvío algún dato
        if ($data = Database::getRow($sql, $params)) {
            // Se verifica que los intentos fallidos sean menores a 3
            if ($data['intentos'] < 3) {
                return true;
            } else {
                return false;
            }
         } else {
            return true;
         }
     }

    // Función para verificar la clave del usuario
    public function checkPassword($password)
    {
        // Se guarda la consulta sql que pedirá la clave del cliente
        $sql = 'SELECT clave_usuario FROM public."tbUsuarios" WHERE id_usuario = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($this->id);
        // Se guarda el resultado de ejecutar la consulta en el método "getRow"
        $data = Database::getRow($sql, $params);
        // Se verifica si la contraseña es correcta
        //Se guarda el éxito de la sesión para registarla
        if (password_verify($password, $data['clave_usuario'])) {
            $this->exito = 'true';
           return true;
        } else {
            $this->exito = 'false';
            return false;
        }
    }

    public function readProfile()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, apellidos_usuario, correo_usuario, alias_usuario, estado_usuario
                FROM public."tbUsuarios"
                WHERE id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_usuario, nombre_usuario, apellidos_usuario, correo_usuario, alias_usuario, estado_usuario
                FROM public."tbUsuarios"
                WHERE apellido_usuario ILIKE ? OR nombres_usuario ILIKE ? OR nick_usuario ILIKE ?
                ORDER BY apellido_usuario';
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        //Se asigna un estado(1 = activo, 0= inactivo)
        $estado = true;
        //Se asigna la consulta sql
        $sql = 'INSERT INTO public."tbUsuarios"(nombre_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario, estado_usuario)
                VALUES(?, ?, ?, ?, ?, ?)';
        //Se asignan los parámetros de la consulta sql
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash, $estado);
        //Se retorna el resultado de la ejecución ambas
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario, estado_usuario
                FROM public."tbUsuarios"
                ORDER BY nombre_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, apellidos_usuario, correo_usuario
                FROM public."tbUsuarios"
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE public."tbUsuarios"
                SET nombre_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, estado_usuario = ? 
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui. $this->direccion, $this->tipo, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM public."tbUsuarios"
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
