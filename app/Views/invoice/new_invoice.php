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

    .numerical-progress .outer-circle {
        position: relative;
        border-radius: 50%;
        top: 7px;
    }

    .numerical-progress .small-circle {
        position: absolute;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        font-weight: bold;
    }

    .numerical-progress .small-circle {
        position: absolute;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid rgba(100, 116, 139, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        font-weight: bold;
    }

    .numerical-progress .small-circle.active {
        background-color: rgba(115, 61, 217, 1);
        color: #fff;
    }
</style>
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h2 class="card-title">
            Create Invoice
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
                    <span class="right-direction-icon"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="col-md-3">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="outer-circle" style="width: 35px; height: 50px;">
                        <div class="small-circle" style="width: 37px; height: 37px;">2</div>
                    </div>
                    <span>Add Banking Details</span>
                    <span class="right-direction-icon"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="col-md-3">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="outer-circle" style="width: 35px; height: 50px;">
                        <div class="small-circle" style="width: 37px; height: 37px;">3</div>
                    </div>
                    <span>Design & Share</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card invoice-form">
            <div class="card-header invoice-header-bg" style="border-radius:16px 16px 0px 0px">
                <h3 class="text-center pt-1"><strong>Invoice</strong></h3>
            </div>
            <div class="card-body mt-3">
                <div class="row ">
                    <div class="col-md-6 col-sm-12">
                        <div class="card element-border">
                            <div class="card-header border-0">
                                <h4 class="text-left pt-1"><strong>Billed by</strong> <span style="font-size: 18px;">(Zeplinix)</span></h4>
                                <h5 class="text-left p-1 purple-new" style="border:1px solid rgba(203, 213, 225, 1)"><strong>Anup Singh</strong></h5>
                            </div>
                            <div class="card-body pt-0">
                                <h5><strong>Business Details</strong><span class="float-right purple-new"><i class="fas fa-edit"></i></span></h5>
                                <form action="" id="billed-to-form">
                                    <div class="row mb-1">
                                        <div class="col-md-6 col-sm-12">
                                            <span>Business Name :</span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span>Eco Waste Solution </span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6 col-sm-12">
                                            <span>Address :</span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span>Plot no. 51, A-40, hadpasar, pune -005, maharashtra</span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6 col-sm-12">
                                            <span>GSTIN : </span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span>8976465476</span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6 col-sm-12">
                                            <span>State Name : </span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span>Maharashtra</span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6 col-sm-12">
                                            <span>E-mail : </span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span>anupsingh@gmail.com</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form class="form pt-3" id="invoice_buyer_form_data">
                            <div class="form-group row">
                                <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No. <span style="color: red;">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="invoice_no" placeholder="Enter invoice number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="invoice_date" class="col-sm-4 col-form-label">Invoice Date <span style="color: red;">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-border" name="invoice_date" id="invoice_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="due_date" class="col-sm-4 col-form-label">Due Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-border" id="due_date" name="due_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="buyer_order_no" class="col-sm-4 col-form-label">Buyer Order No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="buyer_order_no" name="buyer_order_no" placeholder="Enter buyer order number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="invoice_no" class="col-sm-4 col-form-label">Buyer Ref.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="invoice_no" placeholder="Enter buyer reference number">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-2 mb-2 divider-line"></div>
                <div class="row pt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="card element-border">
                            <div class="card-header border-0">
                                <h4 class="text-left pt-1"><strong>Billed To</strong> <span style="font-size: 18px;">(Client Details)</span></h4>
                                <select class="form-control select2" id="select_company" name="company_name" style="border:1px solid rgba(203, 213, 225, 1);width:100%">
                                    <option value="" selected disabled>Selct company</option>
                                </select>
                            </div>
                            <div class="card-body pt-0">
                                <blockquote class="border-0 mt-0 mb-0 text-center">
                                    <h5 class="text-dark"><strong>Add/select Client Details</strong></h5>
                                    <p>Resolution up to 1080*1080 pixel.<br>JPG or PNG file </p>
                                    <a href="#"><button class="btn action-btn"><i class="nav-icon fas fa-plus"></i> Create New Invoice</button></a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form class="form pt-3" id="invoice_buyer_form_data">
                            <div class="form-group row">
                                <label for="dispatch_doc_no" class="col-sm-4 col-form-label">Dispatch Doc No.<span style="color: red;">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="dispatch_doc_no" name="dispatch_doc_no" placeholder="Enter dispatch document number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dispatched_thorugh" class="col-sm-4 col-form-label">Dispatch Through<span style="color: red;">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="dispatched_thorugh" name="dispatched_thorugh" placeholder="Mention dispatched through">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="terms_of_delivery" class="col-sm-4 col-form-label">Terms of Delivery</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-border" id="terms_of_delivery" name="terms_of_delivery" placeholder="Enter buyer reference number">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-2 mb-2 divider-line"></div>
                <div class="row pt-3">
                    <div class="col-md-12 px-0">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool  action-btn">
                                        <i class="fas fa-percent"></i> Add GST
                                    </button>
                                    <button type="button" class="btn btn-tool  action-btn">
                                        <i class="fas fa-plus"></i> Add Discount
                                    </button>
                                </div>
                            </div>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">1</td>
                                            <td><input type="text" class="form-control form-control-border" id="description_of_goods" name="description_of_goods" placeholder="Description"></td>
                                            <td><input type="text" class="form-control form-control-border" id="hsn_no" name="hsn_no" placeholder="HSN"></td>
                                            <td> <input type="text" class="form-control form-control-border" id="packing" name="packing_tr" placeholder="Packing"></td>
                                            <td> <input type="number" class="form-control form-control-border" id="tax_rate" name="tax_rate" placeholder="Tax"></td>
                                            <td> <input type="number" class="form-control form-control-border" id="quantity" name="quantity" placeholder="Quantity"></td>
                                            <td> <input type="number" class="form-control form-control-border" id="rate" name="rate" placeholder="Rate"></td>
                                            <td> <input type="number" class="form-control form-control-border" id="amount" name="amount" placeholder="Amount"></td>
                                            <td class="text-center align-middle"><button class="border-0 bg-transparent purple-new"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="border-0 bg-transparent float-right mt-2 purple-new"><i class="fas fa-plus"></i> Add Record</button>
                            </div>
                            <div class="card-footer mt-2 mx-2" style="background-color: rgba(250, 247, 255, 1);">
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
                <div class="row mt-2 mb-2 divider-line"></div>
                <div class="row pt-3">
                    <div class="col-md-12 px-0">
                        <div class="card">
                            <div class="card-header px-2 border-0">
                                <h4 class="text-left pt-1"><strong><span class="purple-new"><i class="fas fa-file"></i></span> &nbsp;Additional Note</strong></h4>
                            </div>
                            <div class="card-body pt-0 px-2">
                                <form action="">
                                    <textarea class="form-control additional-note-bg" placeholder="Enter additional note..." name="additional_note" rows="4" id="additional_note" style="width: 100%;"></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer py-4 text-right" style="border-radius: 0px 0px 16px 16px">
                <button type="button" class="btn btn-tool bg-transparent text-dark  action-btn">Cancel</button>
                <button type="button" class="btn btn-tool  action-btn">Save & Next</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
<script>
    $('.select2').select2();
</script>
<?= $this->endSection() ?>