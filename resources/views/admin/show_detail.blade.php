<!DOCTYPE html>
<html lang="en">
  <head>
    <base href ="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
    @include('admin.header')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <div class="div_center">

            <h2 class ="h2_font"> All details of {{$product->name}} </h2>

                <table class="center">
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Language</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    @foreach($detail as $detail)
                        <tr>
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->type}}</td>
                            <td>{{$detail->value}}</td>
                            <td>{{$detail->language}}</td>
                            <td>
                                @if($detail->is_active == 1)
                                    <span class="icon-center">
                                    <span class="iconify" data-icon="fa6-solid:check" style="color: green;"data-width="20" data-height="20"></span>
                                    </span>
                                @else
                                    <span class="icon-center">
                                    <span class="iconify" data-icon="charm:cross" style="color: red;"data-width="25" data-height="25"></span>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a style="margin-bottom:10px;"class ="btn btn-primary"href="{{url('update_detail', $detail->id)}}">Edit</a><br>
                                <a onclick="confirmation(event)" class ="btn btn-danger" href="{{url('delete_detail', $detail->id)}}">Delete</a>
                        </tr>
                    @endforeach

                </table>
        </div>
        </div>
    </div>
    <script>
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            Swal.fire({

                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your product has been deleted.',
                        'success'
                    )
                    // Redirect to the URL
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->

  </body>
        
</html>