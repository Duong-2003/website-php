<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <title>Document</title>

        <style>
            #navbar2 {
                background: linear-gradient(to right, #7FACD6, #BFB8DA);

            }

            .navbar-nav .dropdown-menu {
                position: absolute;
                left: 0;
                top: 100%;
                min-width: 100%;
                z-index: 9999;
            }

            .navbar-nav .dropdown:hover .dropdown-menu {
                /* display: block; */
                display: flex;
            }

            .dropdown-menu .sub-menu {
                display: none;
                /* Ẩn mục con mặc định */
            }

            .dropdown-menu .show .sub-menu {
                display: block;
                /* Hiển thị mục con khi mục cha được hover */
            }

            #block-col {
                display: flex;
                line-height: 1px;
                justify-content: space-around;
                background: linear-gradient(to right, #7FACD6, #BFB8DA);
            }

            #block-menu {
                margin: 0 20px;
            }
        </style>
    </head>

    <body>

        <div class="header-menu" id="header-menu">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav" id="navbar2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="danhmucsanpham" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="font-size: 20px; margin: 0 2px;" class="fa-solid fa-list"></i>
                            Danh mục sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="danhmucsanpham">
                            <li>
                                <a class="dropdown-item" href="#">STUDENT STATIONERY</a>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Notebook</a></li>
                                    <li><a class="dropdown-item" href="#">Pen</a></li>
                                    <li><a class="dropdown-item" href="#">Balo</a></li>
                                    <li><a class="dropdown-item" href="#">Cover the Notebook</a></li>
                                    <li><a class="dropdown-item" href="#">Label Book</a></li>

                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">OFFICE STATIONERY</a>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Document Book</a></li>
                                    <li><a class="dropdown-item" href="#">Clamp</a></li>
                                    <li><a class="dropdown-item" href="#">Pin Shooting</a></li>
                                    <li><a class="dropdown-item" href="#">Note</a></li>
                                    <li><a class="dropdown-item" href="#">Printing Paper</a></li>

                                </ul>
                            </li>
                        </ul>
            </nav>
        </div>
     </div>
</div>
</body>