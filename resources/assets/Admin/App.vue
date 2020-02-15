<template>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <Header/>
            <Sidebar/>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <router-view></router-view>
                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show">
                            <div class="setting-panel-header">تنظیم پنل</div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">رنگ قالب</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                               class="selectgroup-input select-layout" checked>
                                        <span class="selectgroup-button">روشن</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                               class="selectgroup-input select-layout">
                                        <span class="selectgroup-button">تاریک</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">رنگ نوار کناری</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                               class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                              data-original-title="روشن"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                               class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                              data-original-title="تاریک"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">تم رنگی</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label> <span class="control-label p-r-20">مینی نوار کناری</span> <input
                                            type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <div class="disk-server-setting m-b-20">
                                        <p>میزان حافظه</p>
                                        <div class="sidebar-progress">
                                            <div class="progress" data-height="5">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="80%"
                                                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-description"> <small> 26% باقی مانده است</small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="disk-server-setting">
                                        <p>بارگذاری سرور</p>
                                        <div class="sidebar-progress">
                                            <div class="progress" data-height="5">
                                                <div class="progress-bar l-bg-orange" role="progressbar"
                                                     data-width="58%" aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-description"> <small>در حال بارگذاری </small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> تنظیمات پیشفرض
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    حق چاپ © 2019
                    <div class="bullet"></div>
                    طراحی توسط <a href="https://digialpha.agency">دیجی آلفا</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    import Header from "../Admin/Components/Layout/Header";
    import Sidebar from "../Admin/Components/Layout/Sidebar";

    export default {
        components: {Header, Sidebar}
    }
</script>