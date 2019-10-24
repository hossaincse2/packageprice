
 @extends('layouts.app')
 @include('layouts.partial.nav')

   @section('content')
   <div class="content">

       

      <!-- Mask & flexbox options-->
      <div class="justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

          <!--Grid row-->
          <div class="row justify-content-center align-items-center">

            <!--Grid column-->
            <div class="col-md-12 mb-4 white-text text-center text-md-left">

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12 mt-5">
                          <form class="form-inline md-form mr-auto mb-4" id="domainSearchForm" method="post">
                            @csrf
                            <input class="form-control mr-sm-12" type="text" name="s" placeholder="Search" aria-label="Search">
                          <input  type="hidden" name="api_key"  value="{{ base64_encode('at_7OPkdPOlNbNr') }}" aria-label="api_key">  <!--apikey and token need hidden so use base64-->
                            <input  type="hidden" name="auth_token"  value="{{ base64_encode('auth_7OPkdPOlNbNu') }}" aria-label="auth_token"> <!--apikey and token need hidden so use base64-->
                            <button class="btn aqua-gradient btn-rounded btn-lg my-0" onclick="search()" type="button">Search Domain</button> 
                          </form>
                          <div class="col-md-12">
                              <div id="onLoadData"></div>
                           </div>
                       </div>
                        
                   </div>
               </div>

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


     @endsection

     @section('js')
 
     <script type="text/javascript">
       function search() {
                var data = $("#domainSearchForm").serialize();
                var csrfToken = document.getElementsByName("_token")[0].value
                //console.log(csrfToken);
                                      
                $.ajax({
                          headers: {
                                'X-CSRF-Token': csrfToken
                            },
                            type: 'POST',
                            url: '/domain-search',
                            data: data,
                            //datatype: json,
                            success: function(data) {
                              //console.log(data.response);
                                $("#onLoadData").html("<pre>"+ data.response + "</pre>");
                               // displayDatatable();
                            }
                        });
            }

            // window.onload = search;
     </script>

     @stop
