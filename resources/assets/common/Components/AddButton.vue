<template>
    <div class="text-left">
        <router-link :to="`${to}/create`">
            <button class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i>
                افزودن
            </button>
        </router-link>
    </div>
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