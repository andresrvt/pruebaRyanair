<template>
  <div>
    <h1>Información de Vuelo</h1>
    <ul>
      <li v-for="flight in flights" :key="flight.id">{{ flight.name }} - {{ flight.destination }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      flights: [],
    };
  },
  mounted() {
    // Realiza una solicitud a la API de vuelos al cargar el componente
    axios.get('/api/flights')
      .then(response => {
        this.flights = response.data;
      })
      .catch(error => {
        console.error(error);
      });
  },
};

</script>

<script>
export default {
  data() {
    return {
      flights: [],
    };
  },
  mounted() {
    this.fetchFlights(); // Realiza la primera solicitud al montar el componente
    setInterval(this.fetchFlights, 60000); // Realiza una solicitud cada minuto (ajusta el intervalo según tus necesidades)
  },
  methods: {
    fetchFlights() {
      axios.get('/api/flights')
        .then(response => {
          this.flights = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
};
</script>
