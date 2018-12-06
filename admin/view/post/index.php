<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <a href="<?= SITE_URL ?>post/createNews" style="float: right;">
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
                                Image
                            </th>
                            <th>
                                Slug
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Sort
                            </th>
                            <th>
                               Description
                            </th>
                            <th>
                               Date
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($post_news as $news): ?>
                            <tr>
                                <td>
                                    <?= $news['id'] ?>
                                </td>
                                <td>
                                    <?= $news['title'] ?>
                                </td>
                                <td>
                                    <img src=" <?= SITE_URL ?>assets/img/uploads/<?= $news['image'] ?>" class="newsImg" alt="" width="100" height="100">

                                </td>
                                <td>
                                    <?= $news['slug'] ?>
                                </td>
                                <td>
                                    <?= $news['status'] ?>
                                </td>
                                <td>
                                    <?= $news['sort'] ?>
                                </td>
                                <td>
                                    <?= mb_substr($news['description'],0, 20).'...' ?>
                                </td>
                                <td>

                                    <?= $news['date'] ?>
                                </td>
                                <td style="width: 70px;">
                                    <a href="<?= SITE_URL ?>post/updateNews?id=<?= $news['id'] ?>">
                                        <i class="material-icons text-success">edit</i>
                                    </a>
                                    <a href="<?= SITE_URL ?>post/deleteNews?id=<?= $news['id'] ?>">
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