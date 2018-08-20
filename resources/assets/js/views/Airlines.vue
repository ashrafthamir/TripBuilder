<template>
    <div class="row">
        <div class="col-9 container">
            <h1>Airlines</h1>
            <br />
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>IATA</th>
                    <th>ICAO</th>
                    <th>Callsign</th>
                </thead>
                <tbody>
                    <tr class="items_table_row" v-for="airline in airlines">
                        <td>{{ airline.id }}</td>
                        <td>{{ airline.name }}</td>
                        <td>{{ airline.iata }}</td>
                        <td>{{ airline.icao }}</td>
                        <td>{{ airline.callsign }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            airlines: [],
            airline: {
                id: '',
                name: '',
                iata: '',
                icao: '',
                callsign: ''
            }
        }
    },
    created() {
        this.fetchAirlines();
    },
    methods: {
        fetchAirlines() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/airlines')
            .then(res => {
                this.airlines = res.data.data;
            });
        }
    }
};
</script>
