import React, {Component} from 'react'
import {connect} from 'react-redux'
import '../css/app.scss';
import {handleGetBrowserLocation} from "./actions/location"
import {handleGetBreweries} from './actions/breweries'
import BreweryList from './components/BreweryList'

class App extends Component {

    componentDidMount() {
        const {dispatch} = this.props
        dispatch(handleGetBrowserLocation())

        //TODO: This needs refactoring. It is too ugly
        navigator.geolocation.getCurrentPosition((position) => {
                const {latitude, longitude} = position.coords
                dispatch(handleGetBreweries(latitude, longitude, 5))
            }
        )
    }

    render() {
        return (
            <BreweryList/>
        );
    }
}


export default connect()(App);