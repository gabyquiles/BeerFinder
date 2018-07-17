import React from 'react';
import {connect} from 'react-redux'
import {BreweriesListSidebar} from "../styles/BreweryListStyling"
import BreweryListItem from "./BreweryListItem";

const BreweryList = ({breweriesIds}) => {
    return (
        <BreweriesListSidebar>
            {breweriesIds.map((breweryId) => (
                <BreweryListItem key={breweryId} breweryId={breweryId}/>
            ))}
            {/*<h1>Breweries in your area</h1>*/}
            {/*<ul>*/}
            {/*{breweriesIds.map((breweryId) => (*/}
            {/*<li key={breweryId}><BreweryListItem breweryId={breweryId}/></li>*/}
            {/*))}*/}
            {/*</ul>*/}
        </BreweriesListSidebar>
    )
};

function mapStateToProps({breweries}) {
    return {
        breweriesIds: Object.keys(breweries)
    }
}

export default connect(mapStateToProps)(BreweryList);