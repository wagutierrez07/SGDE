<template>
<div>
    <div class="row">
    <div class="col-4 col-xs-12">
      <i class="fas fa-desktop fa-2x marco-icono p-3" data-fa-transform="shrink-8"></i>
    </div>
    <div class="col-4 col-xs-12">
      <hgroup class="text-center">
        <h1 class="fw-bold">Configuración de Auditoria</h1>
        <h2 class="fw-normal h5 text-muted">Auditorias registradas</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">
       <a href="" class="btn btn-primary btn-claro fw-bold modal-button-rigth">
          <i class="fas fa-backward mx-2"></i>
          <label class="texto-button">Volver</label>
        </a>

      </div>
    </div>
  </div>
<div class="text-center table-responsive">
	<table class="table table-striped table-hover" id="auditoriaTable">
		<thead>
			<tr class="bg-dark text-white">
			<th scope="col">#</th>
				<th scope="col">Maquina</th>
				<th scope="col">O.S.</th>
				<th scope="col">I.P.</th>
				<th scope="col">Navegador</th>
				<th scope="col">Fecha</th>
			</tr>
		</thead>
  <tbody>
    <tr v-for="auditorias in auditoria">
      <td>{{auditorias.id}}</td>
      <td>{{auditorias.au_maquina}}</td>
      <td>{{auditorias.au_so}}</td>
      <td>{{auditorias.au_ip}}</td>
      <td>{{auditorias.au_navegador}}</td>
      <td>{{auditorias.au_fecha}}</td>
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
    this.getAuditoria();
  },
  data(){
    return{
      auditoria: []
    }
  },
  methods:{
    /*tabla(){
      this.$nextTick(()=>{
        $('#auditoriaTable').Datatable();
      })
    },*/
    getAuditoria(){
      var getAuditoria = 'getAuditoria';
      axios.get(getAuditoria).then(res=>{
        this.auditoria = res.data
     this.$nextTick(() => {
     $("#auditoriaTable").DataTable({});
  });
        //Metodo EXCLUSUVO para solo listado
        /*
                //this.tabla()
$(document).ready(function() {
    $('#auditoriaTable').DataTable({

          data: res.data,
          columns: [
            {data: 'id'},
            {data: 'au_maquina'},
            {data: 'au_so'},
            {data: 'au_ip'},
            {data: 'au_navegador'},
            {data:'au_fecha'}
          ]
        });
});
        */
      })
    }
  }
}
</script>
