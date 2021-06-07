<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Categorias extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $categoria = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCategoria($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCategoria()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_categoria, categoria
                FROM public."tbCategorias"
                WHERE categoria ILIKE ?
                ORDER BY categoria';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO public."tbCategorias"(categoria)
                VALUES(?)';
        $params = array($this->categoria);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_categoria, categoria
                FROM public."tbCategorias"
                ORDER BY id_categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_categoria, categoria
                FROM public."tbCategorias"
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {        
        $sql = 'UPDATE public."tbCategorias"
                SET categoria = ?
                WHERE id_categoria = ?';
        $params = array($this->categoria, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM public."tbCategorias"
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
}


//Clase de las SubCategorias


class SubCategorias extends Validator
{
    // Declaración de atributos (propiedades).
    private $idSub = null;
    private $idCategoria = null;
    private $Subcategoria = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdSub($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idSub = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value, 1, 50)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setSubCategoria($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->Subcategoria = $value;
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdSub()
    {
        return $this->id;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getSubCategoria()
    {
        return $this->Subcategoria;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_tipo_producto, tipo_producto, t.id_categoria, c.categoria
                FROM public."tbTipo_producto" t 
	            INNER JOIN "tbCategorias" c on t.id_categoria = c.id_categoria
                WHERE c.categoria ILIKE ? or tipo_producto ILIKE ? 
                ORDER BY id_tipo_producto';
        $params = array("%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO public."tbTipo_producto"( tipo_producto, id_categoria)
                VALUES(?,?)';
        $params = array($this->Subcategoria,$this->idCategoria);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_tipo_producto, tipo_producto, t.id_categoria, c.categoria
                FROM public."tbTipo_producto" t 
	            INNER JOIN "tbCategorias" c on t.id_categoria = c.id_categoria
                ORDER BY id_tipo_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_tipo_producto, tipo_producto, t.id_categoria, c.categoria
                FROM public."tbTipo_producto" t 
	            INNER JOIN "tbCategorias" c on t.id_categoria = c.id_categoria
                WHERE id_tipo_producto = ?';
        $params = array($this->idSub);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {        
        $sql = 'UPDATE public."tbTipo_producto"
                SET tipo_producto=?, id_categoria=?
                WHERE id_tipo_producto = ?';
        $params = array($this->Subcategoria,$this->idCategoria,$this->idSub);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM public."tbTipo_producto"
                WHERE id_tipo_producto = ?';
        $params = array($this->idSub);
        return Database::executeRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
}

class Noticias extends Validator
{
    // Declaración de atributos (propiedades).
    private $idNew = null;
    private $titular = null;
    private $resumen = null;
    private $cuerpo = null;
    private $fecha = null;
    private $link = null;
    private $idUsuario = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdNew($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->IdNew = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdUsuario($value)
    {
        if ($this->validateNaturalNumber($value, 1, 50)) {
            $this->idUsuario = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setTitular($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->titular = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setResumen($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->resumen = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setCuerpo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->cuerpo = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setLink($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->link = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setFecha($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdNew()
    {
        return $this->idNew;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getTitular()
    {
        return $this->titular;
    }
    public function getResumen()
    {
        return $this->resumen;
    }
    public function getCuerpo()
    {
        return $this->cuerpo;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getFecha()
    {
        return $this->fecha;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_noticia, titular, resumen, cuerpo, fecha_publicacion, link, id_usuario, nick_usuario
                FROM public."tbNoticias"
	            inner join public."tbUsuarios" using(id_usuario);
                WHERE titular ILIKE ? or resumen ILIKE ? 
                ORDER BY fecha_publicacion asc';
        $params = array("%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO public."tbNoticias"(titular, resumen, cuerpo, fecha_publicacion, link, id_usuario)
                VALUES(?,?,?,?,?,?)';
        $params = array($this->titular,$this->resumen,$this->cuerpo,$this->fecha,$this->link,$_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_noticia, titular, resumen, cuerpo, fecha_publicacion, link, id_usuario, nick_usuario
                FROM public."tbNoticias"
	            inner join public."tbUsuarios" using(id_usuario)
                ORDER BY fecha_publicacion asc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_noticia, titular, resumen, cuerpo, fecha_publicacion, link, id_usuario, nick_usuario
                FROM public."tbNoticias"
	            inner join public."tbUsuarios" using(id_usuario)
                WHERE id_noticia = ?';
        $params = array($this->idNew);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {        
        $sql = 'UPDATE ppublic."tbNoticias"
                SET titular=?, resumen=?, cuerpo=?, fecha_publicacion=?, link=?, id_usuario=?
                WHERE id_noticia=?';
        $params = array($this->titular,$this->resumen,$this->cuerpo,$this->fecha,$this->link,$_SESSION['id_usuario'],$this->idNew);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM public."tbNoticias"
                WHERE id_noticia = ?';
        $params = array($this->idNew);
        return Database::executeRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
}

