new Vue({
    el: '#app',
    data: {
        rut: "",
        url: "https://cesfam.herokuapp.com/",
        paciente: {},
        pacientes: [],
        esta: false,
        rut_paciente: '',
        fecha_visita: '',
        observacion: '',
        sintomas: '',
        rut_operativo: '',
        medicamentos: '',
        diagnostico: '',
    },
    methods: {
        /*guardar: function () {
            alert("hola");
        },*/

        guardar: async function () {
            var form = new FormData();
            form.append("rut_paciente", this.rut_paciente);
            form.append("fecha_visita", this.fecha_visita);
            form.append("observacion", this.observacion);
            form.append("sintomas", this.sintomas);
            form.append("rut_operativo", this.rut_operativo);
            form.append("medicamentos", this.medicamentos);
            form.append("diagnostico", this.diagnostico);

            try {
                var recurso = "controllers/InsertarReceta.php";
                const res = await fetch(this.url + recurso, {
                    method: "post",
                    body: form,
                });
                const resp = await res.json();
                console.log(resp);
                if (resp != 1) {
                    M.toast({ html: "Receta enviada!" });
                    this.rut_paciente = '';
                    this.fecha_visita = '';
                    this.observacion = '';
                    this.sintomas = '';
                    this.rut_operativo = '';
                    this.medicamentos = '';
                    this.diagnostico = '';
                    this.esta = false;
                } else {
                    M.toast({ html: "Hubo un error :(" });
                }
            } catch (error) {
                console.log(error);
            }
        },
    },
    created() {

    }
});
