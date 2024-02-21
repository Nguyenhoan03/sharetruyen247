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
   
     @role('admin')
     <ul class="app-menu">
    <li>
        <a class="app-menu__item active" href="#">
            <i class="app-menu__icon bx bx-user-voice"></i>
            <span class="app-menu__label">Dashboard</span>
        </a>
    </li>
    <li class="navbaradmincha">
        <a class="app-menu__item" href="#">
            <i class="app-menu__icon bx bx-tachometer"></i>
            <span class="app-menu__label">Quản lý người dùng <i class="fa-solid fa-caret-down"></i></span>
        </a>
        <ul class="navbaradminqlnd">
            <li><a href="/pageadmin/thong_tin_user"><i class="fa-regular fa-circle-dot"></i> Thông tin user(thanh toán linh thạch cho users) </a></li>
           
            <li><a href="/pageadmin/lich_su_nap_linh_thach_user"><i class="fa-regular fa-circle-dot"></i> Lịch sử nạp linh thạch user</a></li>
            <li><a href="/pageadmin/duyettruyenuser"><i class="fa-regular fa-circle-dot"></i> Duyệt truyện user đã đăng</a></li>
        </ul>
    </li>
    <li class="navbaradmincha2">
        <a href="/story_user/danhsachstory" class="app-menu__item">
            <i class="app-menu__icon bx bx-id-card"></i>
            <span class="app-menu__label">Cào truyện</span>
        </a>



        <ul class="navbaradminqlnd2">
            <li><a href="/crawler/tien-hiep">cào truyện tiên hiệp</a></li>
            <li><a href="/crawler/quan-truong">cào truyện quan trường</a></li>
            <li><a href="/crawler/huyen-huyen">cào truyện huyền huyễn</a></li>
            <li><a href="/crawler/kiem-hiep">cào truyện kiếm hiệp</a></li>
            <li><a href="/crawler/vong-du">cào truyện võng du </a></li>
            <li><a href="/crawler/kinh-di">cào truyện kinh dị </a></li>
            <li><a href="/crawler/lich-su">cào truyện lịch sử </a></li>
            <li><a href="/crawler/truyen-ngan">cào truyện truyện ngắn </a></li>
            <li><a href="/crawler/truyen-teen">cào truyện truyện teen</a></li>
            <li><a href="/crawler/xuyen-khong">cào truyện xuyên không</a></li>
            <li><a href="/crawler/ngon-tinh">cào truyện ngôn tình </a></li>
            <li><a href="/crawler/khoa-huyen">cào truyện khoa huyễn</a></li>
            <li><a href="/crawler/di-nang">cào truyện dị năng</a></li>
            <li><a href="/crawler/dam-my">cào truyện đam mỹ</a></li>
            <li><a href="/crawler/hai-huoc">cào truyện hài hước</a></li>
            <li><a href="/crawler/do-thi">cào truyện đô thị</a></li>
            <li><a href="/crawler/truyen-ma">cào truyện ma</a></li>
            <li><a href="/crawler/tieu-thuyet">cào truyện tiểu thuyết</a></li>
            <li><a href="/crawler/quan-su">cào truyện quân sự</a></li>
            <li><a href="/crawler/trinh-tham">cào truyện trinh thám</a></li>
            

        </ul>


    </li>
    <li>
        <a class="app-menu__item" href="/pageadmin/thong-ke-doanh-thu-admin">
            <i class="app-menu__icon bx bx-user-voice"></i>
            <span class="app-menu__label">Thống kê doanh thu</span>
        </a>
    </li>
</ul>

@endrole
</aside>