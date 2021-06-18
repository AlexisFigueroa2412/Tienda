<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Productos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $precio = null;
    private $cantidad = null;
    private $marca = null;
    private $descuento = null;
    private $imagen = null;
    private $tipo = null;
    private $estado = null;
    private $foto = null;
    private $ruta = '../../../resources/img/productos/';

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

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMarca($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->marca = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescuento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->descuento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->foto = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function setTipo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->tipo = $value;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getImagen()
    {
        return $this->foto;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT "idProductos", foto, nombre, decripcion, precio, tipo_producto, estado, cantidad_total
                FROM public."tbProductos" INNER JOIN public."tbTipo_producto" USING(id_tipo_producto)
                WHERE nombre ILIKE ? OR descripcion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO public."tbProductos"(nombre_producto, id_categoria, precio_producto, descripcion_producto, cantidad_total, estado_producto, marca_producto, foto)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre,$this->tipo, $this->precio, $this->descripcion, $this->cantidad, $this->estado, $this->marca, $this->foto);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_producto,categoria,nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto
                FROM public."tbProductos" INNER JOIN public."tbCategorias" USING(id_categoria)
                ORDER BY nombre_producto ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCombo()
    {
        $sql = 'SELECT id_tipo_producto, tipo_producto
                FROM public."tbTipo_producto";
                ORDER BY id_tipo_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_producto,categoria,nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto
        FROM public."tbProductos" INNER JOIN public."tbCategorias" USING(id_categoria)
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function averageOne()
    {
        $sql = 'SELECT avg(calificacion) 
        FROM public."tbValoracion";
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function Coments()
    {
        $sql = 'SELECT comentario
        FROM public."tbValoracion" 
	    inner join public."tbClientes" using(id_cliente) 
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function verify()
    {
        $sql = 'SELECT id_detalle, id_producto, cantidad_producto, precio_producto, id_pedido
        FROM public."tbDetalle_pedido"
        inner join public."tbPedidos" p using(id_pedido) 
        where id_producto = ? and p.id_cliente = ? And p.estado_pedido not ? or p.estado_pedido not ?';
        $params = array($this->id, $_SESSION['id_cliente'],'0','3');
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        if ($this->imagen) {
            $this->deleteFile($this->getRuta(), $current_image);
        } else {
            $this->imagen = $current_image;
        }

        $sql = 'UPDATE public."tbProductos"
                SET imagen_producto = ?, nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, estado_producto = ?, id_categoria = ?
                WHERE id_producto = ?';
        $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM public."tbProductos"
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM public."tbProductos" INNER JOIN categorias USING(id_categoria)
                GROUP BY nombre_categoria ORDER BY cantidad DESC';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
