import React, {Component} from 'react'
import {connect} from 'react-redux'
import {Header, Layout, MainSection, Sidebar} from "./styles/layout"
import {handleGetInitialLocation} from './actions/shared'
import BreweryList from './components/BreweryList'
import Map from "./components/MapContainer";

class App extends Component {

    componentDidMount() {
        const {dispatch} = this.props
        dispatch(handleGetInitialLocation())
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