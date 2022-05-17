let rengiat_arr =[]
let rengiat_link =[]
function rengiat(p="") {
	var nama = '';
	if (p == 'PAM Road Savety') {
		prom_get_rengiat("./Peta/get_rengiat?filter=",p).then(function (data) {
			nama = 'prs';
			list_rengiat(data,'#list_prs',nama,'./my/satupeta/giatmasyarakat1.png');
			rengiat_link[nama] = data;
		});
	}if (p == 'Road Savety Campaign'){
		prom_get_rengiat("./Peta/get_rengiat?filter=",p).then(function (data) {
			nama = 'rsc';
			list_rengiat(data,'#list_rsc',nama,'./my/satupeta/giatmasyarakat1.png');
			rengiat_link[nama] = data;
		});
	}
	if (p == 'Sosialisasi'){
		prom_get_rengiat("./Peta/get_rengiat?filter=",p).then(function (data) {
			nama = 'sosialisasi';
			list_rengiat(data,'#list_sosialisasi',nama,'./my/satupeta/giatmasyarakat1.png');
			rengiat_link[nama] = data;
		});
	}
	if (p == 'Publikasi'){
		prom_get_rengiat("./Peta/get_rengiat?filter=",p).then(function (data) {
			nama = 'publikasi';
			list_rengiat(data,'#list_publikasi',nama,'./my/satupeta/giatmasyarakat1.png');
			rengiat_link[nama] = data;
		});
	}
	if (p == 'Survey'){
		prom_get_rengiat("./Peta/get_rengiat?filter=",p).then(function (data) {
			nama = 'rss';
			list_rawan(data,'#list_rss',nama,'./my/satupeta/giatmasyarakat1.png');
			rengiat_link[nama] = data;
		});
	}
}

function prom_get_rengiat(url,item="") {
	let f_date_from = $('#f_date_from').val()
	let f_date_to = $('#f_date_to').val()
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: url+item,
			dataType: "json",
			data: {from : f_date_from, to : f_date_to},
			success: function (r) {
				resolve(r);
			},
		});
	});
}

function list_rengiat(data,id,name,icon) {
	$(id).html("");
	setTimeout(() => {
		var no = 0;
		data.forEach((e) => {
			$(id)
				.append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-rengiat-${name}" onchange="check_rengiat('${name}','${icon}')" name="${name}[]" value="${no++}">
          <span>${e.lokasi} </span></div>`);
		});
	}, 300);
}

function check_rengiat(name,icon) {
	prom_check_rengiat(name).then(function (hasil) {
		prom_clearMarkerRengiat().then(function (data) {
			rengiat = hasil;
			create_rengiat_map(rengiat, label, icon,name);
		});
	});
}

function prom_clearMarkerRengiat() {
	return new Promise(function (resolve, reject) {
		if (rengiat_arr) {
			for (let i = 0; i < rengiat_arr.length; i++) {
				mymap.removeLayer(rengiat_arr[i]);
			}
			resolve(rengiat_arr);
		}
	});
}

function prom_check_rengiat(name) {
	return new Promise(function (resolve, reject) {
		var check_rengiat = [];
		setTimeout(() => {
			$('input[name="'+name+'[]"]:checked').each(function () {
				check_rengiat.push(rengiat_link[name][this.value]);
			});
			resolve(check_rengiat);
		}, 300);
	});
}

function create_rengiat_map(arrx, item, icon,name) {
	prom_create_rengiat_map(arrx, item, icon,name).then(function (data) {
		setInfoWindowRengiat(name);
	});
}

function prom_create_rengiat_map(arrx, item, icon = null,name) {
	return new Promise(function (resolve, reject) {
		rengiat_arr = [];
		arr = rengiat_link[name];
		if (arrx) arr = arrx;
		if (icon) icons = icon;

		var myIcon = L.icon({
			iconUrl: icon,
			iconSize: [20, 20],
		});

		for (let i = 0; i < arr.length; i++) {
			const total = arr[i].total;
			marker = new L.marker([arr[i].lat, arr[i].lng], {
				icon: myIcon,
			}).addTo(mymap);
			rengiat_arr.push(marker);
		}

		resolve(rengiat_arr);
	});
}

function setInfoWindowRengiat(name = "", n_titik = "TITIK") {
	var info = "";
	for (let i = 0; i < rengiat_arr.length; i++) {
			info = `<div><p><b>${rengiat_link[name][i].jenis}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="mt-3">
              <table class="w-100">
			  <tr>
              <td><b>Tanggal</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].tgldari} s/d ${rengiat_link[name][i].tglsampai}</td>
              </tr>
			  <tr>
              <td><b>Jam</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].jamdari} s/d ${rengiat_link[name][i].jamsampai}</td>
              </tr>
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].lokasi}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].lat}, ${rengiat_link[name][i].lng}</td>
              </tr>
			  <tr>
              <td><b>Jenis</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].jenis}</td>
              </tr>
			  <tr>
              <td><b>Rincian Kegiatan</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].rincian}</td>
              </tr>
			  <tr>
              <td><b>Sasaran</b></td>
              <td>:</td>
              <td>${rengiat_link[name][i].sasaran}</td>
              </tr>
              </table>
              </div>
              </div>
              `;

		rengiat_arr[i].bindPopup(info, {
			minWidth: 420,
		});

		rengiat_arr[i].on("click", function (e) {
			mymap.setView(e.latlng, 17);
		});
	}
}