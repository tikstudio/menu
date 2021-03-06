<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">
                    <?= $item['id'] ? 'Edit' : 'Add' ?>
                    Menu
                </h4>
                <p class="card-category"><?= $item['title'] ?></p>

            </div>
            <div class="card-body">
                <form action="<?= SITE_URL ?>/main/<?= $item['id'] ? 'update' : 'create' ?>" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input value="<?= $item['title'] ?>" name="new_title" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Slug</label>
                                <input value="<?= $item['slug'] ?>" name="new_slug" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent</label>
                        <select name="p_id" class="form-control" data-style="btn btn-link"
                                id="exampleFormControlSelect1">
                            <option value=""></option>
                            <?php foreach ($menu as $m): ?>
                                <option name="parent"
                                    <?= $m['id'] == $item['p_id'] ? 'selected' : '' ?>
                                        value="<?= $m['id'] ?>">
                                    <?= $m['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Order</label>
                                <input value="<?= $item['sort'] ?>" name="sort" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" name="status" value="0">
                            <input <?= $item['status'] == '1' ? 'checked' : '' ?>
                                    class="form-check-input"
                                    name="status"
                                    type="checkbox" value="1">
                            Active
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">
                        <?= $item['id'] ? 'Update' : 'Create' ?>
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>