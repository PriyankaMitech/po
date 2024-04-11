<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
          
                <div class="card">
                  <form id="tax_form" method="post" >
                    <div class="card-header">
                      <h4>Tax</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Tax Name</label>                        
                        <input type="hidden" class="form-control" name="id" value="<?php if(!empty($single)){ echo $single->id;} ?>">

                        <input type="text" class="form-control" name="tax_name" value="<?php if(!empty($single)){ echo $single->tax_name;} ?>">
                       
                      </div>
                    
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
       
              <div class="card">
                  <div class="card-header">
                    <h4>Tax List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th >
                              Sr.No
                            </th>
                            <th>Tax Name</th>
                            <th>Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($tax)){ $i=1;?>
                            <?php foreach($tax as $data){ ?>
                              <tr>
                                <td>
                                 <?=$i; ?>
                                </td>
                                <td><?=$data->tax_name;?></td>
                                <td class="align-middle">
                                  <a href="<?=base_url();?>edit_tax/<?=$data->id;?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                  <a href="<?=base_url();?>delete/<?=$data->id;?>/tbl_tax" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
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
    