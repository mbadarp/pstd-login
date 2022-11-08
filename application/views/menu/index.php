<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">P.std /</span> <?= $title; ?></h4>

        <!-- Hoverable Table rows -->
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <h5 class="card-header">Hoverable rows</h5>
                    <?= form_error('menu', ' <div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>

                    <?= $this->session->flashdata('message') ?>

                    <?php if ($this->session->flashdata('flash')) : ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data <strong><?= $this->session->flashdata('flash'); ?> successfully !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php endif; ?>
                    <div class="table-responsive">

                        <a href="#" class="btn btn-sm btn-primary mx-4 mb-3" data-bs-toggle="modal" data-bs-target="#newMenuModal">Add New Menu</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $m['menu'] ?></td>
                                        <td>
                                            <a href="<?= base_url('menu/edit/') . $m['id'] ?>" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#editMenuModal">edit</a>
                                            <a href="<?= base_url('menu/delete/') . $m['id'] ?>" class="badge bg-danger" onclick="return confirm('are you sure?')">delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->

    </div>
    <!-- / Content -->

    <!-- Modal -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel1">Add New Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="menu" class="form-label">Menu</label>
                                <input type="text" id="menu" name="menu" class="form-control" placeholder="Enter Menu name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'edit_menu.php' ?>