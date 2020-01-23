<template>
    <button class="btn btn-icon btn-sm icon-left btn-danger" @click.prevent="handleDelete()">
        <i class="fa fa-trash"></i>
        حذف
    </button>
</template>

<script>
    let vm = new Vue();

    export default {
        props: {
            id: {
                type: Number,
                default: 0
            }
        },
        methods: {
            handleDelete() {
                this.deleteConfirm()
                    .then(confirm => {
                        if (confirm) {
                            this.$parent.$parent.handleDelete(this.id);
                        }
                    });
            }
        }

    }
</script>