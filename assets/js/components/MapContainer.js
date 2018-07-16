import React, {Component} from 'react'
import {GoogleApiWrapper, InfoWindow, Map, Marker} from 'google-maps-react'
import {connect} from 'react-redux'
import {handleChangeLocation} from "../actions/shared"

class MapContainer extends Component {
    state = {
        showingInfoWindow: false,
        activeMarker: {},
        selectedPlace: {},
    };

    onMarkerClick = (props, marker, e) =>
        this.setState({
            selectedPlace: props,
            activeMarker: marker,
            showingInfoWindow: true
        });

    onMapClicked = (props) => {
        if (this.state.showingInfoWindow) {
            this.setState({
                showingInfoWindow: false,
                activeMarker: null
            })
        }
    };


    centerMoved = (mapProps, map) => {
        const lat = map.center.lat()
        const lng = map.center.lng()
        this.props.dispatch(handleChangeLocation(lat, lng))
    }

    render() {
        if (!this.props.loaded) {
            return <div>Loading...</div>
        }
        const {coords, breweries} = this.props
        return (
            <Map google={this.props.google} zoom={14} initialCenter={{lat: 0, lng: 0}}
                 center={coords}
                 onDragend={this.centerMoved}
                 onClick={this.onMapClicked}>
                {breweries && breweries.map((brewery) => (
                    <Marker key={brewery.id} name={brewery.name}
                            position={{lat: brewery.coordinates.latitude, lng: brewery.coordinates.longitude}}
                            onClick={this.onMarkerClick}
                    />
                ))}

                <InfoWindow
                    marker={this.state.activeMarker}
                    visible={this.state.showingInfoWindow}>
                    <div>
                        <h1>{this.state.selectedPlace.name}</h1>
                    </div>
                </InfoWindow>
            </Map>

        )
    }
}

function mapStateToProps({location, breweries}) {
    return {
        radius: location.searchRadius,
        coords: {
            lat: location.coordinates ? location.coordinates.latitude : 0,
            lng: location.coordinates ? location.coordinates.longitude : 0,
        },
        breweries: Object.values(breweries)
    }
}

const ConnectedMapContainer = connect(mapStateToProps)(MapContainer)

export default GoogleApiWrapper({
    apiKey: "AIzaSyAvjcWfrfm_Z_UvTRteqFLhY41KNSZRtrw"
})(ConnectedMapContainer)