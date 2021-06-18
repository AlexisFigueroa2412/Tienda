<?php
/*
*	Clase para manejar las tablas pedidos y detalle_pedido de la base de datos. Es clase hija de Validator.
*/
class Pedidos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_pedido = null;
    private $id_detalle = null;
    private $cliente = null;
    private $producto = null;
    private $cantidad = null;
    private $precio = null;
    private $estado = null; // Valor por defecto en la base de datos: 0
    /*
    *   ESTADOS PARA UN PEDIDO
    *   0: Pendiente. Es cuando el pedido esta en proceso por parte del cliente y se puede modificar el detalle.
    *   1: Finalizado. Es cuando el cliente finaliza el pedido y ya no es posible modificar el detalle.
    *   2: Entregado. Es cuando la tienda ha entregado el pedido al cliente.
    *   3: Anulado. Es cuando el cliente se arrepiente de haber realizado el pedido.
    */

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdPedido($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_pedido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle = $value;
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

    public function setProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->producto = $value;
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

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 1)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    // Método para verificar si existe un pedido pendiente del cliente para seguir comprando, de lo contrario crea uno.
    public function readOrder()
    {
        $sql = 'SELECT id_pedido
                FROM public."tbPedidos"
                WHERE estado_pedido = ? AND id_cliente = ?';
        $params = array('0',$this->cliente);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_pedido = $data['id_pedido'];
            return true;
        } else {
            $sql = 'INSERT INTO public."tbPedidos"(id_cliente)
                    VALUES(?)';
            $params = array($this->cliente);
            // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
            if ($this->id_pedido = Database::getLastRow($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Método para agregar un producto al carrito de compras.
    public function createDetail()
    {
        $sql = 'INSERT INTO public."tbDetalle_pedido"(id_producto, precio_producto, cantidad_producto, id_pedido)
                VALUES(?, ?, ?, ?)';
        $params = array($this->producto, $this->precio, $this->cantidad, $this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    // Método para obtener los productos que se encuentran en el carrito de compras.
    public function readCart()
    {
        $sql = 'SELECT id_detalle, id_producto, nombre_producto, foto, public."tbDetalle_pedido".precio_producto, public."tbDetalle_pedido".cantidad_producto, cantidad_total as limite
        FROM public."tbPedidos" INNER JOIN public."tbDetalle_pedido" USING(id_pedido) INNER JOIN public."tbProductos" USING(id_producto)
        WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRows($sql, $params);
    }

    // Método para finalizar un pedido por parte del cliente.
    public function finishOrder()
    {
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $sql = 'UPDATE public."tbPedidos"
                SET estado_pedido = ?, fecha_pedido = ?
                WHERE id_pedido = ?';
        $params = array('1', $date, $this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    // Método para actualizar la cantidad de un producto agregado al carrito de compras.
    public function updateDetail()
    {
        $sql = 'UPDATE public."tbDetalle_pedido"
                SET cantidad_producto = ?
                WHERE id_pedido = ? AND id_detalle = ?';
        $params = array($this->cantidad, $this->id_pedido, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    public function restarCatalogo()
    {
        $sql = 'UPDATE public."tbProductos"
                SET cantidad_total = (select cantidad_total from public."tbProductos" where id_producto=?)-?
                WHERE id_producto = ? ';
        $params = array($this->producto, $this->cantidad, $this->producto);
        return Database::executeRow($sql, $params);
    }
    public function devolverCatalogo()
    {
        $sql = 'UPDATE public."tbProductos"
        SET cantidad_total = ((select cantidad_total from public."tbProductos" where id_producto = (select id_producto from public."tbDetalle_pedido" where id_detalle = ?)) +(select cantidad_producto from public."tbDetalle_pedido" where id_detalle = ?))
        WHERE id_producto = (select id_producto from public."tbDetalle_pedido" where id_detalle = ?) ';
        $params = array($this->id_detalle, $this->id_detalle, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    // Método para eliminar un producto que se encuentra en el carrito de compras.
    public function deleteDetail()
    {
        $sql = 'DELETE FROM public."tbDetalle_pedido"
                WHERE id_pedido = ? AND id_detalle = ?';
        $params = array($this->id_pedido, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }
}
