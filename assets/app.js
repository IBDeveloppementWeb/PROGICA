/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import AOS from 'aos';
AOS.init();

import Places from'places.js';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css'

// Places
let inputAdresse = document.querySelector('#gite_adresse')

if(inputAdresse !== null){
    let place = Places({
        container: inputAdresse
    })

    place.on('change', function(e){
        document.querySelector('#gite_ville').value = e.suggestion.city
        document.querySelector('#gite_codePostal').value = e.suggestion.postcode
        document.querySelector('#gite_lat').value = e.suggestion.latlng.lat
        document.querySelector('#gite_lng').value = e.suggestion.latlng.lng
    })
}

// Leaflet
let map = document.querySelector('#map')
if (map !== null){
    let icon = L.icon({
        iconUrl: '/images/gites/icon-gps.png',
        iconSize: [35, 70],
     });
    let center = [map.dataset.lat, map.dataset.lng];
    map = L.map('map').setView(center, 18)
    let token ='pk.eyJ1Ijoic2lsdmVydmxhZCIsImEiOiJja3FqaG95aWgwMTFuMm5wbHNtcGFpazZ5In0.sNen8GcYqjmecbxvQm0mKQ'
    L.tileLayer(`https://api.mapbox.com/v4/mapbox.mapbox-streets-v8/{z}/{x}/{y}.png?access_token=${token}`, {
        maxZoom: 18,
        minZoom: 5
        }).addTo(map)
    L.marker(center, {icon: icon}).addTo(map);
}