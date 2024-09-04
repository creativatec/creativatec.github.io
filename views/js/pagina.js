$(function () {
    $('#person-list.nav > li > a').click(function (e) {
        e.preventDefault();

        if ($(this).attr('id') == "view-all") {
            $('div.box').fadeIn('fast'); // Mostrar todos los divs con la clase 'box'
        } else {
            var aRef = $(this).attr('href');
            $('div.box').hide(); // Ocultar todos los divs con la clase 'box'
            $(aRef).fadeIn('fast'); // Mostrar el div correspondiente al enlace clicado
        }

        $('#person-list > li').removeClass('active'); // Quitar la clase 'active' de todos los li
        $(this).parent().addClass('active'); // Añadir la clase 'active' al li padre del enlace clicado
    });

    // Inicializar tablesorter para todas las tablas
    $('table').tablesorter();
    $("[rel=tooltip]").tooltip();
});

function previewImage1(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
    reader.onload = function (e) {
        document.getElementById('uploadPreview' + nb).src = e.target.result;
    };

}

//mostrar Informacion Redes
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloInformacionBasica.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_redes=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_redes"]').value = data.id_redes;
                    document.querySelector('input[name="logo"]').value = data.logo;
                    document.querySelector('input[name="url"]').value = data.url;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar nosotros
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-nosotros');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloNosotros.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_sobre_nosotros=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_nosotros"]').value = data.id_sobre_nosotros;
                    document.querySelector('textarea[name="descripcion"]').value = data.descripcion;
                    document.querySelector('input[name="tituloNosotros"]').value = data.titulo;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar infonosotros
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-infonosotros');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloNosotros.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_info_nosotros=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_info_nosotros"]').value = data.id_info_nosotros;
                    document.querySelector('input[name="cabezera"]').value = data.cabecera;
                    document.querySelector('input[name="titulo"]').value = data.titulo1;
                    document.querySelector('input[name="Subtitulo"]').value = data.titulo2;
                    document.querySelector('textarea[name="descripcionNosotro"]').value = data.descripcion;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar infosobrenosotros
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-infosobrenosotros');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloNosotros.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_info_sobre_nosotros=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_info_sobre_nosotros"]').value = data.id_info_sobre_nosotros;
                    document.querySelector('input[name="logonosotros"]').value = data.logo;
                    document.querySelector('input[name="tituloNosotro"]').value = data.titulo;
                    document.querySelector('textarea[name="descripcionNosotros"]').value = data.descripcion;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar servicio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-servicio');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloServicio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_servicio=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_servicio"]').value = data.id_servicio;
                    document.querySelector('input[name="logo"]').value = data.logo;
                    document.querySelector('input[name="titulo"]').value = data.titulo;
                    document.querySelector('textarea[name="desc"]').value = data.descripcion;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar portafolio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-protafolio');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloPortafolio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_portafolio=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_portafolio"]').value = data.id_portafolio;
                    document.querySelector('textarea[name="descripcionnota"]').value = data.nota;
                    document.querySelector('textarea[name="descripcionporta"]').value = data.descripcion;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//mostrar categoria portafolio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-categoriaprotafolio');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloPortafolio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_categoria_portafolio=' + id
            })
                .then(response => response.json())
                .then(data => {
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_categoria_portafolio"]').value = data.id_categoria_portafolio;
                    document.querySelector('input[name="nombre"]').value = data.nombre;
                    document.querySelector('input[name="data"]').value = data.datafilter;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
//Agregar puntos decimales

$(document).ready(function () {
    $(document).on('keydown', '.decimalInput', function () {
        var id = this.id;
        var splitid = id.split('_');
        var index = splitid[1];

        let cantidad = document.getElementById('precio_' + index + '');
        cantidad.addEventListener("keyup", function () {
            // Eliminar caracteres no numéricos
            let value = cantidad.value.replace(/\D/g, '');

            // Añadir coma para separar miles
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            // Agregar el símbolo de la moneda o unidad
            value = value; // Puedes cambiar 'kg' por el símbolo que desees

            // Establecer el valor formateado en el campo de entrada
            cantidad.value = value;
        });
    });
});
//mostrar proyecto
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-proyecto');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloPortafolio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_proyecto=' + id
            })
                .then(response => response.json())
                .then(data => {
                    var valor = data.Valor;
                    valor = valor.toString();

                    // Convierte el valor en un número flotante y luego lo formatea con dos decimales
                    var formattedValue = parseFloat(valor).toLocaleString('de-DE', { minimumFractionDigits: 0, maximumFractionDigits: 0 });

                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_proyecto"]').value = data.id_proyecto;
                    document.querySelector('img[id="uploadPreview1"]').src = data.logo;
                    document.querySelector('input[name="nombreProyecto"]').value = data.nombre;
                    document.querySelector('textarea[name="descripcion"]').value = data.descripcion;
                    document.querySelector('img[id="uploadPreview2"]').src = data.foto1;
                    document.querySelector('textarea[name="descripcionParr1"]').value = data.descripcion1;
                    document.querySelector('textarea[name="descripcionParr2"]').value = data.descripcion2;
                    document.querySelector('textarea[name="descripcionParr3"]').value = data.descripcion3;
                    document.querySelector('img[id="uploadPreview3"]').src = data.foto2;
                    document.querySelector('input[name="origen"]').value = data.Origen;
                    document.querySelector('input[name="finalizacion"]').value = data.Finalización_Proyecto;

                    // Asigna el valor formateado al campo de valor
                    document.querySelector('input[name="valor"]').value = formattedValue;

                    document.querySelector('input[name="dise"]').value = data.Disenador;

                    // Asigna los valores a los inputs ocultos o de tipo file
                    document.querySelector('input[name="uploadImage1"]').value = data.logo;
                    document.querySelector('input[name="uploadImage2"]').value = data.foto1;
                    document.querySelector('input[name="uploadImage3"]').value = data.foto2;

                    // Selecciona la opción correcta del select
                    const selectCategoria = document.querySelector('select[name="id_categoria_portafolio"]');
                    selectCategoria.value = data.id_categoria_portafolio;
                })
                .catch(error => console.error('Error:', error));

        });
    });
});
//mostrar precio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-precio');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloPrecio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_precio=' + id
            })
                .then(response => response.json())
                .then(data => {
                    var valor = data.precio;
                    valor = valor.toString();

                    // Convierte el valor en un número flotante y luego lo formatea con dos decimales
                    var formattedValue = parseFloat(valor).toLocaleString('de-DE', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                    // Asigna los valores obtenidos a los campos de entrada
                    document.querySelector('input[name="id_precio"]').value = data.id_precio;
                    document.querySelector('input[name="etiqueta"]').value = data.etiqueta;
                    document.querySelector('input[name="nomEtiqueta"]').value = data.nombre_etiqueta;
                    document.querySelector('input[name="estilo"]').value = data.estilo;
                    document.querySelector('input[name="descripcion"]').value = data.descripcion_estilo;
                    document.querySelector('input[name="precioValor"]').value = formattedValue;
                    document.querySelector('input[name="dura"]').value = data.duracion;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

//mostrar precio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-lista');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloPrecio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_lis_precio=' + id
            })
            .then(response => response.json())
            .then(data => {
                
                // Asigna los valores obtenidos a los campos de entrada
                document.querySelector('input[name="id_lista"]').value = data.id_lis_precio;
                document.querySelector('input[name="descripcionPrecio"]').value = data.descripcion;

                // Selecciona la opción correcta del select
                const selectCategoria = document.querySelector('select[name="id_precio"]');
                selectCategoria.value = data.id_precio;
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

//mostrar precio
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button-cliente');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Realiza una llamada AJAX para obtener los datos
            fetch('models/modeloCliente.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_cliente=' + id
            })
            .then(response => response.json())
            .then(data => {
                
                // Asigna los valores obtenidos a los campos de entrada
                document.querySelector('input[name="id_cliente"]').value = data.id_cliente;
                document.querySelector('input[name="Nomcliente"]').value = data.nombre_cliente;
                document.querySelector('input[name="tel"]').value = data.tel;
                document.querySelector('input[name="dire"]').value = data.dire;
                document.querySelector('input[name="proy"]').value = data.proyecto;
                document.querySelector('input[name="uploadImage1"]').value = data.logo;
                document.querySelector('img[id="uploadPreview2"]').src = data.logo;
            })
            .catch(error => console.error('Error:', error));
        });
    });
});