
 @extends('layouts.app')
 @include('layouts.partial.nav')

   @section('content')
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
            <div class="col-md-12 mb-4 white-text text-center text-md-left">

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12 m-t-5">
                          <form class="form-inline md-form mr-auto mb-4" id="domainSearchForm">
                            <input class="form-control mr-sm-12" type="text" name="s" placeholder="Search" aria-label="Search">
                            <input  type="hidden" name="api_key"  value="at_7OPkdPOlNbNr" aria-label="Search">
                            <input  type="hidden" name="auth_token"  value="auth_7OPkdPOlNbNu" aria-label="Search">
                            <button class="btn aqua-gradient btn-rounded btn-lg my-0" onclick="search()" type="button">Search Domain</button> 
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
                                      
                $.ajax(
                        {
                            type: 'GET',
                            url: '/domain-search',
                            data: data,
                            //datatype: json,
                            success: function(data) {
                                $("#onLoadData").html(data);
                               // displayDatatable();
                            }
                        }
                );
            }

            // window.onload = search;
     </script>

     @stop
