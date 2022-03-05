<template>
  <div class="container">
    <h1>Hola Mundo</h1>

      <input v-model="categoria.Nombre"
        type="text"
        id="Nombre"
        name="Nombre"
        placeholder="Escriba aqui el nombre"
      />
      <input v-model="categoria.Edad"
        type="text"
        id="Edad"
        name="Edad"
        placeholder="Escriba aqui su edad"
      />
      <button  @click="guardar()">Enviar</button>

  </div>
</template>

<script>
import EventBus from '../app.js'
export default {  
  mounted() {
    console.log("Component mounted.");
  },
  data(){
      return{
          categoria:{
              Nombre:'',
              Edad:'',

          }
      }
  },
  methods:{
      async guardar() {
        try {const res = await axios.post("categoria",this.categoria);
      alert("User creado correctamente");
      this.callMethodInChildComponent();
          
        } catch (error) {
          console.log(error)
        }
      
    },

        callMethodInChildComponent() {
      //As an instance property
      this.$eventBus.$emit("callMethodInChild");

    },

  }
};
</script>

