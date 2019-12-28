<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Form Dosen</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2"><?php echo $title ?></h3>
                        </div>
                        <hr>
                        <form action="<?= base_url()?>admin_dosen/save" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                <input id="cc-pament" name="nama" type="text" class="form-control" aria-required="true" value="<?= $admin_dosen['nama'] ?>" aria-invalid="false">

                                <input type="hidden" name="id_dosen" value="<?= $admin_dosen['id_dosen'] ?>">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">NIDN</label>
                                <input id="cc-name" name="nidn" value="<?= $admin_dosen['nidn'] ?>" type="number" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Kata Sandi</label>
                                <input id="cc-name" name="password" value="<?= $admin_dosen['password']?>" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Konfirmasi Kata Sandi</label>
                                <input id="cc-name" name="password" value="<?= $admin_dosen['password']?>" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>

                            <!--ini adalah contoh pemanggilan library jquery yang ada di direktori view/admin/template/footer.php dengan id ckeditor-->
                            <!-- <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">contoh manggil jquery</label>
                                <textarea name="alamat_agen" id="ckeditor" rows="9" class="form-control"></textarea>
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div> -->
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-save fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Save</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>