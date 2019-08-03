<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/index_style.css">
        <link rel="stylesheet" type="text/css" href="../css/contact_style.css">

    <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
<body>
    <?php
    include_once("../header.php"); 
    ?>
    <section id="main">
        <div class="primary-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <form id="contact-form" method="post" action="contact.php" role="form">               
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">First Name *</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="Please enter your firstname *" required="required"
                                            data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Last Name *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control"
                                            placeholder="Please enter your lastname *" required="required"
                                            data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Please enter your email *" required="required"
                                            data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                    <input type="submit" class="btn btn-success btn-send" value="Send Feedback">
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
    <section class="Agent-description">
    <h1>Agents Information</h1>
    <div class="container">
      <div class="row">
      <?php
 
 $mysqli = new mysqli("localhost", "root", "", "travelexperts");
 if ($mysqli->connect_errno)
 {
   return $mysqli->connect_error;
 }
 $query = $mysqli->query("SELECT * FROM agents where agentId!=0");
 
 while($array[] = $query->fetch_object());
 array_pop($array);
 
 foreach($array as $option){
   
    print("<div class='col-md-4'>
                <div class='agent-desc'>
                   <img src='../img/$option->AgentId.jpg'>                                   
                   <h5>Name: $option->AgtFirstName $option->AgtLastName</h5>
                   <small>City: $option->AgtBusPhone</small><br>                   
                   <button class='btn'type='submit' data-toggle='modal' data-target=$option->AgentId>VIEW DETAILS</button>
                </div>
             </div>");
    print("<div class='modal fade' id=$option->AgentId tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='odal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>$option->AgtFirstName $option->AgtLastName </h5>
          <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <img class='card-img-top img-db' src='../img/$option->AgentId.jpg' alt='Card image cap'>
          <p class='card-text'>Phone Number: $option->AgtBusPhone</p>
          <p class='card-text'>Email: </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>");

 }   
    
 ?>
      </div>
    </div>

  </section>
  <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
                              $('#myInput').trigger('focus')
                            })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"
        integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <!--  <script src="contact.js"></script> -->
</body>

</html>