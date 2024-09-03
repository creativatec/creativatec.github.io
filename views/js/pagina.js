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
