<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://img.dtruyen.com/limitless/images/demo/users/face1.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>{{Auth()->user()->name}}</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    @role('user')
    <ul class="app-menu">
    
      <li><a class="app-menu__item active" href="/story_user"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Thống kê tổng quan</span></a></li>
      <li><a href="/story_user/danhsachstory" class="app-menu__item "><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Danh sách truyện</span></a></li>
      <li><a class="app-menu__item" href="/story_user/views"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Thống kê lượt xem</span></a></li>
      <li><a class="app-menu__item" href="#"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Thống kê doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="/story_user/billingsetup"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Cài đặt thanh toán</span></a></li>

            <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Đổi linh thạch</span></a></li>

            <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Độc giả ủng hộ</span></a></li>

            <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Độc giả đọc chương thu phí</span></a></li>
     

    </ul>
    @endrole
     @role('admin')
    <ul class="app-menu">
    <li><a class="app-menu__item active" href="/"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Dashboard</span></a></li>
      <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Quản lý người dùng</span></a>
      
            <ul>
                  <li><a href="">thông tin user</a></li>
                  <li><a href="">doanh thu user</a></li>
                  <li><a href="">nạp linh thạch cho user</a></li>
                  <li><a href="">Duyệt truyện user đã đăng</a></li>
            </ul>
      
      </li>
      <li><a href="/story_user/danhsachstory" class="app-menu__item " href="table-data-table.html"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Cào truyện</span></a></li>
       <li><a class="app-menu__item" href="/story_user/views"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Thống kê doanh thu</span></a></li>
      <!-- <li><a class="app-menu__item" href="table-data-product.html"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>  -->
     
     

    </ul>
@endrole
</aside>