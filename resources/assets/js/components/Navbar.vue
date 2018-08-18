<template>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary mb-2">
        <div class="container">
            <a href="/TripBuilder/public" class="navbar-brand">Trip Builder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <router-link :to="{ name: 'airports' }"><a class="dropdown-item" href="#">Airports</a></router-link>
                            <router-link :to="{ name: 'airlines' }"><a class="dropdown-item" href="#">Airlines</a></router-link>
                            <router-link :to="{ name: 'trips' }"><a class="dropdown-item" href="#">Trips</a></router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
