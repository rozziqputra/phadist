  <div class="container mt-5">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 justify-content-center">
            <div class="p-5 mt-2">
              <div class="card-image card-logo text-center">
                  <img src="https://abdullahlabuapi.files.wordpress.com/2018/03/61.jpg?w=1000" alt="workingspace"  width="100">
              </div>
              <div class="text-center">
                <h6 class="text-gray-900">Asrama Putra </h6>
                <h4 class="text-gray-900"><b>PP AL-IISHLAHUDDINY</b></h4>
              </div>
            </div>
           </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
              </div>
              <form class="user" method="post" action="<?=base_url('auth/registration');?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" placeholder="User name.." name="name" value="<?=set_value('name');?>" >
                  <?=form_error('name','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?=set_value('email');?>">
                  <?=form_error('email','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0"> 
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                     <?=form_error('password1','<small class="text-danger pl-3" >','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth');?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>

        
        
        
        
        
        </div>
      </div>
    </div>
  </div>