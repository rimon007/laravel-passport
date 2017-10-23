<template>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
                <slot name="header"></slot>
            </h4>
          </div>
          <div class="modal-body">
            <slot></slot>
          </div>
          <div class="modal-footer">
            <slot name="footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
            </slot>
          </div>
        </div>

      </div>
    </div>
</template>

<script>
    export default {
        
    }
</script> 
