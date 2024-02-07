<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#"
                    data-toggle="sidebar"
                    class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#"
                    data-toggle="search"
                    class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        {{-- Search --}}
        {{-- <div class="search-element">
            <input class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
                data-width="250">
            <button class="btn"
                type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-3-50.png') }}"
                            alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-2-50.png') }}"
                            alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-1-50.png') }}"
                            alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger mr-3 text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary mr-3 text-white">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div> --}}

        {{-- searchbar --}}

        {{-- <div class="search-element">
            <input class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
                data-width="250">
            <button class="btn"
                type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#"
                        class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-3-50.png') }}"
                            alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-2-50.png') }}"
                            alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded"
                            width="30"
                            src="{{ asset('img/products/product-1-50.png') }}"
                            alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger mr-3 text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary mr-3 text-white">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div> --}}

    </form>

    {{-- Admin --}}
    @if(auth()->user()->role == 'admin')

    <ul class="navbar-nav navbar-right">
        <?php
            $stock = \DB::select("SELECT * from Barangs where stock < 1");
            $expired_at = \DB::select("SELECT * from Peminjams where expired_at > expired_at");
        ?>
         <ul class="navbar-nav navbar-right">
            {{-- to do --}}
            <li class="dropdown dropdown-list-toggle">
                <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle @if($todoListItems->isEmpty()) no-beep @else beep @endif">
                    <i class="fa-solid fa-list-check"></i>
                </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">To-Do List</div>
                    <div class="dropdown-list-content dropdown-list-message">
                        @isset($todoListItems)
                        @foreach($todoListItems as $item)
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle">
                                    <div class="is-online"></div>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>{{ $item->name }}</b>
                                    <p>{{ $item->subject }}</p>
                                    <p>{{ $item->message }}</p>
                                    <div class="time"><strong>{{ $item->created_at->diffForHumans() }}</strong></div>
                                </div>
                            </a>
                        @endforeach
                        @endisset
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="{{ route('todo-list.index') }}">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>


        {{-- messages admin --}}
            <li class="dropdown dropdown-list-toggle"><a href="#"
                    data-toggle="dropdown"
                    class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Messages
                        <div class="float-right">
                            <a href="#">Mark All As Read</a>
                        </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-message">
                        <a href="#"
                            class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-avatar">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-1.png') }}"
                                    class="rounded-circle">
                                <div class="is-online"></div>
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Kusnaedi</b>
                                <p>Hello, Bro!</p>
                                <div class="time">10 Hours Ago</div>
                            </div>
                        </a>
                        <a href="#"
                            class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-avatar">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-2.png') }}"
                                    class="rounded-circle">
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Dedik Sugiharto</b>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                <div class="time">12 Hours Ago</div>
                            </div>
                        </a>
                        <a href="#"
                            class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-avatar">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-3.png') }}"
                                    class="rounded-circle">
                                <div class="is-online"></div>
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Agung Ardiansyah</b>
                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <div class="time">12 Hours Ago</div>
                            </div>
                        </a>
                        <a href="#"
                            class="dropdown-item">
                            <div class="dropdown-item-avatar">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-4.png') }}"
                                    class="rounded-circle">
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Ardian Rahardiansyah</b>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                <div class="time">16 Hours Ago</div>
                            </div>
                        </a>
                        <a href="#"
                            class="dropdown-item">
                            <div class="dropdown-item-avatar">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-5.png') }}"
                                    class="rounded-circle">
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Alfa Zulkarnain</b>
                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                <div class="time">Yesterday</div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
            {{-- notification admin
        <li class="dropdown dropdown-list-toggle"><a href="#"
            data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Template update is available now!
                        <div class="time text-primary">2 Min Ago</div>
                    </div>
                </a>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li> --}}
    {{-- notification admin --}}
<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications
            <div class="float-right">
                <a href="#">Mark All As Read</a>
            </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons" id="notificationContent">
            <!-- Notification items will be dynamically added here -->
        </div>
        <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>

<!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your custom JavaScript code -->
<script>
    $(document).ready(function () {
        // Function to update notification content with the provided message
        function showNotification(message) {
            // Prepend a new notification item with the provided message
            $('#notificationContent').prepend(
                `<a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">${message}</div>
                </a>

                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        ${message}
                        <div class="time text-primary">2 Min Ago</div>
                    </div>
                </a>`
            );
            // Save notification state to sessionStorage
            sessionStorage.setItem('notificationVisible', true);
        }

        // Check if notification was previously shown and restore state
        var isNotificationVisible = sessionStorage.getItem('notificationVisible');
        if (isNotificationVisible) {
            $('#notificationContent').show();
        }

        // Listen for AJAX success event and update notification
        $(document).ajaxSuccess(function (event, xhr, settings) {
            console.log('AJAX success event detected.'); // Add this line for debugging
            // Check if the AJAX request was successful and a new item was added to the to-do list
            if (xhr.responseJSON.success && xhr.responseJSON.message === 'Kridaran data added to the to-do list.') {
                // Update notification content with the appropriate message
                showNotification('A new item was added to the to-do list.');
            }
        });

        // Handle click event on "Mark All As Read" button
        $('#markAllReadBtn').on('click', function () {
            // Toggle visibility of notification content
            $('#notificationContent').toggle();
            // Remove notification state from sessionStorage
            sessionStorage.removeItem('notificationVisible');
        });
    });
</script>





        <li class="dropdown"><a href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ asset('img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{auth()->user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="/features-profile"
                    class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="/auth-login2"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
                {{-- <a href="features-activities.html"
                    class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html"
                    class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a> --}}
                {{-- <div class="dropdown-item has-icon text-danger">
                    <form action="logout" method="POST">
                        @csrf
                        <button class="btn btn-danger fas fa-sign-out-alt">Logout</button>
                    </form>
                </div> --}}
    @endif
    {{-- <div class="dropdown-divider"></div>
                <div class="dropdown-item has-icon text-danger">
                    <form action="logout" method="POST">
                        @csrf
                        <button>
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div> --}}

    {{-- User --}}
    @if(auth()->user()->role == 'mahasiswa')
    <ul class="navbar-nav navbar-right">
        <?php
        $stock = \DB::select("SELECT * from Barangs where stock < 1");
        $expired_at = \DB::select("SELECT * from Peminjams where expired_at > expired_at");
        ?>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg d-flex">
            <i class="far fa-bell"></i>
            @if($stock)
            <div class="rounded-circle bg-success" style="width: 15px!important; height: 15px!important;">
                <span style="display: flex!important; justify-content: center!important; text-align: center!important; align-items: center; width: 15px!important; height: 15px!important; font-size: 12px;">{{ count($stock) }}</span>
            </div>
            @endif
            @if($expired_at)
            <div class="rounded-circle bg-success" style="width: 15px!important; height: 15px!important;">
                <span style="display: flex!important; justify-content: center!important; text-align: center!important; align-items: center; width: 15px!important; height: 15px!important; font-size: 12px;">{{ count($expired_at) }}</span>
            </div>
            @endif
        </a>
        <li class="dropdown dropdown-list-toggle"><a href="#"
            data-toggle="dropdown"
            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Messages
                <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-message">
                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                        <img alt="image"
                            src="{{ asset('img/avatar/avatar-1.png') }}"
                            class="rounded-circle">
                        <div class="is-online"></div>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Kusnaedi</b>
                        <p>Hello, Bro!</p>
                        <div class="time">10 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                        <img alt="image"
                            src="{{ asset('img/avatar/avatar-2.png') }}"
                            class="rounded-circle">
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Dedik Sugiharto</b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <div class="time">12 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                        <img alt="image"
                            src="{{ asset('img/avatar/avatar-3.png') }}"
                            class="rounded-circle">
                        <div class="is-online"></div>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Agung Ardiansyah</b>
                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <div class="time">12 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-avatar">
                        <img alt="image"
                            src="{{ asset('img/avatar/avatar-4.png') }}"
                            class="rounded-circle">
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Ardian Rahardiansyah</b>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                        <div class="time">16 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-avatar">
                        <img alt="image"
                            src="{{ asset('img/avatar/avatar-5.png') }}"
                            class="rounded-circle">
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Alfa Zulkarnain</b>
                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        <div class="time">Yesterday</div>
                    </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
    {{-- notifiaction user --}}
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#"
                    class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Template update is available now!
                        <div class="time text-primary">2 Min Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                        <div class="time">10 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                        <div class="time">12 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Low disk space. Let's clean it!
                        <div class="time">17 Hours Ago</div>
                    </div>
                </a>
                <a href="#"
                    class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Welcome to Stisla template!
                        <div class="time">Yesterday</div>
                    </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        </li>
        <li class="dropdown"><a href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ asset('img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{auth()->user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="/features-profile"
                    class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                {{-- <a href="features-activities.html"
                    class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html"
                    class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                <a href="/auth-login2"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
    @endif
</nav>
