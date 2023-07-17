document.addEventListener("DOMContentLoaded", function() {

  const formulario = document.querySelector("#formularioEventos");

  flatpickr("#start, #end", {
    enableTime: true,
    dateFormat: "d/m/Y H:i",
    time_24hr: true,
  });

  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: "es",
    displayEventTime: false,
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next,today',
      center: 'title',
      right: false,
    },
    events: {
      url: baseURL + "/evento/mostrar",
      method: "POST",
      extraParams: {
        _token: formulario._token.value,
      },
      failure: function() {
        console.log('Error al cargar los eventos.');
      }
    },
    dateClick: function(info) {
      formulario.reset();
      const selectedDate = info.date;
      const formattedDate = dayjs(selectedDate).format('DD/MM/YYYY HH:mm');
      formulario.start.value = formattedDate;
      formulario.end.value = formattedDate;
      $("#evento").modal("show");
    },
    eventClick: function(info) {
      const evento = info.event;
      axios.post(baseURL + "/evento/editar/" + evento.id)
      .then(
        (respuesta) => {
          formulario.id.value = evento.id;
          formulario.title.value = evento.title;
          formulario.descripcion.value = evento.extendedProps.descripcion;
          const startDate = new Date(evento.start);
          const endDate = new Date(evento.end);
          const formattedStartDate = moment(startDate).format('DD/MM/YYYY HH:mm');
          const formattedEndDate = moment(endDate).format('DD/MM/YYYY HH:mm');
          formulario.start.value = formattedStartDate;
          formulario.end.value = formattedEndDate;
          $("#evento").modal("show");
        }
      ).catch(
        error => {
          if (error.response) {
            console.log(error.response.data);
          }
        }
      )
    }
  });

  calendar.render();

  document.getElementById("btnGuardar").addEventListener("click", function() {
    convertirFormatoFechaHora(formulario.start);
    convertirFormatoFechaHora(formulario.end);
    enviarDatos("/evento/agregar");
  });

  document.getElementById("btnEliminar").addEventListener("click", function() {
    borrarDatos("/evento/borrar/");
  });

  document.getElementById("btnModificar").addEventListener("click", function() {
    convertirFormatoFechaHora(formulario.start);
    convertirFormatoFechaHora(formulario.end);
    enviarDatos("/evento/actualizar/" + formulario.id.value);
  });

  function convertirFormatoFechaHora(input) {
    const value = input.value;
    const [dia, mes, anio, hora, minuto] = value.split(/\/|\s|:/);
    const formatoISO = `${anio}-${mes}-${dia} ${hora}:${minuto}`;
    input.value = formatoISO;
  }

  function enviarDatos(url) {
    const datos = new FormData(formulario);
    const nuevaURL = baseURL + url;
    axios.post(nuevaURL, datos)
      .then(
        (respuesta) => {
          calendar.refetchEvents();
          $("#evento").modal("hide");
        }
      ).catch(
        error => { if (error.response) { console.log(error.response.data); } }
      )
  }

  function borrarDatos(url) {
    const id = formulario.id.value;
    const nuevaURL = baseURL + url;
    if (id) {
      axios.delete(nuevaURL + id)
        .then((respuesta) => {
          calendar.refetchEvents();
          $("#evento").modal("hide");
        })
        .catch((error) => {
          if (error.response) {
            console.log(error.response.data);
          }
        });
    }
  }

});
