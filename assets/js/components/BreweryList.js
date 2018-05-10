import React from 'react';
import PropTypes from 'prop-types';
import BreweryListItem from "./BreweryListItem";

const BreweryList = ({breweries}) => {
    return (
        <div className="brewery-list">
            <h1>Breweries in your area</h1>
            <ul>
                {breweries.map((brewery) => (
                    <li key={brewery.id}><BreweryListItem brewery={brewery}/></li>
                ))}
            </ul>
        </div>
    )
};

BreweryList.propTypes = {
    breweries: PropTypes.array.isRequired
};


export default BreweryList;