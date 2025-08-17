@extends('layouts.admin')
@section('title', 'Set Time')
@section('admin-content')
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('admin.index') }}">Home</a> > Delivery Times</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class=""><i class="fas fa-clock me-1"></i>Add Delivery Time</div>
                        </div>
                        <div class="card-body table-card-body">
                            <form action="{{ route('set-time.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong><label> Day</label> <span class="float-right">:</span></strong>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="group_id" id="" class="form-control" required>
                                            <option value="">Select Day</option>
                                            <option value="1">Saturday</option>
                                            <option value="2">Sunday</option>
                                            <option value="3">Monday</option>
                                            <option value="4">Tuesday</option>
                                            <option value="5">Wednesday</option>
                                            <option value="6">Thursday</option>
                                            <option value="7">Friday</option>
                                        </select>
                                        @error('group_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <strong><label> Set Time</label> <span class="float-right">:</span></strong>
                                    </div>
                                    <div class="col-md-9 mt-1" id="setTime">
                                        <div class="w-100 my-1" >
                                            <div class="input-group input-group-sm">
                                                <input type="time" name="time[]" class="form-control time-picker" step="900" required>
                                                <div class="input-group-append" onclick="add()">
                                                    <a href="javascript:void(0)" class="border rounded my-select  py-0 px-2"><i
                                                            class="fas fa-plus plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary float-right mt-2"
                                    value="Submit">Create</button>
                            </div>
                        </div>
                        </form>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-table me-1"></i>Delivery Days <a href=""
                                class="float-right"><i class="fas fa-print"></i></a></div>
                    </div>
                    <div class="card-body table-card-body p-3">
                        <table id="datatablesSimple" class="text-center">
                            <thead class="text-center bg-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Day</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($time as $key=> $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if($item->group_id == '1')
                                            Saturday
                                        @elseif($item->group_id == '2')
                                        Sunday
                                        @elseif($item->group_id == '3')
                                        Monday
                                        @elseif($item->group_id == '4')
                                        Tuesday
                                        @elseif($item->group_id == '5')
                                        Wednesday
                                        @elseif($item->group_id == '6')
                                        Thursday
                                        @else
                                        Friday
                                        @endif
                                       
                                    </td>
                                    <td>
                                        <a href="{{ route('set-time.show',$item->group_id) }}" class="btn btn-edit"><i class="fas fa-eye"></i></a>
                                        <button type="submit" class="btn btn-delete" onclick="deleteUser({{ $item->group_id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $item->group_id }}" action="{{ route('set-time.delete', $item->group_id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </main>
@endsection
@push('admin-js')

    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>
        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>

<script>
    var data = "";
   
    data = data + '<div class="w-100 my-1 add-remove-part">';
    data = data + '<div class="input-group input-group-sm">';
    data = data + '<input type="time" name="time[]" class="form-control time-picker" step="900" required>';
    data = data + '<div class="input-group-append remove-part"><a class="border btn rounded my-select  py-0 px-2"><i class="fas fa-minus minus"></i></a> </div>';
    data = data + '</div></div>';

    function add() {
        $("#setTime").append(data);
        // Initialize time picker for new elements
        initializeTimePickers();
    }

    $(document).on('click', '.remove-part', function() {
        console.log( $(this).parents('.add-remove-part'));
            $(this).parents('.add-remove-part').remove();
        })

    // Initialize time pickers
    function initializeTimePickers() {
        $('.time-picker').each(function() {
            $(this).on('change', function() {
                var timeValue = $(this).val();
                if (timeValue) {
                    // Convert 24-hour format to 12-hour format for display
                    var time = new Date('2000-01-01T' + timeValue);
                    var hours = time.getHours();
                    var minutes = time.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var timeString = hours + ':' + minutes + ' ' + ampm;
                    
                    // Show preview of selected time
                    $(this).attr('title', 'Selected: ' + timeString);
                }
            });
        });
    }

    // Initialize on page load
    $(document).ready(function() {
        initializeTimePickers();
        
        // Set default time to current time rounded to nearest 15 minutes
        var now = new Date();
        var minutes = Math.round(now.getMinutes() / 15) * 15;
        now.setMinutes(minutes);
        var timeString = now.getHours().toString().padStart(2, '0') + ':' + 
                        now.getMinutes().toString().padStart(2, '0');
        
        $('.time-picker').first().val(timeString);
    });
</script>

<style>
.time-picker {
    cursor: pointer;
}

.time-picker:hover {
    background-color: #f8f9fa;
}

.input-group-sm .time-picker {
    height: calc(1.5em + 0.5rem + 2px);
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

/* Custom time picker styling */
input[type="time"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}

.input-group {
    position: relative;
}
</style>
@endpush
