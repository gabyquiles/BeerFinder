import React, {Component} from 'react'
import {GoogleApiWrapper, Map} from 'google-maps-react'
import {connect} from 'react-redux'

// import Map from './Map'


class MapContainer extends Component {
    centerMoved = (mapProps, map) => {
        console.log("MOVED")
    }

    render() {
        if (!this.props.loaded) {
            return <div>Loading GAQ...</div>
        }
        const {coords} = this.props
        console.log(coords)
        return (
            <Map google={this.props.google} zoom={14} initialCenter={{lat: 0, lng: 0}}
                 center={coords}
                 onDragend={this.centerMoved}>
            </Map>

        )
    }
}

function mapStateToProps({location}) {
    return {
        radius: location.searchRadius,
        coords: {
            lat: location.coordinates ? location.coordinates.latitude : 0,
            lng: location.coordinates ? location.coordinates.longitude : 0,
        }
    }
}

const ConnectedMapContainer = connect(mapStateToProps)(MapContainer)

export default GoogleApiWrapper({
    apiKey: "AIzaSyAvjcWfrfm_Z_UvTRteqFLhY41KNSZRtrw"
})(ConnectedMapContainer)

// <Marker onClick={this.onMarkerClick}
// name={'Current location'}/>
//
// <InfoWindow onClose={this.onInfoWindowClose}>
//     <div>
//         <h1>{this.state.selectedPlace.name}</h1>
//     </div>
// </InfoWindow>