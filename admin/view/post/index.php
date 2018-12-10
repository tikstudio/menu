<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">


                <a href="<?= SITE_URL ?>/post/create-news" style="float: right;">

                    <i class="material-icons text-white">queue</i>
                </a>

                <h4 class="card-title ">News Table</h4>
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
                                    Image
                                </th>
                                <th>
                                    Slug
                                    <input type="text" name="slug" class="form-control"
                                           value="<?= isset($_GET['slug']) ? $_GET['slug'] : '' ?>">
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
                                    Description
                                    <input type="text" name="description" class="form-control">
                                </th>
                                <th>
                                    Date
                                    <input type="text" name="date" class="form-control">
                                </th>
                                <th>
                                    <button class="btn btn-fab btn-white" name="s">
                                        <i class="material-icons text-success">search</i>
                                    </button>
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
                                        <img src=" <?= SITE_URL ?>/assets/img/uploads/<?= $news['image'] ?>"
                                             class="newsImg"
                                             alt="" width="100" height="100">
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
                                        <?= mb_substr(strip_tags($news['description']), 0, 20) . '...' ?>
                                    </td>
                                    <td>

                                        <?= $news['date'] ?>
                                    </td>
                                    <td style="width: 70px;">
                                        <a href="<?= SITE_URL ?>/post/update-news?id=<?= $news['id'] ?>">
                                            <i class="material-icons text-success">edit</i>
                                        </a>
                                        <a href="<?= SITE_URL ?>/post/delete-news?id=<?= $news['id'] ?>">
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