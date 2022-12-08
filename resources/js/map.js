// let riderPos = [
//     // {id: 1, name: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},
//     // {id: 2, name: "John Jones",lat: 16.40159478820968, lng: 120.55604921627938},
// ]

let map;
let riderPos = []
let marker, i;
let markers = [];

const baguio = { lat: 16.40159478820968, lng: 120.59604921627938 };
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: baguio,
        zoom: 9,
    });
    setMapOnAll(riderPos)
}

function addMarker(props) {
    let infoWindow = new google.maps.InfoWindow();

    const marker = new google.maps.Marker({
        position: { lat: props.lat, lng: props.lng },
        map,
    });
        google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
            let content = `<p>name: ${props.name}</p>` + 
                `<p>pos: (${props.lat}, ${props.lng})</p>`
            ;
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
        }
    })(marker));
    const id = riderPos.findIndex(index=>props.id === index.id)
    if(id === -1) {
        riderPos.push(props)
        markers.push(marker);
    }
}

function setMapOnAll(props) {
    for (let i = 0; i < props.length; i++) {
        addMarker(props[i])
    }
}

function deleteMarker(riderId) {
    const id = riderPos.findIndex(index=>riderId === index.id)
    markers[id].setMap(null);
    riderPos.splice(id, 1)
    markers.splice(id, 1)
}

function updatePosition(riderId, lat, lng) {
    const id = riderPos.findIndex(index=>riderId === index.id)
    markers[id].setPosition({ lat, lng })
}

Echo.channel('mappiya')
.listen('RiderMove', (e) => {
    switch(e.action) {
        case "inactive":
            deleteMarker(e.id)
            break;
        case "move":
            updatePosition(e.id, e.latitude, e.longitude);
            break;
        case "active":
            addMarker({id: e.id, lat: e.latitude, lng: e.longitude, name: e.name});
            break
        default:
            console.log('error', e)
            break;
    }
});

window.initMap = initMap;