<div class="cms-container">
    
    <!-- Nav bar container -->
    <nav class="nav-cms">
        <div class="user-logo"></div>

        <!-- Personal info in nav -->
        <div class="cms-dashboard-personal">
            <span class="logged-username"><?php echo $_SESSION['userName']?></span>
            <a href="/user/personal"><?php echo $_SESSION['role'] ?></a>
            <a href="/user/personal"><img src="/icons/cms-edit.png" alt="edit user"></a>
        </div>

        <!-- Unordered list of nav -->
        <ul class="cms-nav-ul">
            <li class="cms-nav-item">
                <img class="cms-nav-icon" src="/icons/cms-home.png" alt="home icon">
                <a href="/cms">Home</a>
            </li>

            <hr>
            <li class="cms-nav-item-dance">
                <img class="cms-nav-icon" src="/icons/cms-arrow-down.png" alt="home icon">
                <a id="no-pointer" href="">Dance</a>
                <div class="cms-nav-dropdown-content">
                    <a href="/cms/overview?event=dance">- Overview</a>
                    <a href="/cms/tickets?event=dance">- Tickets</a>
                </div>
            </li>

            <li class="cms-nav-item-jazz">
                <img class="cms-nav-icon" src="/icons/cms-arrow-down.png" alt="home icon">
                <a id="no-pointer" href="">Jazz</a>
                <div class="cms-nav-dropdown-content">
                    <a href="/cms/overview?event=jazz">- Overview</a>
                    <a href="/cms/tickets?event=jazz">- Tickets</a>
                </div>
            </li>

            <li class="cms-nav-item-culinary">
                <img class="cms-nav-icon" src="/icons/cms-arrow-down.png" alt="home icon">
                <a id="no-pointer" href="">Culinary</a>
                <div class="cms-nav-dropdown-content">
                    <a href="/cms/overview?event=culinary">- Restaurants</a>
                    <a href="#">- Reservations</a>
                </div>
            </li>
            <hr>

            <li class="cms-nav-item">
                <img class="cms-nav-icon" src="/icons/cms-new-archive.png" alt="home icon">
                <a href="/cms/orders">Orders</a>
            </li>
            
            <li class="cms-nav-item">
                <img class="cms-nav-icon" src="/icons/cms-users.png" alt="home icon">
                <a href="/user/index">Users</a>
            </li>
        </ul>
    </nav>

    <!-- Container content besides nav -->
    <div class="cms-side-container">
        <div class="cms-header">
            <a class="cms-logout-link" href="/">
                <img src="/icons/cms-logout.png" alt="logout button">
            </a>
            <input class="header-searchbar" type="text" placeholder="Search...">
        </div>

    <!-- Container main content -->
    <main class="cms-main">