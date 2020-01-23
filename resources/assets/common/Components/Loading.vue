<template>
    <div class="vue-loader"></div>
</template>
<style>
    .vue-loader,
    .vue-loader:after {
        border-radius: 50%;
        width: 10em;
        height: 10em;
    }

    .vue-loader {
        margin: 5px;
        font-size: 5px;
        position: absolute;
        text-indent: -9999em;
        border-right: 1em solid #FF851B;
        border-bottom: 1em solid #FF851B;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load8 1.1s infinite linear;
        animation: load8 1.1s infinite linear;
        left:0;
    }

    @-webkit-keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

</style>