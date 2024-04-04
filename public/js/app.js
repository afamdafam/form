let map, directionsService, directionsDisplay, distanceService;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -7.1181799, lng: 110.0475669 },
        zoom: 8,
        scrollwheel: true,
    });
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('directionsPanel')); // Show route directions in directionsPanel

    // Initialize Distance Matrix service
    distanceService = new google.maps.DistanceMatrixService();
}

document.getElementById('directionsForm').addEventListener('submit', function (e) {
    e.preventDefault();
    calculateAndDisplayRoute();
});

function calculateAndDisplayRoute() {
    const start = document.getElementById('startAddress').value;
    const end = document.getElementById('endAddress').value;
    const transportMode = document.getElementById('transportMode').value;

    if (!start || !end) {
        window.alert('Please enter both starting and destination addresses.');
        return;
    }

    // Request for directions using Directions API
    directionsService.route(
        {
            origin: start,
            destination: end,
            travelMode: transportMode // Use selected transport mode
        },
        (response, status) => {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                showRouteInfo(response.routes[0]); // Display route information
                calculateDistanceMatrix(start, end, transportMode); // Calculate distance matrix
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        }
    );
}

function calculateDistanceMatrix(start, end, transportMode) {
    const origin = start;
    const destination = end;

    distanceService.getDistanceMatrix(
        {
            origins: [origin],
            destinations: [destination],
            travelMode: google.maps.TravelMode[transportMode], // Use selected transport mode for Distance Matrix
            unitSystem: google.maps.UnitSystem.METRIC, // You can change this to IMPERIAL if needed
            avoidHighways: false,
            avoidTolls: false
        },
        (response, status) => {
            if (status === 'OK') {
                displayDistanceMatrix(response);
            } else {
                window.alert('Distance Matrix request failed due to ' + status);
            }
        }
    );
}

function displayDistanceMatrix(response) {
    const infoPanel = document.getElementById('infoPanel');
    const rows = response.rows;

    if (rows.length > 0 && rows[0].elements.length > 0) {
        const distance = rows[0].elements[0].distance.text;
        const duration = rows[0].elements[0].duration.text;

        infoPanel.innerHTML += `
            <strong>Distance from Distance Matrix:</strong> ${distance}<br>
            <strong>Duration from Distance Matrix:</strong> ${duration}<br>
        `;
    } else {
        infoPanel.innerHTML += `
            <strong>Distance from Distance Matrix:</strong> N/A<br>
            <strong>Duration from Distance Matrix:</strong> N/A<br>
        `;
    }
}

function showRouteInfo(route) {
    const infoPanel = document.getElementById('infoPanel');
    const distance = route.legs[0].distance.text;
    const duration = route.legs[0].duration.text;
    const transportMode = route.summary;

    infoPanel.innerHTML = `
        <strong>Route:</strong> ${transportMode}<br>
        <strong>Distance from Directions API:</strong> ${distance}<br>
        <strong>Estimated Time from Directions API:</strong> ${duration}<br>
    `;
}
