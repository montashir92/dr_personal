<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin Dashboard</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/medium-editor/default.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.css') }}">

    <!-- Sweetalert -->
    <script src="{{ asset('backend') }}/js/sweetalert.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('backend') }}/css/sweetalert.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.partials.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.partials.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      
    @yield('admin_content')


    @include('backend.partials.footer')
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>

    
    <!-- Sweet Alert Delete Post method -->
    <script type="text/javascript">
          $(document).ready(function(){
            $(document).on('click', '#delete', function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

              swal({
                title: "Are You Sure?",
                type: "success",
                showCancelButton: true,
                confirmButtonClass: 'btn-success',
                confirmButtonText: 'Yes',
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
              },
            function(isConfirm){
              if (isConfirm) {
                $.ajax({
                  url:actionTo,
                  type: 'post',
                  data: {id:id, _token:token},
                  success: function(data){
                    swal({
                      title: "Deleted!",
                      type: "success"
                    },
                    function(isConfirm){
                      if (isConfirm) {
                        $('.' + id).fadeOut();
                      }
                    });
                  }
                });
              }else{
                swal("Cancelled", "", "error");
              }
            });
              return false;
            });
          });
        </script>

    <script>
        $(function() {
            'use strict';
            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })
            $('#summernote2').summernote({
                height: 150,
                tooltip: false
            })

            $('#summernote3').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

      });
    </script>

          <script>
            $(function(){

              $('.select2').select2({
                minimumResultsForSearch: Infinity
              });

              // Select2 by showing the search
              $('.select2-show-search').select2({
                minimumResultsForSearch: ''
              });

              // Select2 with tagging support
              $('.select2-tag').select2({
                tags: true,
                tokenSeparators: [',', ' ']
              });

            });
          </script>

    <script src="{{ asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('backend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ asset('backend/js/starlight.js') }}"></script>

    <script src="{{ asset('backend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('backend/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type ="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>

    @yield('admin_script')

    

  </body>
</html>
