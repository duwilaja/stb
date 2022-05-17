let rawan_arr =[]
let rawan_link =[]
function rawan(p="") {
	var nama = '';
	if (p == 'Rawan Laka') {
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'laka';
			list_rawan(data,'#list_laka',nama,'./my/satupeta/rawan-laka.png');
			rawan_link[nama] = data;
		});
	}if (p == 'Rawan Macet'){
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'macet';
			list_rawan(data,'#list_macet',nama,'./my/satupeta/rawan-macet.png');
			rawan_link[nama] = data;
		});
	}
	if (p == 'Rawan Longsor'){
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'longsor';
			list_rawan(data,'#list_longsor',nama,'./my/satupeta/rawan-longsor.png');
			rawan_link[nama] = data;
		});
	}
	if (p == 'Rawan Banjir'){
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'banjir';
			list_rawan(data,'#list_banjir',nama,'./my/satupeta/rawan-banjir.png');
			rawan_link[nama] = data;
		});
	}
	if (p == 'Rawan Pohon Tumbang'){
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'pohon_tumbang';
			list_rawan(data,'#list_pohon_tumbang',nama,'./my/satupeta/rawan-pohontumbang.png');
			rawan_link[nama] = data;
		});
	}
	if (p == 'Rawan Tindak Pidana'){
		prom_get_rawan("./Peta/get_rawan?filter=",p).then(function (data) {
			nama = 'tindak_pidana';
			list_rawan(data,'#list_tindak_pidana',nama,'./my/satupeta/rawan-tindakpidana.png');
			rawan_link[nama] = data;
		});
	}
}

function prom_get_rawan(url,item="") {
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

function list_rawan(data,id,name,icon) {
	$(id).html("");
	setTimeout(() => {
		var no = 0;
		data.forEach((e) => {
			$(id)
				.append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-rawan-${name}" onchange="check_rawan('${name}','${icon}')" name="${name}[]" value="${no++}">
          <span>${e.namajalan} </span></div>`);
		});
	}, 300);
}

function check_rawan(name,icon) {
	prom_check_rawan(name).then(function (hasil) {
		prom_clearMarkerRawan().then(function (data) {
			// rwn = hasil;
			create_rawan_map(hasil, label, icon,name);
		});
	});
}

function prom_clearMarkerRawan() {
	return new Promise(function (resolve, reject) {
		if (rawan_arr) {
			for (let i = 0; i < rawan_arr.length; i++) {
				mymap.removeLayer(rawan_arr[i]);
			}
			resolve(rawan_arr);
		}
	});
}

function prom_check_rawan(name) {
	return new Promise(function (resolve, reject) {
		var check_rawan = [];
		setTimeout(() => {
			$('input[name="'+name+'[]"]:checked').each(function () {
				check_rawan.push(rawan_link[name][this.value]);
			});
			resolve(check_rawan);
		}, 300);
	});
}

function create_rawan_map(arrx, item, icon,name) {
	prom_create_rawan_map(arrx, item, icon,name).then(function (data) {
		setInfoWindowRawan(name);
	});
}

function prom_create_rawan_map(arrx, item, icon = null,name) {
	return new Promise(function (resolve, reject) {
		rawan_arr = [];
		arr = rawan_link[name];
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
			rawan_arr.push(marker);
		}

		resolve(rawan_arr);
	});
}

function setInfoWindowRawan(name = "", n_titik = "TITIK RAWAN") {
	var info = "";
	for (let i = 0; i < rawan_arr.length; i++) {
			info = `<div><p><b>${n_titik}</b></p>
              <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
              <div class="mt-3">
              <table class="w-100">
              <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td>${rawan_link[name][i].namajalan}</td>
              </tr>
              <tr>
              <td><b>Kordinat</b></td>
              <td>:</td>
              <td>${rawan_link[name][i].lat}, ${rawan_link[name][i].lng}</td>
              </tr>
			  <tr>
              <td><b>Status</b></td>
              <td>:</td>
              <td>${rawan_link[name][i].status}</td>
              </tr>
              </table>
              </div>
              </div>
              `;

		rawan_arr[i].bindPopup(info, {
			minWidth: 420,
		});

		rawan_arr[i].on("click", function (e) {
			mymap.setView(e.latlng, 17);
		});
	}
}