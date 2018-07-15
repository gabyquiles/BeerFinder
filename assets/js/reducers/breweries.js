import {RECEIVE_BREWERIES} from "../actions/types";

export default function breweries(state = {}, action) {
    switch (action.type) {
        case RECEIVE_BREWERIES:
            return {
                ...action.breweries
            }
        default:
            return state
    }
}