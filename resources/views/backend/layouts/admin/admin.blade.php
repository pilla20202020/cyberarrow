<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">



    <!-- jquery.vectormap css -->

    <link rel="stylesheet" href="{{asset('backend/assets/libs/morris.js/morris.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css ')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    @stack('styles')


</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">


        @if (auth()->guest())
            @yield('guest')
        @else
            <!-- BEGIN HEADER -->
            @include('backend.layouts.admin.header')

            @include('backend.layouts.admin.sidebar')

            <!-- END HEADER -->
            <!-- BEGIN BASE -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>

            </div>
            <!-- END BASE -->
        @endif

       <!-- END BASE -->

    </div>

       <!-- BEGIN JAVASCRIPT -->
        <script src="{{ asset('backend/assets/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>

        <script src="{{asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{asset('backend/assets/libs/morris.js/morris.min.js') }}"></script>

        <script src="{{asset('backend/assets/libs/raphael/raphael.min.js') }} "></script>

        <script src=" {{asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src=" {{asset('backend/assets/js/app.js') }}"></script>

		<!-- END JAVASCRIPT -->
		<script>

			$(document).ready(function(){
				$('#album_id').on('change', function() {
				if ( this.value == 10)
				{
					$("#videourl").show();
					$("#imageupload").hide();

				}
				else
				{
					$("#videourl").hide();
					$("#imageupload").show();

				}
				});
			});
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
		<!-- <script  >
			$(document).ready(function () {


				$(function () {
					$('.my-ckeditor').each(function (e) {
						CKEDITOR.replace(this.id, {

							filebrowserUploadMethod: 'form'
						});
					});
				});
			});

    </script> -->

@stack('scripts')

</body>
</html>
