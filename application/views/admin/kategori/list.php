<div class="col-md-12">

    <a href="<?= base_url()?>kategori/add" type="button" class="btn btn-primary">Add</a>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3" id="example">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                for ($i=0; $i < count($all); $i++) { 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $all[$i]->nama_kategori ?></td>
                        <td><a href="<?= base_url()?>kategori/edit/<?= $all[$i]->id_kategori ?>" type="button" class="btn btn-success">Edit</a> <a href="<?= base_url()?>kategori/delete/<?=$all[$i]->id_kategori?>" type="button" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
