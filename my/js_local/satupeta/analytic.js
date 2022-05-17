var url_ = '';
var token_analytic = '';
var data_analytic = {};

function traffic_dahua(obj=[],item='') {
    get_data_analytic('dahua').then((c) => {
           data_analytic = c.data[0];
           
           if (obj) {
               if (item == 'traffic_counting') {
                    obj.forEach(e => {
                        let split = e.split('_');
                        if (split[0] == "#waktu") {
                            $(e).text(c.data[0].waktu);
                        }else if (split[0] == "#tanggal") {
                            $(e).text(c.data[0].tanggal);
                        }else if(split[0] == "#total"){
                            $(e).text(c.data[0].total);
                        }
                    });
               }else if(item == 'traffic_category'){
                obj.forEach(e => {
                    let split = e.split('_');
                    if (split[0] == "#waktu") {
                     $(e).text(c.data[0].waktu);
                    }else if (split[0] == "#tanggal") {
                     $(e).text(c.data[0].tanggal);
                    }else if(split[0] == "#total"){
                        $(e).text(c.data[0].total);
                    }else if(split[0] == "#mobil"){
                        $(e).text(c.data[0].mobil);
                    }else if(split[0] == "#motor"){
                        $(e).text(c.data[0].motor);
                    }else if(split[0] == "#bis"){
                        $(e).text(c.data[0].bis);
                    }else if(split[0] == "#truk"){
                        $(e).text(c.data[0].truk);
                    }
                });
               }
               else if(item == 'average_speed'){
                obj.forEach(e => {
                    let split = e.split('_');
                    if (split[0] == "#avg_speed") {
                     $(e).text(c.data[0].avg_speed);
                    }
                });
               }else if(item == 'length_ocupantion'){
                obj.forEach(e => {
                    let split = e.split('_');
                    if (split[0] == "#length_ocup") {
                     $(e).text(c.data[0].length_ocup);
                    }
                });
               }
            
           }
    })
}

function traffic_sst(obj=[],item='',korelasi='') {
    get_data_analytic('','./Api_sst/get_analitik?korelasi='+korelasi).then((c) => {

           data_analytic = JSON.parse(c);
           if (data_analytic.camid == korelasi) {
            if (obj) {
                if (item == 'traffic_counting') {
                        obj.forEach(e => {
                            let split = e.split('_');
                            if (split[0] == "#waktu") {
                                $(e).text(data_analytic.waktu);
                            }else if (split[0] == "#tanggal") {
                                $(e).text(data_analytic.tanggal);
                            }else if(split[0] == "#total"){
                                $(e).text(data_analytic.total);
                            }
                        });
                }else if(item == 'traffic_category'){
                    obj.forEach(e => {
                        let split = e.split('_');
                        if (split[0] == "#waktu") {
                        $(e).text(data_analytic.waktu);
                        }else if (split[0] == "#tanggal") {
                        $(e).text(data_analytic.tanggal);
                        }else if(split[0] == "#total"){
                            $(e).text(data_analytic.total);
                        }else if(split[0] == "#mobil"){
                            $(e).text(data_analytic.mobil);
                        }else if(split[0] == "#motor"){
                            $(e).text(data_analytic.motor);
                        }else if(split[0] == "#bis"){
                            $(e).text(data_analytic.bis);
                        }else if(split[0] == "#truk"){
                            $(e).text(data_analytic.truk);
                        }
                    });
                }
                //    }else if(item == 'average_speed'){
                //     obj.forEach(e => {
                //         let split = e.split('_');
                //         if (split[0] == "#avg_speed") {
                //          $(e).text(c.avg_speed);
                //         }
                //     });
                //    }else if(item == 'length_ocupantion'){
                //     obj.forEach(e => {
                //         let split = e.split('_');
                //         if (split[0] == "#length_ocup") {
                //          $(e).text(c.length_ocup);
                //         }
                //     });
                //    }
                
            }
           }

    })
}

function traffic_counting(obj=[],channel_name='') {
    get_data_analytic('dahua','./Api_dahua/traffic_flow_cctv?channel_name='+channel_name).then((c) => {
        
        if (obj) {
            obj.forEach(e => {
                let split = e.split('_');
                if (split[0] == "#waktu") {
                    let dari = JSON.parse(c).filter.dari.split(" ")
                    let sampai = JSON.parse(c).filter.sampai.split(" ")
                    $(e).text(dari[1] + ' s.d ' + sampai[1]);
                }else if (split[0] == "#tanggal") {
                    $(e).text(JSON.parse(c).data[0].tgl);
                }
                else if(split[0] == "#total"){
                    $(e).text(JSON.parse(c).data[0].flow);
                }
            });
        }
 })
}

function traffic_category(obj=[],channel_name='',channel_id='') {
    get_data_analytic('dahua','./Api_dahua/traffic_category_cctv?channel_name='+channel_name).then((c) => {
        get_data_analytic('', './Api_dahua/total_pelanggaran?channel_id='+channel_id).then((f) => {
            if (obj) {
                obj.forEach(e => {
                    let split = e.split('_');
                    if (split[0] == "#waktu") {
                        let dari = JSON.parse(c).filter.dari.split(" ")
                        let sampai = JSON.parse(c).filter.sampai.split(" ")
                        $(e).text(dari[1] + ' s.d ' + sampai[1]);
                    }else if (split[0] == "#tanggal") {
                        $(e).text(JSON.parse(c).data[0].tgl);
                    }else if(split[0] == "#total"){
                        $(e).text(JSON.parse(c).data[0].total);
                    }else if(split[0] == "#pelanggaran"){
                        $(e).text(JSON.parse(f).data[0].total);
                    }else if(split[0] == "#t"){
                        JSON.parse(c).table.forEach(v => {
                            $(e).append(`
                                <tr>
                                    <td>${v.carTypeAStr}</td>
                                    <td>${v.jml}</td>
                                </tr>
                            `)
                        });
                    }
                });
            }
        })
    })
}

function average_speed(obj=[],channel_name='') {
    get_data_analytic('dahua','./Api_dahua/average_speed_cctv?channel_name='+channel_name).then((c) => {
        
        if (obj) {
            obj.forEach(e => {
                let split = e.split('_');
                if (split[0] == "#waktu") {
                    let dari = JSON.parse(c).filter.dari.split(" ")
                    let sampai = JSON.parse(c).filter.sampai.split(" ")
                    $(e).text(dari[1] + ' s.d ' + sampai[1]);
                }else if (split[0] == "#tanggal") {
                    $(e).text(JSON.parse(c).data[0].tgl);
                }
                else if(split[0] == "#avg"){
                    $(e).text(JSON.parse(c).data[0].avg);
                }
            });
        }
 })
}

function login_analytic(vendor='',path='login') {
    return new Promise(function (resolve, reject) {
    url_analytic(vendor);
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": url_+path,
        "method": "POST",
        "headers": {
          "content-type": "application/json",
          "cache-control": "no-cache",
          "postman-token": "335734fb-e7b7-a3a0-965d-d46222a52001"
        },
        "processData": false,
        "data" : JSON.stringify({
            username : "admin",
            password : "admin12345"
        })
      }
      
      $.ajax(settings).done(function (response) {
       resolve(response);
      });
    });
}

function get_data_analytic(vendor='',path='listanalitik') {
    return new Promise(function (resolve, reject) {
        url_analytic(vendor);
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": url_+path,
            "method": "POST",
            "headers": {
            "content-type": "application/json",
            },
            "processData": false,
            "data" : JSON.stringify({
                page : 1
            })
        }
        
        $.ajax(settings).done(function (response) {
            resolve(response);
        });
    });
}

function url_analytic(x){
    if (x == 'sst') {
        url_ = "http://36.66.191.180/";
    }else{
        url_ = '';
    }
}
