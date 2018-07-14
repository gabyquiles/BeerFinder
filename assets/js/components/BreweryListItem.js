import React from 'react';
import {connect} from 'react-redux'
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
    breweryId: PropTypes.string.isRequired
};

function mapStateToProps({breweries}, {breweryId}) {
    return {
        brewery: breweries[breweryId]
    }
}

export default connect(mapStateToProps)(BreweryListItem);