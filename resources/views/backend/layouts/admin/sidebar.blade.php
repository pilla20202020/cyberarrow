<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="icon-accelerator"></i> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('menu.index') }}" class="waves-effect">
                        <i class="icon-share"></i><span> Menu </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('slider.index') }}" class="waves-effect">
                        <i class="ti-layout-slider-alt"></i><span> Slider </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('category.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Category </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('page.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Pages </span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('event.index') }}" class="waves-effect">
                        <i class="fas fa-newspaper"></i><span> Event </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('testimonial.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Testimonial </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('volunteer.index') }}" class="waves-effect">
                        <i class="fas fa-person-booth"></i><span> Volunteer </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('blog.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Blog </span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-coffee"></i> <span> Gallery <span class="float-end menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('album.index') }}" class="waves-effect">
                                <i class="mdi mdi-image-album"></i><span> Album </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.index') }}" class="waves-effect">
                                <i class="mdi mdi-google-photos"></i><span> Galleries </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('news.index') }}" class="waves-effect">
                        <i class="fas fa-newspaper"></i><span> News and Notice </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('client.index') }}" class="waves-effect">
                        <i class="fas fa-user"></i><span> Client </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.index') }}" class="waves-effect">
                        <i class="ti-settings"></i><span> Setting </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
