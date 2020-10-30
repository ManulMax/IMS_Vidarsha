<!DOCTYPE html>
<html lang="en">
<head>
<title>Teacher Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="https://kit.fontawesome.com/b481b35adc.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://localhost/IMS_Vidarsha/public/css/teacherNavStylesheet">
<link rel="stylesheet" href="http://localhost/IMS_Vidarsha/public/css/paperMarkerRegistrationStylesheet">

</head>

<body>

<div class="row">
  <div class="leftNav">
  <img src="<?php echo URL; ?>public/img/logo.png" width = "50%" height = "100px" style= "margin-left: 25%">
	<ul>
	  <li><a href="<?php echo URL; ?>teacherHome"><i class="fas fa-home"></i>Dashboard</a></li>
	  <li>
        <button class="dropdown-btn"><i class="fas fa-upload"></i>Upload Materials
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <?php
             $classes = []; //create array
              while($class=mysqli_fetch_assoc($this->classList)) {
                  $classes[] = $class; //assign whole values to array
              }
             foreach($classes as $row){  ?>
                <a href="<?php echo URL; ?>materials/index/<?php echo $row['id']; ?>"><?php echo $row['batch']; ?></a>
          <?php  } ?>

        </div>
    </li>
    <li>
        <button class="dropdown-btn"><i class="fas fa-question"></i>Quizzes
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <?php
       
         foreach($classes as $row){  ?>
            <a href="<?php echo URL; ?>createQuiz"><?php echo $row['batch']; ?></a>
          <?php  } ?>
        </div>
    </li>
	  <li><a href="<?php echo URL; ?>addNewClass"><i class="fas fa-users"></i>New Class</a></li>
	  <li><a href="<?php echo URL; ?>reschedule"><i class="far fa-calendar-alt"></i>Re-schedule</a></li>
	  <li><a href="<?php echo URL; ?>paperMarkerRegistration"><i class="fas fa-user-edit"></i>Papermarker Registration</a></li>
	  <li><a href="<?php echo URL; ?>salaryDetails"><i class="fas fa-money-bill-wave"></i>Salary Details</a></li>
	</ul>
	
	
  </div>
  <div class="headerClass">
	  <h2 style="text-indent:10px;margin-top:8px;margin-left:18%;position:absolute;"><i class="fas fa-home"></i>Papermarker Registration</h2>
	  <div style="margin-top:6px;float: right;margin-right: 40px;"><i class="fas fa-sign-out-alt" style="font-size: 28px;"></i></div>
    <div class="userDiv" style="margin-top:10px;float: right;margin-right: 30px;"><i class="fas fa-user fa-lg"></i>Hello Teacher ;-)</div>
  </div>

  
  <div class="middle" style="background-color:white;width: 83%;">



	<form action="<?php echo URL; ?>paperMarkerRegistration/create" method="post" style="padding-left: 20%;padding-right: 20%;padding-top: 5%;">
	  <div class="row">
		<div class="col-20">
		  <label for="subject">Full Name :</label>
		</div>
		<div class="col-75">
		  <input type="text" placeholder="Full name..." name="name">
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-20">
		  <label for="subject"> NIC :</label>
		</div>
		<div class="col-20">
		  <input type="text" placeholder="Identity card number..." name="NIC">
		</div>
		<div class="col-20" style="width: 15%;">
		</div>
		<div class="col-20">
		  <label for="subject">DOB :</label>
		</div>
		<div class="col-20">
		  <input type="date" name="DOB">
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-20">
		  <label for="subject">Email :</label>
		</div>
		<div class="col-75" style="width: 60%">
		  <input type="email" placeholder="Email address..." name="email">
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-20">
		  <label for="subject">Address :</label>
		</div>
		<div class="col-75">
		  <textarea rows="4" cols="90" placeholder="Address..." name="address"></textarea>
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-20">
		  <label for="subject">Mobile No. :</label>
		</div>
		<div class="col-20">
		  <input type="text" placeholder="Mobile number..." name="tel">
		</div>
	  </div>
	  
	  <div class="row">
		<div class="col-20">
		  <label for="subject">Qualifications :</label>
		</div>
		<div class="col-75">
		  <textarea rows="4" cols="90" name="qualifications"></textarea>
		</div>
	  </div>
	  
	  <div class="row" style="margin-top:30px;margin-right:50px;">
		<input type="submit" value="Save" style="padding-right: 30px;padding-left: 30px;">
	  </div>
	  
	</form>

  </div>
 </div>


<div class="footer">
  <p>Footer</p>
</div>



<script type="text/javascript">
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

</script>


</body>
</html>