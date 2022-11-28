<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->





<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-xl-6">
            <div class="card login-form mb-0">
                <div class="card-body">
                    <center><a class="text-center" href="/home"> <img src="/logoisceer.png" width="250px" height="100px"></a></center>
                    <br>
                    <h2 align="center" class="col-form-label">REGISTER ACCOUNT </h2> <br><br>
                    <div class="form-validation">
                        <form class="form-valide" action="/signup/register" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Full Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-username" name="nama" placeholder="Enter a Full Name.." autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">Institution <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="institusi" name="institusi">
                                        <option value="">Please select</option>
                                        <option value="1">UNIKOM</option>
                                        <option value="2">Non-UNIKOM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Phone <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-phone" name="phone" placeholder="Enter a Phone Number..">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p class="mt-5 login-form__footer">Already have an account? <a href="/login" class="text-primary">Sign in</a> now</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>

<?= $this->endSection(); ?>