# Trip Builder Laravel + Vue App

> Laravel 5.5.42 API for back-end, Vue.js 2.5.17 for front-end

## Environment Preparation
```
// Clone the repository
git clone https://github.com/ashrafthamir/TripBuilder.git

// Prepare Apache Server (e.g. xampp), PHP >= 7.0 and Database
https://www.apachefriends.org/index.html

// Copy and Edit .env according to your DB
cp .env.example .env

// Install composer (Dependency Manager)
https://getcomposer.org/

// Install Dependencies
composer install

// Generate application key
php artisan key:Generate

// Run DB migrations
php artisan migrate

// Seed the DB with data (Sample data with 184 real Canadian airports, 4 real Canadian airlines, 100 sample trips and 100 sample flights)
php artisan db:seed

// Install npm (Dependency Manager)
https://nodejs.org/en/

// Install JS Dependencies
npm install

// Watch File Changes
npm run watch
```
## API Endpoints

We have APIs for Airlines, Airports, Trips and Flights

Get all the data
```
GET: /trip/builder/public/api/v1/airlines

GET: /trip/builder/public/api/v1/airports

GET: /trip/builder/public/api/v1/Trips

GET: /trip/builder/public/api/v1/flights
```

Get all the data paginated
```
GET: /trip/builder/public/api/v1/paginated/airlines

GET: /trip/builder/public/api/v1/paginated/airports

GET: /trip/builder/public/api/v1/paginated/trips

GET: /trip/builder/public/api/v1/paginated/flights
```

Get one row result
```
GET: /trip/builder/public/api/v1/airports/{airport_id}

GET: /trip/builder/public/api/v1/trip/{trip_id}
```

Get Flights of specific Trip
```
GET: /trip/builder/public/api/v1/trip/{trip_id}/flights
```

Add a new Flight to a Trip
```
POST:  /trip/builder/public/api/v1/flights
```

Delete a Flight from a Trip
```
DELETE:  /trip/builder/public/api/v1/flights/{flight_id}
```

### Example adding a Flight from Airline with id=1 to Trip with id=1
```
POST: /trip/builder/public/api/v1/flights?trip_id=1&airline_id=1
```

### Example deleting a Flight with id=1
```
DELETE: /tripbuilder/public/api/v1/flights/1
