<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Signup for an analysis Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form  action= "/crypto_project/crypto/_handlesignup.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputusername">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email</label>
                        <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp"> 
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputname">Name</label>
                        <input type="text" class="form-control" id="signupname" name="signupname" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                     
                    <button type="submit" class="btn btn-primary">Signup</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
                </form>
    </div>
  </div>
</div>