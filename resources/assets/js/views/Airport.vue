<template>
    <div class="row">
        <div class="col-9 container">
            <h2>{{ airport.name }}</h2>
            <ul>
                <li>City: {{ airport.city }}</li>
                <li>Country: {{ airport.country }}</li>
                <li>IATA: {{ airport.iata }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            airport: []
        }
    },
    created() {
        this.fetchAirport();
    },
    methods: {
        fetchAirport() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/airports/' + this.$route.params.id)
            .then(res => {
                this.airport = res.data.data;
            });
        }
    }
};
</script>
