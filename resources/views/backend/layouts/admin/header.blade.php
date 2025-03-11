<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('homepage')}}" class="logo">
                    <span class="logo-light  fs-5 fw-semibold ">
                        <i class="mdi mdi-camera-control"></i> SERAP Lee
                    </span>
                    <span class="logo-sm fs-2">
                        <i class="mdi mdi-camera-control"></i>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


        </div>

        <div class="d-flex">

            <!-- light dark -->
            <button type="button" class="btn header-item fs-4 rounded-end-0" id="light-dark-mode">
                <i class="fas fa-moon align-middle"></i>
            </button>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </button>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge rounded-pill text-bg-danger noti-dot">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-0"><b class="mb-1 ">Your order is placed</b></p>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-danger rounded-circle">
                                        <i class="mdi mdi-message-text-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-0"><b class="mb-1">New Message received</b></p>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-info rounded-circle">
                                        <i class="mdi mdi-filter-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-0"><b class="mb-1">Your item is shipped</b></p>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It is a long established fact that a reader will</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-message-text-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-0"><b class="mb-1">New Message received</b></p>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-warning rounded-circle">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-0"><b class="mb-1">Your order is placed</b></p>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-1">
                        <div class="d-grid">
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="dropdown notification-list d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('backend/assets/images/logo.jfif')}}" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                        <i class="mdi mdi-account-circle"></i> Profile
                    </a>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i>
                        Logout

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div> -->

        </div>
    </div>
</header>

   <!-- Profile Update Modal -->
<div class="modal fade @if($errors->any()) show d-block @endif" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="{{ $errors->any() ? 'false' : 'true' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation">
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if ($errors->any())
            var profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
            profileModal.show();
        @endif
    });
</script>
    
