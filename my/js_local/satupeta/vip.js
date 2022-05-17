var jalur = [];
var routingControl = [];
function vip(param = "") {
	prom_get_vip().then(function (data) {
		list_vip();
	});
}

function prom_get_vip() {
	let f_date_from = $('#f_date_from').val()
	let f_date_to = $('#f_date_to').val()
	return new Promise(function (resolve, reject) {
		$.ajax({
			type: "POST",
			url: "./API/intan/API/get_rengiat_vip",
			dataType: "json",
			headers: {
				"token": "5b3dac76aaee24d14185cbc3d010fd20",
			  },
			data: {from : f_date_from, to : f_date_to},
			success: function (r) {
				vip_link = r;
				resolve(vip_link);
			},
		});
	});
}

function list_vip() {
	$("#list_vip").html("");
	setTimeout(() => {
		var no = 0;
		vip_link.values.forEach((e) => {
			$("#list_vip")
				.append(`
				<div class="list-group-item list-group-item-action">
					<div class="row">
						<div class="col-1">
							<input type="radio" class="mr-2 check-jalan-vip" onchange="check_vip(${e.rengiatid})" name="vip[]" value="${no++}">
						</div>
						<div class="col-11">
							<span class="jalan_vip">${e.obyeklain != '' ? e.obyeklain : e.obyek} - ${e.pejabat} </span>
					  		<span class="btn btn-primary btn-sm" onclick="prom_detail_vip(${e.rowid})" data-toggle="modal" data-target="#vipModal">detail</span>
						</div>
					</div>
				</div>
				`);
		});
	}, 300);
}

// function check_vip(id = '') {
// 	get_vvip(id).then(function (data) {
//         vvip_route(data);
// 	});

// }

function check_vip(id='') {
    prom_check_vip().then(function (e) {
        prom_clearMarkerVip().then(function (a) {
            get_vvip(id).then(function (data) {
                vvip_route(data)
            })
        })
    })
}

function vvip_route(data) {

	routingControl.push(L.Routing.control({
		position: "bottomleft",
		waypoints:data 
	}).addTo(mymap))
}

function prom_check_vip() {
	return new Promise(function (resolve, reject) {
		var check_vip = [];
		setTimeout(() => {
			$('input[name="vip[]"]:checked').each(function () {
				check_vip.push(vip_link[this.value]);
			});
			resolve(check_vip);
		}, 300);
	});
}

function prom_detail_vip(id='') {
	$('#tbl_detail_vip').html('')
	return new Promise (function(resolve, reject){
        jalur = [];
		$.ajax({
			type: "POST",
			url: "./API/intan/API/get_rengiat_vip_by_id",
			dataType: "json",
			data: {id : id},
			headers: {
				"token": "5b3dac76aaee24d14185cbc3d010fd20",
			  },
			success: function (r) {
				let v = r.values
				$('#tbl_detail_vip').append(`
					<tr>
						<td>${v[0].tanggal}</td>
						<td>${v[0].obyeklain != '' ? v[0].obyeklain : v[0].obyek}</td>
						<td>${v[0].pejabat}</td>
						<td>${v[0].asal}</td>
						<td>${v[0].tujuan}</td>
						<td>${v[0].wasdal}</td>
						<td>${v[0].anggota1}</td>
						<td>${v[0].anggota2}</td>
						<td>${v[0].anggota3}</td>
					</tr>
				`)

			},
		})
	});
}

function prom_clearMarkerVip() {
	return new Promise(function (resolve, reject) {
		if (routingControl) {
			for (let i = 0; i < routingControl.length; i++) {
				mymap.removeControl(routingControl[i]);
			}
			resolve(routingControl);
		}
	});
}

function get_vvip(id = '') {
	
	return new Promise (function(resolve, reject){
        jalur = [];
		$.ajax({
			type: "POST",
			url: "./API/intan/API/get_rengiat_vip_detail",
			dataType: "json",
			data: {rengiatid : id},
			headers: {
				"token": "5b3dac76aaee24d14185cbc3d010fd20",
			  },
			success: function (r) {
				console.log(r.values);
				r.values.forEach(v => {
					jalur.push(L.latLng(v.lat, v.lng));
				});

				resolve(jalur);

			},
		})
	});

}



$('#hapusVip').on('click', function() {
    mymap.removeControl(routingControl.pop());
    $('input[name="vip[]"]').prop('checked',false);
    // mymap.setZoom(18);
});


