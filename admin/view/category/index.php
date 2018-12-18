<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <a href="<?= SITE_URL ?>/category/create-category" style="float: right;">
                    <i class="material-icons text-white">queue</i>
                </a>

                <h4 class="card-title ">Category Table</h4>
                <p class="card-category"> Here is a subtitle for this table</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="get">
                        <table class="table">
                            <thead class=" text-primary">

                            <tr>
                                <th>
                                    ID
                                    <input type="text" name="id" class="form-control">
                                </th>
                                <th>
                                    Title
                                    <input type="text" name="title" class="form-control"
                                           value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>">
                                </th>
                                <th>
                                    Slug
                                    <input type="text" name="slug" class="form-control"
                                           value="<?= isset($_GET['slug']) ? $_GET['slug'] : '' ?>">
                                </th>

                                <th>
                                    Description
                                    <input type="text" name="description" class="form-control">
                                </th>

                                <th>
                                    Image
                                </th>
                                <th>
                                    Parent
                                </th>
                                <th>
                                    <button class="btn btn-fab btn-white" name="s">
                                        <i class="material-icons text-success">search</i>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($category as $fild): ?>
                                <tr>
                                    <td>
                                        <?= $fild['id'] ?>
                                    </td>

                                    <td>
                                        <?= $fild['title'] ?>
                                    </td>
                                    <td>
                                        <?= $fild['slug'] ?>
                                    </td>
                                    <td>
                                        <?= mb_substr(strip_tags($fild['description']), 0, 20) . '...' ?>
                                    </td>
                                    <td>
                                        <img src=" <?= SITE_URL ?>/assets/img/categoryUploads/<?= $fild['image'] ?>"
                                             class="newsImg"
                                             alt="" width="50" height="50">
                                    </td>

                                    <td>
                                        <?= $fild['parent_id'] ?>
                                    </td>

                                    <td style="width: 70px;">
                                        <a href="<?= SITE_URL ?>/category/update-category?id=<?= $fild['id'] ?>">
                                            <i class="material-icons text-success">edit</i>
                                        </a>
                                        <a href="<?= SITE_URL ?>/category/delete-category?id=<?= $fild['id'] ?>">
                                            <i class="material-icons text-danger"
                                               onclick="return confirm('Really delete?');">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>