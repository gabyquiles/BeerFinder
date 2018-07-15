import React, {Component} from 'react'
import {GoogleApiWrapper, Map, Marker} from 'google-maps-react'
import {connect} from 'react-redux'
import {handleChangeLocation} from "../actions/shared"

class MapContainer extends Component {
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
                 onDragend={this.centerMoved}>
                {breweries && breweries.map((brewery) => (
                    <Marker key={brewery.id} name={brewery.name}
                            position={{lat: brewery.coordinates.latitude, lng: brewery.coordinates.longitude}}/>
                ))}
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