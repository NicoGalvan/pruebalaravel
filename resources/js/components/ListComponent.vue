<template>
  <div class="container">
    
    <h1>USUARIOS</h1>

    <br />
 

    <table>
      <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Edad</td>
      </tr>

      <tr v-for="cat in catego" :key="cat.id">
        <td>{{ cat.id }}</td>
        <td>{{ cat.Nombre }}</td>
        <td>{{ cat.Edad }}</td>
        <td><button @click="Eliminar(cat.id)" >Borrar</button></td>
        <td><button @click="Buscar(cat.id)" type="button"  data-bs-toggle="modal" data-bs-target="#myModal">
  Editar
</button></td>
<!-- The Modal -->
<div  class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar User</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
              <input v-model="categoria.Nombre"
        type="text"
        id="Nombre"
        name="Nombre"
        
      />
      <input v-model="categoria.Edad"
        type="text"
        id="Edad"
        name="Edad"
        
      />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" @click="Guardar(categoria.id)">Actualizar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close"> Close</button>
      </div>

    </div>
  </div>
</div>
      </tr>
    </table>
    <br />

    


  </div>

  
</template>

<script>
import EventBus from '../app.js'
export default {
  mounted() {
    console.log("Component mounted.");
    this.$eventBus.$on("callMethodInChild", () => {
      this.listar();
    });
  },
  data() {
    return {
      catego: [],
      categoria:{
              Nombre:'',
              Edad:'',
          },
          modalshow: 'true',
      
    };
  },
  methods: {
    async listar() {
      const res = await axios.get("list");
      this.catego = res.data;
    },
    async Eliminar(id) {
      const res = await axios.delete("/categoria/"+id);
      this.listar();

    },
    async Buscar(id){
      const res = await axios.get("/categoria/"+id+"/edit");
      this.categoria=res.data

    },
        closeModal() {
   document.getElementById('close').click();
},
    async Guardar(id){
      try {
      //const res = await axios.patch("categoria/"+id,this.categoria);
      
      const res = await axios.patch('categoria/'+id,this.categoria);
      alert("Actualizado con exito");
      //this.modalshow = false;
        this.closeModal();
        this.listar();
      } catch (error) {
        console.log(error)
      }
      
    },


     
  },
  created() {
    this.listar();
  },
};
</script>
