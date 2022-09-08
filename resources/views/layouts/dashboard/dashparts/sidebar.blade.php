<div class="sidebar" data-color="purple" data-background-color="white" data-image="">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Mansoura Shop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                {{-- nav-item active --}}
                <a class="nav-link" href="{{ route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- ELELMENT 2  --}}
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('categories.index')}}">
                    <i class="material-icons">add_circle</i>
                    <p>Categories</p>
                </a>
            </li>
        </ul>
    </div>
</div>
