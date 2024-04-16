<!-- Include your header file -->
<?php include('header.php'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <form id="Item_form" method="post">
                            <div class="card-header">
                                <h4>Item</h4>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="vendor_type">Vendor Type</label>
                                    <select class="form-control" name="vendor_type_id" id="vendor_type">
                                        <?php foreach ($vendor_type as $vendor_type_item): ?>
                                        <option value="<?php echo $vendor_type_item->id; ?>"
                                            <?php if (!empty($single) && $single->vendor_type_id == $vendor_type_item->id) echo "selected"; ?>>
                                            <?php echo $vendor_type_item->vendor_type_name; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if(isset($validation) && $validation->getError('vendor_type_id')): ?>
                                    <div class="text-danger"><?php echo $validation->getError('vendor_type_id'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Item_name">Item Name</label>
                                    <input type="hidden" class="form-control" name="id"
                                        value="<?php if(!empty($single)){ echo $single->id;} ?>">
                                    <input type="text" class="form-control" name="Item_name"
                                        value="<?php if(!empty($single)){ echo $single->Item_name;} ?>">
                                    <?php if(isset($validation) && $validation->getError('Item_name')): ?>
                                    <div class="text-danger"><?php echo $validation->getError('Item_name'); ?></div>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Include Item List card here -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Item List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Item Name</th>
                                            <th>Vendor Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($iteam)): $i=1; ?>
                                        <?php foreach($iteam as $data): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $data->Item_name; ?></td>
                                            <td><?= $data->vendor_type_name;?></td>
                                            <td class="align-middle">
                                                <a href="<?= base_url(); ?>edit-item/<?= $data->id; ?>"
                                                    class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>delete/<?= $data->id; ?>/tbl_item"
                                                    class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Data is not available.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Include your footer file -->
<?php include('footer.php'); ?>