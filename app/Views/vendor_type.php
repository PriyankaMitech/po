<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
          
                <div class="card">
                  <form id="vendor_type_form" method="post" >
                    <div class="card-header">
                      <h4>Vendor Type</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Vendor Type Name</label>                        
                        <input type="hidden" class="form-control" name="id" value="<?php if(!empty($single)){ echo $single->id;} ?>">

                        <input type="text" class="form-control" name="vendor_type_name" value="<?php if(!empty($single)){ echo $single->vendor_type_name;} ?>">
                       
                      </div>
                    
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
       
              <div class="card">
                  <div class="card-header">
                    <h4>Vendor Type List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th >
                              Sr.No
                            </th>
                            <th>Vendor Type Name</th>
                            <th>Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($vendor_type)){ $i=1;?>
                            <?php foreach($vendor_type as $data){ ?>
                              <tr>
                                <td>
                                 <?=$i; ?>
                                </td>
                                <td><?=$data->vendor_type_name;?></td>
                                <td class="align-middle">
                                  <a href="<?=base_url();?>edit-vendor-type/<?=$data->id;?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                  <a href="<?=base_url();?>delete/<?=$data->id;?>/tbl_vendor_type" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                    
                              
                              </tr>
                          <?php $i++;} ?>
                          <?php }else{ ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                 Data is not available.
                                </td>
                                
                              </tr>
                          <?php } ?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </section>
   
      <?php include('footer.php')?>
    