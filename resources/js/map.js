let map;
let riderPos = [
    // {riderId: 1, riderName: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},
    {riderId: 2, riderName: "John Jones",lat: 16.40159478820968, lng: 121.55604921627938},
]

const baguio = { lat: 16.40159478820968, lng: 120.59604921627938 };
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: baguio,
        zoom: 10,
    });
    let infoWindow = new google.maps.InfoWindow(), marker, i;
    
    for (i = 0; i < riderPos.length; i++) {
        marker = new google.maps.Marker({
            position: { lat: riderPos[i].lat, lng: riderPos[i].lng },
            map: map,
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                let content = `<p>name: ${riderPos[i].riderName}</p>` + 
                    `<p>pos: (${riderPos[i].lat}, ${riderPos[i].lng})</p>`
                ;
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            }
        })(marker, i));
    }
}

function updatePosition(marker) {
    const marker = [{riderId: 2, riderName: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},]

    for (i = 0; i < riderPos.length; i++) {
        marker = new google.maps.Marker({
            position: { lat: riderPos[i].lat, lng: riderPos[i].lng },
            map: map,
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                let content = `<p>name: ${riderPos[i].riderName}</p>` + 
                    `<p>pos: (${riderPos[i].lat}, ${riderPos[i].lng})</p>`
                ;
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            }
        })(marker, i));
    }
}

Echo.channel('mappiya')
.listen('RiderMove', (e) => {
    console.log('henlo', e)
    
    // updatePosition(e.lat, e.lng);
});

window.initMap = initMap;