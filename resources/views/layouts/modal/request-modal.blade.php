<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('requests.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Your amount name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">VAT</label>
                        <input type="number" class="form-control" name="vat" min="0" max="100"
                            value="15" placeholder="Your vat name" required>
                    </div>

                    <label class="form-label">VAT calculation type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="type" value="{{ App\Enums\RequestType::ADD()->value }}"
                                    class="form-selectgroup-input" required>
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
                                <input type="radio" name="type"
                                    value="{{ App\Enums\RequestType::EXCLUDE()->value }}" class="form-selectgroup-input"
                                    required>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Currency</label>
                                <select class="form-select" name="currency_id" required>
                                    @foreach (App\Models\Currency::all() as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Create new report
                </button>
            </div>
            </form>

        </div>
    </div>
</div>
