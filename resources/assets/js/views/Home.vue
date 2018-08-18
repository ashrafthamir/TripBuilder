<template>
    <div class="container">
        <div id="wrapper">
            <div id="page-content-wrapper">
                <div class="row">
                    <div class="col-12 text-center free-block">
                        <router-link :to="{ name: 'airports' }"><button class="btn btn-primary homebtn">Airports</button></router-link>
                        <router-link :to="{ name: 'airlines' }"><button class="btn btn-primary homebtn">Airlines</button></router-link>
                        <router-link :to="{ name: 'trips' }"><button class="btn btn-primary homebtn">Trips</button></router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
