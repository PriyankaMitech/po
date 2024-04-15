<?php include('header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
          
                <div class="card">
                  <form id="menu_form" method="post" >
                    <div class="card-header">
                      <h4>Add Menu</h4>
                    </div>
                    <div class="row card-body">
                      <div class="form-group col-6">
                        <label>Menu Name</label>                        
                        <input type="hidden" class="form-control" name="id" value="<?php if(!empty($single)){ echo $single->id;} ?>">
                        <input type="text" class="form-control" name="menu_name" value="<?php if(!empty($single)){ echo $single->menu_name;} ?>">
                       
                      </div>

                      <div class="form-group col-6">
                        <label>URL</label>                        
                        <input type="text" class="form-control" name="url" value="<?php if(!empty($single)){ echo $single->url;} ?>">
                       
                      </div>
                    
                    </div>
                    <div class="card-footer text-right">
                      <!-- <button class="btn btn-primary" type="submit" >Submit</button> -->
                      <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-12">
       
              <div class="card">
                  <div class="card-header">
                    <h4>Menu List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th >
                              Sr.No
                            </th>
                            <th>Menu Name </th>
                            <th>URL </th>

                            <th>Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($menu_name)){ $i=1;?>
                            <?php foreach($menu_name as $data){ ?>
                              <tr>
                                <td>
                                 <?=$i; ?>
                                </td>
                                <td><?=$data->menu_name;?></td>
                                <td><?=$data->url;?></td>

                                <td class="align-middle">
                                  <a href="<?=base_url();?>edit-menu/<?=$data->id;?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                  <a href="<?=base_url();?>delete/<?=$data->id;?>/tbl_menu" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
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
    