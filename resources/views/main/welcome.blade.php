<!DOCTYPE html>
<html lang="id">

<head>
    @livewireStyles

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .submenu .menu-item {
            padding-left: 30px;
            font-size: 14px;
            display: block;
        }

        .menu-item.sub.active {
            font-weight: bold;
        }


        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        html {
            height: 100%;
        }

        .wrapper {
            display: flex;
            height: 100%;
            position: relative;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .menu-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: #3498db;
        }

        .menu-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left-color: #3498db;
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        /* Mobile Toggle Button */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 1001;
            background: #2c3e50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .content-area {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
            overflow-y: auto;
        }

        /* Stats Cards */
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0 5px 0;
        }

        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Chart Card */
        .chart-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
        }

        .chart-placeholder {
            height: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .mobile-toggle {
                display: block;
            }

            .mobile-overlay.active {
                display: block;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .content-area {
                padding: 20px 15px;
            }

            .top-navbar {
                padding: 15px 70px 15px 20px;
            }

            .top-navbar h4 {
                font-size: 1.1rem;
            }

            .navbar-user span {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .stats-value {
                font-size: 1.5rem;
            }

            .stats-label {
                font-size: 0.8rem;
            }

            .chart-placeholder {
                height: 200px;
                font-size: 1rem;
            }

            .chart-card {
                padding: 15px;
            }

            .chart-card h5 {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 200px;
            }

            .top-navbar h4 {
                font-size: 1rem;
            }

            .navbar-user {
                gap: 10px;
            }

            .navbar-user i {
                font-size: 1rem;
            }

            .content-area {
                padding: 15px 10px;
            }

            .stats-card {
                padding: 15px;
            }

            .stats-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
    <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
    <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Mobile Toggle Button -->
        <button class="mobile-toggle" id="mobileToggle">
            <i class="bi bi-list"></i>
        </button>
        <!-- Mobile Overlay -->
        <div class="mobile-overlay" id="mobileOverlay"></div>
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>
            @livewire('sidebar-menu');

        </div>
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <h4 class="mb-0">Selamat Datang!</h4>
                <div class="navbar-user">
                    <span>Admin</span> <i class="bi bi-bell fs-5"></i>
                    <i class="bi bi-person-circle fs-5"></i>
                </div>
            </div>
            <!-- Content Area -->
            @yield('main')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menu navigation
            document.querySelectorAll(".menu-item").forEach((item) => {
                item.addEventListener("click", function (e) {
                    /* e.preventDefault(); */
                    document
                        .querySelectorAll(".menu-item")
                        .forEach((mi) => mi.classList.remove("active"));
                    this.classList.add("active");

                    // Close sidebar on mobile when menu is clicked
                    if (window.innerWidth <= 992) {
                        sidebar.classList.remove("active");
                        overlay.classList.remove("active");
                    }
                });
            });

            // Mobile menu toggle
            const sidebar = document.getElementById("sidebar");
            const mobileToggle = document.getElementById("mobileToggle");
            const overlay = document.getElementById("mobileOverlay");

            mobileToggle.addEventListener("click", function () {
                sidebar.classList.toggle("active");
                overlay.classList.toggle("active");
            });

            overlay.addEventListener("click", function () {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });

            // Handle window resize
            window.addEventListener("resize", function () {
                if (window.innerWidth > 992) {
                    sidebar.classList.remove("active");
                    overlay.classList.remove("active");
                }
            });
    </script>
    <script>
        (function () {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement("script");
                        d.innerHTML =
                            "window.__CF$cv$params={r:'9a0fa45ae5b55f65',t:'MTc2MzU1NDYyMC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                        b.getElementsByTagName("head")[0].appendChild(d);
                    }
                }
                if (document.body) {
                    var a = document.createElement("iframe");
                    a.height = 1;
                    a.width = 1;
                    a.style.position = "absolute";
                    a.style.top = 0;
                    a.style.left = 0;
                    a.style.border = "none";
                    a.style.visibility = "hidden";
                    document.body.appendChild(a);
                    if ("loading" !== document.readyState) c();
                    else if (window.addEventListener)
                        document.addEventListener("DOMContentLoaded", c);
                    else {
                        var e = document.onreadystatechange || function () {};
                        document.onreadystatechange = function (b) {
                            e(b);
                            "loading" !== document.readyState &&
                                ((document.onreadystatechange = e), c());
                        };
                    }
                }
            })();
    </script>
</body>

</html>