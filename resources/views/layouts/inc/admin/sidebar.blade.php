<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          {{-- Dashboard --}}
          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          {{-- Orders --}}
          <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
              <i class="mdi mdi-sale menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>

          {{-- Categories Dropdown --}}
          <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories" 
              aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}" 
              aria-controls="categories">
              <i class="bi bi-tag-fill menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="{{ url('admin/category/create') }}">Add Category</a>
                </li>

                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="{{ url('admin/category') }}">View Categories</a>
                </li>
              </ul>
            </div>
          </li>

            {{-- Brands --}}
            <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
              <a class="nav-link" href="{{ url('admin/brands')}}">
                <i class="bi bi-r-circle-fill menu-icon"></i>
                <span class="menu-title">Brands</span>
              </a>
            </li>

          {{-- Products Dropdown --}}
          <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" 
            aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}"  
            aria-controls="products">
              <i class="bi bi-box-seam-fill menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Add Product</a>
                </li>

                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">View Products</a>
                </li>
              </ul>
            </div>
          </li>
          
          {{-- Colors --}}
          <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/colors')}}">
            <i class="bi bi-palette-fill menu-icon"></i>
              <span class="menu-title">Colors</span>
            </a>
          </li>

          {{-- Home Slider --}}
          <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
              <i class="bi bi-images menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>

          {{-- Site Settings --}}
          <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
              <i class="bi bi-gear-fill menu-icon"></i>
              <span class="menu-title"> Site Settings</span>
            </a>
          </li>

          {{-- Blog Dropdown --}}
          <li class="nav-item {{ Request::is('admin/blog*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#blog" 
              aria-expanded="{{ Request::is('admin/blog*') ? 'true':'false' }}" 
              aria-controls="blog">
              <i class="bi bi-newspaper menu-icon"></i>
              <span class="menu-title">Blog</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/blog*') ? 'show':'' }}" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/blog/create') ? 'active':'' }}" href="{{ url('admin/blog/create') }}">Add Post</a>
                </li>

                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/blog') || Request::is('admin/blog/*/edit') ? 'active':'' }}" href="{{ url('admin/blog') }}">View Posts</a>
                </li>
              </ul>
            </div>
          </li>

          {{-- Users --}}
          <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" 
            aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}" 
            aria-controls="auth">
              <i class="bi bi-person-plus-fill menu-icon"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}" href="{{ url('admin/users/create') }}"> Add User </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}" href="{{ url('admin/users') }}"> View Users </a>
                </li>
                {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li> --}}
              </ul>
            </div>
          </li>
         
        </ul>
      </nav>
