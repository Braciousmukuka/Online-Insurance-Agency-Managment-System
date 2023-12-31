<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_client'])){

   $req_fields = array('full-name','username','password','level','reg','phone','address','bank');
   validate_fields($req_fields);

   if(empty($errors)){
       $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
       $reg = remove_junk($db->escape($_POST['reg']));
       $phone =  remove_junk($db->escape($_POST['phone']));
       $address =  remove_junk($db->escape($_POST['address']));
       $bank = remove_junk($db->escape($_POST['bank']));

       //SQL statment1.(Users Entry)
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";

        //SQL statment2.(Clients Entry)
        $query2 = "INSERT INTO clients (";
        $query2 .="name,nrc,phone,address,bank";
        $query2 .=") VALUES (";
        $query2 .=" '{$username}', '{$reg}', '{$phone}', '{$address}','{$bank}'";
        $query2 .=")";

        if($db->query($query)){

          //Execute Second query
          if($db->query($query2)){}

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
          <span>Add New User</span>
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
                <label for="reg">N.R.C</label>
                <input type="text" class="form-control" name ="reg"  placeholder="National Registration #">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name ="phone"  placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name ="address"  placeholder="Physical Address">
            </div>
            <div class="form-group">
                <label for="bank">Acc Details</label>
                <input type="password" class="form-control" name ="bank"  placeholder="Enter card number">
                <input  class="form-control" placeholder="Enter C.V.V">
                <input  class="form-control" placeholder="Expiry Date">
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
              <button type="submit" name="add_client" class="btn btn-primary">Add Client</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
