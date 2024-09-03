<?php

class ModeloViews
{
    private $directorioModulos = 'views/moduls/';
    private $directorioAlternativo = 'views/moduls/admin/';
    private $directorioSistema = 'views/moduls/sistema/';
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

        // Construir la ruta completa del módulo
        $moduloRuta = $directorioBase . $enlace . '.php';

        // Verificar si el módulo existe en la lista de módulos válidos y en el directorio correspondiente
        if (in_array($enlace, $this->modulosValidos) && file_exists($moduloRuta)) {
            return $moduloRuta;
        } else {
            // Retornar 404 si no se encuentra el módulo
            return $this->directorioModulos . '404.php';
        }
    }
}

