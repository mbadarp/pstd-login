<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">P.std /</span> <?= $title; ?></h4>

        <!-- Hoverable Table rows -->
        <div class="row">
            <div class="col-lg">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><?= validation_errors()  ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                <?php endif; ?>
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

                        <a href="#" class="btn btn-sm btn-primary mx-4 mb-3" data-bs-toggle="modal" data-bs-target="#newSubMenuModal">Add New Submenu</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $sm['title'] ?></td>
                                        <td><?= $sm['menu'] ?></td>
                                        <td><?= $sm['url'] ?></td>
                                        <td><?= $sm['icon'] ?></td>
                                        <td><?= $sm['is_active'] ?></td>
                                        <td>
                                            <a href="<?= base_url('menu/editSubMenu/') . $sm['id'] ?>" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#editMenuModal">edit</a>
                                            <a href="<?= base_url('menu/deleteSubMenu/') . $sm['id'] ?>" class="badge bg-danger" onclick="return confirm('are you sure?')">delete</a>
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
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu/submenu') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class=" mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Submenu title">

                            </div>
                            <div class=" mb-3">
                                <label for="title" class="form-label">Menu</label>
                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="menu_id">
                                    <option selected>Open this select menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control" placeholder="Enter  url">

                            </div>
                            <div class=" mb-3">
                                <label for="icon" class="form-label">Icon <a href="https://boxicons.com/" target="_blank">(boxicons)</a></label>
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter icon">
                            </div>
                            <div class="mb-3">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked />
                                    <label class="form-check-label" for="is_active"> Active ? </label>
                                </div>
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