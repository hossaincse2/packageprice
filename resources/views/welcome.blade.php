 @extends('layouts.app')
    @include('layouts.partial.nav')

      @section('content')
         <!-- Full Page Intro -->
      <div class="view full-page-intro">

          <!--Video source-->
          <video class="video-intro" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
          </video>
  
          <!-- Mask & flexbox options-->
          <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">
  
            <!-- Content -->
            <div class="container">
  
              <!--Grid row-->
              <div class="row d-flex h-100 justify-content-center align-items-center wow fadeIn">
  
                <!--Grid column-->
                <div class="col-md-6 mb-4 white-text text-center text-md-left">
  
                  <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>
  
                  <hr class="hr-light">
  
                  <p>
                    <strong>Best & free guide of responsive web design</strong>
                  </p>
  
                  <p class="mb-4 d-none d-md-block">
                    <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                      available. Create your own, stunning website.</strong>
                  </p>
  
                  <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-outline-white">Start free tutorial
                    <i class="fa fa-graduation-cap ml-2"></i>
                  </a>
                  <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-outline-white">Download MDB
                    <i class="fa fa-download ml-2"></i>
                  </a>
  
                </div>
                <!--Grid column-->
  
                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mb-4">
  
                  <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
  
                </div>
                <!--Grid column-->
  
              </div>
              <!--Grid row-->
  
            </div>
            <!-- Content -->
  
          </div>
          <!-- Mask & flexbox options-->
  
        </div>
        <!-- Full Page Intro -->
  
    </header>
  
    <!--Main layout-->
    <main>
      <div class="container">
  
        <!--Section: Main info-->
        <section class="mt-5 wow fadeIn">
  
          <!--Grid row-->
          <div class="row">
  
            <!--Grid column-->
            <div class="col-md-6 mb-4">
  
              <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-main.jpg" class="img-fluid z-depth-1-half" alt="">
  
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-md-6 mb-4">
  
              <!-- Main heading -->
              <h3 class="h3 mb-3">Material Design for Bootstrap</h3>
              <p>This template is created with Material Design for Bootstrap (
                <strong>MDB</strong> ) framework.</p>
              <p>Read details below to learn more about MDB.</p>
              <!-- Main heading -->
  
              <hr>
  
              <p>
                <strong>400+</strong> material UI elements,
                <strong>600+</strong> material icons,
                <strong>74</strong> CSS animations, SASS files, templates, tutorials and many more.
                <strong>Free for personal and commercial use.</strong>
              </p>
  
              <!-- CTA -->
              <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-indigo btn-md">Download
                <i class="fa fa-download ml-1"></i>
              </a>
              <a target="_blank" href="https://mdbootstrap.com/components/" class="btn btn-indigo btn-md">Live demo
                <i class="fa fa-image ml-1"></i>
              </a>
  
            </div>
            <!--Grid column-->
  
          </div>
          <!--Grid row-->
  
        </section>
        <!--Section: Main info-->
  
        <hr class="my-5">
  
        <!--Section: Main features & Quick Start-->
        <section>
  
          <h3 class="h3 text-center mb-5">About MDB</h3>
  
          <!--Grid row-->
          <div class="row wow fadeIn">
  
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 px-4">
  
              <!--First row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-code fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Bootstrap 4</h5>
                  <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
                </div>
              </div>
              <!--/First row-->
  
              <div style="height:30px"></div>
  
              <!--Second row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-book fa-2x blue-text"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Detailed documentation</h5>
                  <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help you to implement your ideas
                    easily.
                  </p>
                </div>
              </div>
              <!--/Second row-->
  
              <div style="height:30px"></div>
  
              <!--Third row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Lots of tutorials</h5>
                  <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                    how to use MDB as well as other technologies.</p>
                </div>
              </div>
              <!--/Third row-->
  
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-lg-6 col-md-12">
  
              <p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ" allowfullscreen></iframe>
              </div>
            </div>
            <!--/Grid column-->
  
          </div>
          <!--/Grid row-->
  
        </section>
        <!--Section: Main features & Quick Start-->
  
        <hr class="my-5">
  
        <!--Section: Not enough-->
        <section>
  
          <h2 class="my-5 h3 text-center">Not enough?</h2>
  
          <!--First row-->
          <div class="row features-small mb-5 mt-3 wow fadeIn">
  
            <!--First column-->
            <div class="col-md-4">
              <!--First row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">Free for personal and commercial use</h6>
                  <p class="grey-text">Our license is user-friendly. Feel free to use MDB for both private as well as commercial projects.
                  </p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/First row-->
  
              <!--Second row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">400+ UI elements</h6>
                  <p class="grey-text">An impressive collection of flexible components allows you to develop any project.
                  </p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Second row-->
  
              <!--Third row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">600+ icons</h6>
                  <p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Third row-->
  
              <!--Fourth row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">Fully responsive</h6>
                  <p class="grey-text">It doesn't matter whether your project will be displayed on desktop, laptop, tablet or mobile phone. MDB
                    looks great on each screen.</p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Fourth row-->
            </div>
            <!--/First column-->
  
            <!--Second column-->
            <div class="col-md-4 flex-center">
              <img src="https://mdbootstrap.com/img/Others/screens.png" alt="MDB Magazine Template displayed on iPhone" class="z-depth-0 img-fluid">
            </div>
            <!--/Second column-->
  
            <!--Third column-->
            <div class="col-md-4 mt-2">
              <!--First row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">70+ CSS animations</h6>
                  <p class="grey-text">Neat and easy to use animations, which will increase the interactivity of your project and delight your visitors.
                  </p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/First row-->
  
              <!--Second row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">Plenty of useful templates</h6>
                  <p class="grey-text">Need inspiration? Use one of our predefined templates for free.</p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Second row-->
  
              <!--Third row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">Easy installation</h6>
                  <p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy it is.
                  </p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Third row-->
  
              <!--Fourth row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-check-circle fa-2x indigo-text"></i>
                </div>
                <div class="col-10">
                  <h6 class="feature-title">Easy to use and customize</h6>
                  <p class="grey-text">Using MDB is straightforward and pleasant. Components flexibility allows you deep customization. You will
                    easily adjust each component to suit your needs.</p>
                  <div style="height:15px"></div>
                </div>
              </div>
              <!--/Fourth row-->
            </div>
            <!--/Third column-->
  
          </div>
          <!--/First row-->
  
        </section>
        <!--Section: Not enough-->
  
        <hr class="mb-5">
  
        <!--Section: More-->
        <section>
  
          <h2 class="my-5 h3 text-center">...and even more</h2>
  
          <!--First row-->
          <div class="row features-small mt-5 wow fadeIn">
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2 pl-3">
                  <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
                  <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all browsers; all browsers love MDB.
                  </p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-level-up fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
                  <p class="grey-text mt-2">MDB becomes better every month. We love the project and enhance as much as possible.
                  </p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-comments-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">Active community</h5>
                  <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to be a part of our family.
                  </p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
                  <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all the latest features which come along with
                    it.
                  </p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
          </div>
          <!--/First row-->
  
          <!--Second row-->
          <div class="row features-small mt-4 wow fadeIn">
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">Modularity</h5>
                  <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to use libraries including all features as
                    well as modules for CSS (SASS files) and JS.</p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">Technical support</h5>
                  <p class="grey-text mt-2">We care about reliability. If you have any questions - do not hesitate to contact us.
                  </p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">Flexbox</h5>
                  <p class="grey-text mt-2">MDB fully supports Flex Box. You can forget about alignment issues.</p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
            <!--Grid column-->
            <div class="col-xl-3 col-lg-6">
              <!--Grid row-->
              <div class="row">
                <div class="col-2">
                  <i class="fa fa-file-code-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                </div>
                <div class="col-10 mb-2">
                  <h5 class="feature-title font-bold mb-1">SASS files</h5>
                  <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile them.</p>
                </div>
              </div>
              <!--/Grid row-->
            </div>
            <!--/Grid column-->
  
          </div>
          <!--/Second row-->
  
        </section>
        <!--Section: More-->
  
      </div>
    </main>
    <!--Main layout-->
  
    <!--Footer-->
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">
  
      <!--Call to action-->
      <div class="pt-4">
        <a class="btn btn-outline-white" href="https://mdbootstrap.com/getting-started/" target="_blank" role="button">Download MDB
          <i class="fa fa-download ml-2"></i>
        </a>
        <a class="btn btn-outline-white" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank" role="button">Start free tutorial
          <i class="fa fa-graduation-cap ml-2"></i>
        </a>
      </div>
      <!--/.Call to action-->
  
      <hr class="my-4">
  
      <!-- Social icons -->
      <div class="pb-4">
        <a href="https://www.facebook.com/mdbootstrap" target="_blank">
          <i class="fa fa-facebook mr-3"></i>
        </a>
  
        <a href="https://twitter.com/MDBootstrap" target="_blank">
          <i class="fa fa-twitter mr-3"></i>
        </a>
  
        <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
          <i class="fa fa-youtube mr-3"></i>
        </a>
  
        <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
          <i class="fa fa-google-plus mr-3"></i>
        </a>
  
        <a href="https://dribbble.com/mdbootstrap" target="_blank">
          <i class="fa fa-dribbble mr-3"></i>
        </a>
  
        <a href="https://pinterest.com/mdbootstrap" target="_blank">
          <i class="fa fa-pinterest mr-3"></i>
        </a>
  
        <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
          <i class="fa fa-github mr-3"></i>
        </a>
  
        <a href="http://codepen.io/mdbootstrap/" target="_blank">
          <i class="fa fa-codepen mr-3"></i>
        </a>
      </div>
      <!-- Social icons -->
  
      <!--Copyright-->
      <div class="footer-copyright py-3">
        © 2018 Copyright:
        <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> MDBootstrap.com </a>
      </div>
      <!--/.Copyright-->
  
    </footer>
    <!--/.Footer-->


        <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                <div class="modal-body">
                   {{-- <div id="onLoadData"></div> --}}
                   <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf

                             <div class='col-xs-6 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control'  type='text'>
                            </div>

                             <div class='col-xs-6 form-group required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'


                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        {{-- <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div> --}}

                        <input class='form-control packageId' name="package_id" type='hidden'>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg btn-block paynow" type="submit">  Pay Now ($<span>100</span>)  </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>

        @endsection

        @section('js')

       <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

        <script type="text/javascript">
          var package_id = '';
          var price = 0;
          $('.custom-control-input').change(function() {
                  if($(this).is(":checked")) {
                        package_id = $(this).val();
                        price = $(this).attr('data-price');
                      //console.log(package_id);
                      //$(this).attr("checked", returnVal);
                  }
                  $('#textbox1').val($(this).is(':checked'));
              });
            function checkout($url) {
               // var data = $("#auditLogForm").serialize();
                    console.log(package_id);
                   var data = {
                          'package_id':package_id
                     };
                $.ajax(
                        {
                            type: 'GET',
                            url: $url,
                            data: data,
                            //datatype: json,
                            success: function(data) {
                              console.log(data);
                                //$("#onLoadData").html(data);
                                if($url == 'checkpout-paypal'){
                                    window.location.href = data;
                                }else{
                                    $("#onLoadData").html(data);
                                    $('#myModal').modal('show');
                                }

                             }
                        }
                );
            }

            $('#card-button').click( function (){
              console.log(package_id);
                $('.paynow span').text(price);
                $('.packageId').val(package_id);
            });

          //  window.onload = checkout;

           $(function() {
              var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
               var $form         = $(".require-validation"),
                  inputSelector = ['input[type=email]', 'input[type=password]',
                                  'input[type=text]', 'input[type=file]',
                                  'textarea'].join(', '),
                  $inputs       = $form.find('.required').find(inputSelector),
                  $errorMessage = $form.find('div.error'),
                  valid         = true;
                  $errorMessage.addClass('hide');

                  $('.has-error').removeClass('has-error');
              $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                  $input.parent().addClass('has-error');
                  $errorMessage.removeClass('hide');
                  e.preventDefault();
                }
              });

              if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                  number: $('.card-number').val(),
                  cvc: $('.card-cvc').val(),
                  exp_month: $('.card-expiry-month').val(),
                  exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
              }

            });

            function stripeResponseHandler(status, response) {
                  if (response.error) {
                      $('.error')
                          .removeClass('hide')
                          .find('.alert')
                          .text(response.error.message);
                  } else {
                      // token contains id, last4, and card type
                      var token = response['id'];
                      // insert the token into the form so it gets submitted to the server
                      $form.find('input[type=text]').empty();
                      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                      $form.get(0).submit();
                  }
              }

          });
      </script>

        @stop
