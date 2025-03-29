<?php include(__DIR__ . '/../header.php'); ?>


<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Admin Vehicle Inventory</h1>
        <form action="." method="post" id="list__header__select" class="list__header__select">
            <input type="hidden" name="action" value="admin_list_inventory">
            <select name="order">
                <option value="price_desc" <?= (isset($_POST['order']) && $_POST['order'] == "price_desc") ? "selected" : "" ?>>Price (High to Low)</option>
                <option value="price_asc" <?= (isset($_POST['order']) && $_POST['order'] == "price_asc") ? "selected" : "" ?>>Price (Low to High)</option>
                <option value="year_desc" <?= (isset($_POST['order']) && $_POST['order'] == "year_desc") ? "selected" : "" ?>>Year (Newest to Oldest)</option>
                <option value="year_asc" <?= (isset($_POST['order']) && $_POST['order'] == "year_asc") ? "selected" : "" ?>>Year (Oldest to Newest)</option>
            </select>
            <select name="make">
                <option value="">All Makes</option>
                <?php foreach (getMakes() as $make) : ?>
                    <option value="<?= $make['make'] ?>" <?php if(isset($_GET['make']) && $_GET['make'] == $make['make']) echo "selected"; ?>>
                        <?= $make['make'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="type">
                <option value="">All Types</option>
                <?php foreach (getTypes() as $type) : ?>
                    <option value="<?= $type['type'] ?>" <?php if(isset($_GET['type']) && $_GET['type'] == $type['type']) echo "selected"; ?>>
                        <?= $type['type'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="class">
                <option value="">All Classes</option>
                <?php foreach (getClasses() as $class) : ?>
                    <option value="<?= $class['class'] ?>" <?php if(isset($_GET['class']) && $_GET['class'] == $class['class']) echo "selected"; ?>>
                        <?= $class['class'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="add-button bold">Filter</button>
        </form>
    </header>
    <?php if (!empty($inventory)) : ?>
    <section id="list" class="list">
        <table>
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Make</th>
                    <th>Class</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventory as $vehicle) : ?>
                    <tr>
                        <td><?= $vehicle['model'] ?></td>
                        <td><?= $vehicle['year'] ?></td>
                        <td><?= $vehicle['price'] ?></td>
                        <td><?= getMakeNameById($vehicle['make_id']) ?></td>
                        <td><?= getClassNameById($vehicle['class_id']) ?></td>
                        <td><?= getTypeNameById($vehicle['type_id']) ?></td>

                        <?php if (isset($_GET['action']) && $_GET['action'] == 'admin_list_inventory') : ?>

                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>">
                                    <button type="submit">X</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php else : ?>
    <br>
    <p>No vehicles found.</p>
<?php endif; ?>

</section>

<br>
<p><a href=".?action=list_classes">View/Edit Classes</a></p>
<p><a href=".?action=list_makes">View/Edit Makes</a></p>
<p><a href=".?action=list_types">View/Edit Types</a></p>
<p><a href=".?action=show_add_vehicle">Add New Vehicle</a></p>
<p><a href="index.php?action=list_inventory">User View</a></p>

<?php include('view/footer.php')?>
