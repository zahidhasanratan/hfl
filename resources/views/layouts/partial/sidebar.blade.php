<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ asset('admin/assets/img/find_user.png')}}" class="user-image img-responsive"/>
            </li>


            <li>
                <a class="{{ Request::is('admin/dashboard*') ? 'active-menu': '' }}"  href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>

            <li>
                <a class="{{ Request::is('admin/Category*') ? 'active-menu': '' }}" href="#"><i class="fa fa-list fa-3x"></i>Category Manage <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('CategoryCreate')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{route('CategoryIndex')}}">All Category List</a>
                    </li>
                </ul>
            </li>
  <li>
                <a class="{{ Request::is('admin/SubCategory*') ? 'active-menu': '' }}" href="#"><i class="fa fa-list fa-3x"></i>Sub Category Manage <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('SubCategoryCreate')}}">Add Sub Category</a>
                    </li>
                    <li>
                        <a href="{{route('SubCategoryIndex')}}">All Sub Category List</a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="{{ Request::is('admin/TheraCategory*') ? 'active-menu': '' }}" href="#"><i class="fa fa-list fa-3x"></i>Therapeutic Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('TheraCategoryCreate')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{route('TheraCategoryIndex')}}">All Category List</a>
                    </li>


                </ul>
            </li>



            <li>
                <a class="{{ Request::is('admin/Generic*') ? 'active-menu': '' }}" href="#"><i class="fa fa-list fa-3x"></i>Generic Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('GenericCategoryCreate')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{route('GenericCategoryIndex')}}">All Category List</a>
                    </li>


                </ul>
            </li>




            <li>
                <a class="{{ Request::is('admin/ProductManages*') ? 'active-menu': '' }}" href="#"><i class="fa fa-shopping-cart fa-3x"></i>Product Manage <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('ProductManageCreate')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{route('ProductManageIndex')}}">All Prodcut List</a>
                    </li>


                    <li>
                        <a href="{{route('ProductManagePanding')}}">Panding Product List</a>
                    </li>

                    <li>
                        <a href="{{route('ProductManageApprove')}}">Approve Product List</a>
                    </li>




                </ul>
            </li>

            <li>
                <a class="{{ Request::is('admin/menu*') ? 'active-menu': '' }}" href="#"><i class="fa fa-bars fa-3x"></i> Menu <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('menu.create') }}">Add New Menu</a>
                    </li>
                    <li>
                        <a href="{{ route('menu.index') }}">All Menu</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/page*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Page <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('page.create') }}">Add New Page</a>
                    </li>
                    <li>
                        <a href="{{ route('page.index') }}">All Page</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/slider*') ? 'active-menu': '' }}" href="#"><i class="fa fa-desktop fa-3x"></i> Slider <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('slider.create') }}">Add New Slider</a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index') }}">All Slider</a>
                    </li>

                </ul>
            </li>


            <li>
                <a class="{{ Request::is('admin/objetcs*') ? 'active-menu': '' }}" href="#"><i class="fa fa-desktop fa-3x"></i> Others <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    {{-- <li>
                        <a href="{{ asset('admin/objects/1/edit') }}">Let's Explore HPL</a>
                    </li> --}}
                    <li>
                        <a href="{{ asset('admin/objects/2/edit') }}">Social Media</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/3/edit') }}">Count Down</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/4/edit') }}">Vision & Mission</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/5/edit') }}">About Us</a>
                    </li>
                    {{-- <li>
                        <a href="{{ asset('admin/objects/6/edit') }}">Global Operations</a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ asset('admin/objects/7/edit') }}">Research & Development</a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ asset('admin/objects/8/edit') }}">Quality Management System</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/9/edit') }}">Pop Up Home</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/10/edit') }}">Pop Up Product</a>
                    </li> --}}
                    <li>
                        <a href="{{ asset('admin/objects/11/edit') }}">Message</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/12/edit') }}">Message Managing Director</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/13/edit') }}">Message COO</a>
                    </li>


                </ul>
            </li>
            {{-- <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Country Flag<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('flag.create') }}">Add Flag</a>
                    </li>
                    <li>
                        <a href="{{ route('flag.index') }}">All Flag</a>
                    </li>
                </ul>
            </li> --}}

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>  Global-Colaboration<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('flag.create') }}">Add </a>
                    </li>
                    <li>
                        <a href="{{ route('flag.index') }}">All </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>  About Sidebar<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    {{-- <li>
                        <a href="{{ route('link.create') }}">Add </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('link.index') }}">All </a>
                    </li>
                </ul>
            </li>

            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-sitemap fa-3x"></i> Photo<span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('photo.create') }}">Add Photo</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('photo.index') }}">All Photo</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{-- <li>
                <a href="#"><i class="fa fa-video-camera fa-3x"></i> Gallery<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Product Gallery<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">

                            <li>
                            <a href="{{ route('product.create') }}">Add New Product</a>
                            </li>
                            <li>
                            <a href="{{ route('product.index') }}">All Product</a>
                            </li>
                            <li>
                                <a href="{{ route('pcategory.index') }}">Product Category</a>
                            </li>
                            <li>
                                <a href="{{ route('item.index') }}">Gallery Slider</a>
                            </li>

                        </ul>

                    </li> --}}

                    {{-- <li>
                        <a href="#">Photo Gallery<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level"> --}}

                            {{--<li>--}}
                                {{--<a href="{{ route('item.create') }}">Add New Photo</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('item.index') }}">All Photo</a>--}}
                            {{--</li>--}}
                            {{-- <li>
                                <a href="{{ route('category.index') }}">All Category</a>
                            </li> --}}
                        {{-- </ul>

                    </li> --}}

                    {{-- <li>
                        <a href="#">Video Gallery<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('video.create') }}">Add Video</a>
                            </li>
                            <li>
                                <a href="{{ route('video.index') }}">All Video</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li> --}}

            <li>
                <a class="{{ Request::is('admin/news*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> NEWS <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('news.create') }}">Add News</a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">All News</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/facility') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Facilities <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('facility.create') }}">Add Facilities</a>
                    </li>
                    <li>
                        <a href="{{ route('facility.index') }}">All Facilities</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a class="{{ Request::is('admin/article*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Article <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('article.create') }}">Add Article</a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}">All Article</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="{{ Request::is('admin/research*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Research & Development <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('research.create') }}">Add Research & Development</a>
                    </li>
                    <li>
                        <a href="{{ route('research.index') }}">All Research & Development</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/quality*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Quality Management <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('quality.create') }}">Add Quality Management</a>
                    </li>
                    <li>
                        <a href="{{ route('quality.index') }}">All Quality Management</a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a class="{{ Request::is('admin/post*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Career <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('post.create') }}">Add Post</a>
                    </li>
                    <li>
                        <a href="{{ route('post.index') }}">All Post</a>
                    </li>
                </ul>
            </li>

            {{-- <li>
                <a class="{{ Request::is('admin/service*') ? 'active-menu': '' }}" href="#"><i class="fa fa-tasks fa-3x"></i> Organizational Policies <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('service.create') }}">Add Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('service.index') }}">All Policy</a>
                    </li>

                </ul>
            </li> --}}

            <li>
                <a class="{{ Request::is('admin/life*') ? 'active-menu': '' }}" href="#"><i class="fa fa-tasks fa-3x"></i> Board oF Director <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('life.create') }}">Add Director</a>
                    </li>
                    <li>
                        <a href="{{ route('life.index') }}">All Director</a>
                    </li>

                </ul>
            </li>
{{-- <li>
                <a class="{{ Request::is('admin/life*') ? 'active-menu': '' }}" href="#"><i class="fa fa-tasks fa-3x"></i> HPL Team <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('life.create') }}">Add HPL Team</a>
                    </li>
                    <li>
                        <a href="{{ route('life.index') }}">All HPL Team</a>
                    </li>

                </ul>
            </li> --}}

            {{-- <li>
            <a class="{{ Request::is('admin/activity*') ? 'active-menu': '' }}" href="#"><i class="fa fa-qrcode fa-3x"></i> JOURNEY <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
            <li>
            <a href="{{ route('activity.create') }}">Add JOURNEY</a>
            </li>
            <li>
            <a href="{{ route('activity.index') }}">All JOURNEY</a>
            </li>

            </ul>
            </li>
            <li> --}}
                <li>
                    <a class="{{ Request::is('admin/activity*') ? 'active-menu': '' }}" href="#"><i class="fa fa-qrcode fa-3x"></i> History <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li>
                    <a href="{{ route('activity.create') }}">Add History</a>
                    </li>
                    <li>
                    <a href="{{ route('activity.index') }}">All History</a>
                    </li>

                    </ul>
                    </li>
                    <li>
                <a class="{{ Request::is('admin/others*') ? 'active-menu': '' }}" href="{{ route('others.index') }}"><i class="fa fa-map-marker fa-3x"></i> Contact Us</a>
            </li>
            {{-- <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> SISTER CONCERN<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">


                    <li>
                        <a href="{{ route('photo.create') }}">Add Photo</a>
                    </li>
                    <li>
                        <a href="{{ route('photo.index') }}">All Photo</a>
                    </li>



                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Partner Logo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('company.create') }}">Add Logo</a>
                    </li>
                    <li>
                        <a href="{{ route('company.index') }}">All Logo</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> GMP Accreditation Logo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('gmp.create') }}">Add Logo</a>
                    </li>
                    <li>
                        <a href="{{ route('gmp.index') }}">All Logo</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Technology provider Logo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('technology.create') }}">Add Logo</a>
                    </li>
                    <li>
                        <a href="{{ route('technology.index') }}">All Logo</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> PROJECTS PIPELINE <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{ route('project.create') }}">Add PIPELINE</a>
                    </li>
                    <li>
                        <a href="{{ route('project.index') }}">All PIPELINE</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Award Logo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('award.create') }}">Add Logo</a>
                    </li>
                    <li>
                        <a href="{{ route('award.index') }}">All Logo</a>
                    </li>
                </ul>
            </li> --}}


            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/money_receipt*') ? 'active-menu': '' }}" href="#"><i class="fa fa-bars fa-3x"></i> Money Receipt <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('money_receipt.create') }}">Add Money Receipt</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('money_receipt.index') }}">All Money Receipt</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}

            {{--@if(Auth::user()->id =='2')--}}
            {{--<li>--}}
                {{--<a class="{{ Request::is('admin/user*') ? 'active-menu': '' }}" href="#"><i class="fa fa-bars fa-3x"></i> User <span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('user.create') }}">Add User</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('user.index') }}">All User</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</li>--}}
            {{--@endif--}}
            {{----}}

            <li>
                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
            </li>





        </ul>

    </div>

</nav>
