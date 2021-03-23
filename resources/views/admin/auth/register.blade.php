<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/ad/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/ad/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="/ad/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/ad/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/ad/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/ad/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/ad/assets/css/d emo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="/ad/assets/images/favicon.ico"/>
</head>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <h2 class="text-center mb-4">Register</h2>
                    <div class="auto-form-wrapper">
                        <form action="{{route('submit-register-admin')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                         @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                         @enderror
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                           placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            @error('email')
				    	                        <p class="text-danger">{{ $message }}</p>
				                             @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="password" value="{{ old('password') }}"
                                           class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                          <span class="input-group-text">
                                               @error('password')
                                                         <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                         </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="password_confirmation"
                                           value="{{ old('password_confirmation') }}" class="form-control"
                                           placeholder="Confirm Password">
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                          @error('password_confirmation')
                                                <p class="text-danger">{{ $message }}</p>
                                           @enderror
                                    </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" name="age" value="{{ old('age') }}" class="form-control"
                                           placeholder="Age">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            @error('age')
				    	                        <p class="text-danger">{{ $message }}</p>
				                             @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                                           placeholder="Phone">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            @error('phone')
				    	                        <p class="text-danger">{{ $message }}</p>
				                             @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="input-group">
                                    <select name="gender" class="form-control">
                                        <option value="0">Select your gender</option>
                                        <option {{ old('gender')==1 ? 'selected' : ''  }} value="1">Male</option>
                                        <option {{ old('gender')==2 ? 'selected' : ''  }}  value="2">FeMale</option>
                                        <option {{ old('gender')==3 ? 'selected' : ''  }}  value="3">Orther</option>
                                    </select>
                                    @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Register</button>
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Already have and account ?</span>
                                <a href="{{route('admin-login')}}" class="text-black text-small">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/ad/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="/ad/assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/ad/assets/js/shared/off-canvas.js"></script>
<script src="/ad/assets/js/shared/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="/ad/assets/js/demo_1/dashboard.js"></script>
<!-- End custom js for this page-->
<script src="/ad/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>
</html>
