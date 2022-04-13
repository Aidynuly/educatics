<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<li class="nav-item">
    <a href="{{route('admin.main')}}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Главная страница</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('cities.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-city"></i>
        <p>Города</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('schools.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-school"></i>
        <p>Школы</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('courses.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Курсы</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('employees.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>Работники</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('users.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>Пользователи</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{route('tariffs.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-table"></i>
        <p>Тарифы</p>
    </a>
</li>
