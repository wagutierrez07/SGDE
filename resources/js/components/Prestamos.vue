<template>
<div>
    <div class="row">
    <div class="col-4 col-xs-12">
      <i class="fas fa-desktop fa-2x marco-icono p-3" data-fa-transform="shrink-8"></i>
    </div>
    <div class="col-4 col-xs-12">
      <hgroup class="text-center">
        <h1 class="fw-bold">Prestamos</h1>
        <h2 class="fw-normal h5 text-muted">Lista de Prestamos</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">
       <a href="" class="btn btn-primary btn-claro fw-bold modal-button-rigth">
          <i class="fas fa-backward mx-2"></i>
          <label class="texto-button">Volver</label>
        </a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-claro-success fw-bold modal-button-left" data-toggle="modal" data-target="#registrarPrestamo">
      <i class="fas fa-plus mx-2"></i>
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="registrarPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form>
<div class="modal-body p-4 text-center" >

          <div class="container">
            <div class="row row cols-2">
              <div class="col-6 my-2">
                <label for="pres_salida" class="fw-normal">Código de Salida</label>
                <input id="pres_salida" placeholder="Código de Salida" class="form-control" type="text" name="pres_salida" autofocus required v-model="crearPrestamo.pres_salida">
              </div>
              <div class="col-6 my-2">

                <label for="pres_fecha_entrada" class="fw-normal">Fecha de Salida</label>
                <input type="date" id="pres_fecha_salida" class="form-control" name="pres_fecha_salida" autofocus required v-model="crearPrestamo.pres_fecha_salida">
              </div>
              <div class="col-6 mt-2">
                <label class="fw-normal">Usuario a Prestar</label>
                <select class="form-select " name="usuarios_us_id" required v-model="crearPrestamo.usuarios_us_id">
                  <option value="">Seleccione usuario
                  </option>
             <option v-for="usuarioprestamo of usuarioprestamos" :key="usuarioprestamo.usuario" :value="usuarioprestamo.id">{{usuarioprestamo.usuario}}</option>
             
                </select>
              </div>
              <div class="col-6 mt-2">
                <label class="fw-normal">Equipo a Prestar</label>
                <select class="form-select" name="equipos_eq_id" required v-model="crearPrestamo.equipos_eq_id">
                  <option value="">Seleccione Equipo
                  </option>
          <option v-for="equipoprestamo of equipoprestamos" :key="equipoprestamo.eq_serial" :value="equipoprestamo.id">{{equipoprestamo.eq_serial}}</option>

                </select>
              </div>
              <div class="col-6 mt-2">
                <label for="pres_fecha_entrada" class="fw-normal">Fecha de Entrada</label>
                <input id="pres_fecha_entrada" class="form-control" type="date" name="pres_fecha_entrada" autofocus required v-model="crearPrestamo.pres_fecha_entrada">
              </div>
              <div class="col-6 mt-2">
                <label class="fw-normal" for="pres_estatus">Estado</label>
                <fieldset>
                  <input id="pres_estatus" type="checkbox" name="pres_estatus"  autofocus v-model="crearPrestamo.pres_estatus"/>Activo
                  <input id="pres_estatus2" type="checkbox" name="pres_estatus"  autofocus v-model="crearPrestamo.pres_estatus"/>Inactivo
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
<button type="button" class="btn btn-outline-success modal-button-rigth fw-bold" data-dismiss="modal" aria-label="Close">Cerrar</button>
            <button type="submit" class="btn btn-success modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2" @click.prevent="crearPrestamo"></span>Registrar</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
<div class="text-center table-responsive">
	<table class="table table-striped table-hover" id="prestamoTable">
		<thead>
			<tr class="bg-dark text-white">
				<th scope="col">#</th>
				<th scope="col">Código de salida</th>
				<th scope="col">Fecha de préstamo</th>
				<th scope="col">Fecha de devolución</th>
				<th scope="col">Usuario</th>
				<th scope="col">Equipo</th>
				<th scope="col">Estado</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
  <tbody>
    <tr v-for="prestamos in prestamo">
      <td>{{prestamos.id}}</td>
      <td>{{prestamos.pres_salida}}</td>
      <td>{{prestamos.pres_fecha_salida}}</td>
      <td>{{prestamos.pres_fecha_entrada}}</td>
      <td>{{prestamos.usuarios_us_id}}</td>
      <td>{{prestamos.equipos_eq_id}}</td>
      <td>{{prestamos.pres_estatus}}</td>
      <td>
<button class="btn btn-success btn-claro-success fw-bold editBtn"  data-bs-toggle="modal" >Edicion</button>  
      </td>
    </tr>
  </tbody>
	</table>
   </div>
</div>
</template>



<script>
import datatable from 'datatables.net-bs4'
export default{
  props: ['usuarioprestamos', 'equipoprestamos'],
  mounted(){
    console.log('component mounted.');
    this.getPrestamos();
  },
  data(){
    return{
      prestamo: [],
      crearPrestamo: {pres_salida: '', pres_fecha_salida: '', pres_fecha_entrada: '', usuarios_us_id: '', equipos_eq_id: '', pres_estatus: ''}
    }
  },
  methods:{
   /* tabla(){
      this.$nextTick(()=>{
        $('#prestamoTable').Datatable();
      })
    },*/
 getPrestamos(){
 var getprestamo = 'getPrestamos';
      axios.get(getprestamo).then(res=>{
        this.prestamo = res.data
             this.$nextTick(() => {
     $("#prestamoTable").DataTable({});
  });
    //Metodo EXCLUSIVO para el listado
      /*
        $(document).ready(function() {
    $('#prestamoTable').DataTable({
          data: res.data,
 columns: [
           {data: 'id'},
            {data: 'pres_salida'},
            {data: 'pres_fecha_salida'},
            {data: 'pres_fecha_entrada'},
            {data: 'usuarios_us_id'},
            {data:'equipos_eq_id'},
            {data: 'pres_estatus'}
          ]
          
        });
          });
      */
      })
    }
  }
  }

</script>