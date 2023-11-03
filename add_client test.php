<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
    $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_client'])){

   $req_fields = array('full-name','username','password','level' );
   validate_fields($req_fields);

   $fields2 = array('nrc','phone','address','bank');
   validate_fields($fields2);

   if(empty($errors)){
    //Adding to users table
       $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $name2 = mysqli_real_escape_string($conn, $_POST['full-name']);
       $nrc = mysqli_real_escape_string($conn, $_POST['nrc']);
       $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
       $address   = mysqli_real_escape_string($conn, $_POST['address']);
       $bank   = mysqli_real_escape_string($conn, $_POST['bank']);;
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";

        $sql = "INSERT INTO clients (";
        $sql .="name,nrc,phone,address,bank";
        $sql .=") VALUES (";
        $sql .=" '{$name2}', '{$nrc}', '{$phone}', '{$address}','{$address}'";
        $sql .=")";
        
      
        // Adding to clients
        $sql = " INSERT INTO clients (name,nrc,phone,address,bank) VALUES ('{$name2}','{$nrc}','{$phone},'{$address},'{$bank}')";

        if(mysqli_query ($conn, $sql)){ 

        }else{
          echo mysqli_error($conn);
        }

        if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been creted! ");
          redirect('users.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_client.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_client.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Client</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_client.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="full-name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name ="password"  placeholder="Password">
            </div>
            <div class="form-group">
                <label for="nrc">NRC</label>
                <input type="text" class="form-control" name ="nrc"  placeholder="N.R.C">
            </div>
            <div class="form-group">
                <label for="phone">Phone #</label>
                <input type="text" class="form-control" name ="phone"  placeholder="Phone Number">
            </div><div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name ="address"  placeholder="Physical Address">
            </div>
            <div class="form-group">
                <label for="bank">Acc Details</label>
                <input type="password" class="form-control" name ="bank"  placeholder="Enter card number">
                <input type="text" class="form-control" name =""  placeholder="Enter CVV">
                <input type="text" class="form-control" name =""  placeholder="Expiry Date">
            </div>
            <div class="form-group">
              <label for="level">User Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_client" class="btn btn-primary">Add User</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
