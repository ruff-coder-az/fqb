<script>
function addColumn() {
  var columnsContainer = document.getElementById("columns-container");
  var newColumn = document.createElement("div");
  newColumn.className = "column-container";
  newColumn.innerHTML = `
    <label class="w3-text-grey"><b>Column Name</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter column name" name="column-name[]" required>

    <label class="w3-text-grey"><b>Column Type</b></label>
    <select class="w3-select w3-border w3-margin-bottom" name="column-type[]">
      <option value="" disabled selected>Select column type</option>
      <option value="text">Text</option>
      <option value="number">Number</option>
      <option value="date">Date</option>
      <option value="time">Time</option>
      <option value="money">Money</option>
      <option value="url">URL</option>
      <option value="file">File path</option>
    </select><br>
    <label class="w3-text-grey"><b>Who Can View Field</b></label>
    <select class="w3-select w3-border w3-margin-bottom" name="column-viewable[]">
      <option value="" disabled selected>Select who can view field</option>
      <option value="everyone">Everyone</option>
      <option value="admin">Admin only</option>
    </select><br>
    <label class="w3-text-grey"><b>Make Field Required</b></label>
    <input class="w3-check" type="checkbox" name="column-required[]">
  `;
  columnsContainer.appendChild(newColumn);
}


  document.getElementById("create-table-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var form = event.target;
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };
    xhr.send(formData);
  });
</script>


<script>
        function toggleView(id) {
            var x = document.getElementById(id);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
<?php 
// Admin Owner Scripts
if ($user['role'] <= '2') { 
?>
<script>
    // Update App Settings
function updateSetting(event, form) {
    event.preventDefault(); // prevent form from submitting normally
    var formData = new FormData(form); // create form data object
    var xhr = new XMLHttpRequest(); // create AJAX request
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText == 'site_name updated successfully') {
                var formArray = Array.from(formData.entries()); // convert form data to array
                var siteName = formArray[3][1]; // get value of site_name input field
                document.title = siteName; // update page title
            }
            alert(xhr.responseText);
        }
    };
    xhr.open('POST', 'functions/update_setting.php', true); // set up request
    xhr.send(formData); // send request
}


    
</script>
<?php 
}
// Supervisor and Higher Scripts

if ($user['role'] <= '4') { 
?>
<script>
    // Adding New Users Call script
    function addUser(event, form) {
        event.preventDefault();

        // Create a FormData object to store the form data
        var formData = new FormData(form);

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set the callback function for when the response is received
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Success
                    document.getElementById('add-user-modal').style.display='none';
                    document.getElementById('add-user-form').reset();
                    alert(xhr.responseText);
                } else {
                    // Error
                    alert(xhr.statusText);
                }
                }
            };

        // Open the request with POST method and add the URL to the PHP script
        xhr.open("POST", "functions/add_user.php");

        // Set the content type header to application/x-www-form-urlencoded
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Send the form data to the PHP script
        xhr.send(new URLSearchParams(formData));
    }
</script>

<?php } ?>
<script>
  let fullscreenTimeout;
  let canvas, ctx;
  let messages, currentMessageIndex;
  const messageDisplayDuration = 5000; // 5 seconds
  const textColor = '#27AEC3'; // Text Color

  function initMessages() {
    messages = [
    "For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life. - John 3:16",      
    "I can do all things through Christ who strengthens me. - Philippians 4:13",      
    "Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight. - Proverbs 3:5-6",
    "The Lord is my strength and my shield; my heart trusts in him, and he helps me. - Psalm 28:7",      
    "But those who hope in the Lord will renew their strength. They will soar on wings like eagles; they will run and not grow weary, they will walk and not be faint. - Isaiah 40:31",      
    "Be strong and courageous. Do not be afraid or terrified because of them, for the Lord your God goes with you; he will never leave you nor forsake you. - Deuteronomy 31:6",      
    "The Lord is my light and my salvation—whom shall I fear? The Lord is the stronghold of my life—of whom shall I be afraid? - Psalm 27:1",      
    "The thief comes only to steal and kill and destroy; I have come that they may have life, and have it to the full. - John 10:10",      
    "And we know that in all things God works for the good of those who love him, who have been called according to his purpose. - Romans 8:28",      
    "Be kind and compassionate to one another, forgiving each other, just as in Christ God forgave you. - Ephesians 4:32"    
    ];
    currentMessageIndex = 0;
  }

  function initCanvas() {
    canvas = document.getElementById('matrix');
    ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  function drawMessage() {
    const message = messages[currentMessageIndex];
    ctx.fillStyle = textColor;
    ctx.font = '15pt Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(message, canvas.width / 2, canvas.height / 2);
    currentMessageIndex = (currentMessageIndex + 1) % messages.length;
  }

  function draw() {
    ctx.fillStyle = '#000';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    drawMessage();
  }

  function setFullscreenTimeout() {
    fullscreenTimeout = setTimeout(() => {
      document.documentElement.requestFullscreen();
    }, messageDisplayDuration);
  }

  function resetFullscreenTimeout() {
    clearTimeout(fullscreenTimeout);
    document.exitFullscreen();
    setFullscreenTimeout();
  }

  function initPage() {
    initMessages();
    initCanvas();
  }

  function screensaver() {
    initPage();
    draw();
    setFullscreenTimeout();
    document.addEventListener('keypress', resetFullscreenTimeout);
  }

</script>
<?php
function gets_functions($file) { 
$file = file_get_contents($file);
$matches = array();
preg_match_all('/function\s+(\w+)/', $file, $matches);
$functions = $matches[1];
return $functions;
}


function create_app_forms_table() {
    // Establish database connection
    $mysqli = connect_to_db();
    
    // Check if connection was successful
    if ($mysqli->connect_errno) {
        // Connection error
        error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
    
    // Create the SQL statement
    $sql = "CREATE TABLE app_forms (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                details TEXT,
                access_lvl INT(11) NOT NULL,
                created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                added_by INT(11) NOT NULL
            )";
    
    // Execute the SQL statement
    if (!$mysqli->query($sql)) {
        // SQL query error
        error_log("Failed to create app_forms table: " . $mysqli->error);
        $mysqli->close();
        return false;
    }
    
    // Close the database connection
    $mysqli->close();
    
    // Return success
    return true;
}
//create_app_forms_table();
?>