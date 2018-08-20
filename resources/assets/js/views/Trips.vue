<template>
    <div class="row">
        <div class="col-9 container">
            <h2>Trips</h2>
            <br />
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item mx-auto" v-bind:class ="[{disabled: !pagination.prev_page_url}]"><a class="page-link" href="#" v-on:click="fetchTrips(pagination.prev_page_url)">Previous</a></li>
                    <li class="page-item mx-auto disabled"><a class="page-link" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li class="page-item mx-auto" v-bind:class ="[{disabled: !pagination.next_page_url}]"><a class="page-link" href="#" v-on:click="fetchTrips(pagination.next_page_url)">Next</a></li>
                </ul>
            </nav>
            <table class="table table-hover text-center">
                <thead>
                    <th>ID</th>
                    <th class="talign-left">Destination</th>
                </thead>
                <tbody>
                    <tr class="items_table_row" v-for="trip in trips" v-on:click="trip_id(trip.id)">
                        <td class="valign-middle">{{ trip.id }}</td>
                        <td>
                            <table class="talign-left">
                                <tbody>
                                    <tr>
                                        <td class="no-border td-width">From</td>
                                        <td class="no-border">{{ airports.find(airport => airport.id === trip.from_airport).name }}</td>
                                    </tr>
                                    <tr>
                                        <td>To</td>
                                        <td>{{ airports.find(airport => airport.id === trip.to_airport).name }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import rootUrl from '../rootUrl'
export default {
    data() {
        return {
            trips: [],
            trip: {
                id: '',
                from_airport: '',
                to_airport: ''
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
            pagination: {}
        }
    },
    created() {
        this.fetchTrips();
        this.fetchAirports();
    },
    methods: {
        trip_id(id) {
            this.$router.push({ name: 'trip', params: {id: id} })
        },
        fetchTrips(page_url) {
            let vm = this;
            page_url = page_url || rootUrl + '/api/v1/paginated/trips';
            axios.get(page_url)
            .then(res => {
                this.trips = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            });
        },
        fetchAirports() {
            axios.get(rootUrl + '/api/v1/airports')
            .then(res => {
                this.airports = res.data.data;
            });
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        }
    }
};
</script>
