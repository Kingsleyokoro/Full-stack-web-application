<!-- Author: Okoro Kingsley Ikenna
    Product:  Travel Agency Web Application
    Technology used: HTML, CSS,JS and PHP
-->

    

    <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
<body>
    <?php
    include_once("header.php"); 
    ?>
    <!-- This section below is the general contact form for users to provide feeback -->
    <section id="main" class="d-flex align-items-lg-end align-items-md-end">
        <div class="primary-overlay">
            <div class="container" style="padding-top: 5%;">
                <div class="row ">
                    <div class="col-md-9 ">
                        <form id="contact-form" method="post" action="send.php" role="form">               
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">First Name *</label>
                                        <input id="form_name" type="text" name="fname" class="form-control"
                                            placeholder="Please enter your firstname *" required="required"
                                            data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div> <!--This div handles validation errors!-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Last Name *</label>
                                        <input id="form_lastname" type="text" name="lname" class="form-control"
                                            placeholder="Please enter your lastname *" required="required"
                                            data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Please enter your email *" required="required"
                                            data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_need">Please specify your need *</label>
                                        <select id="form_need" name="need" class="form-control" required="required"
                                            data-error="Please specify your need.">
                                            <option value="" selected>Select an option</option>
                                            <option value="Request quotation">Request travel Package type</option>
                                            <option value="Request order status">Request order status</option>
                                            <option value="Request copy of an invoice">Request copy of an invoice</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="form_need">Agency *</label>
                                        <select id="form_need" name="agency" class="form-control" required="required"
                                            data-error="Please specify your need.">
                                            <option value="" selected>Select Agency</option>
                                            <option value="" selected>Calgary</option>
                                            <option value="Request quotation">Okotoks</option>>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Feedback *</label>
                                        <textarea id="form_message" name="message" class="form-control"
                                            placeholder="Please give us Feedback *" rows="4" required="required"
                                            data-error="Your feedback is very important to us."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-send" value="Send Feedback">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted">
                                        <strong>*</strong> These fields are required.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
       
    </section>
    <!-- This section handles the search bar to find agents  -->
    <section class="Agent-description">
    <h1>Agents Information</h1>
    <div class="container   ">
      <div class="row ">
        <div class="col-lg-12 ">
          <form class="needs-validation agent-form "  method="post" action="contact.php" novalidate>
          
            <div class="form-row ">
              <div class="col-md-3 mb-3 offset-lg-3">
                <label for="validationAirport">Name</label>
                <input type="text" class="form-control placeicon" id="validationCustom03" name="name" placeholder='&#xf2ba; Search By Name'
                  required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationAirport">Location</label>
                <input type="text" class="form-control placeicon" id="validationCustom04"name="location" placeholder="&#xf041; Search By Location"
                  required>
                <div class="invalid-feedback">
                  Please provide a City.
                  
                </div>
                
              </div>
        
              <div class="col-md-3 mb-3" id="search-btn">
              
                <button class="btn btn-primary" type="submit" name='search' id='submit'>SEARCH</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  

    <div class="container">
      <div class="row "> <!-- This div enables the agent cards to be displayed on the same row -->
      <!-- Connecting to and querying the database to get agent information -->
      <?php
 
 $mysqli = new mysqli("localhost", "root", "", "travelexperts");
 if ($mysqli->connect_errno)
 {
   return $mysqli->connect_error;
 }
 if (isset($_POST['search'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

    // To display data from both the agency and agents table we join both tables with the primary and foriegn key AgencyId when the user clicks the search button
    $query = $mysqli->query("SELECT * FROM agents inner join agencies on Agents.AgencyId=Agencies.AgencyId  where AgtFirstName='$name' or AgncyCity= '$location'");
    
    if($query){
        while($array[] = $query->fetch_object());
        array_pop($array);
        
        foreach($array as $option){
          // Displaying the agents from the database in cards
           echo("<div class='col-md-4'>
                       <div class='agent-desc'>
                          <img src='img/$option->AgentId.jpg'>                                   
                          <h5>$option->AgtFirstName $option->AgtLastName</h5>
                          <small><i class='fa fa-map-marker' aria-hidden='true'></i> <b></b>$option->AgncyCity</b></small><br>                   
                         <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal-$option->AgentId' id='$option->AgentId'>VIEW DETAILS</button>
                       </div>
                    </div>");
            // Setting up a modal display when view details button is clicked
           echo("<div class='modal fade' id=exampleModal-$option->AgentId tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
           <div class='modal-dialog' role='document'>
             <div class='modal-content'>
               <div class='modal-header'>
                 <h2 class='modal-title' id='exampleModalLabel'>$option->AgtFirstName $option->AgtLastName </h2>
                 <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                 </button>
               </div>
               <div class='modal-body'>
                 <img class='card-img-top img-db' src='img/$option->AgentId.jpg' alt='Card image cap'>
                 <p class='card-text'><b><i class='fa fa-globe' aria-hidden='true'></i> $option->AgncyAddress $option->AgncyCity $option->AgncyProv $option->AgncyPostal $option->AgncyCountry</b></p>
                 <p class='card-text'><b><i class='fa fa-phone-square' aria-hidden='true'></i> $option->AgtBusPhone</b></p>
                 <p class='card-text'><b><i class='fa fa-envelope-o' aria-hidden='true'></i>  $option->AgtEmail</b></p>
               </div>
               <div class='modal-footer'>
                 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
               </div>
             </div>
           </div>
         </div>");
       
        } 

    } else{
        Print( "Agent $name is not found");
    } 
    
}else{
    $query = $mysqli->query("SELECT * FROM agents inner join agencies on Agents.AgencyId=Agencies.AgencyId where agentId!=0");
//  inner join on agencies on Agents.AgencyId=Agencies.AgencyId 
 while($array[] = $query->fetch_object());
 array_pop($array);
 
 foreach($array as $option){
  //  Agents from database displayed in custom cards
    echo("<div class='col-md-4'>
                <div class='agent-desc'>
                   <img src='img/$option->AgentId.jpg'>                                   
                   <h5> $option->AgtFirstName $option->AgtLastName</h5>
                   <small><i class='fa fa-map-marker' aria-hidden='true'></i> <b>$option->AgncyCity</b></small><br>                   
                   <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal-$option->AgentId' id='$option->AgentId'>VIEW DETAILS</button>
                </div>
             </div>");
        // Modal section     
    echo("<div class='modal fade' id=exampleModal-$option->AgentId tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h2 class='modal-title' id='exampleModalLabel'>$option->AgtFirstName $option->AgtLastName </h2>
          <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
                 <img class='card-img-top img-db' src='img/$option->AgentId.jpg' alt='Card image cap'>
                 <p class='card-text'><b><i class='fa fa-globe'aria-hidden='true'></i> $option->AgncyAddress $option->AgncyCity $option->AgncyProv $option->AgncyPostal $option->AgncyCountry</b></p>
                 <p class='card-text'><b><i class='fa fa-phone-square' aria-hidden='true'></i> $option->AgtBusPhone</b></p>
                 <p class='card-text'><b><i class='fa fa-envelope-o' aria-hidden='true'></i> $option->AgtEmail</b></p>
              </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>");

 }   
    
}

 
 ?>
      </div>
    </div>

  </section>
  <?php
    include_once("footer.php"); 
    ?>

</html>