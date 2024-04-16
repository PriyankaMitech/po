<?php include('header.php') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Request PO</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="vendor_form">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="vendor_name">Vendor Company Name</label>
                                        <select class="form-control" name="vendor_name" id="vendor_name">
                                            <option value="">Select Vendor</option>
                                            <?php foreach ($vendor as $vendor_type_item): ?>
                                            <option value="<?= $vendor_type_item->id ?>">
                                                <?= $vendor_type_item->vendor_name ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="contact_p_name">Vendor Type:</label>
                                        <input type="text" class="form-control" id="vendor_type_input"
                                            name="vendor_type_input" placeholder="Vendor Type">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="vendor_name">Product/services</label>
                                        <select class="form-control" name="vendor_name" id="vendor_name">
                                            <option value="">Select product</option>
                                          
                                            <option value="">
                                               
                                            </option>
                                            
                                        </select>
                                    </div>

                                    <!-- Add other form fields here -->

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit" name="submit"
                                        value="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php') ?>
<!-- 
<script>
    $(document).ready(function() {
        $("#vendor_name").change(function() {
            var vendorId = $(this).val();
            $.ajax({
                type: "post",
                url: "fetchVendorDetails", // Replace with your PHP script URL
                data: {
                    'vendor_id': vendorId
                },
                success: function(data) {
    console.log("Success:", data); // Log the response data to the console
    var vendorData = JSON.parse(data);
    $("#vendor_type").text(vendorData.vendor_type); // Update to display the vendor type
},
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script> -->

<script>
$(document).ready(function() {
    $("#vendor_name").change(function() {
        var vendorId = $(this).val();
        $.ajax({
            type: "post",
            url: "fetchVendorDetails", // Replace with your PHP script URL
            data: {
                'vendor_id': vendorId
            },
            success: function(data) {
                console.log("Success:", data); // Log the response data to the console
                // Update text of the span
                $("#vendor_type").text(data.vendor_type);
                // Update value of the input field
                $("#vendor_type_input").val(data.vendor_type);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>