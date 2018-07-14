import {RECEIVE_LOCATION, RECEIVE_SEARCH_RADIUS} from "./types";

export function handleGetBrowserLocation() {
    return (dispatch) => {
        navigator.geolocation.getCurrentPosition((position) => {
                const {latitude, longitude} = position.coords
                dispatch(receiveLocation({latitude, longitude}))
            }
        )
    }
}

export function receiveLocation(location) {
    return {
        type: RECEIVE_LOCATION,
        location
    }
}

export function receiveSearchRadius(radius) {
    return {
        type: RECEIVE_SEARCH_RADIUS,
        radius
    }
}