<?php 
if ($user != null) { ?>
<div class="w3-bar w3-teal">

    <a href="#" class="w3-bar-item w3-button" onclick="document.getElementById('Dashboard-table-modal').style.display='block'">Dashboard</a>
   
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Customers</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">View Customers</a>
      <a href="#" class="w3-bar-item w3-button">Add Customer</a>
    </div>
  </div>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Suppliers</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">View Suppliers</a>
      <a href="#" class="w3-bar-item w3-button">Add Supplier</a>
    </div>
  </div>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Sub Contractors</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">View Sub Contractors</a>
      <a href="#" class="w3-bar-item w3-button">Add Sub Contractor</a>
    </div>
  </div>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Employees</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">View Employees</a>
      <a href="#" class="w3-bar-item w3-button">Add Employee</a>
    </div>
  </div>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Accounting</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">Invoices</a>
      <a href="#" class="w3-bar-item w3-button">Expenses</a>
      <a href="#" class="w3-bar-item w3-button">Payments</a>
      <a href="#addMONEYTransactions" class="w3-bar-item w3-button" onclick="document.getElementById('addMONEYTransactions-modal').style.display='block'">Add Transactions</a>
        
    </div>
  </div>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Settings</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
    <a href="#myACCOUNT" class="w3-bar-item w3-button" onclick="document.getElementById('my-account-table-modal').style.display='block'">Edit my profile</a>
   
      <?php if ($user['role'] <= '4'){ ?>
        <a href="#USERS" class="w3-bar-item w3-button" onclick="document.getElementById('users-table-modal').style.display='block'">Show Users</a>
        <a href="#USERS" class="w3-bar-item w3-button" onclick="document.getElementById('add-user-modal').style.display='block'">Add User</a>
        
        

      <?php } ?>
      <?php if ($user['role'] <= '2'){ ?>
      
        <a href="#DATABASE" class="w3-bar-item w3-button" onclick="document.getElementById('database-table-modal').style.display='block'">Database Managment</a>
        <a href="#SITE-SETTINGS" class="w3-bar-item w3-button" onclick="document.getElementById('site-settings-table-modal').style.display='block'">Site Settings</a>
   
      <?php } ?>
    </div>
  </div>
  
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button"><?php echo $user['email']; ?></button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
    <a href="#My-Account" class="w3-bar-item w3-button" onclick="document.getElementById('my-account-modal').style.display='block'">My Account</a>
   
    <a href="#Time-Clock" class="w3-bar-item w3-button" onclick="document.getElementById('time-clock-modal').style.display='block'">Time Clock</a>
    <a href="./logout.php" class="w3-bar-item w3-button">Logout</a>
    <a href="#" class="w3-bar-item w3-button" onclick="screensaver();">Lock Screen</a>
   
   
    </div>
  </div>
</div>



<?php } ?>