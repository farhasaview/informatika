<div class="col-md-12">
    <a href="<?= base_url()?>admin/add" type="button" class="btn btn-primary">Add</a>
    <br>
    <br>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admin Pengguna</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                for ($i=0; $i < count($all); $i++) { 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $all[$i]->nama ?></td>
                        <td><?= $all[$i]->email ?></td>
                        <td><a href="<?= base_url()?>admin/edit/<?= $all[$i]->user_id ?>" type="button" class="btn btn-success">Edit</a> <a href="<?= base_url()?>admin/delete/<?=$all[$i]->user_id ?>" type="button" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>