<?php
include("database.php");

$query = "SELECT categoryName FROM categoryTbl";
$query_run = mysqli_query($conn, $query);
?>

<table id="categoryTable" class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            $index = 1;
            while ($category = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <th scope="row"><?= $index ?></th>
                    <td><?= htmlspecialchars($category['categoryName']) ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                            <img src="images/ic_edit.png" alt="Edit">
                        </button>
                    </td>
                </tr>
                <?php
                $index++;
            }
        } else {
            echo "<tr><td colspan='3'>No categories found.</td></tr>";
        }
        ?>
    </tbody>
</table>
