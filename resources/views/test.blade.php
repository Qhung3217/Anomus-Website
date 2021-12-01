<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/template/css/cssreset.css" class="css">
    <link rel="stylesheet" href="template/css/test.css" class="css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
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
    <script src="/template/js/main.js"></script>


</body>
</html>
