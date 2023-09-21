<template>
    <tbody>
        @foreach ($flights as $flight)
        <tr v-for="flight in flights" :key="flight.ident">
            <td>{{ flight.ident }}</td>
            <td>{{ flight.status }}</td>
            <td>{{ flight.gate_origin }}</td>
            <td>{{ flight.progress_percent }}</td>
        </tr>
        @endforeach
    </tbody>
</template>

<script>
export default {
    data() {
        return {
            flights: [],
        };
    },
    mounted() {
        // Realizar la primera solicitud AJAX al cargar el componente
        this.fetchFlights();

        // Configurar una actualización periódica cada 1 segundos (ajusta según sea necesario)
        setInterval(this.fetchFlights, 1000);
    },
    methods: {
        fetchFlights() {
            // Realizar una solicitud AJAX para obtener los datos de vuelo desde tu API de Laravel
            axios.get("/api/flights").then((response) => {
                this.flights = response.data;
            });
        },
    },
};
</script>
