import React, {Component} from 'react';
import * as Looking4BeerAPI from './Looking4BeerAPI';
import BreweryList from './components/BreweryList';
import '../css/app.scss';

class App extends Component {
    state = {
        "breweries": []
    };

    getNearbyBreweries = (lat, lon, radius) => {
        Looking4BeerAPI.getNeardby(lat, lon, radius).then((breweries) => {
            this.setState(() => ({"breweries": breweries}));
        });
    };

    componentDidMount() {
        navigator.geolocation.getCurrentPosition((position) => {
            this.getNearbyBreweries(position.coords.latitude, position.coords.longitude, 5);
        });
    }

    render() {
        return (
            <BreweryList breweries={this.state.breweries}/>
        );
    }
}

export default App;