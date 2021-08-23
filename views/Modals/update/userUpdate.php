<!-- modalUsuarios -->
<div class="modal fade" id="user-update" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo constant('URL'); ?>/usuarios/registrarUsuario">
          <div class="row mb-4">
            <div class="col-md-6">
              <label for="Nombre">Nombre </label>
              <input class="form-control" type="text" name="Nombre" id="Nombre" required="" placeholder="Nombre" value="<?php echo $user->getName(); ?>">
            </div>
          </div>
          <div class="">

            <div class="clearfix"></div>
            <div class="col-md-11 mb-1">
              <label id="Email">Email</label>
              <input class="form-control" type="text" name="Email" id="Email" required="" placeholder="Email" value="<?php echo $user->getEmail(); ?>">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-11 mb-1">
              <label for="inputState">Ciudad</label>
              <select id="inputState" class="form-control">
                <option selected>Seleccionar</option>
                <option selected><?php echo $user->getCiudad(); ?></option>
                <option>Aguachica Cesar</option>
                <option>Apartadó Antioquia</option>
                <option>Arauca</option>
                <option>Armenia Quindío</option>
                <option>Barrancabermeja Santander</option>
                <option>Barranquilla Atlántico</option>
                <option>Bello Antioquia</option>
                <option>Bogotá Distrito Capital</option>
                <option>Bucaramanga Santander</option>
                <option>Buenaventura Valle del Cauca</option>
                <option>Buga Valle del Cauca</option>
                <option>Cali Valle del Cauca</option>
                <option>Cartago Valle del Cauca</option>
                <option>Cartagena Bolívar</option>
                <option>Caucasia Antioquia</option>
                <option>Cereté Córdoba</option>
                <option>Chia Cundinamarca</option>
                <option>Ciénaga Magdalena</option>
                <option>Cúcuta Norte de Santander</option>
                <option>Dosquebradas Risaralda</option>
                <option>Duitama Boyacá</option>
                <option>Envigado Antioquia</option>
                <option>Facatativá Cundinamarca</option>
                <option>Florencia Caqueta</option>
                <option>Floridablanca Santander</option>
                <option>Fusagasugá Cundinamarca</option>
                <option>Girardot Cundinamarca</option>
                <option>Girón Santander</option>
                <option>Ibagué Tolima</option>
                <option>Ipiales Nariño</option>
                <option>Itagüí Antioquia</option>
                <option>Jamundí Valle del Cauca</option>
                <option>Lorica Córdoba</option>
                <option>Los Patios Norte de Santander</option>
                <option>Magangué Bolivar</option>
                <option>Maicao Guajira</option>
                <option>Malambo Atlántico</option>
                <option>Manizales Caldas</option>
                <option>Medellín Antioquia</option>
                <option>Melgar Tolima</option>
                <option>Montería Córdoba</option>
                <option>Neiva Huila</option>
                <option>Ocaña Norte de Santander</option>
                <option>Paipa, Boyacá</option>
                <option>Palmira Valle del Cauca</option>
                <option>Pamplona Norte de Santander</option>
                <option>Pasto Nariño</option>
                <option>Pereira Risaralda</option>
                <option>Piedecuesta Santander</option>
                <option>Pitalito Huila</option>
                <option>Popayán Cauca</option>
                <option>Quibdó Choco</option>
                <option>Riohacha Guajira</option>
                <option>Rionegro Antioquia</option>
                <option>Sabanalarga Atlántico</option>
                <option>Sahagún Córdoba</option>
                <option>San Andrés Isla</option>
                <option>Santa Marta Magdalena</option>
                <option>Sincelejo Sucre</option>
                <option>Soacha Cundinamarca</option>
                <option>Sogamoso Boyacá</option>
                <option>Soledad Atlántico</option>
                <option>Tibú Norte de Santander</option>
                <option>Tuluá Valle del Cauca</option>
                <option>Tumaco Nariño</option>
                <option>Tunja Boyacá</option>
                <option>Turbo Antioquia</option>
                <option>Valledupar Cesar</option>
                <option>Villa de leyva</option>
                <option>Villa del Rosario Norte de Santander</option>
                <option>Villavicencio Meta</option>
                <option>Yopal Casanare</option>
                <option>Yumbo Valle del Cauca</option>
                <option>Zipaquirá Cundinamarca</option>
              </select>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-11 mb-1">
              <label for="Direccion">Direccion</label>
              <input class="form-control" type="text" required="" name="Direccion" id="Direccion" placeholder="Direccion" value="<?php echo $user->getDireccion(); ?>">
            </div>
            <div class="clearfix"></div>
            <div class="col-md-11 mb-1">
              <label for="Telefono">Telefono</label>
              <input class="form-control" type="text" required="" name="Telefono" id="Telefono" placeholder="Telefono" value="<?php echo $user->getTelefono(); ?>">
            </div>
            <div class="clearfix"></div>
            <div class="col-md-11 mb-1">
              <label for="FechaNa">Fecha Nacimiento</label>
              <input class="form-control" type="date" required="" name="FechaNa" id="FechaNa" placeholder="Fecha de Nacimiento" value="<?php echo $user->getFechaNacimiento(); ?>">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="tile-footer">
            <div class="col-md-12">
              <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-check-circle"></i> Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modalViewCliente -->
<div class="modal fade" id="modalViewCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Identificacioón Tributaria:</td>
              <td id="celIde">Larry</td>
            </tr>
            <tr>
              <td>Nombre Fiscal:</td>
              <td id="celNomFiscal">Larry</td>
            </tr>
            <tr>
              <td>Dirección Fiscal:</td>
              <td id="celDirFiscal">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>