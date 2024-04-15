<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              
              <div class="col-12 col-md-12 col-lg-12">
       
              <div class="card">
                  <div class="card-header">
                    <h4>User List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>
                              Sr. No
                            </th>
                            <th>Vendor Company Name</th>
                            <th>Contact Person Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Vendor Type</th>
                            <th>Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($vendor_data)){ $i=1;?>
                            <?php foreach($vendor_data as $data){ ?>
                              <tr>
                                <td>
                                 <?=$i; ?>
                                </td>
                                <td><?=$data->vendor_name;?> </td>
                                <td><?=$data->contact_p_name;?></td>
                                <td><?=$data->phone_no;?></td>
                                <td><?=$data->email;?></td>
                                <td><?=$data->address;?></td>

                                <td><?=$data->vendor_type;?></td>

                                <td class="align-middle">
                                  <a href="<?=base_url();?>edit-vendor/<?=$data->id;?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                  <a href="<?=base_url();?>delete/<?=$data->id;?>/tbl_vendor" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                    
                              
                              </tr>
                          <?php $i++;} ?>
                          <?php }else{ ?>
                            <tr>
                                <td colspan="8" class="text-center">
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
    