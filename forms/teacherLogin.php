<?php 
require_once('formHead.php');
require_once('../submission/sweetalert.php');
?> 
<div class="teacherbody">
    <section class="form teacherform border border-secondary p-5 mx-5">
        <div class="row justify-content-center">
            <div class="title teacherheader font-weight-bold text-center mb-4">
                <h1>Teacher's Login Page</h1>
            </div>
            <div class="col-lg-6">
                <form id="TeacherLogin" method="POST" class="form">
                    <div class="form-group">
                        <label for="username" class="form-label">USERNAME:</label>
                        <input type="text" class="form-control" name="uname" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">PASSWORD:</label>
                        <input type="password" class="form-control" name="pass" id="password">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-secondary btn-block mt-3" name="TeacherLogin" value="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
</div>
<?php require_once('formFoot.php'); ?>
