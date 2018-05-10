import React from 'react';
import PropTypes from 'prop-types';
import Address from './Address';

const BreweryListItem = ({brewery}) => {
    return (
        <div className="brewery-list-item">
            <h4>{brewery.name}</h4>
            <Address address={brewery.address}/>
        </div>
    )
};

BreweryListItem.propTypes = {
    brewery: PropTypes.object.isRequired
};

export default BreweryListItem;