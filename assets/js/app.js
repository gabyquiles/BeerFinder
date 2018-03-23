import React from 'react';
import ReactDOM from 'react-dom';
import Map from './components/Map';

const map = document.getElementById('react-map-root');
if (map) {
    try {
        ReactDOM.render(<Map/>, map
        )
        ;
    } catch (error) {
        console.error(error);
    }
}