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
    private $dui = null;
    private $nacimiento = null;
    private $alias = null;
    private $direccion = null;
    private $clave = null;
    private $estado = null; // Valor por defecto en la base de datos: true

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

    public function setDUI($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
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

    public function getDUI()
    {
        return $this->dui;
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


    public function register()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO public."tbClientes"(
            id_cliente, nombre_cliente, apellido_cliente, telefono_cliente, correo_cliente, clave_cliente, estado_cliente)
            VALUES (default, ?, ?, ?, ?, ?, true);';
        $params = array($this->nombres, $this->apellidos, $this->telefono, $this->correo, $hash);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para gestionar la cuenta del cliente.
    */
    public function checkUser($correo)
    {
<<<<<<< HEAD
        $sql = 'SELECT "id_cliente" FROM "tbClientes" WHERE "correo_cliente" = ?';
=======
        $sql = 'SELECT id_cliente, estado_cliente FROM clientes WHERE correo_cliente = ?';
>>>>>>> 3ca8e65318d062eec0dcb5c7ab2cf9dce1c7320a
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
<<<<<<< HEAD
        $sql = 'SELECT "clave_cliente" FROM "tbClientes" WHERE "id_cliente" = ?';
=======
        $sql = 'SELECT clave_cliente FROM clientes WHERE id_cliente = ?';
>>>>>>> 3ca8e65318d062eec0dcb5c7ab2cf9dce1c7320a
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_cliente'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE clientes SET clave_cliente = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE clientes
                SET nombres_cliente = ?, apellidos_cliente = ?, correo_cliente = ?, dui_cliente = ?, telefono_cliente = ?, nacimiento_cliente = ?, direccion_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->telefono, $this->nacimiento, $this->direccion, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente, nombres_cliente, apellidos_cliente, correo_cliente, dui_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM clientes
                WHERE apellidos_cliente ILIKE ? OR nombres_cliente ILIKE ?
                ORDER BY apellidos_cliente';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    

    
    
    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO clientes(nombres_cliente, apellidos_cliente, correo_cliente, dui_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente, clave_cliente)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->telefono, $this->nacimiento, $this->direccion, $hash);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombres_cliente, apellidos_cliente, correo_cliente, dui_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM clientes
                ORDER BY apellidos_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente, nombres_cliente, apellidos_cliente, correo_cliente, dui_cliente, telefono_cliente, nacimiento_cliente, direccion_cliente
                FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateState()
    {
        $sql = 'UPDATE clientes
                SET estado_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
