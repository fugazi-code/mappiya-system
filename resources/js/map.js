let map;
let riderPos = [
    {id: 1, riderName: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},
    {id: 2, riderName: "John Jones",lat: 16.40159478820968, lng: 120.55604921627938},
]
let marker, i;

let markers = [];


const baguio = { lat: 16.40159478820968, lng: 120.59604921627938 };
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: baguio,
        zoom: 9,
    });
    // let infoWindow = new google.maps.InfoWindow();
    
    // for (i = 0; i < riderPos.length; i++) {
    //     marker = new google.maps.Marker({
    //         position: { lat: riderPos[i].lat, lng: riderPos[i].lng },
    //         map: map,
    //     });

    //     // google.maps.event.addListener(marker, 'click', (function(marker, i) {
    //     //     return function() {
    //     //         let content = `<p>name: ${riderPos[i].riderName}</p>` + 
    //     //             `<p>pos: (${riderPos[i].lat}, ${riderPos[i].lng})</p>`
    //     //         ;
    //     //         infoWindow.setContent(content);
    //     //         infoWindow.open(map, marker);
    //     //     }
    //     // })(marker, i));
    // }

    addMarker(riderPos)
    setMapOnAll()
}

function addMarker(props) {
    let infoWindow = new google.maps.InfoWindow();
    for (let i = 0; i < props.length; i++) {
        const marker = new google.maps.Marker({
            position: { lat: props[i].lat, lng: props[i].lng },
            map,
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
        markers.push(marker);
    }
}

function setMapOnAll() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// function showMarkers() {
//     setMapOnAll(map);
// }

function deleteMarker(riderId) {
    console.log('riderId', riderId)
    const id = riderPos.findIndex(index=>riderId === index.id)
    markers[id].setMap(null);
}

function updatePosition(riderId, lat, lng) {
    const id = riderPos.findIndex(index=>riderId === index.id)
    markers[id].setPosition({ lat, lng })
}

// function updatePosition(riderId, lat, lng) {
//     // const marker = [{riderId: 2, riderName: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},]
//     console.log('riderPos', riderPos)
//     for (i = 0; i < riderPos.length; i++) {
//         // marker = new google.maps.Marker({
//         //     position: { lat: riderPos[i].lat, lng: riderPos[i].lng },
//         //     map: map,
//         // });

//         // google.maps.event.addListener(marker, 'click', (function(marker, i) {
//         //     return function() {
//         //         let content = `<p>name: ${riderPos[i].riderName}</p>` + 
//         //             `<p>pos: (${riderPos[i].lat}, ${riderPos[i].lng})</p>`
//         //         ;
//         //         infoWindow.setContent(content);
//         //         infoWindow.open(map, marker);
//         //     }
//         // })(marker, i));
//         marker.setPosition({ lat: riderPos[i].lat, lng: riderPos[i].lng })
//     }
// }


Echo.channel('mappiya')
.listen('RiderMove', (e) => {
    switch(e.action) {
        case "inactive":
            deleteMarker(e.id)
            break;
        case "move":
            updatePosition(e.id, e.latitude, e.longitude);
            break;
        default:
            console.log('error', e)
            break;
    }
});

window.initMap = initMap;