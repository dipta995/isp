<?php 
    include 'inc/header.php';
    $com_id = "";
    if (isset($_GET['read'])) {
        $read = $comp->Makeread($_GET['read']);
        if ($read) {
          echo "<script>window.location='complain.php';</script>";
        }
    }
    if (isset($_GET['com_id'])) {
        $com_id = $_GET['com_id'];
    }   
?>
      <div class="span9" style="padding: 30px; float:left;">
          <div class="content">
              <div class="module message">
                  <div class="text-center">
                  <?php 
                    if(!isset($_GET['com_id'])){ ?>
                    <h3 class="card-header">Complain List</h3>
                  </div>
                  <div class="module-body table">
                      <table class="table table-message">
                          <tbody>
                              <tr class="heading">
                                <td>NO.</td>
                                  <td class="cell-author hidden-phone hidden-tablet">
                                    Customer UserName
                                  </td>
                                  <td class="cell-title">
                                    Complain
                                  </td>
                                  <td></td>
                                  <td class="cell-icon hidden-phone hidden-tablet">
                                    Action
                                  </td>
                                  <td class="cell-time align-right">
                                      Date
                                  </td>
                              </tr>
                                <?php 
                                  $i = 0;
                                  $viewcomp = $comp->ShowComplain();
                                  foreach ($viewcomp as $value) { ?>

                              <tr class="<?php if($value['com_read']==0){echo "unread";}elseif($value['com_read']==1){echo "read";} ?>">
                                <td><?php echo $i+= 1; ?></td>
                                  <td class="cell-author hidden-phone hidden-tablet">
                                      <?php echo $value['customer_username']; ?>
                                  </td>
                                  <td class="cell-title">
                                      <?php echo $value['complain']; ?>
                                  </td>
                                  <td>
                                  <a href="?com_id=<?php echo $value['com_id']; ?>" class="btn btn-primary"  >View </a>
                                  </td>
                                  <?php if ($value['com_read']==0) {?>
                                  <td class="cell-icon hidden-phone hidden-tablet">
                                      <a href="?read=<?php echo $value['com_id']; ?>">Not Solve</a>
                                  </td>
                                  <?php }elseif($value['com_read']==1){ ?>
                                        <td class="cell-icon hidden-phone hidden-tablet">
                                          Solved
                                        </td>
                                  <?php } ?>
                                  <td class="cell-time align-right">
                                      <?php echo $value['com_time']; ?>
                                  </td>
                              </tr>
                          <?php }}else{
                        $viewcomp = $comp->viewComplain($com_id);
                        $data = mysqli_fetch_array($viewcomp);?>
                
                <div style="min-width: 300px;" class="card">
                <div class="card-head">
                  <h3>Complain</h3>
                  <hr>
                </div>
  <div class="card-body">
  
                        <p><?php echo ( $data['complain']);?></p>
                        <hr>
                        <hr>
                        <h4<sapan style="color:green;">Complained By :</sapan> <?php echo $data['customer_username']."(".$data['customer_phone'].")"; ?></h4><br>
                        <a style="float: right;" class="btn btn-primary" href="complain.php"><< Back</a>
                        
                        
                 
                    </div>
                </div>
                              
                                  <?php }  ?> 
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    
 
<?php include 'inc/footer.php'; ?>