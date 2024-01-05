  <div class="createAccount myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="createAccount-outer">
            <div class="createAccount-col clearfix">
              <div class="logo-createAccount"> <a href="#"><img src="<?=base_url();?>user_panel/new/images/logo.png" alt=""></a></div>
              <h4>Create an account</h4>
              <div class="gform_wrapper">
                <form >
                <div class="form-group">
                  <div id="checkboxes">
                    <div class="nav nav-tabs tab_hdng register" role="tablist">
                      <ul class="nav nav-tabs">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#student">
                          <input type="radio" name="user_type" value="std" id="r4">
                          <label class="whatever" for="r4" role="presentation">Student</label>
                          </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab"  href="#instructor">
                          <input type="radio" name="user_type" id="r3" value="inst">
                          <label class="whatever" for="r3" role="presentation">Instructor</label>
                          </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#business">
                          <input type="radio" name="user_type" id="r2" value="busi" >
                          <label class="whatever" for="r2" role="presentation">Business</label>
                          </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="student">
                <form class="form-horizontal frm" method="post">
                  <!-- Under 18-years -->
                  <input type="hidden" name="user_type" value="std">
                  <div class="under-eighten-years">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control medium" placeholder="First Name" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Surname</label>
                          <input type="text" placeholder="Surname" class="form-control medium">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="radio-inline">Gender :</label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio1" value="male">
                        Male </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio2" value="female">
                        Female </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="email" class="form-control medium" placeholder="Address line one" name="" value="">
                      <br>
                      <input type="email" class="form-control medium" placeholder="Address line two" name="" value="">
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>City</label>
                          <input type="text" class="form-control medium" placeholder="City" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Region</label>
                          <input type="text" placeholder="Region" class="form-control medium">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Post Code</label>
                          <input type="text" class="form-control medium" placeholder="Post Code" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Country</label>
                          <input type="text" placeholder="Country" class="form-control medium">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Telephone number</label>
                          <input type="text" class="form-control medium"  placeholder="Telephone Number" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email Address</label>
                          <input type="email" class="form-control medium" placeholder="Email Address" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control medium" placeholder="Password" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" class="form-control medium" placeholder="Confirm Password" name="" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group onder_If">
                        <label class="radio-inline">
                          <input type="checkbox" class="under10y" name="" id="inlineRadio2">
                          Under 18: </label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group onder_If">
                        <label class="radio-inline">
                          <input type="checkbox" class="under10y" name="" id="inlineRadio2">
                          18 or 18 Plus: </label>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Under 18-years -->
                  
                  <div class="if-eighten-years">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Name of Guardian</label>
                          <input type="text" class="form-control medium" placeholder="Name of Guardian" name="" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Telephone number of the Guardian</label>
                          <input type="text" class="form-control medium" placeholder="Telephone number of the Guardian" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address of the guardian</label>
                      <input type="email" class="form-control medium" placeholder="Email address of the guardian" name="" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-default cstm_btn">Register</button>
                    </div>
                  </div>
                  <div class="newDOb">
                    <h5><span>sign in</span></h5>
                  </div>
                  <div class="newSkillogics"> <a href="#" class="button gform_button">Log In</a> </div>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane" id="instructor">
                <form class="form-horizontal frm">
                  <input type="hidden" name="" value="">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control medium" placeholder="First Name" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Surname</label>
                        <input type="text" placeholder="Surname" class="form-control medium">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="radio-inline">Gender :</label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="inlineRadio1" value="male">
                      Male </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="inlineRadio2" value="female">
                      Female </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="email" class="form-control medium" placeholder="Address line one" name="" value="">
                    <br>
                    <input type="email" class="form-control medium" placeholder="Address line two" name="" value="">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control medium" placeholder="City" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Region</label>
                        <input type="text" placeholder="Region" class="form-control medium">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" class="form-control medium" placeholder="Post Code" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" placeholder="Country" class="form-control medium">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Telephone number</label>
                        <input type="text" class="form-control medium" placeholder="Telephone Number" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control medium" placeholder="Email" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control medium" placeholder="Password" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control medium" placeholder="Confirm Password" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Highest qualifications</label>
                        <input type="text" class="form-control medium" placeholder="Highest qualifications" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Other qualifications</label>
                        <input type="text" class="form-control medium" placeholder="Other qualifications" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Speciality subject</label>
                        <input type="text" class="form-control medium" placeholder="Speciality subject" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Teaching qualifications</label>
                        <input type="text" class="form-control medium" placeholder="Teaching qualifications" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Experience</label>
                        <select class="form-control mediumselect" name="">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Download CV</label>
                        <input type="file" name="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-default cstm_btn">Register</button>
                    </div>
                  </div>
                  <div class="newDOb">
                    <h5><span>sign in</span></h5>
                  </div>
                  <div class="newSkillogics"> <a href="#" class="button gform_button">Log In</a> </div>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane" id="business">
                <form class="form-horizontal frm" >
                  <input type="hidden" name="" value="">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control medium" placeholder="Business Name" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Contact name</label>
                        <input type="text" class="form-control medium" placeholder="Contact name" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Position</label>
                    <input type="text" class="form-control medium" placeholder="Contact Position" name="" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="email" class="form-control medium" placeholder="Address line one" name="" value="">
                    <br>
                    <input type="email" class="form-control medium" placeholder="Address line two" name="" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" class="form-control medium" placeholder="Website" name="" value="">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telephone number</label>
                        <input type="text" class="form-control medium" placeholder="Telephone number" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control medium" placeholder="Email address" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control medium" placeholder="Password" name="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control medium" placeholder="Confirm Password" name="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-default cstm_btn">Register</button>
                    </div>
                  </div>
                  <div class="newDOb">
                    <h5><span>sign in</span></h5>
                  </div>
                  <div class="newSkillogics"> <a href="#" class="button gform_button">Log In</a> </div>
                </form>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>