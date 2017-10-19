<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Datetimepicker</div>

                    <div class="panel-body">
                        <input type="text" class="form-control datetimepicker" v-model="start_date">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $('.datetimepicker').datetimepicker();
        },

        data() {
            return {
                start_date: ''
            }
        }
    }
</script> 
