<div class="full-pop contact">
    <div class="close">
        <a href="#" class="close contact-popup-toggle" title="Close window"><i class="fa fa-times" style="pointer-events:none;"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="title">Contact Us</h3>
                <h4 class="subtitle">Need to contact us about something, you can use the form below. Don't be shy!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form class="form" id="contact-form" role="form" data-toggle="validator" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="input-name">Full Name</label>
                                <input type="text" name="name" class="form-control" id="input-name" placeholder="Full Name" data-minlength="5" maxlength="80"
                                    data-error="Name must be between 5 and 80 characters long" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="input-email">Email Address</label>
                                <input type="email" name="email" class="form-control" id="input-email" placeholder="Email Address"
                                    data-error="Bruh, that email address is invalid" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row textarea">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="sr-only" for="input-message">Message</label>
                                <textarea name="message" class="form-control" id="input-message" placeholder="Enter your message"
                                    data-error="Your message must be detailed. Between 100 and 5000 characters" required
                                    data-minlength="100" maxlength="5000" data-maxlength="5000"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="leave"><input type="text" name="__token" value="{{ str_random() }}" /></div>
                    <button class="btn btn-lg btn-primary send-btn" data-loading="Sending...">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
