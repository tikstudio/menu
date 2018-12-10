<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">
                    <?= $item['id'] ? 'Edit ' : 'Add' ?>

                    News
                </h4>
                <p class="card-category"><?= $item['title'] ?></p>

            </div>
            <div class="card-body">

                <form action="<?= SITE_URL ?>/post/<?= $item['id'] ? 'update-news' : 'create-news' ?>" method="post"
                      enctype="multipart/form-data">

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

                            <label class="bmd-label-floating">Image</label>

                            <input type="file" name="file" class="form-control" value="<?= $item['image'] ?>">
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

                    <div class="row mt-5 mb-5">
                        <div class="col-md-12">
                            <textarea id="editor" name="desc" class=""
                                      placeholder="Type desciption for news..."><?= $item['description'] ?> </textarea>
                        </div>
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
                        <?= $item['id'] ? 'Update News' : 'Create News' ?>

                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>