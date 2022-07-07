@include('includes.header')

            <!-- /sidebar menu -->
            @include('includes.sidebar')
          </div>
        </div>

@include('includes.topnav')

        <!-- page content -->
        <div class="right_col" role="main">
         {{$slot}}
        </div>
          <!-- /top tiles -->

        </div>
        <!-- /page content -->
        @include('includes.footer')
