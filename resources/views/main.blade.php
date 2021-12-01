<!DOCTYPE html>
<html lang="vi">
<head>
    @include('head')
</head>
<body>
    <div class="wrapper" >
        {{-- header --}}
        <header class="header">
            <nav class="head">

                <!-- Left Header -->
                <a href="/" class="sidebar-header">
                    <ion-icon name="eye-off"></ion-icon>
                    <span>Anomus</span>
                </a>

                <!-- menu icon -->
                <div class="menu-icon" id="menu_toggle">
                    <ion-icon name="menu-outline" ></ion-icon>
                </div>

                <!-- Middle Header -->
                <div class="search" id="search">
                    <form method="get" action="/search"  class="">
                        <input type="text" name="search" class="search-input"  placeholder="Tiêu đề...">
                        <button type="submit" class="search-submit">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>

                <!-- Right Header -->
                <div class="right-sidebar" id="postForm">
                    <a href="/postForm" class="btn">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        <span>Đăng bài</span>
                    </a>
                </div>
                {{-- <ion-icon name="search-outline" class="search-submit" id="search_button"></ion-icon> --}}

            </nav>

            <div class="menu" id="menu_content">

                <a href="/" class="menu-item">
                    <div >

                        <ion-icon name="home-outline"></ion-icon>
                        <span>Trang chủ</span>

                    </div>
                </a>

                <a href="/mostheart" class="menu-item">
                    <div >
                        <ion-icon name="heart-outline"></ion-icon>
                        <span>Lượt tim nhiều nhất</span>
                    </div>
                </a>

                <a href="/mostview" class="menu-item">
                    <div >
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span>Nhiều lượt xem</span>
                    </div>
                </a>

            </div>

        </header>
        <header class="header2">
            <nav class="head2">
                <!-- menu icon -->
                <div class="menu-icon2" id="menu_toggle2">
                    <ion-icon name="menu-outline" ></ion-icon>
                </div>

                <!-- Left Header -->
                <a href="/" class="sidebar-header2">
                    <ion-icon name="eye-off"></ion-icon>
                    <span>Anomus</span>
                </a>

                <!-- Right Header -->
                <div class="right-sideba2" id="postForm">
                    <a href="/postForm" class="btn2">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        <span>Đăng bài</span>
                    </a>
                </div>
                {{-- <ion-icon name="search-outline" class="search-submit" id="search_button"></ion-icon> --}}

            </nav>
            <div class="modal toggle" id="menu_content2">
                <div class="menu2" >
                <div class="search2" id="search2">
                    <form method="get" action="/search"  class="">
                        <input type="text" name="search" class="search-input"  placeholder="Tiêu đề...">
                        <button type="submit" class="search-submit">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>
                <a href="/" class="menu-item2">
                    <div >

                        <ion-icon name="home-outline"></ion-icon>
                        <span>Trang chủ</span>

                    </div>
                </a>

                <a href="/mostheart" class="menu-item2">
                    <div >
                        <ion-icon name="heart-outline"></ion-icon>
                        <span>Lượt tim nhiều nhất</span>
                    </div>
                </a>

                <a href="/mostview" class="menu-item2">
                    <div >
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span>Nhiều lượt xem</span>
                    </div>
                </a>

            </div>
            </div>


        </header>
        <div class="box-content" id="box-content">

            @yield('content')
        </div>

    </div>
    {{-- <div id="ajaxpostform"></div> --}}
    @include('footer')
</body>
</html>
