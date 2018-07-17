import React from 'react'
import PropTypes from 'prop-types'
import {AddressLine} from "../styles/BreweryListStyling"

const Address = ({address}) => {
    return (
        <div className="address">
            <AddressLine>{address.streetAddress1}</AddressLine>
            {address.streetAddress2 && <AddressLine>{address.streetAddress2}</AddressLine>}
            <AddressLine>{address.city}, {address.state} {address.postalCode}</AddressLine>
        </div>
    )
};

Address.propTypes = {
    address: PropTypes.object.isRequired
};

export default Address;