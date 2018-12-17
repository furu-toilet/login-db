var datalist1;
var datalist2;
var datalist3;
var datalist4;

console.log("chart js loading start");

google.load('visualization', '1', {'packages':['corechart']});
chartstart();

function chartstart(){
    Promise.all([
      RequestStart('./chart02.php')
      ]).then(
      success => {
          console.log("Promise.all Success!!");
          //console.log(success);
          //datalist1 = JSON.parse(success[0]);
          datalist1 = success;
          //console.log(datalist1);
          //document.write(success);
          google.setOnLoadCallback(drawChart);
          console.log("drawChart Tyring?");
      },
    )
}


function RequestStart(url){       
  return new Promise((resolve,reject) => {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(xhr.readyState ===4 && xhr.status === 200){
        var responsedata = xhr.responseText;
        //resolve(JSON.parse(responsedata));
          resolve(responsedata);
      }else if(xhr.status === 404){
        console.log(reject);
        reject("Err : Not Found");
      }
    }    
    xhr.open("GET",url,true);
    xhr.send(null);
  });
}

function drawChart(){
    console.log("drawChart Start");
    var data1  = google.visualization.arrayToDataTable(JSON.parse(datalist1));      //可視化データのセット
    var option1 = {
              title : '2Month RuiData',
             series: {
              0:{targetAxisIndex:0},     // 第1系列は左のY軸を使用
              1:{targetAxisIndex:1,
               type: "line"},         // 第2系列は右のY時を使用
             },
             hAxis: {title: 'TimeZone'},
             vAxes: {
               // 0:左のY軸。1:右のY軸
               0: {title: 'Count'},
               1: {title: 'Time Minits'}
             },
           };
    
    var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div1'));　//対象に可視化オブジェクトをセット
    chart1.draw(data1, option1);    //可視化
    console.log("chart Visualization");
    
}
