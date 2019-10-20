 @extends('layouts.app');
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
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" name="groupOfDefaultRadios" checked>
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
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" name="groupOfDefaultRadios" checked>
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
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" name="groupOfDefaultRadios" checked>
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
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample{{ $key }}" name="groupOfDefaultRadios" checked>
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
                <button type="button" class="btn btn-warning">Buy With Credit Card</button>
                    <span>Or</span>
                <!-- Default button -->
                <button type="button" class="btn btn-warning">Buy With Paypal</button>
                </div>
                <!-- Classic tabs -->
                </div>
                </div>
            </div>
        </div>
        @endsection
      
