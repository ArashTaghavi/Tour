<template>
    <router-link  :to="`${to}/detail`">
        <button class="btn btn-sm btn-outline-primary btn--icon-text m-1">
            <i class="zmdi zmdi-comment-text"></i>
            جزییات
        </button>
    </router-link>
</template>

<script>
    export default {
        props: {
            to: {
                type: String,
                default: ''
            }
        }

    }
</script>