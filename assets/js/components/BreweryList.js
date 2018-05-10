import React from 'react';
import PropTypes from 'prop-types';

const BreweryList = ({breweries}) => {
    console.log(breweries);
    return (
        <div className="brewery-list">
            <h1>Breweries in your area</h1>
            <ul>
                {breweries.map((brewery) => (
                    <li>{brewery.name}</li>
                ))}
            </ul>
        </div>
    )
};

BreweryList.propTypes = {
    breweries: PropTypes.array.isRequired
};


export default BreweryList;