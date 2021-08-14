<!-- Modal Formulario-->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <h2 class="modal-title" id="exampleModalLongTitle"> Nuevo Usuario</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <div>
                    <!--Formulario-->
                    <form action="<?php echo constant('URL'); ?>/usuarios/crearUsuario" method="POST" class="row g-3 needs-validation col" id="Formulario">
                        <div class="col-12 col-md-4">
                            <label for="id">Documento</label>.
                            <input type="text" name="documento" id="id" class="form-control" placeholder="Documento" required="">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required="">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required="">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="correo">Email</label>
                            <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required="">
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="validationCustom03" required="" name="password">
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        

                        <div class="col-12 col-md-4">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required="">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required="">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="telefono">Fecha Nacimiento</label>
                            <input type="date" name="fechanacimiento" id="FechaNacimiento" class="form-control" placeholder="FechaNAcimiento" required="">
                        </div>

                        <div class="col-12 col-md-">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese Usuario" required="">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="btnAgregar" class="btn btn-info"><i class="fas fa-plus-circle"></i> Agregar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                        </div>

                    </form>
                </div>

            </section>
        </div>
    </div>

</div>
