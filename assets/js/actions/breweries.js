import {getNeardby} from '../Looking4BeerAPI'
import {RECEIVE_BREWERIES} from "./types";

export function handleGetBreweries(lat, lon, radius) {
    return (dispatch) => {
        getNeardby(lat, lon, radius).then((breweries) => {
            dispatch(receiveBreweries(breweries))
        });
    }
}

export function receiveBreweries(breweries) {
    return {
        type: RECEIVE_BREWERIES,
        breweries
    }
}