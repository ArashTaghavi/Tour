<template>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index-2.html">
                    <img alt="تصویر"
                         src="/dashboard-assets/assets/img/logo.svg" class="header-logo">
                    <span class="logo-name">پنل مدیریت</span>
                </a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user-picture">
                    <img alt="تصویر" src="/dashboard-assets/assets/img/userbig.png">
                </div>
                <div class="sidebar-user-details">
                    <div class="user-name">مدیر</div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-home"></i>
                        <span>مدیریت تور</span></a>
                    <ul class="dropdown-menu">
                        <li class="active">
                            <router-link class="nav-link" to="/tours/ours">تور های ما</router-link>
                        </li>
                        <li class="active">
                            <router-link class="nav-link" to="/tour-leaders">تور لیدر ها</router-link>
                        </li>
                        <li>
                            <a class="nav-link" href="index2.html">تور های همکاران</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
    export default {}
</script>