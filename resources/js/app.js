require('./bootstrap');
import './bootstrap'

window.app = createApp({
    setup() {
        return {
            message: 'Welcome to Your Vue.js App',
        };
    },
    components: {
        HelloWorld
    },
}).mount('#reload');
// Importa Vue.js y crea una instancia de Vue
import Vue from 'vue';

// Importa tu componente de Vue.js
import FlightInfo from '@/components/FlightInfo.vue';

// Crea una instancia de Vue y monta el componente en un elemento con ID 'app'
const reload = new Vue({
    el: '#reload',
    components: {
        FlightInfo, // Registra tu componente aquí
    },
});