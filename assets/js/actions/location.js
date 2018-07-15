import {RECEIVE_LOCATION, RECEIVE_SEARCH_RADIUS} from "./types";

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