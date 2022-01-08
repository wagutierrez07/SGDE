<template>
<div>
    <div class="row">
    <div class="col-4 col-xs-12">
      <i class="fas fa-desktop fa-2x marco-icono p-3" data-fa-transform="shrink-8"></i>
    </div>
    <div class="col-4 col-xs-12">
      <hgroup class="text-center">
        <h1 class="fw-bold">Configuración de usuarios</h1>
        <h2 class="fw-normal h5 text-muted">Lista de usuarios registrados</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">
       <a href="" class="btn btn-primary btn-claro fw-bold modal-button-rigth">
          <i class="fas fa-backward mx-2"></i>
          <label class="texto-button">Volver</label>
        </a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-claro-success fw-bold modal-button-left" data-toggle="modal" data-target="#registrarUsuario">
  <i class="fas fa-plus mx-2"></i>
  <label class="texto-button">Registrar</label>
</button>

<!-- Modal -->
<div class="modal fade" id="registrarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content border-rad">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="staticBackdropLabel">REGISTRO DE USUARIOS</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
      <form>
      <div class="modal-body p-4 text-center">
        ...
      </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success modal-button-rigth fw-bold" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
        					<button type="submit" class="btn btn-success modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2"></span>Registrar</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
<div class="text-center table-responsive">
	<table class="table table-striped table-hover" id="usersTable">
		<thead>
			<tr class="bg-dark text-white">
					<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Apellido</th>
				<th scope="col">Cedula</th>
				<th scope="col">Correo</th>
				<th scope="col">Username</th>
				<th scope="col">Estado</th>
        <th scope="col">Acciones</th>
			</tr>
		</thead>
  <tbody>
    <tr v-for="users in usuario">
      <td>{{users.id}}</td>
      <td>{{users.nombre}}</td>
      <td>{{users.apellido}}</td>
      <td>{{users.cedula}}</td>
      <td>{{users.email}}</td>
      <td>{{users.usuario}}</td>
      <td>{{users.estatus}}</td>
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
  mounted(){
    console.log('component mounted.');
    this.getusers();
  },
  data(){
    return{
      usuario: [],
      crearUsuario: {nombre: '', apellido: '', cedula: '', email: '', usuario: '', estatus: ''}
    }
  },
  methods:{
    /*tabla(){
      this.$nextTick(()=>{
        $('#usersTable').Datatable();
      })
    },*/
 getusers(){
      //var getuser = 'getUser';
      axios.get('getUser').then(res=>{
        this.usuario = res.data
         this.$nextTick(() => {
     $("#usersTable").DataTable({});
  });
    //Metodo EXCLUSIVO para el listado
      /*
        $(document).ready(function() {
    $('#usersTable').DataTable({
          data: res.data,
            columns: [
           {data: 'id'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'cedula'},
            {data: 'email'},
            {data:'usuario'},
            {data: 'estatus'}
          ]
          
        });
          });
      */
      })
    }
  }
  }

</script>
