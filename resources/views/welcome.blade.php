 @extends('layouts.app')
    @include('layouts.partial.nav')

      @section('content')
            <div class="container mt-5">
            <div class="row">
            <div class="col-md-12">
                <!-- Classic tabs -->
                <div class="classic-tabs">

                <ul class="nav tabs-cyan" id="myClassicTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  waves-light active show" id="profile-tab-classic" data-toggle="tab" href="#profile-classic"
                    role="tab" aria-controls="profile-classic" aria-selected="true">Free</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab"
                    aria-controls="follow-classic" aria-selected="false">One-time purchase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab"
                    aria-controls="contact-classic" aria-selected="false">Monthly subscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab"
                    aria-controls="awesome-classic" aria-selected="false">Yearly subscription</a>
                </li>
                </ul>
                <div class="tab-content" id="myClassicTabContent">
                <div class="tab-pane fade active show" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic">
                <table class="table table-borderless"> 
                    <tbody>
                      @foreach( $data as $key=>$package)
                        @if($package->type == 'free')
                          <tr class="rows">
                            <th scope="row">
                              <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" value="{{ $package->id }}" name="groupOfDefaultRadios" checked>
                                  <label class="custom-control-label" for="defaultGroupExample{{ $key }}">{{ $package->query_limit }}</label>
                              </div>
                            </th>
                            <td>Queries</td>
                            <td>
                              @php $pakage_type = config('enums.packageType');  @endphp
                              @foreach ($pakage_type as $key=>$list)
                                @if($key == $package->type) {{ $list }} @endif
                              @endforeach
                            </td>
                            <td>$ {{ number_format($package->price, 2) }}</td>
                          </tr>
                          @endif
                        @endforeach 
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
                <table class="table table-borderless"> 
                    <tbody>
                      @foreach( $data as $key=>$package)
                        @if($package->type == 'fixed')
                          <tr class="rows">
                            <th scope="row">
                              <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" value="{{ $package->id }}" data-price="{{ $package->price }}" name="groupOfDefaultRadios" checked>
                                  <label class="custom-control-label" for="defaultGroupExample{{ $key }}">{{ $package->query_limit }}</label>
                              </div>
                            </th>
                            <td>Queries</td>
                            <td>
                              @php $pakage_type = config('enums.packageType');  @endphp
                              @foreach ($pakage_type as $key=>$list)
                                @if($key == $package->type) {{ $list }} @endif
                              @endforeach
                            </td>
                            <td>$ {{ number_format($package->price, 2) }}</td>
                          </tr>
                          @endif
                        @endforeach 
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
                <table class="table table-borderless"> 
                    <tbody>
                      @foreach( $data as $key=>$package)
                        @if($package->type == 'monthly')
                          <tr class="rows">
                            <th scope="row">
                              <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" value="{{ $package->id }}" data-price="{{ $package->price }}" name="groupOfDefaultRadios" checked>
                                  <label class="custom-control-label" for="defaultGroupExample{{ $key }}">{{ $package->query_limit }}</label>
                              </div>
                            </th>
                            <td>Queries</td>
                            <td>
                              @php $pakage_type = config('enums.packageType');  @endphp
                              @foreach ($pakage_type as $key=>$list)
                                @if($key == $package->type) {{ $list }} @endif
                              @endforeach
                            </td>
                            <td>$ {{ number_format($package->price, 2) }}</td>
                          </tr>
                          @endif
                        @endforeach 
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
                <table class="table table-borderless"> 
                    <tbody>
                      @foreach( $data as $key=>$package)
                        @if($package->type == 'yearly')
                          <tr class="rows">
                            <th scope="row">
                              <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" value="{{ $package->id }}" data-price="{{ $package->price }}" name="groupOfDefaultRadios" checked>
                                  <label class="custom-control-label" for="defaultGroupExample{{ $key }}">{{ $package->query_limit }}</label>
                              </div>
                            </th>
                            <td>Queries</td>
                            <td>
                              @php $pakage_type = config('enums.packageType');  @endphp
                              @foreach ($pakage_type as $key=>$list)
                                @if($key == $package->type) {{ $list }} @endif
                              @endforeach
                            </td>
                            <td>$ {{ number_format($package->price, 2) }}</td>
                          </tr>
                          @endif
                        @endforeach 
                    </tbody>
                    </table>
                </div>
                </div>

                </div>
                <div class="text-center">
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons --> 
                {{-- <button type="button" class="btn btn-warning" id="card-button" onclick="checkout('checkpout-strip')">Buy With Credit Card</button> --}}
                <button type="button" class="btn btn-warning" id="card-button" data-toggle="modal" data-target="#myModal">Buy With Credit Card</button>
                    <span>Or</span>
                <!-- Default button -->
                <button type="button"  onclick="checkout('checkpout-paypal')" class="btn btn-warning">Buy With Paypal</button>
                </div>
                <!-- Classic tabs -->
                </div>
                </div>
            </div>
        </div>


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
              alert('sadds');
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