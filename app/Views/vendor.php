<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>Add Vendor</h4>
                      </div>
                      <div class="card-body">
                        <form method="POST" id="vendor_form">
                          <div class="row">
                            <div class="form-group col-3">
                              <label for="vendor_name">Vendor Company Name</label>
                              <input type="hidden" class="form-control" name="id" value="<?php if(!empty($single)){echo $single->id;}?>">

                              <input id="vendor_name" type="text" class="form-control" name="vendor_name" value="<?php if(!empty($single)){echo $single->vendor_name;}?>" autofocus >
                            </div>
                            <div class="form-group col-3">
                              <label for="contact_p_name">Contact Person Name</label>
                              <input id="contact_p_name" type="text" class="form-control" name="contact_p_name" value="<?php if(!empty($single)){echo $single->contact_p_name;}?>">
                            </div>
                            <div class="form-group col-3">
                              <label for="phone_no">Phone No.</label>
                              <input id="phone_no" type="text" class="form-control" name="phone_no" value="<?php if(!empty($single)){echo $single->phone_no;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="phone_no_two">Phone No 2.</label>
                              <input id="phone_no_two" type="text" class="form-control" name="phone_no_two" value="<?php if(!empty($single)){echo $single->phone_no_two;}?>">
                            </div>
                            <div class="form-group col-3">
                              <label for="email">Email</label>
                              <input id="email" type="email" class="form-control" name="email" value="<?php if(!empty($single)){echo $single->email;}?>">
                            </div>
                           
                            <div class="form-group col-3">
                              <label for="country">Country</label>
                              
                                <select class="form-control choosen" id="country_id" name="country_id">
                                    <option value="">Please select country</option>
                                    <?php if(!empty($country)){foreach($country as $country_result){?>
                                    <option value="<?=$country_result->id?>"
                                        <?php if(!empty($single) && $single->country_id == $country_result->id){?>selected="selected"
                                        <?php }?>><?=$country_result->name?></option>
                                    <?php } } ?>
                                </select>
                            </div>

                            <div class="form-group col-3">
                              <label for="state">State</label>
                             

                              <select class="form-control choosen" id="state_id" name="state_id">
                                  <option value="">Please select state</option>
                                  <?php if((!empty($single)) != "") {?>
                                  <?php 
                                      if(!empty($states)){
                                        
                                      foreach($states as $state_result){
                                        ?>

                                  <option value="<?=$state_result->id?>"
                                      <?php if(!empty($single) && $single->state_id == $state_result->id){?>selected="selected"
                                      <?php }?>><?=$state_result->name?></option>
                                  <?php } } ?>
                                  <?php }?>
                              </select>
                            </div>

                            <div class="form-group col-3">
                              <label for="city">City</label>
                             
                                <select class="form-control choosen" id="city_id" name="city_id">
                                  <option value="">Please select city</option>
                                  <?php if((!empty($single)) != "") {?>
                                  <?php if(!empty($citys)){foreach($citys as $city_result){?>
                                  <option value="<?=$city_result->id?>"
                                      <?php if(!empty($single) && $single->city_id == $city_result->id){?>selected="selected"
                                      <?php }?>><?=$city_result->name?></option>
                                  <?php } } ?>
                                  <?php }?>
                                </select>
                            </div>

                            <div class="form-group col-3">
                              <label for="address">Address</label>
                              <textarea class="form-control" name="address" ><?php if(!empty($single)){echo $single->address;}?></textarea>                            
                            </div>


                            <div class="form-group col-3">
                              <label for="vendor_type">Vendor Type</label>
                             
                              <select class="form-control valid" name="vendor_type" id="vendor_type" aria-invalid="false">
                                        <?php foreach ($vendor_type as $vendor_type_item): ?>
                                        <option value="<?php echo $vendor_type_item->id; ?>"
                                            <?php if (!empty($single) && $single->vendor_type_id == $vendor_type_item->id) echo "selected"; ?>>
                                            <?php echo $vendor_type_item->vendor_type_name; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="form-group col-3">
                              <label for="gst_no">GST No</label>
                              <input id="gst_no" type="text" class="form-control" name="gst_no" value="<?php if(!empty($single)){echo $single->gst_no;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="pan_no">PAN No</label>
                              <input id="pan_no" type="text" class="form-control" name="pan_no" value="<?php if(!empty($single)){echo $single->pan_no;}?>">
                            </div>

                            <div class="card-header col-12">
                              <h4>Bank Account Details</h4>
                            </div>

                            <div class="form-group col-3">
                              <label for="bank_name">Bank Name</label>
                              <input id="bank_name" type="text" class="form-control" name="bank_name" value="<?php if(!empty($single)){echo $single->bank_name;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="branch_name">Branch Name</label>
                              <input id="branch_name" type="text" class="form-control" name="branch_name" value="<?php if(!empty($single)){echo $single->branch_name;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="account_name">Account Name</label>
                              <input id="account_name" type="text" class="form-control" name="account_name" value="<?php if(!empty($single)){echo $single->account_name;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="account_number">Account Number</label>
                              <input id="account_number" type="text" class="form-control" name="account_number" value="<?php if(!empty($single)){echo $single->account_number;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="ifsc_code">IFSC Code</label>
                              <input id="ifsc_code" type="text" class="form-control" name="ifsc_code" value="<?php if(!empty($single)){echo $single->ifsc_code;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="upi_id">UPI ID</label>
                              <input id="upi_id" type="text" class="form-control" name="upi_id" value="<?php if(!empty($single)){echo $single->upi_id;}?>">
                            </div>

                            <div class="form-group col-3">
                              <label for="mobile_nolwba">Mobile Number. (Link With Bank Account)</label>
                              <input id="mobile_nolwba" type="text" class="form-control" name="mobile_nolwba" value="<?php if(!empty($single)){echo $single->mobile_nolwba;}?>">
                            </div>


                           
                             
                          </div>
                          <div class="card-footer text-right">
                              <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                          </div>
                        </form>
                      </div> 
                      
                  </div>
              </div>
            </div>
          </div>
        </section>
   
      <?php include('footer.php')?>

      <script>


    $("#country_id").change(function() {

        $.ajax({
            type: "post",
            url: "<?=base_url();?>get_state_name_location",
            data: {
                'country_id': $("#country_id").val()
            },
            success: function(data) {
                console.log(data);
                $('#state_id').empty();
                $('#state_id').append('<option value="">Choose ...</option>');
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#state_id').append('<option value="' + d.id + '">' + d.name +
                        '</option>');
                });
                $('#state_id').trigger("chosen:updated");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
    $("#state_id").change(function() {

        $.ajax({
            type: "post",
            url: "<?=base_url();?>get_city_name_location",
            data: {
                'state_id': $("#state_id").val()
            },
            success: function(data) {
                console.log(data);
                $('#city_id').empty();
                $('#city_id').append('<option value="">Choose ...</option>');
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#city_id').append('<option value="' + d.id + '">' + d.name +
                        '</option>');
                });
                $('#city_id').trigger("chosen:updated");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    })
    </script>
    