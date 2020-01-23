<template>
        <button :class="`btn btn-sm btn-outline-${type} btn--icon-text m-1`" @click="$emit('click')">
            <i :class="`zmdi zmdi-${icon}`"></i>
            <slot></slot>
        </button>
</template>

<script>
    export default {
        props: {
            icon: {
                type: String,
                default: ''
            },
            type: {
                type: String,
                default: 'success'
            }
        }

    }
</script>