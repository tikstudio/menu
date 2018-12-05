<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Menu</h4>
                <p class="card-category"><?= $item['title'] ?></p>
            </div>
            <div class="card-body">
                <form action="<?= SITE_URL ?>/main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input name="title" value="<?= $item['title'] ?>" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Slug</label>
                                <input name="slug" value="<?= $item['slug'] ?>" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent</label>
                        <select class="form-control" data-style="btn btn-link"
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
                                <input name="sort" value="<?= $item['sort'] ?>" type="number" class="form-control">
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
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>