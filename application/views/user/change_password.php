<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">P.std /</span> <?= $title; ?></h4>

        <div class="row">
            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">

                <form action="<?= base_url('user/changepassword') ?>" method="POST">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit My Password</h5>

                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="current_password">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="current_password" name="current_password" />
                                        <?= form_error('current_password', '<small class="text-danger ps-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="new_password1">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password1" name="new_password1" />
                                        <?= form_error('new_password1', '<small class="text-danger ps-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="new_password2">Repeat Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password2" name="new_password2" />
                                        <?= form_error('new_password2', '<small class="text-danger ps-1">', '</small>'); ?>
                                    </div>
                                </div>



                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- / Content -->