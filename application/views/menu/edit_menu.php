<!-- Modal Tambah -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit New Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/edit') ?>" method="POST">
                <?php

                ?>
                <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="menu" class="form-label">Menu</label>
                            <input type="text" id="menu" name="menu" class="form-control" placeholder="Enter Menu name" value="<?= $menu['menu'] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>