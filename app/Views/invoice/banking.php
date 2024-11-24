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
            Add Baking Details
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
                <h3 class="text-center pt-1"><strong>Bank and UPI details</strong></h3>
            </div>
            <div class="card-body mt-3">
                <div class="card card-faint-border">
                    <div class="card-header " style="border-bottom: 1px solid #CBD5E1;">
                        <div class="d-flex">
                            <svg width="44" height="54" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22" cy="22" r="22" fill="#E9DEFF" />
                                <path d="M14.6667 27.8665V19.0665H16.4267V27.8665H14.6667ZM21.12 27.8665V19.0665H22.88V27.8665H21.12ZM11.1693 31.9731V30.2131H32.8307V31.9731H11.1693ZM27.5733 27.8665V19.0665H29.3333V27.8665H27.5733ZM11.1693 16.7198V15.0501L22 9.74756L32.8307 15.0501V16.7198H11.1693ZM15.3299 14.9598H28.6701L22 11.7331L15.3299 14.9598Z" fill="#733DD9" />
                            </svg>
                            <h5 class="pt-1 pl-3"><strong>Add Bank Account Details</strong> <br><span style="font-size: 16px;color:#64748B">Add your Bank Account to your invoices to make it easier for your clients to pay.</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control select2" id="country" name="country" style="border:1px solid rgba(203, 213, 225, 1);width:100%">
                                            <option value="" selected disabled>Selct country</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_name">Enter bank name</label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter bank name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_holder_name">Account holder name</label>
                                        <input type="text" class="form-control" name="account_holder_name" id="account_holder_name" placeholder="Enter account holder name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_number">Account number</label>
                                        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter account number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_account_number">Confirm account number</label>
                                        <input type="text" class="form-control" name="c_account_number" id="c_account_number" placeholder="Confirm account number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ifsc_code">IFSC code</label>
                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="Enter IFSC code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-4 mb-4 divider-line"></div>
                <div class="card  card-faint-border">
                    <div class="card-header " style="border-bottom: 1px solid #CBD5E1;">
                        <div class="d-flex">
                            <svg width="44" height="54" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22" cy="22" r="22" fill="#E9DEFF" />
                                <path d="M10.9167 16.189V10.9165H16.1891V12.6665H12.6667V16.189H10.9167ZM10.9167 33.0832V27.8107H12.6667V31.3332H16.1891V33.0832H10.9167ZM27.8109 33.0832V31.3332H31.3333V27.8107H33.0833V33.0832H27.8109ZM31.3333 16.189V12.6665H27.8109V10.9165H33.0833V16.189H31.3333ZM28.0914 28.0913H29.6732V29.673H28.0914V28.0913ZM28.0914 24.9276H29.6732V26.5093H28.0914V24.9276ZM26.5094 26.5093H28.0914V28.0913H26.5094V26.5093ZM24.9277 28.0913H26.5094V29.673H24.9277V28.0913ZM23.346 26.5093H24.9277V28.0913H23.346V26.5093ZM26.5094 23.3459H28.0914V24.9276H26.5094V23.3459ZM24.9277 24.9276H26.5094V26.5093H24.9277V24.9276ZM23.346 23.3459H24.9277V24.9276H23.346V23.3459ZM29.6732 14.3267V20.6538H23.346V14.3267H29.6732ZM20.6539 23.3459V29.673H14.3268V23.3459H20.6539ZM20.6539 14.3267V20.6538H14.3268V14.3267H20.6539ZM19.2627 28.2818V24.7371H15.7181V28.2818H19.2627ZM19.2627 19.2625V15.7179H15.7181V19.2625H19.2627ZM28.2819 19.2625V15.7179H24.7373V19.2625H28.2819Z" fill="#733DD9" />
                            </svg>
                            <h5 class="pt-1 pl-3"><strong>Add UPI Details (Optional)</strong> <br><span style="font-size: 16px;color:#64748B">Add your UPI ID to help your clients to easily pay via a UPI QR Code.</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_name">Enter UPI id</label>
                                        <input type="text" class="form-control" name="upi_id" id="upi_id" placeholder="example@upi">
                                    </div>
                                </div>
                            </div>
                        </form>
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