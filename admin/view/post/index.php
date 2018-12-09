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
                    <form action="<?= SITE_URL ?>/post/search-column" method="post">

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
                                Category
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

                        <tr>
                            <?php $a = $post_news[0] ?>
                            <?php foreach ($a as $key => $value) {

                                ?>
                                <td>
                                    <input type="search" value="" name="<?= $key ?>" id="<?= $key ?>" placeholder="..." class="srch" style="max-width: 85px; border-radius: 8px">
                                </td>
                                <?php
                            } ?>
                        </tr>
                        <?php foreach ($post_news as $news): ?>

                            <!--                        --><?php //$a = $news['category'];
//                            $array = explode(' ', $a);
//
//                            var_dump($array);
//                        exit()?>
                            <tr>
                                <td>
                                    <?= $news['id'] ?>
                                </td>
                                <td>
                                    <?= $news['title'] ?>
                                </td>
                                <td>
                                    <img src="<?= SITE_URL ?>assets/img/uploads/<?= $news['image'] ?>" class="newsImg"
                                         alt="" width="50" height="50">

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
                                    <?= mb_substr($news['description'], 0, 20) . '...' ?>
                                </td>
                                <td>
                                    <?= $news['category'] ?>
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
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>