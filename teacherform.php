<?php session_start() ?>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Know | Teacher Form</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
  
  <style>

/* Full-width inputs */
.container input[type=text], input[type=password], select {
  width: 100%;
  float: left;
  padding: 12px 20px;
  margin: 8px 0px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

.input:focus {
    outline: none !important;
    border:1px solid red;
    box-shadow: 0 0 10px #719ECE;
}

/* Add padding to containers */
.container {
  padding: 16px;
}
  </style>

<script>
    //function for form validation in JS
    function validateForm() {
        //variables to get values of fields
        var id = document.getElementById('id');
        var courseN = document.getElementById('courseN');
        var cc = document.getElementById('countryC');
        var sDig = document.getElementById('startDig');
        var phN = document.getElementById('phN');
        var email = document.getElementById('email');

        //different formats for validation of separate fields
        var NFormat = /^[A-Za-z ]+$/;
        var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var idFormat = /^[T]+\d{4}$/;
        var countryFormat = /^[+]+\d{1,3}$/;
        var sDigFormat = /^\d{3}$/;
        var phoneFormat = /^\d{7}$/;

        //checking if any field is empty/null (reports to can be empty)
          if (id.value == "" || courseN.value == "" || phN.value == "" || email.value == "" || cc.value == "" || sDig.value == "") {
            alert("Field cannot be empty!");
            return false;
        }
        
          if (id.value == null || courseN.value == null || phN.value == null || email.value == null || cc.value == null || sDig.value == null) {
            alert("Field cannot be empty!");
            return false;
        }

         /*below here are all individual format checks for every field*/
        if (NFormat.test(courseN.value) === false) {
            courseN.focus();
            courseN.style.border = "2px solid red";
            alert("Course name format is incorrect! Must only include lower and uppercase letters!");
            return false;
        }

        if (countryFormat.test(cc.value) === false) {
            cc.focus();
            cc.style.border = "2px solid red";
            alert("Country code format is incorrect! Must be in the formats +#, +## or +###!");
            return false;
        }

        if (sDigFormat.test(sDig.value) === false) {
            sDig.focus();
            sDig.style.border = "2px solid red";
            alert("Starting digits format is incorrect! Must be in the format ###!");
            return false;
        }

        if (phoneFormat.test(phN.value) === false) {
            phN.focus();
            phN.style.border = "2px solid red";
            alert("Phone number format is incorrect! Must be in the format #######!");
            return false;
        }

        if (idFormat.test(id.value) === false) {
            id.focus();
            id.style.border = "2px solid red";
            alert("Teacher ID format is incorrect! Must be in the format T####!");
            return false;
        }

        if (emailFormat.test(email.value) === false) {
            email.focus();
            email.style.border = "2px solid red";
            alert("Email format is incorrect!");
            return false;
        }
    }
</script>
</head>

<body>
  <!-- Nav bar :: PHP -->
	<div class="top row col-12">
    <a id = "logo" href = "index.php"><img src = "logo.png"></a>
    <ul class = "navbar"> 
      <a href = "index.php" > <li> Home </li> </a>
      <?php 
        /* change navbar based on whether you are logged in or not */
        if (isset($_SESSION['userName'])) {
          echo '<a href = "internals/logout.inc.php"> <li> Logout </li> </a>';
        } else {
          echo '
            <a href = "about.html"> <li> About </li> </a>
            <a href = "pricing.html"> <li> Pricing </li> </a>
          ';
        }
      ?>
    </ul>
    <form action = "results.php">
    <input class = "search-box" type = "text" placeholder = "Search Courses" />
    <input type="submit" style="position: absolute; left: -9999px"/>
    </form>
    </div>
    
    <div class="main" style="height: auto;">
        <div class="container">
            <form onsubmit="return validateForm()">
                <input id="courseN" type="text" placeholder="Course Name">
                <label for="field"><u>Choose a field:</u></label>
                <select id="field" name="field">
                    <option value="cs">Computer Science</option>
                    <option value="maths">Mathematics</option>
                    <option value="se">Software Engineering</option>
                    <option value="prog">Programming</option>
                    <option value="we">Web Development</option>
                    <option value="hard">Computer Hardware</option>
                    <option value="cs">Computer Science</option>
                </select>
                <input id="countryC" type="text" placeholder="Country Code" style="width: 20%; margin-right: 10px;">
                <input id="startDig" type="text" placeholder="Starting Digits" style="width: 20%; margin-right: 10px;">
                <input id="phN" type="text" placeholder="Phone No." style="width: 55%; margin-right: 10px;">
                <input id="id" type="text" placeholder="Co-Teacher's ID">
                <input id="email" type="text" placeholder="Email">
                <button class = "button-big" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <hr>

    <div class = "bottom" style="text-align: center;">
        <div class="row">
            <div class="col-6 left col-s-12">
                <h4>Social Media</h4>
                <div class="row">
                    <a href="https://twitter.com>"><img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/twitter_circle-512.png" width="10%" height="10%"></a>
                    <a href="https://facebook.com"><img src="fblogo.png" width="10%" height="10%"></a>
                    <a href="https://instagram.com"><img src="iglogo.png" width="10%" height="10%"></a>
                    <a href="https://youtube.com"><img src="https://images.vexels.com/media/users/3/137425/isolated/preview/f2ea1ded4d037633f687ee389a571086-youtube-icon-logo-by-vexels.png" width="10%" height="10%"></a>
                </div>
            </div>

            <div class="col-6 left col-s-12">
                <ul style="list-style-type:none;">
                    <li><h4>More</h4></li>
                    <li><a href="terms.html">Terms</a></li>
                    <li><a href="privacy.html">Privacy</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="support.html">Support</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>