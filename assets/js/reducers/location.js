import {RECEIVE_LOCATION, RECEIVE_SEARCH_RADIUS} from "../actions/types";

export default function location(state = {searchRadius: 5}, action) {
    switch (action.type) {
        case RECEIVE_LOCATION:
            const coordinates = action.location
            return {
                ...state,
                coordinates
            }
        case RECEIVE_SEARCH_RADIUS:
            return {
                ...state,
                ...action.searchRadius
            }
        default:
            return state
    }
}