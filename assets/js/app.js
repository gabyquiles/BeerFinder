import React, {Component} from 'react';
import BreweryList from './components/BreweryList';
import '../css/app.scss';

const breweries = [{
    "id": 8,
    "name": "Right Around the Corner",
    "phone": "(813) 360-0766",
    "webpage": null,
    "address": {
        "streetAddress1": "2244 Central Ave",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33712"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 9,
    "name": "Green Bench Brewing Company",
    "phone": "(727) 800-9836",
    "webpage": "http:\/\/greenbenchbrewing.com\/",
    "address": {
        "streetAddress1": "1133 Baum Ave N",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33705"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 10,
    "name": "Cage Brewing",
    "phone": "(727) 201-4278",
    "webpage": null,
    "address": {
        "streetAddress1": "2001 1st Ave S",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33712"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 11,
    "name": "3 Daughters Brewing",
    "phone": "(727) 495-6002",
    "webpage": null,
    "address": {
        "streetAddress1": "222 22nd St S",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33712"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 12,
    "name": "Flying Boat Brewing Company",
    "phone": "(727) 800-2999",
    "webpage": null,
    "address": {
        "streetAddress1": "1776 11th Ave N",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33713"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 13,
    "name": "Pinellas Ale Works",
    "phone": "(727) 235-0970",
    "webpage": "pawbeer.com",
    "address": {
        "streetAddress1": "1962 1st Ave S",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33712"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 14,
    "name": "St. Pete Brewing Company",
    "phone": "(727) 623-4837",
    "webpage": null,
    "address": {
        "streetAddress1": "544 1st Ave N",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33701"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}, {
    "id": 15,
    "name": "Cycle Brewing",
    "phone": "(727) 320-7954",
    "webpage": null,
    "address": {
        "streetAddress1": "534 Central Ave",
        "streetAddress2": null,
        "city": "Saint Petersburg",
        "state": "FL",
        "postalCode": "33701"
    },
    "coordinates": {"latitude": 27.7676, "longitude": 82.6403}
}]

class App extends Component {
    render() {
        return (
            <BreweryList breweries={breweries}/>
        );
    }
}

export default App;