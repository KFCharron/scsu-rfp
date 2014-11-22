<?php
  /* This script is executed when the user hits "submit" and validates 
     the input. It populates the error variables if validation fails and 
     leaves them blank otherwise.
  */
	// initialize error variables
	$errinputFirst = "";
	$errinputLast = "";
	$errinputEmail    = "";
	$errinputPhone = "";
	$errinputAddress = "";
	$errinputCity = "";
	$errinputState = "";
	$errinputZipCode = "";
    $errinputTotalClassrooms = "";
    $errinputTotalSeats = "";
    $errinputClassHeight = "";
    $errinputClassWidth = "";
    $errinputClassLength = "";
    $errinputClassroomStyle = "";
    $errinputInstructPodium = "";
    $errinputProjectionSystem = "";
    $errinputBudget = "";
    $errinputCompDate = "";
    $errinputSummary = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// First name validation
		if(preg_match("/^(?=[^ .-])[a-zA-Z -.]+(?<=[^ ])$/", $_POST["inputFirst"]) === 0)
			$errinputFirst = "* must enter only letters.";
		// Last name validation
		if(preg_match("/^(?=[^ .-])[a-zA-Z -.]+(?<=[^ ])$/", $_POST["inputLast"]) === 0)
			$errinputLast = "* must contain only letters.";
        // Email mask
        if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST["inputEmail"]) === 0)
          $errinputEmail = '* enter a valid email address.';
        // Phone mask 800-998-7087
        if(preg_match("/^\d{3}-\d{3}-\d{4}$/", $_POST["inputPhone"]) === 0)
          $errinputPhone = "* enter like xxx-yyy-zzzz";
        // Address must be word characters only
        if(preg_match("/^[a-zA-Z0-9 _.,\"]+$/", $_POST["inputAddress"]) === 0)
          $errinputAddress = "* must enter only letters and numbers.";
        // City must be letters, dash and spaces only
        if(preg_match("/^(?=[^ .-])[a-zA-Z -.]+(?<=[^ ])$/", $_POST["inputCity"]) === 0)
          $errinputCity = "* can contain letters and spaces only.";
        // State validation
        if(strlen($_POST["inputState"])>3 || strlen($_POST["inputState"])<=1)
          $errinputState = "* Please select a valid state.";
        // Zip must be 5 digits long
        if(preg_match("/^\d{5}$/", $_POST["inputZipCode"]) === 0)
          $errinputZipCode = "* must enter 5 digits.";
        // validation for total classrooms
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputTotalClassrooms"]) === 0)
          $errinputTotalClassrooms = "* enter a valid number.";
        // validation for seats
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputTotalSeats"]) === 0)
          $errinputTotalSeats = "* enter a valid number.";
        // validation for class height
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputClassHeight"]) === 0)
          $errinputClassHeight = "* enter a valid number.";
        // validation for class width
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputClassWidth"]) === 0)
          $errinputClassWidth = "* enter a valid number.";
        // validation for class length
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputClassLength"]) === 0)
          $errinputClassLength = "* enter a valid number.";
        // validation for class style
        if(($_POST["inputClassroomStyle"] === "lectureHall" || $_POST["inputClassroomStyle"] === "traditional" || $_POST["inputClassroomStyle"] === "handsOn") === 0)
              $errinputClassroomStyle = "*You must make a selection.";
        // validation for class podium
        if(($_POST["inputInstructPodium"] === "mac" || $_POST["inputInstructPodium"] === "pc") === 0){
          $errinputInstructPodium = "*Please select at least one";          
            }
        // validation for projection system
        if(($_POST["inputProjectionSystem"] === "ceilingMounted" || $_POST["inputProjectionSystem"] === "flatPanel" || $_POST["inputProjectionSystem"] === "chalkBoard" 
              || $_POST["inputProjectionSystem"] === "dryErase") === 0){
          $errCompAdvertising = "*Please select at least one projection system";          
            }
        // validation for max budget
        if(preg_match("/^[0-9 _.,\"]+$/", $_POST["inputBudget"]) === 0)
          $errinputBudget = "* enter a valid budget.";
        // validation for completion date
        if(preg_match("/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/", $_POST["inputCompDate"]) === 0)
          $errinputCompDate = "* enter like YYYY-MM-DD";
        // validation text area
        if(preg_match("/^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%\s]+$/", $_POST["inputSummary"]) === 0)
          $errinputSummary = "* only letter, numbers, periods and commas are allowed.";
    }
?>

<?PHP 
  //This script executes only when all the error variables are empty, a.k.a validation is OK.  

	if($errinputFirst=="" and $errinputLast=="" and $errinputSalon=="" and $errinputAddress=="" and $errinputCity=="" and $errinputState=="" 
		and $errinputZipCode=="" and $errinputPhone=="" and $errinputEmail== "" and $errinputTotalClassrooms=="" and $errinputTotalSeats==""
        and $errinputClassHeight=="" and $errinputClassWidth=="" and $errinputClassLength=="" and $errinputClassroomStyle=="" and $errinputInstructPodium==""
        and $errinputProjectionSystem=="" and $errinputBudget=="" and $errinputCompDate=="" and $errinputSummary==""
        and $_SERVER["REQUEST_METHOD"] == "POST"){

		// variables with validated data
        $inputFirst = $_POST["inputFirst"];
        $inputLast = $_POST["inputLast"];
    	$inputEmail = $_POST["inputEmail"];
    	$inputPhone = $_POST["inputPhone"];
        $inputAddress = $_POST["inputAddress"];
        $inputCity = $_POST["inputCity"];
        $inputState = $_POST["inputState"];
        $inputZipCode = $_POST["inputZipCode"];
        $inputTotalClassrooms = $_POST["inputTotalClassrooms"];
        $inputTotalSeats = $_POST["inputTotalSeats"];
    	$inputClassHeight = $_POST["inputClassHeight"];
    	$inputClassWidth = $_POST["inputClassWidth"];
    	$inputClassLength = $_POST["inputClassLength"];
    	$inputClassroomStyle = $_POST["inputClassroomStyle"];
        $inputInstructPodium = $_POST["inputInstructPodium"];
        $inputProjectionSystem = $_POST["inputProjectionSystem"];
        $inputBudget = $_POST["inputBudget"];
        $inputCompDate = $_POST["inputCompDate"];
        $inputSummary = $_POST["inputSummary"];

        // uncomment to see what the variables look like
        // just keep in mind this just puts everything in one big ass string
        // there are no delimeters.
        /*
        echo $inputFirst; 
        echo $inputLast;
        echo $inputEmail; 
        echo $inputPhone; 
        echo $inputAddress; 
        echo $inputCity;
        echo $inputState; 
        echo $inputZipCode; 
        echo $inputTotalClassrooms;
        echo $inputTotalSeats;
        echo $inputClassHeight;
        echo $inputClassWidth;
        echo $inputClassLength;
        echo $inputClassroomStyle;
        echo $inputInstructPodium;
        echo $inputProjectionSystem;
        echo $inputBudget;
        echo $inputCompDate;
        echo $inputSummary;
        */


        // TODO: figure out if  we need to re-direct to another page after the RFP has 
        // been submitted.
    	// redirect to second page or completion page here
        //header('Location: thankyou.php');
        exit();
	}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Request For Proposal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<!-- Optional theme -->
<!-- I would like to add a different theme that goes with the website, so might change -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>

<body>
	<div class="container-fluid">
    <!-- I just needed to get some space between the top of the page and the first element -->
    <div class="row"><h3></h3></div>
		<form id="myform" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="form-group">
            <label for="inputFirst" class="control-label col-xs-2">First Name</label>
            <div class="col-xs-4">
                <input class="form-control" name="inputFirst" id="inputFirst" placeholder="First Name" type="text" value="<?php echo $_POST["inputFirst"]; ?>" />
                <span class="help-inline"><?php echo $errinputFirst;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputLast" class="control-label col-xs-2">Last Name</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="inputLast" id="inputLast" placeholder="Last Name" value="<?php echo $_POST["inputLast"]; ?>">
                <span class="help-inline"><?php echo $errinputLast;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="<?php echo $_POST["inputEmail"]; ?>" />
                <span class="help-inline"><?php echo $errinputEmail;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPhone" class="control-label col-xs-2">Phone</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Phone" value="<?php echo $_POST["inputPhone"]; ?>">
                <span class="help-inline"><?php echo $errinputPhone;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress" class="control-label col-xs-2">Address</label>
            <div class="col-xs-4">
                <input class="form-control" name="inputAddress" id="inputAddress" placeholder="Address" type="text" value="<?php echo $_POST["inputAddress"]; ?>" >
                <span class="help-inline"><?php echo $errinputAddress;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCity" class="control-label col-xs-2">City</label>
            <div class="col-xs-4">
                <input class="form-control" name="inputCity" id="inputCity" placeholder="City" type="text" value="<?php echo $_POST["inputCity"]; ?>">
                <span class="help-inline"><?php echo $errinputCity;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputState" class="control-label col-xs-2">State</label>
            <div class="col-xs-4">
                <select class="form-control" name="inputState" id="inputState" value="<?php echo $_POST["inputState"]; ?>">
                <option value="none" selected>[Pick a State]</option> 
                <option value='AL'  <?php if(($_POST["inputState"])=="AL"){echo 'selected="selected"';}else{}; ?>>Alabama</option>
                <option value='AK'  <?php if(($_POST["inputState"])=="AK"){echo 'selected="selected"';}else{}; ?>>Alaska</option>
                <option value='AZ'  <?php if(($_POST["inputState"])=="AZ"){echo 'selected="selected"';}else{}; ?>>Arizona</option>
                <option value='AR'  <?php if(($_POST["inputState"])=="AR"){echo 'selected="selected"';}else{}; ?>>Arkansas</option>
                <option value='CA'  <?php if(($_POST["inputState"])=="CA"){echo 'selected="selected"';}else{}; ?>>California</option>
                <option value='CN'  <?php if(($_POST["inputState"])=="CN"){echo 'selected="selected"';}else{}; ?>>Canada</option>
                <option value='CO'  <?php if(($_POST["inputState"])=="CO"){echo 'selected="selected"';}else{}; ?>>Colorado</option>
                <option value='CT'  <?php if(($_POST["inputState"])=="CT"){echo 'selected="selected"';}else{}; ?>>Connecticut</option>
                <option value='DE'  <?php if(($_POST["inputState"])=="DE"){echo 'selected="selected"';}else{}; ?>>Delaware</option>
                <option value='DC'  <?php if(($_POST["inputState"])=="DC"){echo 'selected="selected"';}else{}; ?>>District of Columbia</option>
                <option value='FL'  <?php if(($_POST["inputState"])=="FL"){echo 'selected="selected"';}else{}; ?>>Florida</option>
                <option value='GA'  <?php if(($_POST["inputState"])=="GA"){echo 'selected="selected"';}else{}; ?>>Georgia</option>
                <option value='HI'  <?php if(($_POST["inputState"])=="HI"){echo 'selected="selected"';}else{}; ?>>Hawaii</option>
                <option value='ID'  <?php if(($_POST["inputState"])=="ID"){echo 'selected="selected"';}else{}; ?>>Idaho</option>
                <option value='IL'  <?php if(($_POST["inputState"])=="IL"){echo 'selected="selected"';}else{}; ?>>Illinois</option>
                <option value='IN'  <?php if(($_POST["inputState"])=="IN"){echo 'selected="selected"';}else{}; ?>>Indiana</option>
                <option value='IA'  <?php if(($_POST["inputState"])=="IA"){echo 'selected="selected"';}else{}; ?>>Iowa</option>
                <option value='KS'  <?php if(($_POST["inputState"])=="KS"){echo 'selected="selected"';}else{}; ?>>Kansas</option>
                <option value='KY'  <?php if(($_POST["inputState"])=="KY"){echo 'selected="selected"';}else{}; ?>>Kentucky</option>
                <option value='LA'  <?php if(($_POST["inputState"])=="LA"){echo 'selected="selected"';}else{}; ?>>Louisiana</option>
                <option value='ME'  <?php if(($_POST["inputState"])=="ME"){echo 'selected="selected"';}else{}; ?>>Maine</option>
                <option value='MD'  <?php if(($_POST["inputState"])=="MD"){echo 'selected="selected"';}else{}; ?>>Maryland</option>
                <option value='MA'  <?php if(($_POST["inputState"])=="MA"){echo 'selected="selected"';}else{}; ?>>Massachusetts</option>
                <option value='MI'  <?php if(($_POST["inputState"])=="MI"){echo 'selected="selected"';}else{}; ?>>Michigan</option>
                <option value='MN'  <?php if(($_POST["inputState"])=="MN"){echo 'selected="selected"';}else{}; ?>>Minnesota</option>
                <option value='MS'  <?php if(($_POST["inputState"])=="MS"){echo 'selected="selected"';}else{}; ?>>Mississippi</option>
                <option value='MO'  <?php if(($_POST["inputState"])=="MO"){echo 'selected="selected"';}else{}; ?>>Missouri</option>
                <option value='MT'  <?php if(($_POST["inputState"])=="MT"){echo 'selected="selected"';}else{}; ?>>Montana</option>
                <option value='NE'  <?php if(($_POST["inputState"])=="NE"){echo 'selected="selected"';}else{}; ?>>Nebraska</option>
                <option value='NV'  <?php if(($_POST["inputState"])=="NV"){echo 'selected="selected"';}else{}; ?>>Nevada</option>
                <option value='NH'  <?php if(($_POST["inputState"])=="NH"){echo 'selected="selected"';}else{}; ?>>New Hampshire</option>
                <option value='NJ'  <?php if(($_POST["inputState"])=="NJ"){echo 'selected="selected"';}else{}; ?>>New Jersey</option>
                <option value='NM'  <?php if(($_POST["inputState"])=="NM"){echo 'selected="selected"';}else{}; ?>>New Mexico</option>
                <option value='NY'  <?php if(($_POST["inputState"])=="NY"){echo 'selected="selected"';}else{}; ?>>New York</option>
                <option value='NC'  <?php if(($_POST["inputState"])=="NC"){echo 'selected="selected"';}else{}; ?>>North Carolina</option>
                <option value='ND'  <?php if(($_POST["inputState"])=="ND"){echo 'selected="selected"';}else{}; ?>>North Dakota</option>
                <option value='OH'  <?php if(($_POST["inputState"])=="OH"){echo 'selected="selected"';}else{}; ?>>Ohio</option>
                <option value='OK'  <?php if(($_POST["inputState"])=="OK"){echo 'selected="selected"';}else{}; ?>>Oklahoma</option>
                <option value='OR'  <?php if(($_POST["inputState"])=="OR"){echo 'selected="selected"';}else{}; ?>>Oregon</option>
                <option value='PA'  <?php if(($_POST["inputState"])=="PA"){echo 'selected="selected"';}else{}; ?>>Pennsylvania</option> 
                <option value='RI'  <?php if(($_POST["inputState"])=="RI"){echo 'selected="selected"';}else{}; ?>>Rhode Island</option>
                <option value='SC'  <?php if(($_POST["inputState"])=="SC"){echo 'selected="selected"';}else{}; ?>>South Carolina</option>
                <option value='SD'  <?php if(($_POST["inputState"])=="SD"){echo 'selected="selected"';}else{}; ?>>South Dakota</option>
                <option value='TN'  <?php if(($_POST["inputState"])=="TN"){echo 'selected="selected"';}else{}; ?>>Tennessee</option>
                <option value='TX'  <?php if(($_POST["inputState"])=="TX"){echo 'selected="selected"';}else{}; ?>>Texas</option>
                <option value='UT'  <?php if(($_POST["inputState"])=="UT"){echo 'selected="selected"';}else{}; ?>>Utah</option>
                <option value='VT'  <?php if(($_POST["inputState"])=="VT"){echo 'selected="selected"';}else{}; ?>>Vermont</option>
                <option value='VA'  <?php if(($_POST["inputState"])=="VA"){echo 'selected="selected"';}else{}; ?>>Virginia</option>
                <option value='WA'  <?php if(($_POST["inputState"])=="WA"){echo 'selected="selected"';}else{}; ?>>Washington</option>
                <option value='WV'  <?php if(($_POST["inputState"])=="WV"){echo 'selected="selected"';}else{}; ?>>West Virginia</option>
                <option value='WI'  <?php if(($_POST["inputState"])=="WI"){echo 'selected="selected"';}else{}; ?>>Wisconsin</option>
                <option value='WY'  <?php if(($_POST["inputState"])=="WY"){echo 'selected="selected"';}else{}; ?>>Wyoming</option>
                </select>
                <span class="help-inline"><?php echo $errinputState;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputZipCode" class="control-label col-xs-2">ZipCode</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputZipCode" name="inputZipCode" placeholder="Zipcode" type="text" value="<?php echo $_POST["inputZipCode"]; ?>">
                <span class="help-inline"><?php echo $errinputZipCode;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputTotalClassrooms" class="control-label col-xs-2">Total Classrooms</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputTotalClassrooms" name="inputTotalClassrooms" placeholder="Number of Classrooms" type="text" value="<?php echo $_POST["inputTotalClassrooms"]; ?>">
                <span class="help-inline"><?php echo $errinputTotalClassrooms;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputTotalSeats" class="control-label col-xs-2">Total Seats</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputTotalSeats" name="inputTotalSeats" placeholder="Number of seats" type="text" value="<?php echo $_POST["inputTotalSeats"]; ?>">
                <span class="help-inline"><?php echo $errinputTotalSeats;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputClassHeight" class="control-label col-xs-2">Class Height</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputClassHeight" name="inputClassHeight" placeholder="Class Height" type="text" value="<?php echo $_POST["inputClassHeight"]; ?>">
                <span class="help-inline"><?php echo $errinputClassHeight;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputClassWidth" class="control-label col-xs-2">Class Width</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputClassWidth" name="inputClassWidth" placeholder="Class Width" type="text" value="<?php echo $_POST["inputClassWidth"]; ?>">
                <span class="help-inline"><?php echo $errinputClassWidth;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputClassLength" class="control-label col-xs-2">Class Length</label>
            <div class="col-xs-4">
                <input class="form-control" id="inputClassLength" name="inputClassLength" placeholder="Class Length" type="text" value="<?php echo $_POST["inputClassLength"]; ?>">
                <span class="help-inline"><?php echo $errinputClassLength;?></span>
            </div>
        </div>

        <!-- TODO: need to put span element for errors -->
        <div class="form-group">
            <label for="inputClassroomStyle" class="control-label col-xs-2">Classroom Style</label>
            <div class="col-xs-4">
              <label class="radio-inline">
                <input type="radio" name="inputClassroomStyle"  value="lectureHall" checked> Lecture Hall
              </label>
              <label class="radio-inline">
                <input type="radio" name="inputClassroomStyle" value="traditional"> Traditional
              </label>
              <label class="radio-inline">
                <input type="radio" name="inputClassroomStyle" value="handsOn"> Hands On
              </label>
            </div>       
        </div>

        <!-- TODO: need to put span element for errors -->
        <div class="form-group">
            <label for="inputInstructPodium" class="control-label col-xs-2">Instructor Podium</label>
            <div class="col-xs-4">
              <label class="checkbox-inline">
                <input type="checkbox" name="inputInstructPodium" value="mac"> Mac
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="inputInstructPodium" value="pc" checked> PC
              </label>
            </div>       
        </div>

        <!-- TODO: need to put span element for errors -->
        <div class="form-group">
            <label for="inputProjectionSystem" class="control-label col-xs-2">Projection System</label>
            <div class="col-xs-4">
              <label class="checkbox-inline">
                <input type="checkbox" name="inputProjectionSystem" value="ceilingMounted" checked> Ceiling Mounted
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="inputProjectionSystem" value="flatPanel"> Flat Panel 
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="inputProjectionSystem" value="chalkBoard"> Chalk Board
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="inputProjectionSystem" value="dryErase"> Dry Erase
              </label>
            </div>       
        </div>

        <div class="form-group">
            <label for="inputBudget" class="control-label col-xs-2">Max Budget</label>
            <div class="col-xs-4">
                <input class="form-control" name="inputBudget" id="inputBudget" placeholder="Max Budget" type="text" value="<?php echo $_POST["inputBudget"]; ?>">
                <span class="help-inline"><?php echo $errinputBudget;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCompDate" class="control-label col-xs-2">Completion Date</label>
            <div class="col-xs-4">
                <input class="form-control" name="inputCompDate" id="inputCompDate" placeholder="Completion Date" type="text" value="<?php echo $_POST["inputCompDate"]; ?>">
                <span class="help-inline"><?php echo $errinputCompDate;?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputSummary" class="control-label col-xs-2">Summary</label>
            <div class="col-xs-4">
                <textarea class="form-control" name="inputSummary" rows="3" placeholder="Project description ..."></textarea>
                <!-- since this is all text/numbers, just validate to check for any funny business -->
                <span class="help-inline"><?php echo $errinputSummary;?></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" id="submit" value="submitform" class="btn btn-primary">Submit Form</button>
            </div>
        </div>
	    </form>	
	</div>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>  
</html>