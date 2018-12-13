<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">
                    <?= $item['id'] ? 'Edit ' : 'Add' ?>
                    Category
                </h4>
                <p class="card-category"><?= $item['title'] ?></p>

            </div>
            <div class="card-body">
                <form action="<?= SITE_URL ?>/category/<?= $item['id'] ? 'update-category' : 'create-category' ?>" method="post"
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
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent</label>
                        <select name="p_id" class="form-control" data-style="btn btn-link"
                                id="exampleFormControlSelect1">
                            <option value=""></option>
                            <?php foreach ($menu as $m): ?>
                                <option name="parent"
                                    <?= $m['id'] == $item['parent_id'] ? 'selected' : '' ?>
                                        value="<?= $m['id'] ?>">
                                    <?= $m['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">
                        <?= $item['id'] ? 'Update Category' : 'Create Category' ?>
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>