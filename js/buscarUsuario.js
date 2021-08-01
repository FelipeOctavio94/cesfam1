new Vue({
    el:'#buscar',
    data:{
        url:"https://cesfam.herokuapp.com/",
        usuarios:[],
        usuario:{},
        rut:'',
    },
    methods:{
      buscarxRut: async function(){
        var recurso="controllers/BuscarUsuarioxRut.php";
        var form = new FormData();
        form.append("rut",this.rut);
        try {
            const res = await fetch(this.url+recurso,{
                method:"post",
                body: form,
            });
            const data = await res.json();
            console.log(data);
            this.usuarios=data;
        } catch (error) {
            console.log(error);
        }
    },
    eliminar: async function(rut){
      const recurso = "controllers/EliminarUsuario.php";
      var form = new FormData();
      form.append("rut",rut);
      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.text();
        console.log(data);
        M.toast({ html: "¡Eliminado Exitosamente!" });      
      } catch (error) {
        console.log(error);
        M.toast({ html: "¡Error al Eliminar!" }); 
      }
      this.cargaUsuarios();
    },
        cargaUsuarios: async function () {
            const recurso = "controllers/CargaUsuarios.php";
            try {
              const res = await fetch(this.url + recurso);
              const data = await res.json();
              this.usuarios = data;
            } catch (error) {
              console.log(error);
            }
          },
    },
    created(){
       this.cargaUsuarios(); 
    }
});