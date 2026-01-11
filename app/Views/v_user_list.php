<div class="row">
    <div class="col-lg-8">
            <?php 
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
            ?>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
                <?php $no = 1;
                foreach ($users as $user => $value) { ?>
                    <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$value['username'] ?></td>
                        <td><?=$value['email'] ?></td>
                        <td>
                            <a href="<?= base_url('User/deleteUser/'.$value['id'])?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data??')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php if (isset($pager)) : ?>
<div class="row">
    <div class="col-lg-8">
        <?= $pager->links() ?>
    </div>
</div>
<?php endif; ?>