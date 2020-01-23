<template>
    <div class="btn-group show" role="group">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            دارپ دان
        </button>
        <div class="dropdown-menu show" x-placement="top-start"
             style="position: absolute; transform: translate3d(0px, -85px, 0px); top: 0px; left: 0px; will-change: transform;">
            <router-link v-for="(data,index) in link" class="dropdown-item" :key=index :to=data.to>
                {{data.title}}
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            main_title: {
                type: String,
                default: 'عملیات'
            },
            link: {
                type: Array,
                default: []
            }
        }

    }
</script>