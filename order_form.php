<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khanjee - Canada</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="css/order_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-3 pb-2 pb-md-0 mb-md-5">Put your details here!</h3>
            
            <form action="coding.php" method="POST">

              <div class="row">
                <div class="col-md-6 mb-2">

                  <div class="form-outline">
                    <input type="text" id="firstName" class="form-control" name="name1" required/>
                    <label class="form-label" for="firstName">First Name *</label>
                  </div>

                </div>
                <div class="col-md-6 mb-2">

                  <div class="form-outline">
                    <input type="text" id="lastName" class="form-control" name="name2" required/>
                    <label class="form-label" for="lastName">Last Name *</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-2">

                  <div class="form-outline">
                    <input type="email" id="emailAddress" class="form-control" name="email" required/>
                    <label class="form-label" for="emailAddress">Email Address *</label>
                  </div>

                </div>
                <div class="col-md-6 mb-2">

                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control" name="phone" required/>
                    <label class="form-label" for="phoneNumber">Phone Number *</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-12 mb-2">
                
                  <div class="form-outline">
                    <textarea class="form-control" rows="3" name="address" required></textarea>
                    <label class="form-label">Address *</label>
                  </div>
                  
                </div>
              </div>

                <div class="form-check d-flex justify-content-start mb-4 pb-3">
                    <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" required/>
                    <label class="form-check-label" for="form2Example3">
                      I do accept the Terms and Conditions of your website.
                    </label>
                </div>

              <div class="text-center mt-3 pt-2">
                <input class="btn btn-dark" type="submit" value="Proceed to Payment" name="order_form"/>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>