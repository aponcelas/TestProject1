var map = L.map('map').setView([51.505, -0.09], 13);  // Cambia las coordenadas y el zoom según tus necesidades

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([51.5, -0.09]).addTo(map); // Cambia las coordenadas del marcador