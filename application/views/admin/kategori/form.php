<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Category's Form</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2"><?php echo $title ?></h3>
                        </div>
                        <hr>
                        <form action="<?= base_url()?>kategori/save" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Nama Kategori</label>
                                <input id="cc-pament" name="nama_kategori" type="text" class="form-control" aria-required="true" value="<?= $kategori['nama_kategori'] ?>" aria-invalid="false">

                                <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori'] ?>">
                            </div>
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