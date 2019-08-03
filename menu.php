<!--Author:Bachir Mahomad
    Date:01/08/2019
    Functionality:Final Version
--> 



<!--section main that include top menu header which inlude search option for the different packages-->
<section class="header d-flex align-items-lg-end align-items-md-end">
 <!-- Container div used to position the search bar -->
    <div class="container  ">
      <div class="row">
      <!-- Column containing  the search bar-->

        <div class="col-lg-9 offset-lg-2 col-md-9 offset-md-2">
          <form class="needs-validation vacation-form" method="post"  action="#" novalidate>
      <!-- row in the searchsection containing the button for the vation and hotel  -->

            <div class="form-row">
              <div class="btn-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-globe" aria-hidden="true"></i>
                  VACATION</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-bed"
                    aria-hidden="true"></i>HOTELS+</button>
              </div>
            </div>
            <!-- row in the searchsection containing the input for the depart and going input  -->
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationAirport">Departing From</label>
                <input type="text" class="form-control placeicon" id="validationCustom03" placeholder='&#xf041; FROM'
                  required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationAirport">Going To</label>
                <input type="text" class="form-control placeicon" id="validationCustom04" placeholder="&#xf041; TO"
                  required>
                <div class="invalid-feedback">
                  Please provide a City.
                </div>
              </div>
                <!-- row in the searchsection containing the calendar with the departure, return date, and the passenger number -->
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustom05">Departure Date</label>
                  <input type="date" class="form-control placeicon" id="validationCustom05" placeholder="&#xf073; Date"
                    required>
                  <div class="invalid-feedback">
                    Please provide a valid date.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom05">Return Date</label>
                  <input type="date" class="form-control placeicon" id="validationCustom05"
                    placeholder="&#xf073; Adults" required>
                  <div class="invalid-feedback">
                    Please provide a valid date.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom05">Travellers</label>
                  <input type="number" class="form-control placeicon" id="validationCustom05" value="1"
                    placeholder="&#xf183;  Travellers " required>
                  <div class="invalid-feedback">
                    Please provide Number of travel.
                  </div>
                </div>
              </div>
                <!-- row in the searchsection containing the the submit button -->
              <div id="input-btn">
                <button class="btn btn-primary" type="submit">SEARCH</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>