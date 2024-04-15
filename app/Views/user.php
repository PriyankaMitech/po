<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>Add User</h4>
                      </div>
                      <div class="card-body">
                        <form method="POST" id="user_form">
                          <div class="row">
                            <div class="form-group col-3">
                              <label for="name">Name</label>
                              <input type="hidden" class="form-control" name="id" value="<?php if(!empty($single)){echo $single->id;}?>">

                              <input id="name" type="text" class="form-control" name="name" value="<?php if(!empty($single)){echo $single->name;}?>" autofocus >
                            </div>
                          
                            <div class="form-group col-3">
                              <label for="mobile_number">Mobile Number</label>
                              <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="<?php if(!empty($single)){echo $single->mobile_number;}?>">
                            </div>
                            <div class="form-group col-3">
                              <label for="email">Email</label>
                              <input id="email" type="email" class="form-control" name="email" value="<?php if(!empty($single)){echo $single->email;}?>">
                            </div>
                            <div class="form-group col-3">
                              <label for="designation">Designation</label>
                              <input id="designation" type="text" class="form-control" name="designation" value="<?php if(!empty($single)){echo $single->designation;}?>">
                            </div>
                            <div class="form-group col-3">
                              <label for="password" class="d-block">Password</label>
                              <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                name="password" value="<?php if(!empty($single)){echo $single->password;}?>">
                              <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                              </div>
                            </div>
                            <div class="form-group col-3">
                              <label for="passwordconfirm" class="d-block">Confirm Password</label>
                              <input id="passwordconfirm" type="password" class="form-control" name="passwordconfirm" value="<?php if(!empty($single)){echo $single->passwordconfirm;}?>">
                            </div>
                           
                            <div class="form-group col-12">
                              <label >Access Level</label>
                                <br>
                                <label id="access_level[]-error" class="error" for="access_level[]"></label>
                              
                                <div class="row">
                                    <?php if(!empty($menu)): ?>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="selectAllCheckbox" name="selectAllCheckbox" value="All" <?php if(!empty($single) && $single->selectAllCheckbox == 'All'){ echo 'checked'; }?>>
                                                <label class="custom-control-label" for="selectAllCheckbox">Select All</label>
                                            </div>
                                        </div>
                                        <?php foreach($menu as $data): ?>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input access-level-checkbox" name="access_level[]" id="customCheck<?=$data->id; ?>" value="<?= $data->url; ?>" <?php 
                                                                if (isset($single) && is_object($single) && property_exists($single, 'access_level') && in_array($data->url, explode(',', $single->access_level))) {
                                                                    echo 'checked';
                                                                } 
                                                                ?>>
                                                    <label class="custom-control-label" for="customCheck<?=$data->id; ?>"><?=$data->menu_name; ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?> 
                                    <?php endif; ?> 
                                </div>
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
    $(document).ready(function(){
        // Event listener for individual checkboxes
        $('.access-level-checkbox').change(function(){
            if($('.access-level-checkbox:checked').length === $('.access-level-checkbox').length) {
              if(confirm("You are giving all entry system access to this user. Proceed?")) {
                    $('.access-level-checkbox').prop('checked', true);
                    $('#selectAllCheckbox').prop('checked', true);

                    
                } else {
                    $(this).prop('checked', false);
                }
            } else {
                $('#selectAllCheckbox').prop('checked', false);
            }
        });

        // Event listener for the "Select All" checkbox
        $('#selectAllCheckbox').change(function(){
            if($(this).is(':checked')) {
                // Show confirmation popup
                if(confirm("You are giving all entry system access to this user. Proceed?")) {
                    $('.access-level-checkbox').prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            } else {
                $('.access-level-checkbox').prop('checked', false);
            }
        });

        // Event listener for the Refresh button
       
    });
</script>
