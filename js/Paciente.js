new Vue({
    el: '#paciente',
    data: {
      url: "https://cesfam.herokuapp.com/",
      pacientes: [],
      paciente: {},
      rut: '',
    },
    methods: {
       buscarxRut: async function () {
         var recurso = "controllers/BuscarPacientexRut.php";
         var form = new FormData();
         form.append("rut", this.rut);
        try {
           const res = await fetch(this.url + recurso, {
            method: "post",
             body: form,
           });
         const data = await res.json();
           console.log(data);
           this.pacientes = data;
        } catch (error) {
           console.log(error);
         }
       },
  
      cargaPacientes: async function () {
        const recurso = "controllers/CargaPacientes.php";
        try {
          const res = await fetch(this.url + recurso);
          const data = await res.json();
          this.pacientes = data;
        } catch (error) {
          console.log(error);
        }
      },
    },

    created() {
      this.cargaPacientes();
    }

  });