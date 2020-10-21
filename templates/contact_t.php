<?php include 'inc/header.php'; ?>

<body>
<section id="log-reg-con">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Contact Us</h5>
                            <form class="form-signin" method="POST" action="send_contact.php">
                                <div class="form-label-group"> <input type="text" id="inputName" name="name" class="form-control" placeholder="Your Name*" required autofocus></div>
                                <div class="form-label-group"> <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address*" required autofocus></div>
                                <div class="form-label-group"> <input type="text" id="inputMobile" name="mobile" class="form-control" placeholder="Mobile No." required autofocus></div>
                                <div class="ml-auto">
                                    <div class="form-label-group">
                                        <textarea name="contact_message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Send Message</button>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</body>

<?php include 'inc/footer.php'; ?>