<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Simple Table</h4>
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
                                Parent
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Sort
                            </th>
                            <th>
                                &nbsp;
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
                                    <a href="<?= SITE_URL ?>/main/delete?id=<?=$m['id'] ?>">
                                    <i class="material-icons text-danger">delete</i>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                    <a href="<?= SITE_URL ?>/main/update">ADD</a>
                </div>
            </div>
        </div>

    </div>

</div>

