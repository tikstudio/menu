<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <a href="<?= SITE_URL ?>/post/create" style="float: right;">
                    <i class="material-icons text-white">queue</i>
                </a>

                <h4 class="card-title ">News Table</h4>
                <p class="card-category"> Here is a subtitle for this table</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Slug
                            </th>
                            <th>
                                News
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Sort
                            </th>
                            <th>
                                Date
                            </th>
                            <th>

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
                                    <?= $m['news'] ?>
                                </td>
                                <td>
                                    <?= $m['image'] ?>
                                </td>
                                <td>
                                    <?= $m['status'] ?>
                                </td>
                                <td>
                                    <?= $m['sort'] ?>
                                </td>
                                <td>
                                    <?= $m['date'] ?>
                                </td>

                                <td style="width: 70px;">
                                    <a href="<?= SITE_URL ?>/post/update?id=<?= $m['id'] ?>">
                                        <i class="material-icons text-success">edit</i>
                                    </a>
                                    <a href="<?= SITE_URL ?>/post/delete?id=<?= $m['id'] ?>">
                                        <i class="material-icons text-danger"
                                           onclick="return confirm('Really delete?');">delete</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>