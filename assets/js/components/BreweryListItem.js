import React from 'react';
import PropTypes from 'prop-types';
import Address from './Address';

const BreweryListItem = ({brewery}) => {
    return (
        <div className="brewery-list-item">
            <h4>{brewery.name}</h4>
            <Address address={brewery.address}/>
            <p>Distance: {Number(Math.round(brewery.distance + 'e2') + 'e-2')} mi</p>
        </div>
    )
};

BreweryListItem.propTypes = {
    brewery: PropTypes.object.isRequired
};

export default BreweryListItem;