// var locations = [
//     ["LOCATION_1", 11.8166, 122.0942],
//     ["LOCATION_2", 11.9804, 121.9189],
//     ["LOCATION_3", 10.7202, 122.5621],
//     ["LOCATION_4", 11.3889, 122.6277],
//     ["LOCATION_5", 10.5929, 122.6325]
//   ];

// function dt_location(handleData) {
//     $.ajax({
//         url: "./Test/get_formatloc",
//         type: "POST",
//         dataType: "JSON",
//         success: function(data) {
//             handleData(data); 
//         }
//       });
// }

// // $(document).ready(function() {
// //     dt_location(function(output){
// //         console.log(output['Lokasi 1']['lat']);
// //     });
// // })
  
//   var map = L.map('mapTest').setView([11.206051, 122.447886], 8);
//   mapLink =
//     '<a href="http://openstreetmap.org">OpenStreetMap</a>';
//   L.tileLayer(
//     'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//       attribution: '&copy; ' + mapLink + ' Contributors',
//       maxZoom: 18,
//     }).addTo(map);
  
//   for (var i = 0; i < locations.length; i++) {
//       marker = new L.marker([locations[i][1], locations[i][2]]).bindPopup(locations[i][0]).addTo(map).on('click', onClick);
//     // console.log(locations[i][0]);
//     // marker = new L.marker([locations[i][1], locations[i][2]])
//     //   .bindPopup(('click', function(e) {
//     //         alert(locations['LOCATION_1'][0]);
//     //     })).addTo(map);
//     // dt_location(function(output){
//     //     console.log(output['Lokasi 1']['lat']);
//     // });
//     //   console.log(locations[i][0])
//   }

//   function onClick(e) {
//     map.setView([e.latlng.lat,e.latlng.lng], 18);
// }

//   function jancoek() {
//       alert('halow');
      
//   }
// var a = 0;
// if (a != '') {
//     while (true) {
//         console.log('okeh');
//     }
    
// }else{
    
// }
// while (true) {
//     console.log('okeh');
// }

  setInterval(() => { 
    setColor() 
  }, 400);
  
  function setColor() {    
    var x = document.body;    
    x.style.backgroundColor = x.style.backgroundColor == "blue" ? "red" : "blue";
  }
  
//   function stopColor() {
//     clearInterval(idVar);
//   }