function updatePosition({riderPos}) {
  // const marker = [{riderId: 2, riderName: "Berto SanJose",lat: 16.40159478820968, lng: 120.59604921627938},]
  console.log('riderPos', riderPos)
  for (let i = 0; i < riderPos.length; i++) {
    console.log('i')
      marker = new google.maps.Marker({
          position: { lat: riderPos[i].lat, lng: riderPos[i].lng },
          map: map,
      });

      // google.maps.event.addListener(marker, 'click', (function(marker, i) {
      //     return function() {
      //         let content = `<p>name: ${riderPos[i].riderName}</p>` + 
      //             `<p>pos: (${riderPos[i].lat}, ${riderPos[i].lng})</p>`
      //         ;
      //         infoWindow.setContent(content);
      //         infoWindow.open(map, marker);
      //     }
      // })(marker, i));
  }
}

Echo.channel('mappiya')
.listen('RiderMove', (e) => {
  console.log('henlo00', e)
  
  updatePosition(e);
});

console.log('move')