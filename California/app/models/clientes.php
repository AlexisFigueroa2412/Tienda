<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $telefono = null;
    private $nacimiento = null;
    private $alias = null;
    private $direccion = null;
    private $clave = null;
    private $exito = null;
    private $intentos = null;
    private $fecha = null;
    private $estado = null; // Valor por defecto en la base de datos: true
    private $factor = null;

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

    public function setAlias($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->alias = $value;
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

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->direccion = $value;
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
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setExito($value)
    {
        if ($this->validateBoolean($value)) {
            $this->exito = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFactor($value)
    {
        if ($this->validateBoolean($value)) {
            $this->factor = $value;
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

    public function getAlias()
    {
        return $this->alias;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getDireccion()
    {
        return $this->direccion;
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


    public function register()
    {
        // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        //Se asigna un estado(1 = activo, 0= inactivo)
        $estado = true;
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO public."tbClientes"(nombre_cliente, apellido_cliente, telefono_cliente, correo_cliente, clave_cliente, estado_cliente, cambio_clave, factor)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);';
        $params = array($this->nombres, $this->apellidos, $this->telefono, $this->correo, $hash, $estado, $date, $this->factor);
        return Database::executeRow($sql, $params);
    }
    
    // Función que nos sirve para guardar el historial de la sesiones
    public function registerSession()
    {   // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        // Se guardan las variables necesarias
        $date = date('Y-m-d');
        $hora = date('G:H:s');
        // Se guarda la consulta que nos permitirá registar la sesión
        $sql = 'INSERT INTO public."tbSesionesPb"(
            fecha_sesion, exito, id_cliente,hora)
            VALUES (?, ?, ?, ?);';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($date, $this->exito, $this->id,$hora);
        //Se retorna el resultado de ejecutar la consulta en el método "executeRow"
        return Database::executeRow($sql, $params);
    }

    // Función que nos sirve para guardar el historial de la sesiones
    public function unregisterFailedSession()
    {   // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        // Se guardan las variables necesarias
        $date = date('Y-m-d');
        $exito = 'false';
        // Se guarda la consulta que nos permitirá resetear los intentos fallidos
        $sql = 'DELETE FROM public."tbSesionesPb"
            WHERE fecha_sesion = ? and exito = ? and id_cliente = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($date, $exito, $this->id);
        //Se retorna el resultado de ejecutar la consulta en el método "executeRow"
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para gestionar la cuenta del cliente.
    */
    public function checkUser($correo)
    {
        $sql = 'SELECT "id_cliente" FROM "tbClientes" WHERE "correo_cliente" = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->correo = $correo;
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
            FROM public."tbSesionesPb"
            where exito = ? and fecha_sesion = ? and id_cliente = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($sesion,$date,$this->id);
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

    // Función para verificar la cantidad de intentos de sesión realizados
    public function checkIntervalo()
    {
        // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $deta = date('Y-m-d',strtotime($date."-89 days"));
        // Se guarda la consulta sql que pedirá la cantidad de sesiones fallidas
        $sql = 'SELECT correo_cliente FROM public."tbClientes"
        where id_cliente = ? and cambio_clave >= ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($_SESSION['id_cliente'], $deta);
        // Se verifica si la consulta devolvío algún dato
        $data = Database::getRow($sql, $params);
        //var_dump($data['correo_usuario']);
        if (isset($data['correo_cliente'])) {
            return true;
        } else {
            return false;
        }
    }

    // Función para verificar la cantidad de intentos de sesión realizados
    public function checkFactor()
    {
        
        $factor = true;
        // Se guarda la consulta sql que pedirá la cantidad de sesiones fallidas
        $sql = 'SELECT factor FROM public."tbClientes"
        where id_cliente = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($this->id);
        // Se verifica si la consulta devolvío algún dato
        $data = Database::getRow($sql, $params);
        if ($data['factor']) {
            return true;
        } else {
            return false;
        }
    }

    // Función para verificar la clave del cliente
    public function checkPassword($password)
    {
        // Se guarda la consulta sql que pedirá la clave del cliente
        $sql = 'SELECT "clave_cliente" FROM public."tbClientes" WHERE "id_cliente" = ?';
        // Se guarda un array con los parámetros solicitados por la consulta
        $params = array($this->id);
        // Se guarda el resultado de ejecutar la consulta en el método "getRow"
        $data = Database::getRow($sql, $params);
        // Se verifica si la contraseña es correcta
        //Se guarda el éxito de la sesión para registarla
        if (password_verify($password, $data['clave_cliente'])) {
            $this->exito = 'true';
           return true;
        } else {
            $this->exito = 'false';
            return false;
        }
    }
    

    public function changePassword()
    {
       // Se define la zona horaria del servidor
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);

        $sql = 'UPDATE public."tbClientes" SET clave_cliente = ? and cambio_clave = ? WHERE id_cliente = ?';
        $params = array($hash, $date, $this->id);

        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE tbClientes
                SET nombre_cliente = ?, apellido_cliente = ?, correo_cliente = ?, telefono_cliente = ?, nacimiento_cliente = ?, direccion_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->nacimiento, $this->direccion, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM tbClientes
                WHERE apellido_cliente ILIKE ? OR nombre_cliente ILIKE ?
                ORDER BY apellido_cliente';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM tbClientes
                ORDER BY apellido_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM tbClientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateState()
    {
        $sql = 'UPDATE tbClientes
                SET estado_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM tbClientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}