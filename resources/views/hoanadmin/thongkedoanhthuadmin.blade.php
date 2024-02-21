<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">
</head>

<style>
  *body{
    background-color:#EEEDED;
  }
  a{
    list-style: none;
    text-decoration: none;
  }
</style>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="#"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('hoanadmin.navbaradmin')


<main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href=""><b>Thống kê lượt xem truyện</b></a></li>
          </ul>
</div>
        <div class="" style="border: 1px solid green; border-radius:10px;padding-left:15px;padding-top:15px; background-color: #EEEDED">
            <p>Truyện tình trạng hoàn thành sẽ không thể điều chỉnh sang tình trạng khác, nếu muốn thay đổi liên hệ Admin!</p>
            <p>Đẩy truyện lên trang chủ 10 Linh thạch/lần đối với truyện đã Full</p>
            <p>Truyện đăng duy nhất tại dtruyen mới được vào danh sách chọn lọc.</p>
        </div>
        <div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px;  background-color: #EEEDED; border: 1px solid red">
    <p style="text-align: center">Suutruyen.com khuyến cáo chỉ nên đăng truyện tại suutruyen.com để tránh tình trạng truyện bị sao chép trái phép!</p>
</div>




<div class="" style="margin-top: 15px; background-color: #EEEDED; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
   <div class="" style="display:flex;margin-top:15px">
      <div class="" style="width:30%;background-color:white;text-align:center;justify-content:center">
        <p style="padding-top:10px">Tổng lượt xem</p>
        <p style="font-size:20px;font-weight:500">{totalViews}}</p>
      </div>

      <div class="" style="width:30%;margin-left:20px;background-color:white;text-align:center;justify-content:center">
        <p style="padding-top:10px">Tổng chương truyện</p>
        <p style="font-size:20px;font-weight:500">{totalChapters}}</p>
      </div>
    
   </div>
   <div class="thongkestoryus" style=" background-color: white;margin-top:22px">
       <table border=1>
        <tr>
          <td style="font-sze:19px;font-weight:500">Truyện</td>
          <td style="font-sze:19px;font-weight:500">Lượt xem </td>
          <td style="font-sze:19px;font-weight:500">Cập nhật ngày</td>
        </tr>
     data as $dt)
        <tr>
          <td>{dt->title}}</td>
          <td>{dt->viewers}}</td>
          <td>31/01/2024</td>
        </tr>
    
       </table>
   </div>
      
    </div>
  
</div>

</div>

        <!-- </div>
      </div> -->
    
   
  </main>
  
  
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/main.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="assets/js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>
</body>

</html>