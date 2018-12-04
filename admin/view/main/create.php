<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Append Menu</h4>
                <p class="card-category"></p>
<!--                <p class="card-category">--><?//= $item['title'] ?><!--</p>-->
            </div>
            <div class="card-body">
                <form action="<?= SITE_URL?>main/" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input value="" name="new_title" type="text" class="form-control">
<!--                                <input value="--><?//= $item['title'] ?><!--" name="new_title" type="text" class="form-control">-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Slug</label>
                                <input value="" name="new_slug" type="text" class="form-control">
<!--                                <input value="--><?//= $item['slug'] ?><!--" name="new_slug" type="text" class="form-control">-->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent</label>
                        <select class="form-control" data-style="btn btn-link"
                                id="exampleFormControlSelect1">
                            <option value=""></option>
                            <?php foreach ($menu as $m): ?>
                                <option name="p_id"
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
                                <!--                                --><?//= var_dump($_GET['id'])?>
                                <input value="" name="sort" type="number" class="form-control">
<!--                                <input value="--><?//= $item['sort'] ?><!--" name="sort" type="number" class="form-control">-->
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" name="status" value="0">
                            <input    class="form-check-input"
                                      name="status"
                                      type="checkbox" value="1">
                            Active

<!--                                --><?//= $item['status'] == '1' ? 'checked' : '' ?>

                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>