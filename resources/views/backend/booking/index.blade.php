@extends('backend.layouts.admin.admin')

@section('title', 'Booking')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">Booking</header>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th width="5%">S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total No. Of People</th>
                            <th>Arrival Time</th>
                            <th>Arrival Date</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.booking.partials.table', $bookings, 'booking')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
    <style type="text/css">
        #accordion .card-head {
            cursor: n-resize;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush
