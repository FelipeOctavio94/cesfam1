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
      eliminar: async function(rut){
        const recurso = "controllers/EliminarPaciente.php";
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
        this.cargaPacientes();
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