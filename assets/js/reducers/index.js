import {combineReducers} from 'redux'
import breweries from './breweries'
import location from './location'

export default combineReducers({
    breweries,
    location
})