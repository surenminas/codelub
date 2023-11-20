 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('admin.main.index') }}" class="brand-link">
         <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <div class="sidebar">

         <div class="form-inline mt-3">
             <form action="{{ route('admin.search') }}" method="get">
                 {{-- @csrf --}}
                 <div class="input-group">
                     <input class="form-control form-control-sidebar" name="s" type="search" placeholder="Search"
                         aria-label="Search">
                     <div class="input-group-append">
                         <button class="btn btn-sidebar">
                             <i class="fas fa-search fa-fw"></i>
                         </button>
                     </div>
                 </div>
             </form>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 @canany(['update', 'view', 'delete'], auth()->user())
                     <li class="nav-item">
                         <a href="{{ route('admin.user.index') }}" class="nav-link ">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Users
                             </p>
                         </a>
                     </li>
                 @endcanany
                 {{-- @can('user-info-edit', auth()->user()->role)
                     <li class="nav-item">
                         <a href="{{ route('admin.user.index') }}" class="nav-link ">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Users
                             </p>
                         </a>
                     </li>
                 @endcan --}}

                 {{-- <li class="nav-item menu-is-opening menu-open">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             My Activity
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: blok;">
                         <li class="nav-item">
                             <a href="{{ route('admin.personal.main.index') }}" class="nav-link pl-4">
                                 <i class="nav-icon fas fa-home"></i>
                                 <p>Dashboard</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview" style="display: blok;">
                         <li class="nav-item">
                             <a href="{{ route('admin.personal.like.index') }}" class="nav-link pl-4">
                                 <i class="nav-icon fas fa-heart"></i>
                                 <p>liked</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview" style="display: blok;">
                         <li class="nav-item">
                             <a href="{{ route('admin.personal.comment.index') }}" class="nav-link pl-4">
                                 <i class="nav-icon fas fa-comment"></i>
                                 <p>Comment</p>
                             </a>
                         </li>
                     </ul>
                 </li> --}}


                 <li class="nav-item menu-is-opening menu-open">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Article
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: blok;">
                         <li class="nav-item">
                             <a href="{{ route('admin.post.index') }}" class="nav-link pl-4">
                                 <i class="nav-icon fas fa-book"></i>
                                 <p>Posts</p>
                                 <span class="badge badge-info right">{{ $postCount }}</span>

                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview" style="display: blok;">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link pl-4">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="display: blok;">
                        <li class="nav-item">
                            <a href="{{ route('admin.tag.index') }}" class="nav-link pl-4">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                 </li>


                 {{-- <li class="nav-item">
                     <a href="{{ route('admin.post.index') }}" class="nav-link ">
                         <i class="nav-icon fas fa-newspaper"></i>
                         <p>
                             Articles
                         </p>
                         <span class="badge badge-info right">{{ $postCount }}</span>

                     </a>
                 </li> --}}


                 <li class="nav-item">
                     <a href="{{ route('admin.rates.index') }}" class="nav-link">
                         <i class="nav-icon fab fa-ravelry"></i>
                         <p>
                             Rate
                             {{-- <span class="badge badge-info right">00</span> --}}

                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.album.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-images"></i>
                         <p>
                             Album
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.gallery.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-camera"></i>
                         <p>
                             Gallery
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
