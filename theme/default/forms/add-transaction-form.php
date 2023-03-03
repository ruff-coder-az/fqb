<div id="addMONEYTransactions-modal" class="w3-modal">
<div class="w3-modal-content w3-card w3-round">
<header class="w3-container w3-teal"> 
<span onclick="document.getElementById('addMONEYTransactions-modal').style.display='none'" 
class="w3-button w3-display-topright">&times;</span>
<h2>Add Bank Transaction</h2>
</header>
<div class="w3-container">

<form id="add-transaction-form" class="w3-container w3-card-4">
<div class="w3-section">
<label>Transaction Type</label>
<select class="w3-select w3-border" id="bank-id" name="bank-id" required>
<option value="" disabled selected>Select Account</option>
<option value="1">Cash</option>
<option value="2">Wells Fargo</option>
<option value="3">Chase</option>
</select>
</div>
<div class="w3-section">
<label>Transaction Type</label>
<select class="w3-select w3-border" id="transaction-type" name="transaction-type" required>
<option value="" disabled selected>Select transaction type</option>
<option value="deposit">Deposit</option>
<option value="withdrawal">Withdrawal</option>
<option value="check">Check</option>
<option value="debit">Debit</option>
<option value="a2aTransfer">Transfer</option>
<option value="esent">Sent Zelle</option>
<option value="erecive">Recived Zelle</option>
<option value="echeck">e-Check</option>
<option value="void">Void</option>
</select>
</div>
<div class="w3-section">
<label>Check Transaction ID</label>
<input class="w3-input w3-border" type="text" id="check-transaction-id" name="check-transaction-id">
</div>
<div class="w3-section">
<label>Amount</label>
<input class="w3-input w3-border" type="number" id="amount" name="amount" required>
</div>
<div class="w3-section">
<label>Date</label>
<input class="w3-input w3-border" type="date" id="date" name="date" required>
</div>
<button class="w3-button w3-teal w3-right" type="button" onclick="addTransaction()">Add Transaction</button>
</form>
</div>
</div>
</div>