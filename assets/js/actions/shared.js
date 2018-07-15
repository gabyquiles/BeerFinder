import {receiveLocation} from "./location"
import {handleGetBreweries} from "./breweries";

export function handleGetInitialLocation() {
    return (dispatch) => {
        navigator.geolocation.getCurrentPosition((position) => {
                const {latitude, longitude} = position.coords
                dispatch(handleChangeLocation(latitude, longitude))
            }
        )
    }
}

export function handleChangeLocation(latitude, longitude) {
    return (dispatch, getState) => {
        dispatch(receiveLocation({latitude, longitude}))
        const {location} = getState()
        const {searchRadius} = location
        dispatch(handleGetBreweries(latitude, longitude, searchRadius))
    }
}