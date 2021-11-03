<?php 
    print '
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Form</h1>
                    <div id="contact">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7890741539636!2d15.966758816056517!3d45.795453279106205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b5d094979%3A0xda8bfa8459b67560!2sUl.+Vrbik+VIII%2C+10000%2C+Zagreb!5e0!3m2!1shr!2shr!4v1509296660756" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <form style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 5%; border-radius: 10px;">
                            <div class="form-group">
                                <label for="firstName">First Name*</label>
                                <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp" placeholder="Enter your first name">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name*</label>
                                <input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp" placeholder="Enter your last name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address*</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
                            </div>
                            <select class="form-control">
                                <option value="">Please select</option>
                                <option value="HR" selected>Croatia</option>
                                <option value="DE">Germany</option>
                                <option value="EN">England</option>
                                <option value="IT">Italy</option>
                            </select>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <textarea class="form-control" id="subject" rows="3"></textarea>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
            </div>
        </div>
    ';
?>