<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('loginRegister/adminRegister.css') }}">
    <title>Admin Register</title>
</head>
<body>
    <section class="vh-100 bg-image"
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;
          box-shadow: 19px 19px 100px #f0d2e6, -15px -15px 100px #f3ddec;">
            <div class="card-body p-5">
                {{-- ALERT MESSAGE START  --}}
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert" style="text-align:center;color:#fff; background:red; padding:10px 0;">
                        <strong>{{ session::get('error') }}</strong>
                        </div>
                    @endif
                {{-- ALERT MESSAGE END  --}}
              <h2 class="text-uppercase text-center mb-5">Create new Admin</h2>

              <form action="{{ route('admin.register.create') }}" method="POST">
                @csrf

                <div class="form-outline mb-2">
                  <input name="name" placeholder="new admin name" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-2">
                  <input name="email" placeholder="abc@gmai.com" type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-2">
                  <input name="password" placeholder="password" type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-2">
                  <input name="con_password" placeholder="confirm password" type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex mb-3">
                  {{-- <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" /> --}}
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                {{-- <div class="d-flex justify-content-center"> --}}
                  <button type="submit"
                    class="btn btn-success w-100 py-3">Register</button>
                {{-- </div> --}}

                <p class="text-center text-muted mt-4 mb-0">Have already an account? <a href="{{ route('login.form') }}"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>