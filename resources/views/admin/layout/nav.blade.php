<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="/ad/assets/images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"></p>
                    <p class="designation"></p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create-product')}}">Create New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-product')}}">View Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-product-image')}}">Image Product</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Attribute</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-ram')}}">View Ram</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-category')}}">View Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-brand')}}">View Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-opera')}}">View operator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-cam_after')}}">View camera_after</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-cam_before')}}">View camera_before</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-cpu')}}">View cpu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-ram')}}">View ram</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-memory')}}">View memory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-sim')}}">View sim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-pin')}}">View pin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-display')}}">View display</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Order</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create-product')}}">Create New Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-product')}}">View Order</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
