new Vue({
    el:'#app1',
    data:{
        url:"https://cesfam.herokuapp.com/",
        recetaexiste: false,
        recetas:[],
        receta:{},
        rut:'',
    },
    methods:{
        buscarRut: async function(){
            var recurso="controllers/BuscarRecetaxRut.php";
            var form = new FormData();
            form.append("rut",this.rut);
            try {
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.recetas=data;
            } catch (error) {
                console.log(error);
            }
        },
        
        abrirModal: function(receta){
            this.receta = receta;
            var modal = document.getElementById("detalle");
            var instance = M.Modal.getInstance(modal);
            instance.open();
        },

        //generarPDF: function(id){
            //alert(id);
          //  window.open(this.url+"controllers/ExportarPDF.php?id="+id,"_blank");
        
        //}
        eliminar: async function(id){
            const recurso = "controllers/EliminarReceta.php";
            var form = new FormData();
            form.append("id",id);
            try {
                const res = await fetch(this.url + recurso, {
                    method: "post",
                    body: form,
                });
                const data = await res.text();
                console.log(data);
                M.toast({html: "¡Eliminada Exitosamente!"});
            } catch (error) {
                console.log(error);
                M.toast({html: "¡Error al Eliminar!"});
            }
            this.cargaReceta();
        },
        cargaReceta: async function () {
            const recurso = "controllers/CargaRecetas.php";
            try {
              const res = await fetch(this.url + recurso);
              const data = await res.json();
              this.recetas = data;
            } catch (error) {
              console.log(error);
            }
          },


    },
    created(){
        this.cargaReceta();
    }
});