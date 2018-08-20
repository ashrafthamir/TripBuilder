<template>
    <div class="row">
        <div class="col-9 container">
            <h1>Airports</h1>
            <br />
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item mx-auto" v-bind:class ="[{disabled: !pagination.prev_page_url}]"><a class="page-link" href="#" v-on:click="fetchAirports(pagination.prev_page_url)">Previous</a></li>
                    <li class="page-item mx-auto disabled"><a class="page-link" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li class="page-item mx-auto" v-bind:class ="[{disabled: !pagination.next_page_url}]"><a class="page-link" href="#" v-on:click="fetchAirports(pagination.next_page_url)">Next</a></li>
                </ul>
            </nav>
            <table class="table table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>IATA</th>
                </thead>
                <tbody>
                    <tr class="items_table_row" v-for="airport in airports" v-on:click="airport_id(airport.id)">
                        <td>{{ airport.id }}</td>
                        <td>{{ airport.name }}</td>
                        <td>{{ airport.city }}</td>
                        <td>{{ airport.country }}</td>
                        <td>{{ airport.iata }}</td>
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
            airports: [],
            airport: {
                id: '',
                name: '',
                city: '',
                country: '',
                iata: ''
            },
            pagination: {}
        }
    },
    created() {
        console.log("im here");
        this.fetchAirports();
    },
    methods: {
        airport_id(id) {
            this.$router.push({ name: 'airport', params: {id: id} })
        },
        fetchAirports(page_url) {
            let vm = this;
            page_url = page_url || 'api/v1/paginated/airports'
            console.log("url: " + page_url)
            axios.get(page_url)
            .then(res => {
                this.airports = res.data.data;
                console.log("res.data: " + res.data);
                console.log("this.airports: " + this.airports);
                vm.makePagination(res.data.meta, res.data.links);
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
