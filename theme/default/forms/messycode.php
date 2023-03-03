<br><br>
<div id="app_content" class="w3-container">
<div id="database-table-modal" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-round">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('database-table-modal').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Database Tables</h2>
    </header>

    <div class="w3-card w3-padding">
        
        <button class="w3-button w3-round w3-right w3-teal"  onclick="document.getElementById('create-new-table-modal').style.display='block'">Create New Table</button><br>
       <br>

        <div class="w3-padding">
<?php display_tables(); ?>
</div>
</div>
</div></div>
</div>

<div id="create-new-table-modal" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-round">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('create-new-table-modal').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
     <h2>Create New Table</h2>
    </header>
    <form id="create-table-form" class="w3-container w3-padding">
  <label class="w3-text-grey"><b>Table Name</b></label>
  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter table name" name="table-name" required>

  <div id="columns-container">
    <div class="column-container">
      <label class="w3-text-grey"><b>Detail Name</b></label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter detail name" name="column-name[]" required>

      <label class="w3-text-grey"><b>Detail Type</b></label>
      <select class="w3-select w3-border w3-margin-bottom" name="column-type[]">
        <option value="" disabled selected>Select detail type</option>
        <option value="text">Text</option>
        <option value="number">Number</option>
        <option value="date">Date</option>
        <option value="time">Time</option>
        <option value="money">Money</option>
        <option value="url">URL</option>
        <option value="file">File path</option>
      </select><br>


      <label class="w3-text-grey"><b>Who Can View detail</b></label>
      <select class="w3-select w3-border w3-margin-bottom" name="column-viewable[]">
        <option value="" disabled selected>Select who can view detail</option>
        <option value="user">User only</option>
        <option value="admin">Admin only</option>
      </select><br>
      <input class="w3-check" type="checkbox" name="column-required[]">
      <label class="w3-text-grey"><b>Make detail required( detail can not be blank if selected ) </b></label>
     <br>
    </div>
  </div>

  <div class="w3-center">
    <button class="w3-button w3-green w3-margin w3-round" type="button" onclick="addColumn()">Add Detail</button>
    <button class="w3-button w3-blue w3-margin w3-round" type="submit">Create Table</button>
  </div>
</form>


  </div>
</div>

<!-- Add User Modal -->
<div id="add-user-modal" class="w3-modal">
  <div class="w3-modal-content w3-card-4">
    <header class="w3-container w3-teal">
      <span onclick="document.getElementById('add-user-modal').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
      <h2>Add new user</h2>
    </header>
    <div class="w3-container">
    <form id="add-user-form" class="w3-container" method="post" onsubmit="addUser(event, this)">
  
  <div class="w3-section">
    <label for="add-username"><b>Username</b></label>
    <input class="w3-input w3-border w3-round-large" type="text" placeholder="Username" name="add-username" required>
  </div>

  <div class="w3-section">
    <label for="add-password"><b>Password</b></label>
    <input class="w3-input w3-border w3-round-large" type="password" placeholder="Password" name="add-password" required>
  </div>

  <div class="w3-section">
    <label for="add-email"><b>Email</b></label>
    <input class="w3-input w3-border w3-round-large" type="email" placeholder="Email" name="add-email" required>
  </div>

  <div class="w3-section">
    <label for="add-role"><b>Role</b></label>
    <select class="w3-select w3-border w3-round-large" name="add-role" required>
      <option value="" disabled selected>Choose a role</option>
      <option value="1">Admin</option>
      <option value="2">Owner</option>
      <option value="3">Manager</option>
      <option value="4">Supervisor</option>
      <option value="5">Employee</option>
      <option value="6">Sub-Contractor</option>
      <option value="7">Supplier</option>
      <option value="8">Customer</option>
      <option value="9">Demo Account</option>
    </select>
  </div>

  <div class="w3-padding">
    <button type="submit" class="w3-button w3-teal w3-round w3-right">Create new user account</button>
    <br>&nbsp;
  </div>
</form>

    </div>
  </div>
</div>

<div id="create-new-table-modal" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-round">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('create-new-table-modal').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
     <h2>Create New Table</h2>
    </header>

<form method="POST" action="">
  <label for="setting_key">Setting Key:</label>
  <input type="text" id="setting_key" name="setting_key">
  
  <label for="setting_value">Setting Value:</label>
  <input type="text" id="setting_value" name="setting_value">

  <input type="hidden" id="id" name="id" value="{{ id }}">

  <button type="submit">Update Settings</button>
</form>


</div>
</div>