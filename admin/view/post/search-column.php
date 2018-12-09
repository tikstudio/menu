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
            <?php foreach ($search_result as $news): ?>

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
                        <a href="<?= SITE_URL ?>post/update_news?id=<?= $news['id'] ?>">
                            <i class="material-icons text-success">edit</i>
                        </a>
                        <a href="<?= SITE_URL ?>post/delete_news?id=<?= $news['id'] ?>">
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