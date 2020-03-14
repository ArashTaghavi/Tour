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
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-home"></i>
                        <span>مدیریت تور</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <router-link class="nav-link" to="/tours/ours">تور های ما</router-link>
                        </li>
                        <li class="">
                            <router-link class="nav-link" to="/tour-leaders">تور لیدر ها</router-link>
                        </li>
                        <li>
                            <a class="nav-link" href="index2.html">تور های همکاران</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-home"></i>
                        <span>مدیریت هتل</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <router-link class="nav-link" to="/hotels/ours">هتل های ما</router-link>
                        </li>
                        <li>
                            <a class="nav-link" href="index2.html">هتل های همکاران</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-home"></i>
                        <span>مدیریت هاستل</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <router-link class="nav-link" to="/hostels/ours">هاستل های ما</router-link>
                        </li>
                        <li>
                            <a class="nav-link" href="index2.html">هاستل های همکاران</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-blog"></i>
                        <span>مدیریت وبلاگ</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <router-link class="nav-link" to="/categories">دسته بندی ها</router-link>
                        </li>
                        <li class="">
                            <router-link class="nav-link" to="/posts">پست ها</router-link>
                        </li>
                        <li>
                            <router-link class="nav-link" to="/comments">نظرات</router-link>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <router-link to="/features" class="nav-link">
                        <i class="fa fa-home"></i>
                        <span>امکانات رفاهی</span>
                    </router-link>
                </li>
                <li class="">
                    <router-link to="/policies" class="nav-link">
                        <i class="fa fa-archive"></i>
                        <span>قوانین</span>
                    </router-link>
                </li>
                <li class="">
                    <router-link to="/contacts" class="nav-link">
                        <i class="fa fa-phone"></i>
                        <span>تماس با ما</span>
                    </router-link>
                </li>
                <li class="">
                    <router-link to="/settings" class="nav-link">
                        <i class="fa fa-file"></i>
                        <span>تنظیمات</span>
                    </router-link>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
    export default {}
</script>