<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('home') }}" class="waves-effect">
                        <i class='bx bxs-dashboard'></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.search_products') }}" class="has-arrow waves-effect">
                        <i class='bx bx-share-alt'></i>
                        <span key="t-multi-level">Product Search</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
