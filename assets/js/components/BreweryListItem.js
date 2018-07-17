import React from 'react';
import {connect} from 'react-redux'
import PropTypes from 'prop-types';
import {BrewerySummary, BrewerySummaryName, DistanceLine, StyledAddress} from '../styles/BreweryListStyling'
import Address from './Address';

const BreweryListItem = ({brewery}) => {
    return (
        <BrewerySummary>
            <BrewerySummaryName>{brewery.name}</BrewerySummaryName>
            <StyledAddress>
                <Address address={brewery.address}/>
                <DistanceLine>Distance: {Number(Math.round(brewery.distance + 'e2') + 'e-2')} mi</DistanceLine>
            </StyledAddress>
        </BrewerySummary>
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