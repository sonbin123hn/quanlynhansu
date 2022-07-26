<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePoints" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản Lý Điểm thưởng</span>
    </a>
    <div id="collapsePoints" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Điểm thưởng</h6>
            <a class="collapse-item" href="{{route('users.point.create')}}">Tạo Danh Mục Điểm</a>
            <a class="collapse-item" href="{{route('users.point.index')}}">View All point for Users</a>
        </div>
    </div>
</li>