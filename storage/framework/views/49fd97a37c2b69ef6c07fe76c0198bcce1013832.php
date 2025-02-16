<div class="modal fade modal-danger" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <form class="form-horizontal" method="get" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="defaultModalLabel"><?php echo e($title); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo e($content); ?>

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="ids" id="ids" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">关 闭</button>
                    <button type="submit" class="btn btn-outline">确 认</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('url');
		$("#ids").val(button.data('ids'));
        var modal = $(this);

        modal.find('form').attr('action', action);
    })
</script>
