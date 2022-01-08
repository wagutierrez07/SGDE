<template>
<div>
    <div class="row">
    <div class="col-4 col-xs-12">
      <i class="fas fa-desktop fa-2x marco-icono p-3" data-fa-transform="shrink-8"></i>
    </div>
    <div class="col-4 col-xs-12">
      <hgroup class="text-center">
        <h1 class="fw-bold">Configuración de equipos</h1>
        <h2 class="fw-normal h5 text-muted">Lista de equipos registrados</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">
       <a href="" class="btn btn-primary btn-claro fw-bold modal-button-rigth">
          <i class="fas fa-backward mx-2"></i>
          <label class="texto-button">Volver</label>
        </a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-claro-success fw-bold modal-button-left"  data-toggle="modal" data-target="#registrarEquipo">
  <i class="fas fa-plus mx-2"></i>
  <label class="texto-button">Registrar</label>
</button>
<!-- Modal -->
<div class="modal fade" id="registrarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form>
      <div class="modal-body p-4 text-center">
        <div class="container">
            <div class="row row cols-2">
              
              <div class="col-6 my-2">
                <label class="fw-normal" for="marca">Marca</label>
                <label for="text">Marca</label>
                <input id="eq_marca" class="form-control" type="text" name="eq_marca" autofocus v-model="crearEquipo.eq_marca">
     
              </div>
              <div class="col-6 my-2">

                <label class="fw-normal" for="modelo">Modelo</label>
                    <input id="eq_modelo" class="form-control" type="text" name="eq_modelo"  autofocus v-model="crearEquipo.eq_modelo">
              
            </div>
            <div class="col-6 mt-2">
              <label class="fw-normal" for="text">Tipo de Equipo</label>
              <select class="form-select" name="eq_tequid" id="eq_tequid" v-model="crearEquipo.eq_tequid">
                <option value="#">Seleccione un Equipo
                </option>
                <option v-for="tipoequipo of tipoequipos" :key="tipoequipo.teq_nombre" :value="tipoequipo.id">{{tipoequipo.teq_nombre}}</option>
              </select>
            </div>
            <div class="col-6 mt-2">
              <label class="fw-normal" for="email">Numero serial</label>
              <input type="text" id="eq_serial" class="form-control" name="eq_serial"  autofocus required  v-model="crearEquipo.eq_serial" >
            </div>
            <div class="col-6 mt-2">

              <label class="fw-normal" for="email">Bien Nacional</label>
              <input type="text" id="eq_nbiennacional" class="form-control" name="eq_nbiennacional" autofocus required v-model="crearEquipo.eq_nbiennacional" >
            </div>
            <div class="col-6 mt-2">
              <label class="fw-normal" for="text">Departamento</label>
              <select class="form-select" name="departamentos_dep_id" id="departamentos_dep_id" v-model="crearEquipo.departamentos_dep_id">
                <option value="#">Seleccione Departamento
                </option>
            <option v-for="departamento of departamentos" :key="departamento.dep_nombre" :value="departamento.id">{{departamento.dep_nombre}}</option>
              </select>
            </div>
            <div class="col-6 mt-2">
              <label class="fw-normal" for="text">Estado</label>
              <fieldset>
                <input class="form-check-input" id="estatusModalUserCreate" type="checkbox" name="eq_estatus"  autofocus v-model="crearEquipo.eq_estatus" />Activo
                <input class="form-check-input" id="estatusModalUserCreate" type="checkbox" name="eq_estatus" autofocus v-model="crearEquipo.eq_estatus" />Inactivo
              </fieldset>
            </div>
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success modal-button-right fw-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success  modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2" @click.prevent="crearEquipo"></span>Registrar</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
<div class="text-center table-responsive">
	<table class="table table-striped table-hover" id="equiposTable">
		<thead>
			<tr class="bg-dark text-white">
			<th scope="col">#</th>
				<th scope="col">Serial</th>
				<th scope="col">Tipo de equipo</th>
				<th scope="col">N° bien nacional</th>
				<th scope="col">Estado</th>
				<th scope="col">Marca</th>
				<th scope="col">Modelo</th>
        <th scope="col">Departamentos</th>
        <th scope="col">Acciones</th>
			</tr>
		</thead>
  <tbody>
    <tr v-for="equipos in equipo">
      <td>{{equipos.id}}</td>
      <td>{{equipos.eq_serial}}</td>
      <td>{{equipos.eq_tequid}}</td>
      <td>{{equipos.eq_nbiennacional}}</td>
      <td>{{equipos.eq_estatus}}</td>
      <td>{{equipos.eq_marca}}</td>
      <td>{{equipos.eq_modelo}}</td>
      <td>{{equipos.departamentos_dep_id}}</td>
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
require( 'datatables.net-buttons/js/dataTables.buttons' )
require( 'datatables.net-buttons/js/buttons.html5' )
import print from 'datatables.net-buttons/js/buttons.print'
import jszip from 'jszip/dist/jszip'
import pdfMake from 'pdfmake/build/pdfmake'
import pdfFonts from 'pdfmake/build/vfs_fonts'

export default{
  props: ['tipoequipos', 'departamentos'],
  mounted(){
    console.log('component mounted.');
    this.getEquipos();
  },
  data(){
    return{
      equipo: [],

      crearEquipo: {eq_serial: '', eq_tequid: '', eq_nbiennacional: '', eq_estatus: '', eq_marca: '', eq_modelo: ''}
    }
  },
  methods:{
    tabla(){
        this.$nextTick(() => {
    $('#equiposTable').DataTable();
  });
    },
    getEquipos(){
      var getEquipo = 'getData';
      axios.get(getEquipo).then(res=>{
        this.equipo = res.data
        this.tabla()
       /* this.$nextTick(() => {
     $("#equiposTable").DataTable();
  });*/
        //Metodo EXCLUSUVO para solo listado
        /*
          
$(document).ready(function() {
    $('#equiposTable').DataTable({

          data: res.data,
          columns: [
            {data: 'id'},
            {data: 'eq_serial'},
            {data: 'eq_tequid'},
            {data: 'eq_nbiennacional'},
            {data: 'eq_estatus'},
            {data:'eq_marca'},
            {data: 'eq_modelo'}
          ]
        });
});
        */
      })
    },
    crearEquipos(){
       var crearEquipos = 'crearEquipo';
      axios.post(crearEquipos)
    }
  }
}
</script>
