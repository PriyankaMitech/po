<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <link rel="stylesheet" href="<?=base_url(); ?>assets/css/app.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/css/components.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="flash-messages" style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
        <?php endif; ?>

        <?php if (session()->has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form id="loginForm" method="POST" action="#" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                            required autofocus
                                            value="<?php if(!empty($register_data)){ echo $register_data->email; } ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required
                                            value="<?php if(!empty($register_data)){ echo $register_data->password; } ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="float-right">
                                            <a href="#" id="forgot-password" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="submit"
                                            class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    Don't have an account? <a href="<?=base_url(); ?>register">Create One</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal for OTP and Password -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="otp">Enter OTP</label>
                        <input type="text" id="otp" class="form-control" placeholder="Enter OTP">
                        <div class="invalid-feedback" id="otpError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitOTP">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPasswordModaltwo" tabindex="-1" role="dialog"
        aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="passwordFields">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" class="form-control" placeholder="Enter new password">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" class="form-control"
                            placeholder="Confirm new password">
                        <div class="invalid-feedbacks" id="NewpasswordError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="email" value="<?= session()->get('email') ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitNewPassword">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?=base_url(); ?>assets/js/custom.js"></script>

    

</body>

</html>
