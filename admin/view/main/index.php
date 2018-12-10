<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <a href="<?= SITE_URL ?>/main/create" style="float: right;">
                    <i class="material-icons text-white">queue</i>
                </a>

                <h4 class="card-title ">Menu Table</h4>
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
                                Parent
                            </th>
                            <th>
                                Status
                                <input type="checkbox" name="status" value="1"
                                       value="<?= isset($_GET['slug']) ? $_GET['slug'] : '' ?>">
                            </th>
                            <th>
                                Sort
                                <input type="text" name="sort" class="form-control"
                                       value="<?= isset($_GET['sort']) ? $_GET['sort'] : '' ?>">
                            </th>
                            <th>
                                &nbsp;<button class="btn btn-fab btn-white" name="s">
                                    <i class="material-icons text-success">search</i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($menu as $m): ?>
                            <tr>
                                <td>
                                    <?= $m['id'] ?>
                                </td>
                                <td>
                                    <?= $m['title'] ?>
                                </td>
                                <td>
                                    <?= $m['slug'] ?>
                                </td>
                                <td>
                                    <?= $m['p_id'] ?>
                                </td>
                                <td>
                                    <?= $m['status'] ?>
                                </td>
                                <td>
                                    <?= $m['sort'] ?>
                                </td>
                                <td style="width: 70px;">
                                    <a href="<?= SITE_URL ?>/main/update?id=<?= $m['id'] ?>">
                                        <i class="material-icons text-success">edit</i>
                                    </a>
                                    <a href="<?= SITE_URL ?>/main/delete?id=<?= $m['id'] ?>">
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