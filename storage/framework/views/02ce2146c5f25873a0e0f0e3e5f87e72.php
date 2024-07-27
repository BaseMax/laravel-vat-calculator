<div class="card">
    <div class="card-body">
        <div id="table-default table-responsive">
            <?php echo $dataTable->table(['class' => 'table card-table table-vcenter text-nowrap datatable']); ?>

        </div>
    </div>
</div>

<?php echo $__env->make('layouts.modal.request-model-show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        function fill_model(id) {
            const url = "<?php echo e(route('requests.show', ['request' => '__id__'])); ?>".replace('__id__', id);

            $.get(url, function(res) {
                $('.modal_id_show').html(res.id);
                $('.modal_amount_show').html(res.amount);
                $('.modal_vat_show').html(res.vat);
                $('.modal_add_type_show').checked = true;

                if (res.type === '1') { // ADD
                    $(".modal_result1_title").html("VAT added");
                    $(".modal_result2_title").html("Gross amount");
                    document.querySelector('.modal_add_type_show').checked = true;
                } else { // EXCLUDE
                    $(".modal_result1_title").html("VAT excluded");
                    $(".modal_result2_title").html("Net amount");
                    document.querySelector('.modal_exclude_type_show').checked = true;
                }

                $(".modal_currency_show").html(res.currency.name).change();
                $(".modal_result1_amount").html(res.vat_result);
                $(".modal_result2_amount").html(res.amount_result);
            });
        }
    </script>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH /home/ali/Desktop/projects/tax/resources/views/requests/list.blade.php ENDPATH**/ ?>