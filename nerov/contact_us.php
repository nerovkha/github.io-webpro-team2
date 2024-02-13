


<?php 

include '../header.php'; 


?> 



<form action="process.php" method="POST">
   
    <label for="name">Name:</label>
    <input type="text" name="name" required minlength="3" maxlength="20" id="name"> <br>
    <span id="nameError"></span>

    <label for="email">Email:</label>
    <input type="email" name="email" required minlength="7" maxlength="30" id="email">
    <span id="emailError"></span>

  

 <br>

    <label for="promotion_id">Enter promotion id </label>
    <input type="number" name="promotion_id" required minlength="7" maxlength="20" id="promotion_id" placeholder="123-45-678">
    <span id="emailError"></span>

    
    <br>
    
    
    <label for="message">Message:</label>

    <textarea name="message" rows="4" required minlength="10" maxlength="250" id="textarea"></textarea> <br>
    <span id="textError"></span>
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  
  
    <label for=""> I agree to  the terms and conditons </label><br>
    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
    <label for="vehicle2"> Send me promo code</label><br>
    
   

    
    
    <button type="submit" name="submit" value="Submit">Submit</button>
     

</form>
   



<script>
    //function valid for name
    const nameInput = document.getElementById("name");
    const nameError = document.getElementById("nameError");

    function checkName() {
        const nameValue = nameInput.value;
        if (nameValue.length < 3 || nameValue.length > 20) {
            nameError.innerHTML = "Name must be between 3 and 20 characters";
            return false;
        } else {
            nameError.innerHTML = "";
            return true;
        }
    }

    //function valid for email
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");

    function checkEmail() {
        const emailValue = emailInput.value;
        if (emailValue.length < 7 || emailValue.length > 30) {
            emailError.innerHTML = "Enter a valid email address";
            return false;
        } else {
            emailError.innerHTML = "";
            return true;
        }
    }

    //function valid for text area
    const textInput = document.getElementById("textarea");
    const textError = document.getElementById("textError");

    function checkText() {
        const textValue = textInput.value;
        if (textValue.length < 10 || textValue.length > 250) {
            textError.innerHTML = "Please write the text between 10 and 250 characters";
            return false;
        } else {
            textError.innerHTML = "";
            return true;
        }
    }

    //add eventListeners
    nameInput.addEventListener("input", checkName);
    emailInput.addEventListener("input", checkEmail);
    textInput.addEventListener("input", checkText);
</script>
<?php '../footer.php'; ?> 