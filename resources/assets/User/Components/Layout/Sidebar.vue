<template>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index-2.html"> <img alt="تصویر" src="/dashboard-assets/assets/img/logo.svg"
                                             class="header-logo"> <span class="logo-name">اجیس</span>
                </a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user-picture">
                    <img alt="تصویر" src="/dashboard-assets/assets/img/userbig.png">
                </div>
                <div class="sidebar-user-details">
                    <div class="user-name">
                        {{user.first_name}} {{user.last_name}}
                    </div>
                    <div class="user-role">کاربر</div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fa fa-home"></i>
                        <span>مدیریت تور</span></a>
                    <ul class="dropdown-menu">
                        <li class="active">
                            <router-link class="nav-link" to="/tours/reserved-tours">تور های رزرو شده</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },

        created() {
            this.userInfo();
        },
        methods: {
            userInfo() {
                axios.get('/user-info')
                    .then(response => this.user = response.data)
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>