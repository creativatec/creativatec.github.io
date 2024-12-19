<?php

class ModeloViews
{

    private $directorioSistema = 'views/moduls/sistema/';
    private $directorioAlternativo = 'views/moduls/admin/';
    private $directorioModulos = 'views/moduls/';
    private $modulosValidos = [];

    public function __construct()
    {
        // Cargar los módulos válidos según las condiciones de sesión
        if (isset($_SESSION['validarPagina'])) {
            $this->cargarModulosValidos($this->directorioAlternativo);
        } elseif (isset($_SESSION['validar'])) {
            $this->cargarModulosValidos($this->directorioSistema);
        } else {
            $this->cargarModulosValidos($this->directorioModulos);
        }
    }

    private function cargarModulosValidos($directorio)
    {
        // Abrir el directorio y leer los archivos
        if ($handle = opendir($directorio)) {
            while (false !== ($entry = readdir($handle))) {
                // Ignorar los directorios '.' y '..'
                if ($entry != '.' && $entry != '..' && pathinfo($entry, PATHINFO_EXTENSION) == 'php') {
                    // Agregar el nombre del archivo sin la extensión a la lista de módulos válidos
                    $this->modulosValidos[] = pathinfo($entry, PATHINFO_FILENAME);
                }
            }
            closedir($handle);
        }
    }


    public function enlacePagina($enlace)
    {
        // Definir el directorio base según las condiciones de sesión
        if (isset($_SESSION['validarPagina'])) {
            $directorioBase = $this->directorioAlternativo;
        } elseif (isset($_SESSION['validar'])) {
            $directorioBase = $this->directorioSistema;
        } else {
            $directorioBase = $this->directorioModulos;
        }

        // Definir las rutas de redirección según el valor de $enlace
        switch ($enlace) {
            case 'pedidoCancelado':
                $modulo = 'domicilioPedido.php';
                break;
            case 'agregarUsuario':
            case 'eliminarUsuario':
            case 'actualizarUsuario':
                if (isset($_SESSION['rol'])) {
                    $modulo = 'usuario.php';
                } else {
                    $modulo = 'inicio.php';
                }
                break;
            case 'agregarCliente':
            case 'eliminarCliente':
            case 'actualizarCliente':
                $modulo = 'cliente.php';
                break;
            case 'loginFallido':
            case 'loginInactivo':
            case 'LoginSuspendidoPorPago':
                $modulo = 'ingresar.php';
                break;
            case 'agregarLocal':
            case 'eliminarLocal':
            case 'actualizarLocal':
                if (isset($_SESSION['rol'])) {
                    $modulo = 'local.php';
                } else {
                    $modulo = 'inicio.php';
                }
                break;
            case 'agregarProeevedor':
            case 'eliminarProeevedor':
            case 'actualizarProeevedor':
                $modulo = 'proeevedor.php';
                break;
            case 'agregarCategoria':
            case 'actualizarCategoria':
                $modulo = 'categoria.php';
                break;
            case 'agregarMedida':
            case 'actualizarMedida':
                $modulo = 'medida.php';
                break;
            case 'agregarIngrediente':
            case 'eliminarIngredeinte':
            case 'actualizarIngrediente':
                $modulo = 'ingredientes.php';
                break;
            case 'agregarProducto':
            case 'eliminarProducto':
            case 'actualizarProducto':
                $modulo = 'productos.php';
                break;
            case 'agregarIngredienteProducto':
            case 'eliminarProducto_ingrediente':
                $modulo = 'ingrediente_Producto.php';
                break;
            case 'agregarPromocion':
            case 'eliminarPromocion':
            case 'actualizarPromocion':
                $modulo = 'promocion.php';
                break;
            case 'agregarMesa':
            case 'eliminarMesa':
                $modulo = 'mesas.php';
                break;
            case 'agregarPedidor':
            case 'actualizoMesa':
                $modulo = 'pedido.php';
                break;
            case 'agregarNomina':
                $modulo = 'nomina.php';
                break;
            case 'productoDevuelto':
            case 'FacturaCancelada':
                $modulo = 'devoluciones.php';
                break;
            case 'agregarGasto':
            case 'actualizarGasto':
            case 'eliminarGasto':
                $modulo = 'gastos.php';
                break;
            case 'okOrden':
            case 'actuaOrden':
                $modulo = 'ordenPedido.php';
                break;
            default:
                $modulo = $enlace . '.php';
                break;
        }

        // Construir la ruta completa del módulo
        $moduloRuta = $directorioBase . $modulo;

        // Verificar si el módulo existe en la lista de módulos válidos y en el directorio correspondiente
        if (in_array(pathinfo($modulo, PATHINFO_FILENAME), $this->modulosValidos) && file_exists($moduloRuta)) {
            return $moduloRuta;
        } else {
            // Retornar 404 si no se encuentra el módulo
            if (isset($_SESSION['validarPagina'])) {
                return $this->directorioAlternativo . '404.php';
            }elseif (isset($_SESSION['validar'])) {
                return $this->directorioSistema . '404.php';
            } else {
                return $this->directorioModulos . '404.php';
            }
        }
    }
}
