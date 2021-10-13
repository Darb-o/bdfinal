$(document).ready(function() {
    llenarEmpleado();
    llenarMunicipio();
    llenarTipoMedico();
    llenarEspecialidad();
    $("#selectTipoMedico").hide();
    $("#selectEspecialidad").hide();
    $("#inicioContrato").hide();
    $("#terminaContrato").hide();
    $("#inicioVacaciones").show();
    $("#terminaVacaciones").show();
})

function llenarEmpleado() {
    let insercion = `<select class="form-control form-select-md" id="listaEmpleado" aria-label="Floating label select example">`;
    let opcion = 1;
    $.ajax({
        url: "bd/otraspeticiones.php",
        type: "POST",
        dataType: "JSON",
        data: { opcion: opcion },
        success: function(data) {
            if (data != null) {
                for (i in data) {
                    insercion += `<option value="${data[i].idtipoempleado}">${data[i].empleado}</option>`;
                }
                insercion += `</select><label for="floatingSelect">Empleado a registrar:</label>`;
                $("#selectEmpleado").append(insercion);
            }
        },
    });
}

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

function llenarTipoMedico() {
    let insercion = `<select class="form-control form-select-md" id="listaTipoMedico" aria-label="Floating label select example">`;
    let opcion = 2;
    $.ajax({
        url: "bd/otraspeticiones.php",
        type: "POST",
        dataType: "JSON",
        data: { opcion: opcion },
        success: function(data) {
            if (data != null) {
                for (i in data) {
                    insercion += `<option value="${data[i].idtipomedico}">${data[i].tipomedico}</option>`;
                }
                insercion += `</select><label for="floatingSelect">Seleccione el tipo de medico</label>`;
                $("#selectTipoMedico").append(insercion);
            }
        },
    });
}

function llenarEspecialidad() {
    let insercion = `<select class="form-select" id="mEspecialidad" aria-label="Floating label select example">`;
    let opcion = 6;
    $.ajax({
        url: "bd/peticiones.php",
        type: "POST",
        dataType: "JSON",
        data: { opcion: opcion },
        success: function(data) {
            if (data != null) {
                for (i in data) {
                    insercion += `<option value="${data[i].idespecialidad}">${data[i].especialidad}</option>`;
                }
                insercion += `</select><label for="floatingSelect">Seleccione la especialidad del medico</label>`;
                $("#selectEspecialidad").append(insercion);
            }
        },
    });
}

$("#selectEmpleado").change(function() {
    let valor = $("#listaEmpleado").val();
    let texto = $("#listaEmpleado option:selected").html();
    let inputLicencia = $("#medicoLicencia");
    $("#inicioVacaciones").show();
    $("#terminaVacaciones").show();
    if (valor === 2 || texto === 'medico') {
        inputLicencia.prop('type', 'number');
        inputLicencia.prop('required', true);
        $("#selectTipoMedico").show();
        $("#selectEspecialidad").show();
        $("#inicioContrato").show();
        $("#terminaContrato").show();
    } else {
        inputLicencia.prop('type', 'hidden');
        inputLicencia.prop('required', false);
        $("#selectTipoMedico").hide();
        $("#selectEspecialidad").hide();
        $("#inicioContrato").hide();
        $("#terminaContrato").hide();
    }
});

$("#selectTipoMedico").change(function() {
    let tipomedico = $("#listaTipoMedico").val();
    let textotipomedico = $("#listaTipoMedico option:selected").html();
    if (tipomedico === 2 || textotipomedico === 'sustituto') {
        $("#inicioContrato").hide();
        $("#terminaContrato").hide();
        $("#inicioVacaciones").hide();
        $("#terminaVacaciones").hide();

    } else {
        $("#inicioContrato").show();
        $("#terminaContrato").show();
        $("#inicioVacaciones").show();
        $("#terminaVacaciones").show();
    }
});

$("#formRegistrarEmpleado").submit(function(event) {
    event.preventDefault();
    let idTipoEmpleado = $("#listaEmpleado").val();
    let textoTipoEmpleado = $("#listaEmpleado option:selected").html();
    let idEmpleado = $("#empleadoId").val();
    let nombre = $("#empNombre").val();
    let direccion = $("#empDireccion").val();
    let telefono = $("#empTelefono").val();
    let clave = $("#empPassword").val();
    let municipio = $("#uMunicipio").val();
    let fechaInicioVacaciones = $("#fechaIniciaVacaciones").val();
    let fechaTerminaVacaciones = $("#fechaTerminaVacaciones").val();

    if (idEmpleado != "" && nombre != "" && direccion != "" && telefono != "" && clave != "" && fechaInicioVacaciones != "" && fechaTerminaVacaciones != "") {
        if (fechaInicioVacaciones < fechaTerminaVacaciones) {
            if (idTipoEmpleado === 2 || textoTipoEmpleado === 'medico') {
                let numLicencia = $("#medicoLicencia").val();
                let idTipoMedico = $("#listaTipoMedico").val();
                let textotipomedico = $("#listaTipoMedico option:selected").html();
                let especialidad = $("#mEspecialidad").val();
                if (idTipoMedico != 2 || textotipomedico != 'sustituto') {
                    let fechaInicioContrato = $("#fechaIniciaContrato").val();
                    let fechaTerminaContrato = $("#fechaTerminaContrato").val();
                    if (fechaInicioContrato < fechaTerminaContrato) {
                        console.log("va a ingresar un medico que no es sustituto");
                        console.log(idTipoEmpleado + " , " + idEmpleado + " , " + nombre + " , " + direccion + " , " + telefono + " , " + clave + " , " + municipio + " , " + fechaInicioVacaciones + " , " + fechaTerminaVacaciones + " , " + numLicencia + " , " + idTipoMedico + " , " + especialidad + " , " + fechaInicioContrato + " , " + fechaTerminaContrato);
                        opcion = 3;
                        $.ajax({
                            url: "bd/otraspeticiones.php",
                            type: "POST",
                            dataType: "JSON",
                            data: { opcion: opcion },
                            success: function(data) {
                                (async() => {
                                    const { value: formValues } = await Swal.fire({
                                        title: 'Horarios medico',
                                        html: `
                                    <label class="swal2-label">Lunes: </label><br>
                                    <select class="swal2-select" id="selectHorarioLunes" name="selectHorarioLunes" required></select> <br><br>
                                    <label class="swal2-label">Martes: </label><br>
                                    <select class="swal2-select" id="selectHorarioMartes" name="selectHorarioMartes" required></select> <br><br>
                                    <label class="swal2-label">Miercoles: </label><br>
                                    <select class="swal2-select" id="selectHorarioMiercoles" name="selectHorarioMiercoles" required></select><br><br>
                                    <label class="swal2-label">Jueves: </label><br>
                                    <select class="swal2-select" id="selectHorarioJueves" name="selectHorarioJueves" required></select> <br><br>
                                    <label class="swal2-label">Viernes: </label><br>
                                    <select class="swal2-select" id="selectHorarioViernes" name="selectHorarioViernes" required></select> <br><br>
                                    <label class="swal2-label">Sabado: </label><br>
                                    <select class="swal2-select" id="selectHorarioSabado" name="selectHorarioSabado" required></select> <br><br>
                                    <label class="swal2-label">Domingo: </label><br>
                                    <select class="swal2-select" id="selectHorarioDomingo" name="selectHorarioDomingo" required></select> <br><br>                                 
                                    `,
                                        allowOutsideClick: false,
                                        didOpen: () => {
                                            captura = $("#selectHorarioLunes");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioMartes");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioMiercoles");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioJueves");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioViernes");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioSabado");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                            captura = $("#selectHorarioDomingo");
                                            insercion = `<option value="no">ninguno</option>`;
                                            captura.append(insercion);
                                            for (id in data) {
                                                insercion = `<option value="${data[id].idhorario}">${data[id].tipohorario} - ${data[id].horainicio} a ${data[id].horafinal}</option>`
                                                captura.append(insercion);
                                            }
                                        },
                                        preConfirm: () => {
                                            return new Promise(function(resolve) {
                                                resolve([
                                                    $("#selectHorarioLunes").val(),
                                                    $("#selectHorarioMartes").val(),
                                                    $("#selectHorarioMiercoles").val(),
                                                    $("#selectHorarioJueves").val(),
                                                    $("#selectHorarioViernes").val(),
                                                    $("#selectHorarioSabado").val(),
                                                    $("#selectHorarioDomingo").val(),
                                                ]);
                                            });
                                        }
                                    })

                                    if (formValues) {
                                        console.log(formValues);
                                        opcion = 4;
                                        $.ajax({
                                            url: "bd/otraspeticiones.php",
                                            type: "POST",
                                            dataType: "JSON",
                                            data: { opcion: opcion, uId: idEmpleado, uNombre: nombre, uDireccion: direccion, uMunicipio: municipio, uTelefono: telefono, uPassword: clave, tipoEmpleado: idTipoEmpleado, inicioVacaciones: fechaInicioVacaciones, terminaVacaciones: fechaTerminaVacaciones, licenciaMedico: numLicencia, tipoMedico: idTipoMedico, inicioContrato: fechaInicioContrato, terminaContrato: fechaTerminaContrato, especialidad: especialidad, lunes: formValues[0], martes: formValues[1], miercoles: formValues[2], jueves: formValues[3], viernes: formValues[4], sabado: formValues[5], domingo: formValues[6] },
                                            success: function(data) {
                                                if (data != null) {
                                                    alerta('error', 'Empleado ya registrado');
                                                } else {
                                                    alerta('success', 'Empleado registrado con exito');
                                                    $("#formRegistrarEmpleado").trigger('reset');
                                                }
                                            }
                                        });
                                    }
                                })()
                            },
                        });
                        /*$.ajax({
                            url: "bd/otraspeticiones.php",
                            type: "POST",
                            dataType: "JSON",
                            data: { opcion: opcion },
                            success: function(data) {

                            },
                        });*/
                    } else {
                        alerta('error', 'La fecha de inicio contrato no puede ser mayor a la de termina');
                    }
                } else {
                    console.log("va a ingresar un medico que es sustituto");
                    console.log(idTipoEmpleado + " , " + idEmpleado + " , " + nombre + " , " + direccion + " , " + telefono + " , " + clave + " , " + municipio + " , " + numLicencia + " , " + idTipoMedico + " , " + especialidad);
                    opcion = 5;
                    $.ajax({
                        url: "bd/otraspeticiones.php",
                        type: "POST",
                        dataType: "JSON",
                        data: { opcion: opcion, uId: idEmpleado, uNombre: nombre, uDireccion: direccion, uMunicipio: municipio, uTelefono: telefono, uPassword: clave, tipoEmpleado: idTipoEmpleado, licenciaMedico: numLicencia, tipoMedico: idTipoMedico, especialidad: especialidad },
                        success: function(data) {
                            if (data != null) {
                                alerta('error', 'Empleado ya registrado');
                            } else {
                                alerta('success', 'Empleado registrado con exito');
                                $("#formRegistrarEmpleado").trigger('reset');
                            }
                        }
                    });
                }
            } else {
                console.log("va a ingresar un empleado");
                console.log(idTipoEmpleado + " , " + idEmpleado + " , " + nombre + " , " + direccion + " , " + telefono + " , " + clave + " , " + municipio + " , " + fechaInicioVacaciones + " , " + fechaTerminaVacaciones);
                opcion = 6;
                $.ajax({
                    url: "bd/otraspeticiones.php",
                    type: "POST",
                    dataType: "JSON",
                    data: { opcion: opcion, uId: idEmpleado, uNombre: nombre, uDireccion: direccion, uMunicipio: municipio, uTelefono: telefono, uPassword: clave, tipoEmpleado: idTipoEmpleado, inicioVacaciones: fechaInicioVacaciones, terminaVacaciones: fechaTerminaVacaciones },
                    success: function(data) {
                        if (data != null) {
                            alerta('error', 'Empleado ya registrado');
                        } else {
                            alerta('success', 'Empleado registrado con exito');
                            $("#formRegistrarEmpleado").trigger('reset');
                        }
                    }
                });
            }
        } else {
            alerta('error', 'La fecha de inicio vacaciones no puede ser mayor a la de termina');
        }
    } else {
        alerta('error', 'Faltan campos por ingresar');
    }


})

function alerta(tipo, mensaje) {
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
        icon: tipo,
        title: mensaje
    })
}