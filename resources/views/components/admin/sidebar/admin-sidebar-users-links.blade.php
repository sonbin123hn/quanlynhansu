<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lý nhân viên</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản Lý Nhân Viên</h6>
            <a class="collapse-item" href="{{route('users.create')}}">Thêm nhân viên</a>
            <a class="collapse-item" href="{{route('users.index')}}">Danh sách nhân viên</a>
        </div>
    </div>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartments" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản Lý Phòng Ban</span>
    </a>
    <div id="collapseDepartments" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản Lý Phòng Ban</h6>
            <a class="collapse-item" href="{{route('departments.index')}}">Danh sách phòng ban</a>
        </div>
    </div>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePositions" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản Chức Vụ</span>
    </a>
    <div id="collapsePositions" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản Chức Vụ</h6>
            <a class="collapse-item" href="{{route('positions.index')}}">Danh sách chức vụ</a>
        </div>
    </div>
</li>