const api = "/api/v1";

// Generate a unique token for storing your bookshelf data on the backend server.
let token = localStorage.token;
if (!token)
    token = localStorage.token = Math.random().toString(36).substr(-8);

const headers = {
    'Accept': 'application/json',
    'Authorization': token
};

export const getNeardby = (lat, lon, radius) =>
    fetch(`${api}/breweries?lat=${lat}&lon=${lon},&radius=${radius}`, {headers})
        .then(res => res.json());