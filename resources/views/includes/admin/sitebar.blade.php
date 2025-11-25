<nav class="mt-2">
    <!--begin::Sidebar Menu-->
    <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="listbox"
        aria-label="Main navigation"
        data-accordion="false"
        id="navigation"
    >
        <li class="nav-header">Admin Panel</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-list-columns-reverse"></i>
                <p>
                    Posts
                    <span class="badge bg-info ms-auto"> {{$posts->total()}} </span>
                </p>
            </a>
        </li>
    </ul>
    <!--end::Sidebar Menu-->
</nav>
