<!doctype html>
<html lang="en">

<head>
 <title>PHP FORM</title>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS v5.2.1 -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


 <div class="container-fluid">

  <form class="row g-3 needs-validation" action="./action/form_get.php"  method="POST" enctype="multipart/form-data"  novalidate>

   <div class="col-md-12">
    <label for="Username" class="form-label">Username</label>
    <div class="input-group has-validation">
     <span class="input-group-text" id="username">@</span>
     <input type="text" class="form-control"  name="user_name" id="Username" aria-describedby="username"
      required>
     <div class="invalid-feedback">
      Please choose a username.
     </div>
    </div>
   </div>

   <div class="col-md-12">
    <label for="Password" class="form-label">Password</label>
    <div class="input-group has-validation">

     <span class="input-group-text" id="password"><i class="fa-solid fa-lock"></i></span>
    
     <input type="password" name="password" class="form-control" id="Password" aria-describedby="password" required>
    
     <div class="invalid-feedback">
      Please Enter Password.
     </div>
    
    </div>
   </div>


   <div class="col-md-12">
    <label for="file" class="form-label">Image</label>
    <input type="file" class="form-control" name="profile" id="file" required>
    <div class="invalid-feedback">
     Please provide a valid zip.
    </div>
   </div>

   <div class="col-12">
    <div class="form-check">
     <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
     <label class="form-check-label" for="invalidCheck">
      Agree to terms and conditions
     </label>
     <div class="invalid-feedback">
      You must agree before submitting.
     </div>
    </div>
   </div>
   <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
   </div>
  </form>

 </div>




 <!-- Bootstrap JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

 <script>
  // (() => {
  //  'use strict'

  //  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  //  const forms = document.querySelectorAll('.needs-validation')

  //  // Loop over them and prevent submission
  //  Array.from(forms).forEach(form => {
  //   form.addEventListener('submit', event => {
  //    if (!form.checkValidity()) {
  //     event.preventDefault()
  //     event.stopPropagation()
  //    }

  //    form.classList.add('was-validated')
  //   }, false)
  //  })
  // })()
 </script>
 <!-- "use strict" -->
</body>

</html>