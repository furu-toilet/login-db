<html>
<head>
  <meta charset="utf-8" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">

    
</script>
</head>
<body>
<script>
  // ライブラリのロード
    // name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
      google.load('visualization', '1', {'packages':['corechart']});

    // グラフを描画する為のコールバック関数を指定
    google.setOnLoadCallback(drawChart);
    // グラフの描画
    function drawChart() {

     // 配列からデータの生成
     var data = google.visualization.arrayToDataTable([
       ['時間帯'    , '回数', '時間-分'],
       ['06:00'    ,0    ,0    ],
       ['07:00'    ,12    ,70    ],
       ['08:00'    ,45    ,124    ],
       ['09:00'    ,30    ,100    ],
       ['10:00'    ,20    ,71    ],
       ['11:00'    ,70    ,226    ],
       ['12:00'    ,95    ,295    ],
       ['13:00'    ,80    ,112    ],
       ['14:00'    ,50    ,124    ],
       ['15:00'    ,70    ,110    ],
       ['16:00'    ,30    ,76    ],
       ['17:00'    ,50    ,123    ],
       ['18:00'    ,65    ,76    ],
       ['19:00'    ,10    ,13    ],
       ]);
        
        
       // オプションの設定
    var options = {
      title : '2ヶ月累積データ',
     series: {
      0:{targetAxisIndex:0},     // 第1系列は左のY軸を使用
      1:{targetAxisIndex:1,
       type: "line"},         // 第2系列は右のY時を使用
     },
     hAxis: {title: '時間帯'},
     vAxes: {
       // 0:左のY軸。1:右のY軸
       0: {title: '回数'},
       1: {title: '時間[分]'}
     },
   };

   // 指定されたIDの要素に棒グラフを作成
   // var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
   var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
    //var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

   //グラフの描画
  // chart1.draw(data, options);
  chart2.draw(data, options);


 }
  </script>

  <!--  グラフの描画エリア -->
  <div id="chart_div1" style="width: 100%; height: 350px"></div>
  <div id="chart_div2" style="width: 100%; height: 350px"></div>

  </body>
  </html>
