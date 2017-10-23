<template>
    <div class="alert alert-flash"
         :class="'alert-'+level"
         role="alert"
         v-show="show">
         <button v-show="important" type="button" class="close" @click="btnClose">
            <span aria-hidden="true">&times;</span>
         </button>

         <strong>{{ level.toUpperCase() }}!</strong> {{ body }} &nbsp;
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                body: this.message,
                level: 'success',
                important: false,
                show: false
            }
        },
        created() {
            if (this.message) {
                this.flash();
            }
            window.events.$on(
                'flash', data => this.flash(data)
            );
        },
        methods: {
            flash(data) {
                if (data) {
                    this.body = data.message;
                    this.level = data.level;
                }
                this.show = true;
                if(!this.important)
                    this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            },
            btnClose() {
                this.show = false;
            }
        }
    };
</script>

<style>
    .alert-flash {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>
