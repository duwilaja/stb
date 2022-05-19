var x = document.getElementById("myAudio");
var waypoint = [];

var hostname = window.location.hostname;// != 'backoffice.elingsolo.com' ? 'backoffice.elingsolo.com' : window.location.hostname;

function PlaySound() { 
  x.autoplay = true;
  x.load();
}

var mk = [];

let mymap = new L.Map('mapid', {
    center: new L.LatLng(-6.175540717418276,106.82719230651857), //new L.LatLng(-7.558865108655025, 110.82722410076913), //oslo
    zoom: 12,
	scrollWheelZoom: false, // disable original zoom function
	smoothWheelZoom: true,  // enable smooth zoom 
	smoothSensitivity: 1,   // zoom speed. default is 1
    // layers: [baseLayer, heatmapLayer]
})

// var mymap = L.map("mapid").setView(
// 	[-7.558865108655025, 110.82722410076913],
// 	13
// );

// L.tileLayer(
// 	"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
// 	{
// 		// attribution:
// 		// 	'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
// 		maxZoom: 18,
// 		id: 'mapbox/dark-v10',
// 		tileSize: 512,
// 		zoomOffset: -1,
// 		accessToken:
// 			"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
// 	}
// ).addTo(mymap);

var basemaps = [
	L.tileLayer(
		"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
		{
			// attribution:
			// 	'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/dark-v10',
			tileSize: 512,
			zoomOffset: -1,
			accessToken:
				"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
			label: 'Dark'
		}),
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/light-v10',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label: 'Light'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/streets-v11',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Streets'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/outdoors-v11',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Outdoors'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/satellite-v9',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Satellite'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/satellite-streets-v11',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Satellite Streets'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/navigation-day-v1',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Navigation Day'
    }),
	L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox/navigation-night-v1',
        maxZoom: 18,
        minZoom: 0,
		accessToken:"pk.eyJ1IjoibWF0cmlrbW10IiwiYSI6ImNrb2R3cmtrMzA1aWkydW5xZTMxMGFmYnIifQ.lOy8K-JftfPVgLisOyiMww",
		label : 'Navigation Night'
    }),
];

mymap.addControl(L.control.basemaps({
    basemaps: basemaps,
    tileX: 0,  // tile X coordinate
    tileY: 0,  // tile Y coordinate
    tileZ: 1   // tile zoom level
}));

// L.layerGroup([baseLayer, heatmapLayer]).addTo(mymap);

var map;
var markers = [];
let black_spot = [];
let ts = [];
let rw = [];
let ag = [];
let gm = [];
var i_polisi = 0;
var i_ambulan = 0;
var cctv_arr = [];
var cctv_link = [];
var infoWindow = null;
var label = "";
var titik_arr = [];
var titik_link = [];

var lokasi_arr = [];
var lokasi_link = [];

var polisi_arr = [];
var polisi_link = [];

var damkar_arr = [];
var damkar_link = [];

var rumah_sakit_arr = [];
var rumah_sakit_link = [];

var dishub_arr = [];
var dishub_link = [];

var indicarKey = [];

var kend_indicar = {
	mobil: [],
	route: [],
};
var petugas_indicar = {
	petugas: [],
	route: [],
};

var marker_petugas = [];

$(document).ready(function () {
	//if (Notification.permission !== "granted") Notification.requestPermission();

	/*getData("./Peta/get_kategori_lokasi").then((data) => {
		data.forEach((e) => {
			// let lokasi = document.getElementById('lokasi_solo');
			// lokasi.innerHTML = 'Hello';
		});
	});

	getData("./Api_indicar/get_token").then((data) => {
		indicarKey = data;
	});*/
	//var datakus=[{lat:-6.175392,lng: 106.827153,lokasi:"Nama Lokasi", ket: "Keterangannya"},{lat:-6.185392,lng: 106.817153,lokasi:"Nama Lokasi 2", ket: "Keterangannya Lagi"}];
	//drawMarkers(datakus,"Label nja");
	datasGet("coll_obj","Object Vital");
	datasGet("coll_rawan","Wilayah Rawan");
	datasGet("emergency","Emergency");
	datasGet("rengiat_wal","Pengawalan");
	datasGet("rengiat_suluh","Penyuluhan");
});

/*
const createMarker = ({ map, position }) => {
	new google.maps.Marker({ map, position });
};
*/
var layerControl = L.control.layers(null, {}).addTo(mymap);

function datasGet(t,l){
	$.ajax({
		type: 'POST',
		url: 'peta/datas',
		data: {q:t},
		success: function(data){
			var json=JSON.parse(data);
			drawMarkers(json,l);
		},
		error: function(xhr,stts){
			console.log('Please check your connection'+stts);
			console.log(xhr);
		}
	});
}

function drawMarkers(datas,label){
	var marks=L.layerGroup();
	var br='<br />';
	for(var i=0;i<datas.length;i++){
	  var data=datas[i];
	  var txt='<b>'+data['lokasi']+'</b>'+br+data['ket'];
	  //icon = L.AwesomeMarkers.icon({icon: 'circle-o', prefix: 'fa', markerColor: color});//, className: 'awesome-marker awesome-marker-square'});
	  var mark = L.marker([data['lat'], data['lng']], {}).bindPopup(txt,{autoClose:false});
	  marks.addLayer(mark);
	}
	mymap.addLayer(marks);
	layerControl.addOverlay(marks , label);
}

function updateMarker(marker, latitude, longitude, color, angel, vehiclename) {
	var newLatLng = new L.LatLng(latitude, longitude);
	if (typeof newLatLng !== 'undefined') {
		marker.setLatLng(newLatLng);
	}
	marker.setRotationAngle(angel);
	// createLabel(marker, vehiclename);
	//  alert(newLatLng);
}

//  set your counter to 1
function myLoop(arr_jalan, m, i1, color) {
	setTimeout(function () {
		//  call a 3s setTimeout when the loop is called
		i1++; //  increment the counter
		if (i1 < arr_jalan.length) {
			//  if the counter < 10, call the loop function
			myLoop(arr_jalan, m, i1, color);
			// m.setPosition(new google.maps.LatLng(arr_jalan[i1][0],arr_jalan[i1][1]));
			updateMarker(m, arr_jalan[i1][0], arr_jalan[i1][1], color); //  ..  again which will trigger another
		} //  ..  setTimeout()
	}, 1000);
}

function toggleBounce(marker) {
	if (marker.getAnimation() !== null) {
		marker.setAnimation(null);
	} else {
		marker.setAnimation(google.maps.Animation.BOUNCE);
	}
	// console.log("dsa");
}

function jalankan(x) {
	if (x == "polisi") {
		realtime_polisi();
		$("#modal_progress").modal("show");
		setTimeout(() => {
			$("#modal_progress").modal("hide");
		}, 1000);
	} else if (x == "ambulan") {
		$("#modal_progress").modal("show");
		setTimeout(() => {
			$("#modal_progress").modal("hide");
		}, 1000);
		realtime_ambulan();
	}
}

async function postData(url = "", data = {}) {
	// Default options are marked with *
	const response = await fetch(url, {
		method: "POST", // *GET, POST, PUT, DELETE, etc.
		mode: "cors", // no-cors, *cors, same-origin
		cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
		credentials: "same-origin", // include, *same-origin, omit
		headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: "Bearer " + indicarKey.indicarToken,
			// 'Content-Type': 'application/x-www-form-urlencoded',
		},
		redirect: "follow", // manual, *follow, error
		referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
		body: JSON.stringify(data), // body data type must match "Content-Type" header
	});
	return response.json(); // parses JSON response into native JavaScript objects
}

function realtime_indicar() {
	if (kend_indicar.mobil.length < 1) {
		getMakeMarkerIndicar()
			.then((x) => {
				x.mobil.forEach((m) => {
					// alert("ok 1");
					updateMarker(
						kend_indicar.mobil[m.vehicleid],
						m.position.lat(),
						m.position.lng(),
						"#795548",
						m.rotation,
						m.vehiclename
					);
				});
			})
			.catch((err) => {});
	} else {
		var i = 0;
		postData(
			"https://indicar.id/platform/public/sysapi/vehicles/list",
			{}
		).then((data) => {
			data.dataset.forEach((m) => {
				// alert("ok 2");
				updateMarker(
					kend_indicar.mobil[m.vehicleid],
					m.latitude,
					m.longitude,
					"#795548",
					m.angle,
					m.vehiclename
				);
				zoomObj = document.getElementById("objectZoom").value;
				zoomObjSecond = document.getElementById("objectZoomSecond").value;
				if (zoomObj == m.vehiclename) {
					if (zoomObj != zoomObjSecond) {
						mymap.setView([m.latitude, m.longitude], 18);
					}
				}
			});
		});
	}
}

function createLabel(layer, text) {
	removeLabel(layer);
	var icon = createStaticLabelIcon(text);
	var testspan = document.createElement("div");
	document.body.appendChild(testspan);

	testspan.className = "textwidth";
	testspan.style.fontSize = "10px";
	testspan.style.width = "max-content";
	testspan.innerHTML = text;
	var width = testspan.clientWidth / 2;
	icon.options.iconAnchor = [width, -5]; //That the label is centered

	var label = L.marker(layer.getLatLng(), { icon: icon })
		.addTo(mymap)
		.on("click", zoomMarker);
	layer.appendedLabel = label;

	document.body.removeChild(testspan);
}

function createStaticLabelIcon(labelText) {
	return L.divIcon({
		className: "leaflet-marker-label",
		html:
			'<div class="leaflet-marker-iconlabel" style="background: #fff;color: #000;width:max-content;padding: 0px 6px;border-radius: 10px;margin-top: 8px;opacity: 0.8;border: solid 1px #AAA;font-weight: bold;">' +
			labelText +
			"</div>",
		text: labelText,
	});
}

function removeLabel(layer) {
	if (layer.appendedLabel) {
		mymap.removeLayer(layer.appendedLabel); //Remove label that connected with marker, else the label will not removed
	}
}

function getMakeMarkerIndicar() {
	return new Promise(function (resolve, reject) {
		var marker = {};
		var kend_arr = [];
		var kend_detail = [];
		postData(
			"https://www.indicar.id/platform/public/index.php/sysapi/vehicles/list",
			{}
		).then((data) => {
			data.dataset.forEach((e) => {
				let vehiclegroup = e.vehiclegroup.toLowerCase();
				if (vehiclegroup == "korlantas") {
					var icn = "./my/satupeta/car-polisi.png";
				} else if (vehiclegroup == "damkar") {
					var icn = "./my/satupeta/car-damkar.png";
				} else if (vehiclegroup == "dishub") {
					var icn = "./my/satupeta/car-dishub.png";
				} else if (vehiclegroup == "satpolpp") {
					var icn = "./my/satupeta/car-satpolpp.png";
				} else if (vehiclegroup == "dinkes") {
					var icn = "./my/satupeta/car-ambulan.png";
				} else if (vehiclegroup == "bpbd") {
					var icn = "./my/satupeta/car-bpbd.png";
				} else {
					var icn = "./my/satupeta/car-top-view.png";
				}
				var myIcon = L.icon({
					iconUrl: icn,
					iconSize: [20, 20],
					// iconAnchor: [22, 94],
					// popupAnchor: [-3, -76],
					// // shadowUrl: 'my-icon-shadow.png',
					// shadowSize: [68, 95],
					// shadowAnchor: [22, 94]
				});
				marker = new L.marker([e.latitude, e.longitude], {
					icon: myIcon,
					rotationAngle: e.angle,
				}).addTo(mymap);

				// createLabel(marker, e.vehiclename);
				kend_arr.push(marker)
				kend_detail.push(e)
				kend_indicar.mobil[e.vehicleid] = marker;
				kend_indicar.route[e.vehicleid] = e.angle;
			});
			
			setInfoWindowMobil(kend_arr, kend_detail)
			resolve(kend_indicar);
		});
	});
}

function setInfoWindowMobil(marker = "", kend_detail = '') {
	var info = "";
	return new Promise(function (resolve, reject) {
		// var arr = [];
		marker.forEach((a,b) => {
			postData(
				"https://www.indicar.id/platform/public/index.php/sysapi/vehicles/can",
				{vehicleid : kend_detail[b].vehicleid}
			).then((data) => {
				marker.forEach((v,i) => {
					info = `
					  <div class="mt-3">
					  <table class="w-100">
					  <tr>
					  <td><b>Nama Kendaraan</b></td>
					  <td>:</td>
					  <td>${kend_detail[i].vehiclename}</td>
					  </tr>
					  <tr>
					  <td><b>Nopol</b></td>
					  <td>:</td>
					  <td>${kend_detail[i].nopol}</td>
					  </tr>
					  </table>
					  </div>
					  <div class="row" style="margin-right:0 !important;">
					  </div>
					  </div>`;
		
					marker[i].bindPopup(info, {
						minWidth: 300,
					});
		
					marker[i].on("click", function (e) {
						mymap.setView(e.latlng, 17);
					});
		
				});
			})
		})

	// resolve(arr);

	});
	
}

function get_kend(kend = "polisi") {
	var i = 0;
	const ok = new Promise(function (resolve, reject) {
		postData(
			"https://www.indicar.id/platform/public/index.php/sysapi/vehicles/list",
			{}
		).then((data) => {
			data.dataset.forEach((m) => {
				$(".owl-carousel")
					.trigger("add.owl.carousel", [
						`<div class="item"><a href="#" onclick="tes(${m.vehicleid},'${m.vehiclename}','${m.vehiclegroup}')"><img class="avatar brround w-80" src="../../../../satupeta/aronox/assets/images/users/avatar.png" alt="image" style="height:3rem!important;"></a></div>`,
					])
					.trigger("refresh.owl.carousel");
			});
		});
	});
}

// $('.owl-carousel').owlCarousel({
//   // loop:true,
//   margin:10,
//   nav:false,
//   dots:false,
//   responsive:{
//       0:{
//           items:1
//       },
//       600:{
//           items:3
//       },
//       1000:{
//           items:5
//       }
//   }
// })

// CCTV
function cctv(dinas = "") {
	cctv_link = [];
	prom_get_cctv(dinas).then(function (data) {
		list_cctv(dinas);
	});
}

function create_cctv_map(arrx, item, icon) {
	prom_create_cctv_map(arrx, item, icon).then(function (data) {
		setInfoWindowCCTV(item);
	});
}

function prom_create_cctv_map(arrx, item, icon = null) {
	return new Promise(function (resolve, reject) {
		cctv_arr = [];
		arr = cctv_link;
		if (arrx) arr = arrx;
		if (icon) icons = icon;

		var myIcon = L.icon({
			iconUrl: icon,
			iconSize: [20, 20],
			// iconAnchor: [22, 94],
			// popupAnchor: [-3, -76],
			// // shadowUrl: 'my-icon-shadow.png',
			// shadowSize: [68, 95],
			// shadowAnchor: [22, 94]
		});

		for (let i = 0; i < arr.length; i++) {
			const total = arr[i].total;
			marker = new L.marker([arr[i].kordinat[0], arr[i].kordinat[1]], {
				icon: myIcon,
			}).addTo(mymap);

			// marker = new google.maps.Marker({
			//   position: new google.maps.LatLng(arr[i].kordinat[0], arr[i].kordinat[1]),
			//   map: map,
			//   icon: icons,
			//   Label: {
			//     className:'my-custom-class-for-label',
			//     text:  item == 'traffic_counting' ? `${total}` : ( item == 'average_speed' ? `0 km/h` : (item == 'length_ocupantion' ? `0 m` : ` `)) ,
			//     // fontWeight: 'bold',
			//     // fontSize: '9px',
			//     // fontFamily: '"Courier New", Courier,Monospace',
			//     // color: 'white',
			//   }
			// });
			cctv_arr[arr[i].id] = marker;
		}
		resolve(cctv_arr);
	});
}

function setInfoWindowCCTV(item2 = "", n_titik = "CCTV") {
	var info = "";
	return new Promise(function (resolve, reject) {
		var arr = [];
		cctv_arr.forEach((v,i) => {
		if (n_titik == "CCTV" && item2 == "traffic_counting") {
			const item2 = "Traffic Counting";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
              <iframe class="embed-responsive-item" src="${
								"https://" +
								hostname +
								":5000/?u=" +
								cctv_link[i].rtsp
							}" allowfullscreen></iframe>
              </div>
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${cctv_link[i].nama}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${cctv_link[i].kordinat}</td>
              </tr>
              <tr>
              <td><b>Total Kendaraan Terdata</b></td>
              <td>:</td>
              <td id="total_kend_${cctv_link[i].id}">0</td>
              </tr>
			  <tr>
              <td><b>Tanggal Terdata</b></td>
              <td>:</td>
              <td id="tanggal_kend_${cctv_link[i].id}">-</td>
              </tr>
			  <tr>
              <td><b>Waktu Terdata</b></td>
              <td>:</td>
              <td id="waktu_kend_${cctv_link[i].id}">-</td>
              </tr>
              </table>
              </div>
              <div class="row" style="margin-right:0 !important;">
              </div>
              </div>
              `;

			arr.push('#total_kend_'+cctv_link[i].id);
			arr.push('#tanggal_kend_'+cctv_link[i].id);
			arr.push('#waktu_kend_'+cctv_link[i].id);

		} else if (n_titik == "CCTV" && item2 == "traffic_category") {
			const item2 = "Traffic Category";
			var bdcat = "<tr><td>yeahh<td><td>jancok</td></tr>";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
              <iframe class="embed-responsive-item" src="${
								"https://" +
								hostname +
								":5000/?u=" +
								cctv_link[i].rtsp
							}" allowfullscreen></iframe>
              </div>
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${cctv_link[i].nama}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${cctv_link[i].kordinat}</td>
              </tr>
			  <tr>
              <td><b>Total Pelanggaran Terdata</b></td>
              <td>:</td>
              <td id="pelanggaran_total_${cctv_link[i].id}">0</td>
              </tr>
			  <tr>
			  <tr>
              <td><b>Total Kendaraan Terdata</b></td>
              <td>:</td>
              <td id="total_kend_tc_${cctv_link[i].id}">0</td>
              </tr>
			  <tr>
              <td><b>Tanggal Terdata</b></td>
              <td>:</td>
              <td id="tanggal_kend_tc_${cctv_link[i].id}">-</td>
              </tr>
			  <tr>
              <td><b>Waktu Terdata</b></td>
              <td>:</td>
              <td id="waktu_kend_tc_${cctv_link[i].id}">-</td>
              </tr>
              </table>
              <table class="table table-bordered mt-3">
              <thead>
              <tr>
              <th>Kendaraan</th>
              <th>Jumlah</th>
              </tr>
              </thead>
              <tbody id="t_${cctv_link[i].id}">
				 
              </tbody>
              </table>
              </div>
              <div class="row" style="margin-right:0 !important;">
              </div>
              </div>
              `;

			arr.push('#total_kend_tc_'+cctv_link[i].id);
			arr.push('#tanggal_kend_tc_'+cctv_link[i].id);
			arr.push('#waktu_kend_tc_'+cctv_link[i].id);
			arr.push('#pelanggaran_total_'+cctv_link[i].id);
			arr.push('#t_'+cctv_link[i].id);

			// arr.push('#mobil_tc_'+cctv_link[i].id);
			// arr.push('#motor_tc_'+cctv_link[i].id);
			// arr.push('#bis_tc_'+cctv_link[i].id);
			// arr.push('#truk_tc_'+cctv_link[i].id);


			// var dta =  ary.push(cctv_link[i].traffic_kategori);
			// if (!dta.length) {
			// 	// console.log(cctv_link[i].traffic_kategori)
			// } else{
			// 	console.log(cctv_link[i].traffic_kategori)
			// }
			// console.log(dta);
			//   alert(cctv_link[i].traffic_kategori.kendaraan.length) 
			// setTimeout(() => {
			// 	alert('w')
			// 	// to_table_traffic_category(
			// 	// 	"#t" + cctv_link[i].id,
			// 	// 	cctv_link[i].traffic_kategori
			// 	// );
			// }, 1000);
		} else if (n_titik == "CCTV" && item2 == "average_speed") {
			const item2 = "Average Speed";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
              <iframe class="embed-responsive-item" src="${
								"http://" +
								hostname +
								":5000/?u=" +
								cctv_link[i].rtsp
							}" allowfullscreen></iframe>
              </div>
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${cctv_link[i].nama}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${cctv_link[i].kordinat}</td>
              </tr>
              <tr>
              <td><b>Kecepatan Rata Rata</b></td>
              <td>:</td>
              <td id="avg_speed_${cctv_link[i].id}">0</td>
              </tr>
			  <tr>
              <td><b>Tanggal Terdata</b></td>
              <td>:</td>
              <td id="tanggal_avg_${cctv_link[i].id}">-</td>
              </tr>
			  <tr>
              <td><b>Waktu Terdata</b></td>
              <td>:</td>
              <td id="waktu_avg_${cctv_link[i].id}">-</td>
              </tr>
			  
              </table>
              </div>
              <div class="row" style="margin-right:0 !important;">
              </div>
              </div>
              `;

			  arr.push('#avg_speed_'+cctv_link[i].id);
			  arr.push('#tanggal_avg_'+cctv_link[i].id);
			  arr.push('#waktu_avg_'+cctv_link[i].id);
		} else if (n_titik == "CCTV" && item2 == "length_ocupantion") {
			const item2 = "Length Ocupation";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
              <iframe class="embed-responsive-item" src="${
								"http://" +
								hostname +
								":5000/?u=" +
								cctv_link[i].rtsp
							}" allowfullscreen></iframe>
              </div>
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${cctv_link[i].nama}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${cctv_link[i].kordinat}</td>
              </tr>
              <tr>
              <td><b>Panjang Kemacetan</b></td>
              <td>:</td>
              <td id="length_ocup_${cctv_link[i].id}"></td>
              </tr>
              </table>
              </div>
              <div class="row" style="margin-right:0 !important;">
              </div>
              </div>
              `;
			  arr.push('#length_ocup_'+cctv_link[i].id);
		} else {
			info = `<div><p><b>${n_titik}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
              <iframe class="embed-responsive-item" src="${
								"https://" +
								hostname +
								":5000/?u=" +
								cctv_link[i].rtsp
							}" allowfullscreen></iframe>
              </div>
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${cctv_link[i].nama}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${cctv_link[i].kordinat}</td>
              </tr>
              </table>
              </div>
              <div class="row" style="margin-right:0 !important;">
              </div>
              </div>`;
		}

		cctv_arr[i].bindPopup(info, {
			minWidth: 420,
		});

		cctv_arr[i].on("click", function (e) {
			mymap.setView(e.latlng, 17);

			// traffic_sst(arr,item2,cctv_link[i].trx_id);
			// traffic_dahua(arr,item2);
			if (item2 == "traffic_counting") {
				traffic_counting(arr,cctv_link[i].channel_name)
			}

			if (item2 == "traffic_category") {
				traffic_category(arr,cctv_link[i].channel_name,cctv_link[i].channel_code)
			}

			if (item2 == "average_speed") {
				average_speed(arr,cctv_link[i].channel_name)
			}
		});

	});

	resolve(arr);

	});
	
}

function search_cctv(dinas="") {
	let f_cctv = $('#search-cctv-'+dinas).val().toLowerCase()
	let l_cctv = $('.list_cctv')
	let i_cctv = $('.list_cctv>.list-group-item')
	// var input = document.getElementById("cariKat");
	// var filter = input.value.toLowerCase();
	// var ul = document.getElementById("daftarKategori");
	// var li = document.querySelectorAll("li")
	for(var i = 0; i<i_cctv.length; i++){
		let span = $('.list-group-item>span')[i];
		if(span.innerHTML.toLowerCase().indexOf(f_cctv) > -1){
			i_cctv[i].style.display = "";
		}else{
			i_cctv[i].style.display = "none";
		}
	}
}

function list_cctv(dinas ='') {
	$("#list_cctv_"+dinas).html("");
	setTimeout(() => {
		var no = 0;
		cctv_link.forEach((e) => {
			$("#list_cctv_"+dinas)
				.append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-cctv-${dinas}" onchange="check_cctv('${dinas}')" name="cctv[]" value="${e.id}">
          <span class="name_cctv">${e.nama} </span></div>`);
		});
	}, 300);
}

function check_cctv(dinas='') {
	if (dinas == 'korlantas') {
		icn = "./my/satupeta/cctv_icon_korlantas.png"
	}

	if(dinas == 'dishub') {
		icn = "./my/satupeta/cctv_icon_dishub.png"
	}
	prom_check_cctv().then(function (hasil) {
		prom_clearMarkerCctv().then(function (data) {
			// cctv = hasil;
			create_cctv_map(hasil, label, icn);
		});
	});
}

function prom_clearMarkerCctv() {
	return new Promise(function (resolve, reject) {
		if (cctv_arr) {
				cctv_arr.forEach((v,i) => {
					
				// cctv_arr[i].setMap(null);
				mymap.removeLayer(cctv_arr[i]);
			});
			
			resolve(cctv_arr);
		}
	});
}

function prom_check_cctv() {
	return new Promise(function (resolve, reject) {
		var check_cctv = [];
		setTimeout(() => {
			$('input[name="cctv[]"]:checked').each(function () {
				check_cctv.push(cctv_link[this.value]);
			});
			resolve(check_cctv);
		}, 300);
	});
}

function get_cctv(s = "", item = "") {
	$.ajax({
		type: "POST",
		url: "./Peta/get_cctv",
		dataType: "json",
		data: {
			a: item,
		},
		success: function (r) {
			cctv_link = r;
		},
	});
}

function prom_get_cctv(dinas = "", item = "") {
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./Peta/get_cctv",
			dataType: "json",
			data: {
				a: item,
				dinas : dinas
			},
			success: function (r) {
				r.forEach(o => {
					cctv_link[o.id] = o;
				});

				resolve(cctv_link);
			},
		});
	});
}

function clearMarkerCctv(arr) {
	if (cctv_arr) {
		debugger;
			cctv_arr.forEach((v,i) => {
				cctv_arr[i].setMap(null);
			});
	}
}

function to_table_traffic_category(table = "", data = []) {
	$(table).html("");
	data.forEach((e) => {
		setTimeout(() => {
			$(table).append(
				"<tr><td>" + e.kendaraan + "</td><td>" + e.jumlah + "</td></tr>"
			);
		}, 1000);
	});
}
function get_traffic_category_id(table='',id='') {
	$.ajax({
		type: "POST",
		url: "./Peta/get_traffic_category_id",
		dataType: "json",
		data: {
			id: id,
		},
		success: function (r) {
			$(table).html("");
			r.forEach((e) => {
				$(table).append(
					"<tr><td>" + e.kendaraan + "</td><td>" + e.jumlah + "</td></tr>"
				);
			});
		},
	});
}

// Titik
function show_titik(item = "", item2 = "") {
	setTimeout(() => {
		var varr;
		// var icon = {
		//   scaledSize: new google.maps.Size(20, 20), // scaled size
		//   origin: new google.maps.Point(0,0), // origin
		//   anchor: new google.maps.Point(0,0) // anchor
		// };
		if (item == "cctv" && item2 == "traffic_counting") {
			if ($("#ctco").hasClass("check")) {
				$("#ctco").removeClass("check");
			} else {
				$("#ctco").addClass("check");
			}
		}
		if (item == "cctv" && item2 == "traffic_category") {
			if ($("#ctca").hasClass("check")) {
				$("#ctca").removeClass("check");
			} else {
				$("#ctca").addClass("check");
			}
		}
		if (item == "cctv" && item2 == "average_speed") {
			if ($("#cas").hasClass("check")) {
				$("#cas").removeClass("check");
			} else {
				$("#cas").addClass("check");
			}
		}
		if (item == "cctv" && item2 == "length_ocupantion") {
			if ($("#clo").hasClass("check")) {
				$("#clo").removeClass("check");
			} else {
				$("#clo").addClass("check");
			}
		}

		if (
			item == "cctv" &&
			(item2 == "traffic_counting" ||
				item2 == "traffic_category" ||
				item2 == "average_speed" ||
				item2 == "length_ocupantion")
		) {
			prom_get_cctv("CCTV", item2).then(function (data) {
				// list_cctv();

			});

			label = item2;

			if (item2 == "traffic_counting")
				icon = "./my/satupeta/trafficcounting.png";
			if (item2 == "traffic_category")
				icon = "./my/satupeta/trafficcategory.png";
			if (item2 == "average_speed") icon = "./my/satupeta/avgspeed.png";
			if (item2 == "length_ocupantion") icon = "./my/satupeta/lengthocc.png";

			prom_check_cctv().then(function (hasil) {
				prom_clearMarkerCctv().then(function (data) {
					let cctv = cctv_link;
					if (hasil) {
						cctv = hasil;
					}
					create_cctv_map(cctv, item2, icon);
				});
			});
		}

		if (item == "black_spot") {
			varr = black_spot;
			if ($("#cbs").hasClass("check")) {
				clearMarkerTitik2(item);
				$("#cbs").removeClass("check");
				$(`#jml_data_item_${item}`).remove()
			} else {
				icon = "./my/satupeta/blackspot.png";
				get_titik("Black Spot").then(r => {
					create_titik_map2(item, icon).then(e => {
						$('#jml_data_group').append(`
							<div id="jml_data_item_${item}">
								<div class="jml_data mt-2">
								<span id="jml_data">Jumlah Black Spot <img src="./my/satupeta/blackspot.png" class="jml_data_img"> (<span><b>${r.total}</b></span>)</span>
								</div>
							</div>
						`)
						setInfoWindows2("Black Spot");
					});
					$("#cbs").addClass("check");
				});
			}
		}

		if (item == "trouble_spot") {
			varr = ts;
			if ($("#cts").hasClass("check")) {
				clearMarkerTitik2(item);
				$("#cts").removeClass("check");
				$(`#jml_data_item_${item}`).remove()
			} else {
				icon = "./my/satupeta/troublespot.png";
				get_titik("Trouble Spot").then(r => {
					create_titik_map2(item, icon).then(e => {
						$('#jml_data_group').append(`
							<div id="jml_data_item_${item}">
								<div class="jml_data mt-2">
								<span id="jml_data">Jumlah Trouble Spot <img src="./my/satupeta/troublespot.png" class="jml_data_img"> (<span><b>${r.total}</b></span>)</span>
								</div>
							</div>
						`)
						setInfoWindows2("Trouble Spot");
					});
					$("#cts").addClass("check");
				});
			}
		}

		if (item == "rengiat") {
			if ($("#rg").hasClass("check")) {
				$('#rengiat').addClass('d-none')
				$("#rg").removeClass("check");
			} else {
				$('#rengiat').removeClass('d-none')
				$("#rg").addClass("check");
			}
		}

		if (item == "rawan") {
			// varr = rw;
			// if ($("#cr").hasClass("check")) {
			// 	clearMarkerTitik2(item);
			// 	$("#cr").removeClass("check");
			// } else {
			// 	icon = "./my/satupeta/troublespot.png";
			// 	get_titik("Rawan");
			// 	setTimeout(() => {
			// 		create_titik_map2(item, icon);
			// 		setTimeout(() => {
			// 			setInfoWindows2("Rawan");
			// 		}, 300);
			// 	}, 200);
			// 	$("#cr").addClass("check");
			// }
			if ($("#cr").hasClass("check")) {
				$('#rawan').addClass('d-none')
				$("#cr").removeClass("check");
			} else {
				$('#rawan').removeClass('d-none')
				$("#cr").addClass("check");
			}
		}

		if (item == "ambang_gangguan") {
			varr = ag;
			if ($("#cag").hasClass("check")) {
				clearMarkerTitik2(item);
				$("#cag").removeClass("check");
				$(`#jml_data_item_${item}`).remove()
			} else {
				icon = "./my/satupeta/ambanggangguan.png";
				get_titik("Ambang Gangguan").then(r => {
					create_titik_map2(item, icon).then(e => {
						$('#jml_data_group').append(`
							<div id="jml_data_item_${item}">
								<div class="jml_data mt-2">
								<span id="jml_data">Jumlah Ambang Gangguan <img src="./my/satupeta/ambanggangguan.png" class="jml_data_img"> (<span><b>${r.total}</b></span>)</span>
								</div>
							</div>
						`)
						setInfoWindows2("Ambang Gangguan");
					});
					$("#cag").addClass("check");
				});
			}
		}

		if (item == "giat_masyarakat") {
			varr = gm;
			if ($("#cgm").hasClass("check")) {
				clearMarkerTitik2(item);
				$("#cgm").removeClass("check");
				$(`#jml_data_item_${item}`).remove()
			} else {
				icon = "./my/satupeta/giatmasyarakat.png";
				get_titik("Kegiatan Masyarakat").then(r => {
					create_titik_map2(item, icon).then(e => {
						$('#jml_data_group').append(`
							<div id="jml_data_item_${item}">
								<div class="jml_data mt-2">
								<span id="jml_data">Jumlah Kegiatan Masyarakat <img src="./my/satupeta/giatmasyarakat.png" class="jml_data_img"> (<span><b>${r.total}</b></span>)</span>
								</div>
							</div>
						`)
						setInfoWindows2("Kegiatan Masyarakat");
					});
					$("#cgm").addClass("check");
				});
			}
		}

		if (item == "vvip") {
			// get_route2().then((data) => {
			// 	vvip2(data);
			// });
			// setTimeout(() => {
			// 	console.log('cook',waypoint);
					
			// 	}, 2000);

			if ($("#cvvip").hasClass("check")) {
				$('#vip').addClass('d-none')
				$("#cvvip").removeClass("check");
			} else {
				$('#vip').removeClass('d-none')
				$("#cvvip").addClass("check");
			}
		}
	}, 150);
}

function create_titik_map(arr, img) {
	titik_arr = [];
	var m_titik = [];

	var myIcon = L.icon({
		iconUrl: img,
		iconSize: [20, 20],
	});

	for (i = 0; i < titik_link.length; i++) {
		m_titik = new L.marker([titik_link[i].lat, titik_link[i].lng], {
			icon: myIcon,
		}).addTo(mymap);

		titik_arr.push(m_titik);
	}
}

function create_titik_map2(arr, img) {
	return new Promise(function (resolve, reject) { 
		titik_arr = [];
		let m_titik = [];
	
		var myIcon = L.icon({
			iconUrl: img,
			iconSize: [30, 30],
		});
	
		for (i = 0; i < titik_link.data.length; i++) {
			m_titik = new L.marker([titik_link.data[i].lat, titik_link.data[i].lng], {
				icon: myIcon,
			}).addTo(mymap);
			if (arr == "black_spot") {
				black_spot.push(m_titik);
			}
			if (arr == "trouble_spot") {
				ts.push(m_titik);
			}
			if (arr == "ambang_gangguan") {
				ag.push(m_titik);
			}
			if (arr == "giat_masyarakat") {
				gm.push(m_titik);
			}
			if (arr == "rawan") {
				rw.push(m_titik);
			}
		}

		resolve(titik_link.data);
	})
}

function setInfoWindows(n_titik = "", item2 = "") {
	var info = "";
	for (let i = 0; i < titik_arr.length; i++) {
		if (n_titik == "CCTV" && item2 == "traffic_counting") {
			const item2 = "Traffic Counting";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
            <iframe class="embed-responsive-item" src="${
							"https://" +
							hostname +
							":5000/?u=" +
							cctv_link[i].rtsp
						}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            <tr>
            <td><b>Total Kendaraan</b></td>
            <td>:</td>
            <td id="total_kend_${cctv_link[i].id}">0</td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=traffic_counting" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `;
			
			// setTimeout(() => {
			// 	let tk = 'total_kend_'+cctv_link[i].id;
			// 	traffic_sst([tk],cctv_link[i].trx_id);
			// }, 1000);

		} else if (n_titik == "CCTV" && item2 == "traffic_category") {
			const item2 = "Traffic Category";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
            <iframe class="embed-responsive-item" src="${
							"http://" +
							hostname +
							":5000/?u=" +
							cctv_link[i].rtsp
						}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            </table>
            <table class="table table-bordered mt-3">
            <thead>
            <tr>
            <th>Kendaraan</th>
            <th>Jumlah</th>
            </tr>
            </thead>
            <tbody id="t${cctv_link[i].id}">
            </tbody>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${
							cctv_link[i].id
						}&q=traffic_category" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `;		
			setTimeout(() => {
				alert('hiya')
				// alert(cctv_link[i].traffic_kategori.kendaraan.length)
				// if (cctv_link[i].traffic_kategori.kendaraan.length === 0) {
				// 	alert(cctv_link[i].id)
				// }	
				// to_table_traffic_category(
				// 	"#t" + cctv_link[i].id,
				// 	cctv_link[i].traffic_kategori
				// );
			}, 1000);
		} else if (n_titik == "CCTV" && item2 == "average_speed") {
			const item2 = "Average Speed";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
            <iframe class="embed-responsive-item" src="${
							"http://" +
							hostname +
							":5000/?u=" +
							cctv_link[i].rtsp
						}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            <tr>
            <td><b>Kecepatan Rata Rata</b></td>
            <td>:</td>
            <td></td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${
							cctv_link[i].id
						}&q=average_speed" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `;
		} else if (n_titik == "CCTV" && item2 == "length_ocupantion") {
			const item2 = "Length Ocupation";
			info = `<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
            <iframe class="embed-responsive-item" src="${
							"https://" +
							hostname +
							":5000/?u=" +
							cctv_link[i].rtsp
						}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            <tr>
            <td><b>Panjang Kemacetan</b></td>
            <td>:</td>
            <td></td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${
							cctv_link[i].id
						}&q=length_ocupantion" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `;
		} else {
			info = `<div><p><b>${n_titik}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link[i].lat + "," + titik_link[i].lng}</td>
            </tr>
            <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik_link[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link[i].status}</td>
            </tr>
            <tr>
            <td><b>Jam Mulai</b></td>
            <td>:</td>
            <td>${titik_link[i].jammulai}</td>
            </tr>
            <tr>
            <td><b>Sampai</b></td>
            <td>:</td>
            <td>${titik_link[i].jamsampai}</td>
            </tr>
            <tr>
            <td><b>Penyebab</b></td>
            <td>:</td>
            <td>${titik_link[i].penyebab}</td>
            </tr>
            <tr>
            <td><b>Detail</b></td>
            <td>:</td>
            <td>${titik_link[i].penyebabd}</td>
            </tr>
            <tr>
            <td><b>Sumber Info</b></td>
            <td>:</td>
            <td>${titik_link[i].sumber}</td>
            </tr>
            <tr>
            <td><b>Petugas Lapangan</b></td>
            <td>:</td>
            <td>${titik_link[i].petugas}</td>
            </tr>
            </table>
            </div>
            `;
		}

		mymap.setView(
			{
				lat: parseFloat(titik_link[i].lat),
				lng: parseFloat(titik_link[i].lng),
			},
			13,
			{ animation: true }
		);

		titik_arr[i].bindPopup(info, {
			minWidth: 380,
		});

		titik_arr[i].on("click", function (e) {
			mymap.setView(e.latlng, 17);
		});
	}
}

function setInfoWindows2(n_titik = "") {
	var info = "";
	if (n_titik == "Black Spot") {
		for (let i = 0; i < black_spot.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link.data[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link.data[i].lat + "," + titik_link.data[i].lng}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link.data[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik_link.data[i].status}</td>
            </tr>
            </table>
            </div>
            `;
			mymap.setView(
				{
					lat: parseFloat(titik_link.data[i].lat),
					lng: parseFloat(titik_link.data[i].lng),
				},
				13,
				{ animation: true }
			);

			black_spot[i].bindPopup(info, {
				minWidth: 380,
			});

			black_spot[i].on("click", function (e) {
				mymap.setView(e.latlng, 17);
			});
		}
	}
	if (n_titik == "Trouble Spot") {
		for (let i = 0; i < ts.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
			<hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link.data[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link.data[i].lat + "," + titik_link.data[i].lng}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link.data[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik_link.data[i].status}</td>
            </tr>
            </table>
            </div>
            `;
			mymap.setView(
				{
					lat: parseFloat(titik_link.data[i].lat),
					lng: parseFloat(titik_link.data[i].lng),
				},
				13,
				{ animation: true }
			);

			ts[i].bindPopup(info, {
				minWidth: 380,
			});

			ts[i].on("click", function (e) {
				mymap.setView(e.latlng, 17);
			});
		}
	}
	if (n_titik == "Ambang Gangguan") {
		for (let i = 0; i < ag.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
			<hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link.data[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link.data[i].lat + "," + titik_link.data[i].lng}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link.data[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik_link.data[i].status}</td>
            </tr>
			<tr>
            <td><b>Penyebab</b></td>
            <td>:</td>
            <td>${titik_link.data[i].penyebab}</td>
            </tr>
			<tr>
            <td><b>Detail Penyebab</b></td>
            <td>:</td>
            <td>${titik_link.data[i].penyebabd}</td>
            </tr>
            </table>
            </div>
            `;
			mymap.setView(
				{
					lat: parseFloat(titik_link.data[i].lat),
					lng: parseFloat(titik_link.data[i].lng),
				},
				13,
				{ animation: true }
			);

			ag[i].bindPopup(info, {
				minWidth: 380,
			});

			ag[i].on("click", function (e) {
				mymap.setView(e.latlng, 17);
			});
		}
	}
	if (n_titik == "Kegiatan Masyarakat") {
		for (let i = 0; i < gm.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
			<hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link.data[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link.data[i].lat + "," + titik_link.data[i].lng}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link.data[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Giat</b></td>
            <td>:</td>
            <td>${titik_link.data[i].giat}</td>
            </tr>
			<tr>
            <td><b>Jam Dari</b></td>
            <td>:</td>
            <td>${titik_link.data[i].jamdari}</td>
            </tr>
			<tr>
            <td><b>Jam Sampai</b></td>
            <td>:</td>
            <td>${titik_link.data[i].jamsampai}</td>
            </tr>
			<tr>
            <td><b>Tanggal Dari</b></td>
            <td>:</td>
            <td>${titik_link.data[i].tgldari}</td>
            </tr>
			<tr>
            <td><b>Tanggal Sampai</b></td>
            <td>:</td>
            <td>${titik_link.data[i].tglsampai}</td>
            </tr>
            </table>
            </div>
            `;
			mymap.setView(
				{
					lat: parseFloat(titik_link.data[i].lat),
					lng: parseFloat(titik_link.data[i].lng),
				},
				13,
				{ animation: true }
			);

			gm[i].bindPopup(info, {
				minWidth: 380,
			});

			gm[i].on("click", function (e) {
				mymap.setView(e.latlng, 17);
			});
		}
	}
	if (n_titik == "Rawan") {
		for (let i = 0; i < rw.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
          <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
          <table class="w-100">
          <tr>
          <td><b>Nama Jalan</b></td>
          <td>:</td>
          <td>${titik_link[i].namajalan}</td>
          </tr>
          <tr>
          <td><b>Kordinat</b></td>
          <td>:</td>
          <td>${titik_link[i].lat + "," + titik_link[i].lng}</td>
          </tr>
          <tr>
          <td><b>Tanggal</b></td>
          <td>:</td>
          <td>${titik_link[i].dtm}</td>
          </tr>
          <tr>
          <td><b>Status</b></td>
          <td>:</td>
          <td>${titik_link[i].status}</td>
          </table>
          </div>
          `;
			mymap.setView(
				{
					lat: parseFloat(titik_link[i].lat),
					lng: parseFloat(titik_link[i].lng),
				},
				13,
				{ animation: true }
			);

			rw[i].bindPopup(info, {
				minWidth: 380,
			});

			rw[i].on("click", function (e) {
				mymap.setView(e.latlng, 17);
			});
		}
	}
}

function get_titik(s = "") {
	let f_date_from = $('#f_date_from').val()
	let f_date_to = $('#f_date_to').val()
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./Peta/get_titik?s=" + s,
			dataType: "json",
			data: {from : f_date_from, to : f_date_to},
			success: function (r) {
				titik_link = r;
				$("#n_titik").text(s);
				resolve(titik_link);
			},
		});
	});
	
}

function clearMarkerTitik(arr) {
	if (titik_arr) {
		for (let i = 0; i < titik_arr.length; i++) {
			mymap.removeLayer(titik_arr[i]);
		}
	}
}

function clearMarkerTitik2(arr) {
	if (arr == "black_spot") {
		for (let i = 0; i < black_spot.length; i++) {
			mymap.removeLayer(black_spot[i]);
		}
	}
	if (arr == "trouble_spot") {
		for (let i = 0; i < ts.length; i++) {
			mymap.removeLayer(ts[i]);
		}
	}
	if (arr == "ambang_gangguan") {
		for (let i = 0; i < ag.length; i++) {
			mymap.removeLayer(ag[i]);
		}
	}
	if (arr == "giat_masyarakat") {
		for (let i = 0; i < gm.length; i++) {
			mymap.removeLayer(gm[i]);
		}
	}

	if (arr == "rawan") {
		for (let i = 0; i < rw.length; i++) {
			mymap.removeLayer(rw[i]);
		}
	}
}

// VVIP

function vvip() {
	var control = L.Routing.control({
		position: "bottomleft",
		waypoints: waypoint.jalur,
	}).addTo(mymap);
}

function kalkulasi_jalan(directionsService, directionsRenderer) {
	directionsService.route(
		{
			origin: { lat: waypoint.jalur.start[0], lng: waypoint.jalur.start[1] },
			destination: {
				lat: waypoint.jalur.destination[0],
				lng: waypoint.jalur.destination[1],
			},
			waypoints: waypoint_sub,
			optimizeWaypoints: true,
			// Note that Javascript allows us to access the constant
			// using square brackets and a string value as its
			// "property."
			travelMode: google.maps.TravelMode["DRIVING"],
		},
		(response, status) => {
			if (status == "OK") {
				directionsRenderer.setDirections(response);
			} else {
				window.alert("Directions request failed due to " + status);
			}
		}
	);
}

function get_route() {
	waypoint = [];
	waypoint_sub = [];

	$.ajax({
		type: "GET",
		url: "./Peta/get_jalur?id=1",
		dataType: "json",
		success: function (r) {
			waypoint.jalur = [
				L.latLng(r.jalur.destination[0], r.jalur.destination[1]),
				L.latLng(r.jalur.start[0], r.jalur.start[1]),
			];
		},
	});
}

// Lokasi

function lokasi(name = "") {
	prom_get_lokasi(name).then(function (hasil) {
		list_lokasi(hasil, name);
		// prom_check_lokasi().then(function(hasil2) {
		//   prom_clearMarkerCctv().then(function(data) {
		//     create_lokasi_map(hasil2,label,{
		//       url: "../my/images/cctv.png", // url
		//       scaledSize: new google.maps.Size(20, 20), // scaled size
		//       origin: new google.maps.Point(0,0), // origin
		//       anchor: new google.maps.Point(0,0) // anchor
		//     });
		//   });
		// });
	});
}

function list_lokasi(arr = [], name = "") {
	var lokasi_arr = [];
	$("#list_lokasi_all").html("");
	setTimeout(() => {
		var no = 0;
		arr.forEach((e) => {
			$("#list_lokasi_all")
				.append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-lokasi-all" onchange="check_lokasi('${name}')" name="lokasi_all[]" value="${no++}">
          <span class="name_cctv">${e.nama_lokasi} </span></div>`);
		});
	}, 300);
}

function prom_get_lokasi(name = "") {
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./Peta/get_kategori_lokasi?kategori=" + name + "&json=json",
			dataType: "json",
			data: {
				for: name,
			},
			success: function (r) {
				if (name == "polisi") polisi_link = r.data;
				if (name == "dishub") dishub_link = r.data;
				if (name == "rumah_sakit") rumah_sakit_link = r.data;
				if (name == "damkar") damkar_link = r.data;
				lokasi_link = r;
				resolve(r);
			},
		});
	});
}

function create_lokasi_map(arrx, name) {
	return new Promise(function (resolve, reject) {
		lokasi_arr = [];
		var icon;
		var marker;
		// arr = lokasi_link;
		if (arrx) arr = arrx;
		// if(icon) icons = icon;

		if (name == "polisi") {
			icon = "./my/satupeta/polisi.png";
		} else if (name == "dishub") {
			icon = "./my/satupeta/dishub.png";
		} else if (name == "damkar") {
			icon = "./my/satupeta/icon_damkar.png";
		} else if (name == "rumah_sakit") {
			icon = "./my/satupeta/hospital.png";
		}

		var myIcon = L.icon({
			iconUrl: icon,
			// iconSize: [20, 20],
		});

		for (let i = 0; i < arr.length; i++) {
			marker = new L.marker([arr[i].lat, arr[i].lng]).addTo(mymap);

			lokasi_arr.push(marker);
		}

		resolve(lokasi_arr);
	});
}

function create_lokasi_info_window(arr, data_link, name) {
	return new Promise(function (resolve, reject) {
		var info = "";
		for (let i = 0; i < arr.length; i++) {
			info = `<div><p><b>${data_link[i].nama_lokasi}</b></p>
          <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
          <div class="mt-3">
          <table class="w-100">
          <tr>
          <td><b>Alamat</b></td>
          <td>:</td>
          <td>${data_link[i].deskripsi}</td>
          </tr>
          <tr style="margin-top:10px;">
          <td><b>Kordinat</b></td>
          <td>:</td>
          <td>${data_link[i].lat} , ${data_link[i].lng}</td>
          </tr>
          </table>
          </div>
          </div>`;

			mymap.setView(
				{
					lat: parseFloat(data_link[i].lat),
					lng: parseFloat(data_link[i].lng),
				},
				13,
				{ animation: true }
			);

			arr[i].bindPopup(info, {
				minWidth: 480,
			});

			arr[i].on("click", function (e) {
				mymap.setView("Hellow");
			});
		}

		resolve(true);
	});
}

function check_lokasi(name = "") {
	prom_check_lokasi(name).then(function (hasil) {
		prom_clearMarkerLokasi(lokasi_arr).then(function (data) {
			//   cctv = hasil;
			// create_lokasi_map(hasil);
			// console.log(hasil, name);
			create_lokasi_map(hasil, name).then(function (data1) {
				create_lokasi_info_window(data1, hasil, name);
			});
		});
	});
}

function prom_clearMarkerLokasi(arr) {
	return new Promise(function (resolve, reject) {
		if (arr) {
			for (let i = 0; i < arr.length; i++) {
				mymap.removeLayer(arr[i]);
			}
			resolve(arr);
		}
	});
}

function prom_check_lokasi(name = "") {
	return new Promise(function (resolve, reject) {
		var arr = [];
		var lokasi_arr = [];

		if (name == "polisi") lokasi_arr = polisi_link;
		if (name == "dishub") lokasi_arr = dishub_link;
		if (name == "rumah_sakit") lokasi_arr = rumah_sakit_link;
		if (name == "damkar") lokasi_arr = damkar_link;

		lokasi_arr = lokasi_link;

		setTimeout(() => {
			$('input[name="lokasi_all[]"]:checked').each(function () {
				debugger;
				arr.push(lokasi_arr[this.value]);
			});
			resolve(arr);
		}, 300);
	});
}

function iframe(url = "") {
	document.getElementById("cek_iframe").src = url;
}

async function getData(url = "", data = {}) {
	// Default options are marked with *
	const response = await fetch(url, {
		method: "GET", // *GET, POST, PUT, DELETE, etc.
		mode: "cors", // no-cors, *cors, same-origin
		cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
		credentials: "same-origin", // include, *same-origin, omit
		headers: {
			"Content-Type": "application/json",
			// 'Content-Type': 'application/x-www-form-urlencoded',
		},
		redirect: "follow", // manual, *follow, error
		referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
	});
	return response.json(); // parses JSON response into native JavaScript objects
}

// get url paramater
function GetURLParameter(sParam) {
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split("&");
	for (var i = 0; i < sURLVariables.length; i++) {
		var sParameterName = sURLVariables[i].split("=");
		if (sParameterName[0] == sParam) {
			return sParameterName[1];
		}
	}
}
let lks = GetURLParameter("lokasi");
let lks_nama = GetURLParameter("nama");
let lks_nopols = GetURLParameter("nopol");
let lks_petugas = GetURLParameter("petugas");
let display = GetURLParameter("display");
var urlParameter = {
	lokasi: lks,
	nopols: lks_nopols,
	petugas: lks_petugas,
	display : display
};
var markers = {};
function setMarkers(data) {
	data.BMS.forEach(function (obj) {
		if (!markers.hasOwnProperty(obj.id)) {
			// if (obj.zoom == true) {
			//   mymap.setView([obj.lat, obj.long], 18);
			// }
			markers[obj.id] = new L.Marker([obj.lat, obj.long],{
				icon: 
				  L.icon({
					iconUrl: './my/satupeta/emergency.png',
					className: 'blinking position-marker-custom'
				  })
			})
				.bindPopup("Titik Lokasi Pengaduan: " + decodeURI(lks_nama))
				.on("click", zoomMarker)
				.addTo(mymap);
        mymap.setView([obj.lat, obj.long], 15);
			//
			markers[obj.id].previousLatLngs = [];
		} else {
			markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
			markers[obj.id].setLatLng([obj.lat, obj.long]);
		}
	});
}

function realtime_indicarNopol(nop) {
	if (nop != "") {
		get_nop = nop;
	} else {
		get_nop = "";
	}

	if (kend_indicar.mobil.length < 1) {
		getMakeMarkerIndicarNopol(get_nop)
			.then((x) => {
				x.mobil.forEach((m) => {
					// alert("ok 1");
					updateMarker(
						m,
						m.position.lat(),
						m.position.lng(),
						"#795548",
						m.rotation,
						m.vehiclename
					);
				});
			})
			.catch((err) => {});
	} else {
		var i = 0;
		postData(
			"https://www.indicar.id/platform/public/index.php/sysapi/vehicles/detailbynopol",
			{ nopols: get_nop }
		).then((data) => {
			data.dataset.forEach((m) => {
				updateMarker(
					kend_indicar.mobil[m.vehicleid],
					m.latitude,
					m.longitude,
					"#795548",
					m.angle,
					m.vehiclename
				);
				zoomInOut = document.getElementById("zoomInOut").value;
				zoomObj = document.getElementById("objectZoom").value;
				zoomObjSecond = document.getElementById("objectZoomSecond").value;
				if (zoomObj == m.vehiclename) {
					// alert(zoomInOut);
					if (zoomObj != zoomObjSecond) {
						mymap.setView([m.latitude, m.longitude], 18);
					}
				}
				if (zoomObj == "") {
					mymap.setView([m.latitude, m.longitude], 18);
				}
				// alert(zoomObj);
				//
			});
		});
	}
}
function getMakeMarkerIndicarNopol(nop) {
	return new Promise(function (resolve, reject) {
		var marker = {};
		postData(
			"https://www.indicar.id/platform/public/index.php/sysapi/vehicles/detailbynopol",
			{ nopols: nop }
		).then((data) => {
			data.dataset.forEach((e) => {
				let vehiclegroup = e.vehiclegroup.toLowerCase();
				if (vehiclegroup == "korlantas") {
					var icn = "./my/satupeta/car-polisi.png";
				} else if (vehiclegroup == "damkar") {
					var icn = "./my/satupeta/car-damkar.png";
				} else if (vehiclegroup == "dishub") {
					var icn = "./my/satupeta/car-dishub.png";
				} else if (vehiclegroup == "satpolpp") {
					var icn = "./my/satupeta/car-satpolpp.png";
				} else if (vehiclegroup == "dinkes") {
					var icn = "./my/satupeta/car-ambulan.png";
				}else if (vehiclegroup == "bpbd") {
					var icn = "./my/satupeta/car-bpbd.png";
				} else {
					var icn = "./my/satupeta/car-top-view.png";
				}
				var myIcon = L.icon({
					iconUrl: icn,
					iconSize: [20, 20],
					// iconAnchor: [22, 94],
					// popupAnchor: [-3, -76],
					// // shadowUrl: 'my-icon-shadow.png',
					// shadowSize: [68, 95],
					// shadowAnchor: [22, 94]
				});
				marker = new L.marker([e.latitude, e.longitude], {
					icon: myIcon,
					rotationAngle: e.angle,
				}).addTo(mymap);
				// createLabel(marker, e.vehiclename);
				kend_indicar.mobil[e.vehicleid] = marker;
				kend_indicar.route[e.vehicleid] = e.angle;
			});

			resolve(kend_indicar);
		});
	});
}
function filterLatPetugas(arr){
	const rqid = arr.filter(el => {
	   return el.lat;
	});
	return rqid;
 };
function getMakeMarkerPetugas(lks_petugas,nama_petugas) {
	var ids = null;
	var namas = null;
	if (nama_petugas != "") {
		namas = nama_petugas;
	} else {
		namas = "";
	}
	if (lks_petugas != "") {
		ids = lks_petugas;
	} else {
		ids = "";
	}
	$.ajax({
		type: "POST",
		url: "./Peta/get_petugas/",
		data: { id: ids, nama : namas},
		dataType: "json",
		success: function (result) {
			const array_pet = filterLatPetugas(result.BMS)
			var myIcon = L.icon({
				iconUrl: "./my/satupeta/policeman.png",
				iconSize: [25, 25],
			});
			array_pet.forEach((e,n) => {
				// if (result.BMS.length <= 1) {
				//   mymap.setView([e.lat, e.long], 16);
				// }else{
				//   mymap.setView([-7.558865108655025, 110.82722410076913], 12);
				// }
				marker_petugas[n] = new L.marker([e.lat, e.long], {
					icon: myIcon,
					rotationAngle: "",
				}).addTo(mymap);
				// console.log(marker_petugas[n]);
				createLabel(marker_petugas[n], e.petugas);
				petugas_indicar.petugas[e.id] = marker_petugas[n];
				petugas_indicar.route[e.id] = "";
			});
		},
		error: function (result, status) {
			// console.log(result);
		},
	});
}

function prom_clearMarkerPetugas() {
	return new Promise(function (resolve, reject) {
		if (typeof marker_petugas !== 'undefined') {
				marker_petugas.forEach((v,i) => {
					
				// marker_petugas[i].setMap(null);
				mymap.removeLayer(marker_petugas[i]);
			});			
			resolve(marker_petugas);
		}

	});
}

// spesifik fungsi get parmeter
var zoms = false;
function zoomMarker(e) {
	var nama_marker = e.target.options.icon.options.text;
	zoomMark = document.getElementById("zoomInOut").value;
	zoomObj = document.getElementById("objectZoom").value;
	zoomObjSecond = document.getElementById("objectZoomSecond").value;
	if (zoomMark == "Zoom_in") {
		document.getElementById("zoomInOut").value = "Zoom_out";
		document.getElementById("objectZoom").value = zoomObj;
		document.getElementById("objectZoomSecond").value = nama_marker;
		mymap.setView([e.latlng.lat, e.latlng.lng], 13);
	} else {
		document.getElementById("zoomInOut").value = "Zoom_in";
		document.getElementById("objectZoom").value = nama_marker;
		document.getElementById("objectZoomSecond").value = zoomObj;
		mymap.setView([e.latlng.lat, e.latlng.lng], 20);
	}
}

function get_allIndicar() {
	setTimeout(() => {
		setInterval(() => {
			realtime_indicar();
		}, 3000);

		postData(
			"https://indicar.id/platform/public/sysapi/vehicles/list",
			{}
		).then((data) => {
			$('#list_kendaraan').html('');
			$('#list_kendaraan').append(`<option value="">-- Pilih --</option>`);
			data.dataset.forEach((m) => {
				$('#list_kendaraan').append(`
					<option value="${m.nopol}">${m.vehiclename}</option>
				`)
			});

			setTimeout(() => {
				$('#list_kendaraan').select2()
			}, 1000);
		});
	}, 1000);
}
function get_IndicarNopol(nopol='') {
	if (nopol != '') {
		setTimeout(() => {
			setInterval(() => {
				realtime_indicarNopol(nopol);
			}, 3000);
		}, 1000);
	}else{
		setTimeout(() => {
			setInterval(() => {
				realtime_indicarNopol(lks_nopols);
			}, 3000);
		}, 1000);
	}
}

function get_lokasiPengaduan(zoomGet) {
	let lk = lks.split(",");
	var updatedJson = {
		BMS: [
			{
				id: "lokasi",
				lat: lk[0],
				long: lk[1],
				nama: "",
				zoom: zoomGet,
			},
		],
	};
	// console.log(updatedJson);
	setTimeout(() => {
		setInterval(() => {
			setMarkers(updatedJson);
		}, 1000);
		// PlaySound()
	}, 1000);
	// return updatedJson;
}

function get_lokasiPetugas(lks_petugas,nama_petugas) {
	setTimeout(() => {
		// setInterval(() => {
			if(typeof marker_petugas !== 'undefined'){
				prom_clearMarkerPetugas().then(e => {
					getMakeMarkerPetugas(lks_petugas,nama_petugas);
				})
			}else{
				getMakeMarkerPetugas(lks_petugas);
			}
		// }, 3000);
	}, 1000);
}

function fltr() {
	if ($(".content-filter").hasClass("d-none")) {
		$(".content-filter").removeClass("d-none");
	} else {
		$(".content-filter").addClass("d-none");
	}
}

$(function () {
	// console.clear();
	var zoomGet = null;
	if (urlParameter["lokasi"] != undefined && urlParameter["lokasi"] != "") {
		get_lokasiPengaduan((zoomGet = false));
	}
	if (urlParameter["nopols"] != undefined && urlParameter["nopols"] != "") {
		get_IndicarNopol();
	}
	if (urlParameter["nopols"] != undefined && urlParameter["nopols"] == "") {
		get_allIndicar();
	}
	if (urlParameter["petugas"] != undefined) {
		get_lokasiPetugas(lks_petugas);
	}
	if (urlParameter["display"] == "off") {
		// $('#menu-panel').addClass("d-none");
		// $('#menu-filter').addClass("d-none");
		$('#menu-panel').remove();
		$('#menu-filter').remove();
		$('#menu-trfflow').remove();
		$('#menu-trfkcl').remove();
	}
	// get_allIndicar();
	$('#filter_data_kendaraan').submit(function (x) { 
		x.preventDefault();
		let nopol = $('#list_kendaraan').val()
		get_IndicarNopol(nopol);
	});

	$('#filter_data_petugas').submit(function (x) { 
		x.preventDefault();
		let petugas = $('#petugas').val()
		get_lokasiPetugas('',petugas);
	});
});

// end get url parameter
