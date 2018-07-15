import React, {Component} from 'react'
import {connect} from 'react-redux'
import {Header, Layout, MainSection, Sidebar} from "./styles/layout"
import {handleGetBrowserLocation} from "./actions/location"
import {handleGetBreweries} from './actions/breweries'
import BreweryList from './components/BreweryList'
import Map from "./components/MapContainer";

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
            <Layout>
                <Header>
                    <h1>Looking 4 Beer</h1>
                </Header>
                <Sidebar>
                    <BreweryList/>
                </Sidebar>
                <MainSection>
                    <Map/>
                </MainSection>
            </Layout>
        );
    }
}


export default connect()(App);