import React from 'react';
import PropTypes from 'prop-types';

const Address = ({address}) => {
    return (
        <div className="address">
            <p>{address.streetAddress1}</p>
            {address.streetAddress2 ? <p>{address.streetAddress2}</p> : ""}
            <p>{address.city}, {address.state} {address.postalCode}</p>
        </div>
    )
};

Address.propTypes = {
    address: PropTypes.object.isRequired
};

export default Address;