<template>
    <div class="row">
        <div class="col-9 container">
            <h2>Trip Info</h2>
            <br />
            <table class="table table-hover table-striped text-center">
                <tbody>
                    <tr class="items_table_row">
                        <td>From</td>
                        <td>{{ airports.find(airport => airport.id === trip.from_airport).name }}</td>
                    </tr>
                    <tr>
                        <td>To</td>
                        <td>{{ airports.find(airport => airport.id === trip.to_airport).name }}</td>
                    </tr>
                </tbody>
            </table>
            <br />
            <hr />
            <br />
            <form class="form-inline" @submit.prevent="addFlight">
                <div class="form-group">
                    <label for="airline">Add Flight</label>
                    <select class="form-control mx-3 px-3" v-model="airline.id" id="flight">
                        <option selected value disabled>Pick an Airline</option>
                        <option v-for="airline in airlines" v-bind:value="airline.id">{{ airline.name }} ({{airline.icao}})</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
            <br />
            <hr />
            <br />
            <h2>Current Flights</h2>
            <br />
            <table class="table table-hover table-striped text-center">
                <thead>
                    <th>ID</th>
                    <th>Flight Number</th>
                    <th>Airline Name</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr class="items_table_row" v-for="flight in flights">
                        <td>{{ flight.id}}</td>
                        <td>{{ flight.flight_number }}</td>
                        <td>{{ airlines.find(airline => airline.id === flight.airline_id).name }} </td>
                        <td><button class="btn btn-danger" v-on:click="deleteFlight(flight.id)">Delete</button></td>
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
            trip: [],
            flights: [],
            flight: {
                id: '',
                flight_number: '',
                airline_id: ''
            },
            airports: [],
            airports: {
                name: ''
            },
            airport: {
                id: '',
                name: '',
                city: '',
                icao: ''
            },
            airlines: [],
            airlines: {
                name: ''
            },
            airline: {
                id: '',
                name: '',
                icao: ''
            }
        }
    },
    created() {
        this.fetchTrip();
        this.fetchTripFlights();
        this.fetchAirlines();
        this.fetchAirports();
    },
    methods: {
        fetchTrip() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/trips/' + this.$route.params.id)
            .then(res => {
                this.trip = res.data.data;
            });
        },
        fetchAirports() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/airports')
            .then(res => {
                this.airports = res.data.data;
            });
        },
        fetchTripFlights() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/trips/' + this.$route.params.id + '/flights')
            .then(res => {
                this.flights = res.data.data;
            });
        },
        fetchAirlines() {
            axios.get('http://ash-tripbuilder.herokuapp.com/api/v1/airlines')
            .then(res => {
                this.airlines = res.data.data;
            });
        },
        addFlight() {
            axios.post('http://ash-tripbuilder.herokuapp.com/api/v1/flights', {
                trip_id: this.trip.id,
                airline_id: this.airline.id
            })
            .then(this.fetchTripFlights())
            .then(message=>alert(message.data.message));
        },
        deleteFlight(id) {
            if(confirm('Are you sure?')) {
                axios.delete('http://ash-tripbuilder.herokuapp.com/api/v1/flights/' + id)
                .then(this.fetchTripFlights())
                .then(message => alert(message.data.message));
            }
        }
    }
};
</script>
