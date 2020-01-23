<template>
    <router-link  :to="`${to}/edit`">
        <button class="btn btn-icon btn-sm icon-left btn-info">
            <i class="fa fa-edit"></i>
            ویرایش
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