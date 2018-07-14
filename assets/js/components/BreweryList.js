import React from 'react';
import {connect} from 'react-redux'
import BreweryListItem from "./BreweryListItem";

const BreweryList = ({breweriesIds}) => {
    return (
        <div className="brewery-list">
            <h1>Breweries in your area</h1>
            <ul>
                {breweriesIds.map((breweryId) => (
                    <li key={breweryId}><BreweryListItem breweryId={breweryId}/></li>
                ))}
            </ul>
        </div>
    )
};

function mapStateToProps({breweries}) {
    return {
        breweriesIds: Object.keys(breweries)
    }
}

export default connect(mapStateToProps)(BreweryList);