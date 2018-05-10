import React, {Component} from 'react';
import {GoogleApiWrapper, Map, Marker} from 'google-maps-react';

export class MapContainer extends Component {

    fetchPlaces(props) {
        console.log("Aqui");
    }

    render() {
        return (
            <Map google={this.props.google} zoom={14}
                 initialCenter={{
                     lat: 27.7676,
                     lng: -82.6403
                 }}
                 onReady={this.fetchPlaces}
            >
                <Marker
                    title={'The marker`s title will appear as a tooltip.'}
                    name={'SOMA'}
                    position={{lat: 27.7676, lng: -82.6403}}/>
            </Map>
        );
    }
}

export default GoogleApiWrapper({
    apiKey: ("AIzaSyCSiMStHlPOmkZNVzRzYC_c1-YXVexce_4")
})(MapContainer)

// <Marker onClick={this.onMarkerClick}
// name={'Current location'}/>
//
// <InfoWindow onClose={this.onInfoWindowClose}>
//     <div>
//         <h1>{this.state.selectedPlace.name}</h1>
//     </div>
// </InfoWindow>