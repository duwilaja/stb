$(document).ready(function () {
	prom_get_trafic()
	prom_get_trafick()
	// setInterval(() => {
		// prom_get_trafic()
	// }, 30000);
});
var ttlmbl = []
var circle = []
var ttllk = []
var circle2 = []

var trf = $('#trff')
var trfk = $('#trfk')

function prom_get_trafic(s = "", item = "") {
	ttlmbl = []
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./Api_dahua/traffic_flow2",
			dataType: "json",
			success: function (r) {
				let dari = r.filter.dari.split(" ")
                let sampai = r.filter.sampai.split(" ")
				r.data.forEach(v => {
					let lat = v.kordinat.split(",")[0]
					let lng = v.kordinat.split(",")[1]
					// let insertedon = new Date(v.insertedon);
					// let date = insertedon.getDate()+'-'+insertedon.getMonth()+'-'+insertedon.getFullYear()
					// let clock = insertedon.getHours()+':'+insertedon.getMinutes()
					let date = v.tgl;
					ttlmbl.push({lat : lat,
							lng : lng,
							total : v.flow,
							tanggal : date,
							jam : dari[1] + ' s.d ' + sampai[1]
						})
				});

				resolve(ttlmbl);
			},
		});
	});
}

function prom_get_trafick(s = "", item = "") {
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./Peta/heat_laka",
			dataType: "json",
			success: function (r) {
				r.forEach(v => {
				// 	let lat = v.kordinat.split(",")[0]
				// 	let lng = v.kordinat.split(",")[1]
					ttllk.push({lat : v.lat,
							lng : v.lng,
							total : v.jumlah,
							detil : v.detil
						})
				});

				resolve(ttllk);
			},
		});
	});
}

let cfg = {
    "radius": 40,
    "useLocalExtrema": true,
    valueField: 'total'
};
let heatmapLayer = new HeatmapOverlay(cfg);

// let cfg2 = {
//     "radius": 40,
//     "useLocalExtrema": true,
//     valueField: 'jumlah'
// };
// let heatmapLayer2 = new HeatmapOverlay(cfg2);

let baseLayer = L.tileLayer(
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
	}
)

let min = Math.min(...ttlmbl.map(total => total.value))
let max = Math.max(...ttlmbl.map(total => total.value))

let min2 = Math.min(...ttllk.map(total => total.value))
let max2 = Math.max(...ttllk.map(total => total.value))

function trfflow() {
	trfk.removeClass('check')
  if (trf.hasClass('check')) {
	  for (let c = 0; c < circle.length; c++) {
		  mymap.removeLayer(circle[c]);
	  }
    // alert('alert')
	heatmapLayer.setData({data:[]});
	trf.removeClass('check')
  }else {
	  prom_get_trafic().then(x => {
		  heatmapLayer.setData({
			  min: min,
			  max: max,
			  data: x
			});
		  trf.addClass('check')
		  for ( var i=0; i < ttlmbl.length; ++i ) 
				{ 
				  circle.push(L.circle([ttlmbl[i].lat, ttlmbl[i].lng], 50, {
					  color: 'transparent',
					  fillColor: 'transparent'
				  })
				  .bindPopup(`
				  <table>
					  <tbody>
					  <tr>
						  <td>Tanggal</td>
						  <td>&nbsp;:&nbsp;</td>
						  <td>${ttlmbl[i].tanggal}</td>
					  </tr>
					  <tr>
						  <td>Jam</td>
						  <td>&nbsp;:&nbsp;</td>
						  <td>${ttlmbl[i].jam}</td>
					  </tr>
					  <tr>
						  <td>Jumlah Kendaraan</td>
						  <td>&nbsp;:&nbsp;</td>
						  <td>${ttlmbl[i].total}</td>
					  </tr>
					  </tbody>
				  </table>
				  `)
				  .addTo(mymap))
				}
		  let layersss = L.layerGroup([baseLayer, heatmapLayer]).addTo(mymap);
	  })
  }
}

function trfkcl() {
	trf.removeClass('check')
	if (trfk.hasClass('check')) {
		for (let c = 0; c < circle2.length; c++) {
			mymap.removeLayer(circle2[c]);
		}
	  // alert('alert')
	  heatmapLayer.setData({data:[]});
	  trfk.removeClass('check')
	}else {
		prom_get_trafick().then(x => {
			heatmapLayer.setData({
				min: min2,
				max: max2,
				data: x
			  });
			trfk.addClass('check')
			for ( var i=0; i < ttllk.length; ++i ) 
				  { 
					circle2.push(L.circle([ttllk[i].lat, ttllk[i].lng], 50, {
						color: 'transparent',
						fillColor: 'transparent'
					})
					.bindPopup('Jenis Kecelakaan : ' + ttllk[i].detil)
					.addTo(mymap))
				  }
			let layersss = L.layerGroup([baseLayer, heatmapLayer]).addTo(mymap);
		})
	}
  }
