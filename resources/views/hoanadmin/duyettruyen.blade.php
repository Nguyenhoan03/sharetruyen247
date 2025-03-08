
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách truyện | Quản trị Admin</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<style>
  *body{
    background-color:#EEEDED;
  }
  a{
    list-style: none;
    text-decoration: none;
  }
  .view-previous-button {
    display: inline-block;
    padding: 2px 16px;
    background-color: #4CAF50; /* Màu nền */
    color: white; /* Màu chữ */
    text-align: center;
    text-decoration: none;
    border-radius: 4px; /* Đường viền cong */
    transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
}

.view-previous-button:hover {
    background-color: #45a049; /* Màu nền khi di chuột qua */
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
  @include('hoanadmin.navbaradmin')


  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href=""><b>Duyệt truyện cho user</b></a></li>
          </ul>
</div>
      
      </div>
      <div class="col-md-12">
      <form method="GET">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm thông tin user (email hoặc tên user)">
    </div>
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
</form>
<form action="/pageadmin/update-trang-thai" method="POST">
    @csrf
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Tên truyện</th>
                <th>Tổng chapter</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $dt)
                @if(strpos(strtolower($dt->email), strtolower(request('search'))) !== false || strpos(strtolower($dt->name), strtolower(request('search'))) !== false)
                    <tr>
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->name}}</td>
                        <td>{{$dt->email}}</td>
                        <td>{{$dt->title}}</td>
                        <td>{{$dt->total_chapters}} - <a href="/pageadmin/xem-chapter/{{$dt->title}}" class="view-previous-button">Xem chapter</a></td>

                        <td>
                            <input type="hidden" name="ids[]" value="{{$dt->id}}">
                            <select name="trang_thai[]" class="trang-thai" onchange="this.form.submit()">
                                <option value="chờ duyệt" @if($dt->trang_thai == 'chờ duyệt') selected @endif>Chờ duyệt</option>
                                <option value="đã duyệt" @if($dt->trang_thai == 'đã duyệt') selected @endif>Đã duyệt</option>
                            </select>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</form>


</div>

    </div>

    </div>
   
  </main>
  <!-- <script>
$(document).ready(function() {
    $('.trang-thai').on('change', function() {
        var id = $(this).data('id');
        var trangThai = $(this).val();
        
        $.ajax({
            type: 'POST',
            url: '/pageadmin/update-trang-thai',
            data: {
                id: id,
                trang_thai: trangThai,
                _token: $('meta[name="csrf-token"]').attr('content'), // Ensure you have a meta tag with csrf-token
            },
            success: function(response) {
                console.log(response); // Log response to check if it's successful
                // Optionally, you can perform any other actions here after successful update
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors for debugging
            }
        });
    });
});

</script> -->


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
  <script type="text/javascript" src="assets/js/settime.js"></script>

</body>

</html>