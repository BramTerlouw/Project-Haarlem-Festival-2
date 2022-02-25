<?
$names = $this->getEventNames();
?>
<div class="cms-container">

    <!-- Nav bar container -->
    <nav class="nav-cms">
        <div class="user-logo"></div>

        <!-- Personal info in nav -->
        <div class="cms-dashboard-personal">
            <span class="logged-username"><?php echo $_SESSION['userName'] ?></span>
            <a href="/user/edit"><?php echo $_SESSION['role'] ?></a>
            <a href="/user/edit"><img src="/icons/cms-edit.png" alt="edit user"></a>
        </div>

        <!-- Unordered list of nav -->
        <ul class="cms-nav-ul">
            <li class="cms-nav-item">
                <img class="cms-nav-icon" src="/icons/cms-home.png" alt="home icon">
                <a href="/cms">Home</a>
            </li>

            <hr>
            <? 
            foreach ($names as $name) { ?>
                <li class="cms-nav-item navdrpdown">
                    <img class="cms-nav-icon" src="/icons/cms-arrow-down.png" alt="home icon">
                    <a id="no-pointer" href=""><? echo ucfirst($name[0]) ?></a>
                    <div class="cms-nav-dropdown-content">
                        <a href="/cms/overview?event=<? echo $name[0] ?>">- Overview</a>
                        <a href="/cms/tickets?event=<? echo $name[0] ?>">- Tickets</a>
                    </div>
                </li>
            <? } ?>
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