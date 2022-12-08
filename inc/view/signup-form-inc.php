<div class="container-fluid" style="position: absolute; top: 20%">
    <div class="row">
        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Signup For An Account
                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include_once "./inc/view/signup-inc.php";
                                                    register_user(); ?>">
                            <div class="mb-3">
                                <label for="fName" class="form-label">First Name</label>
                                <input type="fName" class="form-control" name="fName" id="fName" required>
                            </div>
                            <div class="mb-3">
                                <label for="lName" class="form-label">Last Name</label>
                                <input type="lName" class="form-control" name="lName" id="lName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="rpassword" id="rpassword" required>
                            </div>
                            <button type="submit" class="btn btn-info" name='register-user'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>