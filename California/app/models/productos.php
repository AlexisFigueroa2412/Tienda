<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Productos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cliente = null;
    private $nombre = null;
    private $comentario = null;
    private $valor = null;
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

    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cliente = $value;
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

    public function setComentario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->comentario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setValor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->valor = $value;
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


    //Buscar
    public function searchRows($value)
    {
        $sql = 'SELECT id_producto,categoria,nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto
                FROM public."tbProductos" INNER JOIN public."tbCategorias" USING(id_categoria)
                WHERE nombre_producto ILIKE ? OR descripcion_producto ILIKE ?
                ORDER BY nombre_producto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    
    //Crear Producto
    public function createRow()
    {
        $sql = 'INSERT INTO public."tbProductos"(nombre_producto, id_categoria, precio_producto, descripcion_producto, cantidad_total, estado_producto, marca_producto, foto)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre,$this->tipo, $this->precio, $this->descripcion, $this->cantidad, $this->estado, $this->marca, $this->foto);
        return Database::executeRow($sql, $params);
    }

    //Crear comentario
    public function createComent()
    {
        $sql = 'INSERT INTO public."tbValoracion"(id_cliente, id_producto, comentario, calificacion)
                VALUES( ?, ?, ?, ?)';
        $params = array($this->cliente,$this->id, $this->comentario, $this->valor);
        return Database::executeRow($sql, $params);
    }

    //Ver todos los productos
    public function readAll()
    {
        $sql = 'SELECT id_producto,categoria,nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto
                FROM public."tbProductos" INNER JOIN public."tbCategorias" USING(id_categoria)
                ORDER BY nombre_producto ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Leer solo un producto
    public function readOne()
    {
        $sql = 'SELECT id_producto,categoria,nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto
        FROM public."tbProductos" INNER JOIN public."tbCategorias" USING(id_categoria)
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Promedio de las valoraciones
    public function averageOne()
    {
        $sql = 'SELECT avg(calificacion) 
        FROM public."tbValoracion";
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Comentarios
    public function Coments()
    {
        $sql = 'SELECT comentario as prueba
        FROM public."tbValoracion" 
	    inner join public."tbClientes" using(id_cliente) 
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Comentarios
    public function ComentsReport()
    {
        $sql = 'SELECT comentario as prueba, calificacion as val, CONCAT(nombre_cliente, apellido_cliente) AS cliente 
        FROM public."tbValoracion" 
	    inner join public."tbClientes" using(id_cliente) 
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    
    //Sirve para verificar si el usuario que comentara, compro antes el producto
    public function verify()
    {
        $sql = 'SELECT id_detalle, id_producto, cantidad_producto, precio_producto, id_pedido
        FROM public."tbDetalle_pedido"
        inner join public."tbPedidos" p using(id_pedido) 
        where id_producto = ? and p.id_cliente = ? And p.estado_pedido = ? or p.estado_pedido = ?';
        $params = array($this->id,$this->cliente,'1','2');
        return Database::getRow($sql, $params);
    }

    //Actualizar producto
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

    //Borrar Producto
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
