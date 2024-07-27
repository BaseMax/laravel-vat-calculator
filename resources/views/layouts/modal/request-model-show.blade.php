<div class="modal modal-blur fade" id="modal-report-show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Show request #<label class="modal_id_show"></label></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <label class="modal_amount_show"></label>
                    <label class="modal_currency_show"></label>
                </div>

                <div class="mb-3">
                    <label class="form-label">VAT</label>
                    <label class="modal_vat_show"></label>%
                </div>

                <label class="form-label">VAT calculation type</label>
                <div class="form-selectgroup-boxes row mb-3">
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1"
                                class="form-selectgroup-input modal_add_type_show" disabled>
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Add</span>
                                    <span class="d-block text-muted">Select this option to include VAT in the
                                        calculation.</span>

                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1"
                                class="form-selectgroup-input modal_exclude_type_show" disabled>
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Exclude</span>
                                    <span class="d-block text-muted">Select this option to exclude VAT from the
                                        calculation.</span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label modal_result1_title"></label>
                    <label class="modal_result1_amount"></label>
                    <label class="modal_currency_show"></label>
                </div>

                <div class="mb-3">
                    <label class="form-label modal_result2_title"></label>
                    <label class="modal_result2_amount"></label>
                    <label class="modal_currency_show"></label>
                </div>


            </div>
        </div>
    </div>
</div>
