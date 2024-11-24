<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>
<style>
    select.form-control option:disabled {
        color: rgba(115, 61, 217, 1) !important;
    }

    textarea:focus {
        border: 1px solid rgba(115, 61, 217, 1) !important;
    }

    .card-footer {
        box-shadow: 0px -4px 24px 0px rgba(0, 0, 0, 0.05);
        background-color: #fff;
    }
</style>
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h2 class="card-title">
            Share Invoice
        </h2>
    </div>
    <div class="card-header numerical-progress  justify-content-between border-0">
        <div class="row">
            <div class="col-md-3">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="outer-circle" style="width: 35px; height: 50px;">
                        <div class="small-circle active" style="width: 37px; height: 37px;">1</div>
                    </div>
                    <span>Invoice Details</span>
                    <!-- <span class="right-direction-icon"><i class="fas fa-chevron-right"></i></span> -->
                </div>
            </div>
            <div class="col-md-3">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="outer-circle" style="width: 35px; height: 50px;">
                        <div class="small-circle active" style="width: 37px; height: 37px;">2</div>
                    </div>
                    <span>Add Banking Details</span>
                    <!-- <span class="right-direction-icon"><i class="fas fa-chevron-right"></i></span> -->
                </div>
            </div>
            <div class="col-md-3">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="outer-circle" style="width: 35px; height: 50px;">
                        <div class="small-circle active" style="width: 37px; height: 37px;">3</div>
                    </div>
                    <span>Design & Share</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card invoice-form">
            <div class="card-header  invoice-header-bg ui-sortable-handle" style="border-radius:16px 16px 0px 0px">
                <h3 class="card-title text-left"><strong>Share Invoice</strong></h3>
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool bg-white"><i class="fas fa-download"></i></button>
                    <button type="button" class="btn btn-tool bg-white"><i class="fas fa-print"></i> Print</button>
                    <button type="button" class="btn btn-tool bg-white"><i class="fas fa-share"></i> Share</button>
                </div>
            </div>
            <div class="card-body mt-3">
                <div class="card card-faint-border">
                    <div class="card-header px-0" style="border-bottom: 1px solid #CBD5E1;">
                        <div class="d-flex">
                            <h5 class="pt-1 pl-3 mb-0"><strong>Invoice Summary</strong> <br><span style="font-size: 16px;color:#64748B">Loreum ipsum Bank Account to your invoices to make it easier for your clients to pay.</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-0">
                                    <div class="col-md-12">
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6 text-info">Invoice Number :</div>
                                            <div class="col-md-6 text-right"><span>00896453</span></div>
                                        </div>
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6">Invoice Date :</div>
                                            <div class="col-md-6 text-right"><span>2-12-2023</span></div>
                                        </div>
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6">Due Date :</div>
                                            <div class="col-md-6 text-right"><span>2-12-2024</span></div>
                                        </div>
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6">Buyers Order No. :</div>
                                            <div class="col-md-6 text-right"><span>867685758</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="color:#64748B">Buyers Ref. :</div>
                                            <div class="col-md-6 text-right"><span>Loreum ipsum</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-0">
                                    <div class="col-md-12">
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6">Invoice Number :</div>
                                            <div class="col-md-6 text-right"><span>00896453</span></div>
                                        </div>
                                        <div class="row for_border_bottom pb-2">
                                            <div class="col-md-6">Invoice Date :</div>
                                            <div class="col-md-6 text-right"><span>2-12-2023</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="color:#64748B">Due Date :</div>
                                            <div class="col-md-6 text-right"><span>2-12-2024</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mb-2 divider-line"></div>
                <div class="row">
                    <div class="col-md-12 px-0">
                        <div class="card">
                            <div class="card-body px-2 table-responsive">
                                <table class="table table-hover" style="border: 1px solid rgba(203, 213, 225, 1);">
                                    <thead class="table-header-bg">
                                        <tr>
                                            <th>#</th>
                                            <th>Description of goods</th>
                                            <th>HSN</th>
                                            <th>Packing</th>
                                            <th>Tax rate</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">1</td>
                                            <td><input type="text" class="form-control form-control-border" id="description_of_goods" name="description_of_goods" placeholder="Description"></td>
                                            <td><input type="text" class="form-control form-control-border" id="hsn_no" name="hsn_no" placeholder="HSN"></td>
                                            <td> <input type="text" class="form-control form-control-border" id="packing" name="packing_tr" placeholder="Packing"></td>
                                            <td> <input type="number" class="form-control form-control-border ValidInputValue" id="tax_rate" name="tax_rate" placeholder="Tax" min="1" max="100" step="0.01" pattern="^\d{1,2}(\.\d{2})?$"></td>
                                            <td> <input type="number" class="form-control form-control-border intOnly" id="quantity" name="quantity" placeholder="Quantity"></td>
                                            <td> <input type="number" class="form-control form-control-border " id="rate" name="rate" placeholder="Rate"></td>
                                            <td> <input type="number" class="form-control form-control-border" id="amount" name="amount" placeholder="Amount"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer mt-2 mx-2 shadow-none" style="background-color: rgba(250, 247, 255, 1);">
                                <div class="row mb-1">
                                    <div class="col-md-6 col-sm-6">Gross Amount :</div>
                                    <div class="col-md-6 col-sm-6 text-right">6,000.00</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-sm-6">CGST 9% :</div>
                                    <div class="col-md-6 col-sm-6 text-right">540.00</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-sm-6">SGST 9% :</div>
                                    <div class="col-md-6 col-sm-6 text-right">540.00</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-6 col-sm-6 ">Rounding Off :</div>
                                    <div class="col-md-6 col-sm-6 text-right">-</div>
                                </div>
                                <div class="row py-2 total-pay-bg">
                                    <div class="col-md-6 col-sm-6">Total Payable :</div>
                                    <div class="col-md-6 col-sm-6 text-right">6,540.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer py-4 text-right" style="border-radius: 0px 0px 16px 16px">
            <button type="button" class="btn btn-tool bg-transparent text-dark  action-btn">Cancel</button>
            <button type="button" class="btn btn-tool  action-btn">Save & Next</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoice-success-modal">
                Launch demo modal
            </button>
        </div>
    </div>
    <div class="modal fade" id="invoice-success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body text-center">
                    <img src="<?= site_url("public") ?>/images/dashboard/invoice-success.png" alt="">
                    <br>
                    <h3><svg width="35" height="35" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.4841 29.5392L31.7705 15.2528L29.5312 13.0136L17.4841 25.0608L11.4278 19.0045L9.18862 21.2438L17.4841 29.5392ZM20.5037 40.6875C17.7115 40.6875 15.0869 40.1577 12.6301 39.098C10.1732 38.0383 8.03617 36.6002 6.21894 34.7837C4.40171 32.9672 2.96291 30.831 1.90253 28.3752C0.84251 25.9195 0.3125 23.2956 0.3125 20.5037C0.3125 17.7115 0.842333 15.0869 1.902 12.6301C2.96167 10.1732 4.39976 8.03617 6.21628 6.21894C8.0328 4.40171 10.169 2.96291 12.6248 1.90253C15.0805 0.84251 17.7044 0.3125 20.4963 0.3125C23.2885 0.3125 25.9131 0.842332 28.3699 1.902C30.8268 2.96167 32.9638 4.39976 34.7811 6.21628C36.5983 8.0328 38.0371 10.169 39.0975 12.6248C40.1575 15.0805 40.6875 17.7044 40.6875 20.4963C40.6875 23.2885 40.1577 25.9131 39.098 28.3699C38.0383 30.8268 36.6002 32.9638 34.7837 34.7811C32.9672 36.5983 30.831 38.0371 28.3752 39.0975C25.9195 40.1575 23.2956 40.6875 20.5037 40.6875ZM20.5 37.5C25.2458 37.5 29.2656 35.8531 32.5594 32.5594C35.8531 29.2656 37.5 25.2458 37.5 20.5C37.5 15.7542 35.8531 11.7344 32.5594 8.44063C29.2656 5.14687 25.2458 3.5 20.5 3.5C15.7542 3.5 11.7344 5.14687 8.44063 8.44063C5.14687 11.7344 3.5 15.7542 3.5 20.5C3.5 25.2458 5.14687 29.2656 8.44063 32.5594C11.7344 35.8531 15.7542 37.5 20.5 37.5Z" fill="#733DD9" />
                        </svg> <strong>Invoice Created Succesfully</strong>
                    </h3>
                    <p>Loreum ipsum dummy text here Loreum ipsum dummy text here Loreum ipsum dummy text here</p>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
<?= $this->endSection() ?>