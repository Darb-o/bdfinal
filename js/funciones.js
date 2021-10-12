$(document).ready(function() {
    llenarMunicipio();
    llenarAfiliacion();
})

function llenarMunicipio() {
    let insercion = `<select class="form-control form-select-md" id="uMunicipio" aria-label="Floating label select example">`;
    let opcion = 1;
    $.ajax({
        url: "bd/peticiones.php",
        type: "POST",
        dataType: "JSON",
        data: { opcion: opcion },
        success: function(data) {
            if (data != null) {
                for (i in data) {
                    insercion += `<option value="${data[i].idmunicipio}">${data[i].municipio}</option>`;
                }
                insercion += `</select><label for="floatingSelect">Seleccione su municipio de residencia</label>`;
                $("#selectMunicipio").append(insercion);
            }
        },
    });
}

function llenarAfiliacion() {
    let insercion = `<select class="form-control form-select-md" id="uAfiliacion" aria-label="Floating label select example">`;
    let opcion = 2;
    $.ajax({
        url: "bd/peticiones.php",
        type: "POST",
        dataType: "JSON",
        data: { opcion: opcion },
        success: function(data) {
            if (data != null) {
                for (i in data) {
                    insercion += `<option value="${data[i].idafiliacion}">${data[i].tipoafiliacion}</option>`;
                }
                insercion += `</select><label for="floatingSelect">Seleccione su tipo de afiliacion</label>`;
                $("#selectAfiliacion").append(insercion);
            }
        },
    });
}

$("#formRegistrarse").submit(function(e) {
    e.preventDefault();
    let opcion = 3
    let uId = $.trim($("#uId").val());
    let uNombre = $.trim($("#uNombre").val());
    let uDireccion = $.trim($("#uDireccion").val());
    let uTelefono = $.trim($("#uTelefono").val());
    let uPassword = $.trim($("#uPassword").val());
    let uMunicipio = $.trim($("#uMunicipio").val());
    let uAfiliacion = $.trim($("#uAfiliacion").val());
    Swal.fire({
        title: 'Confirmar datos',
        text: `Nombre: ${uNombre}, Identificacion: ${uId}, Telefono: ${uTelefono}, Direccion: ${uDireccion}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Registrame!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'bd/peticiones.php',
                type: 'POST',
                dataType: 'JSON',
                data: { opcion: opcion, uId: uId, uNombre: uNombre, uDireccion: uDireccion, uTelefono: uTelefono, uPassword: uPassword, uMunicipio: uMunicipio, uAfiliacion: uAfiliacion },
                success: function(data) {
                    console.log(data);
                    if (data == null) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: `Usuario ${uNombre} registrado con exito`
                        })
                        $("#formRegistrarse").trigger("reset")
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Usuario ya registrado',
                            text: 'El usuario ya esta registrado, acceda con su cuenta o verifique sus datos',
                        })
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 0) {
                        alert('Not connect: Verify Network.');
                    } else if (jqXHR.status == 404) {
                        alert('Requested page not found [404]');
                    } else if (jqXHR.status == 500) {
                        alert('Internal Server Error [500].');
                    } else if (textStatus === 'parsererror') {
                        alert('Requested JSON parse failed.');
                    } else if (textStatus === 'timeout') {
                        alert('Time out error.');
                    } else if (textStatus === 'abort') {
                        alert('Ajax request aborted.');
                    } else {
                        alert('Uncaught Error: ' + jqXHR.responseText);
                    }
                }
            });
        }
    })
});

$("#formInicioSesion").submit(function(e) {
    e.preventDefault();
    let opcion = 4;
    let uId = $.trim($("#inicioUsuario").val());
    let uPassword = $.trim($("#inicioClave").val());
    $.ajax({
        url: 'bd/peticiones.php',
        type: 'POST',
        dataType: 'JSON',
        data: { opcion: opcion, uId: uId, uPassword: uPassword },
        success: function(data) {
            if (data == null) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Identificacion o contraseña incorrectos'
                })
            } else {
                opcion = data[0].rol_fk;
                if (opcion == 2) {
                    window.location.href = 'usuario.php';
                } else {
                    window.location.href = 'medico.php';
                }
            }
        },
    });
});

$("#btnCerrarSesion").click(function(e) {
    let opcion = 5;
    e.preventDefault();
    Swal.fire({
        title: 'Estas seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, cierra la sesion!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'bd/peticiones.php',
                type: 'POST',
                dataType: 'JSON',
                data: { opcion: opcion }
            });
            window.location.href = 'index.php';
        }
    })
});