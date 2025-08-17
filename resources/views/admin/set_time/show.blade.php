@php
function formatTimeRange($timeString) {
    if (!$timeString) return '';
    
    // Check if it's a time range (contains '-')
    if (strpos($timeString, ' - ') !== false) {
        $times = explode(' - ', $timeString);
        $startTime = DateTime::createFromFormat('H:i', trim($times[0]));
        $endTime = DateTime::createFromFormat('H:i', trim($times[1]));
        
        if ($startTime && $endTime) {
            return $startTime->format('g:i A') . ' - ' . $endTime->format('g:i A');
        }
    }
    
    // Single time format
    $time = DateTime::createFromFormat('H:i', $timeString);
    if ($time) {
        return $time->format('g:i A');
    }
    
    return $timeString;
}
@endphp
@extends('layouts.admin')
@section('title', 'Show Time')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > <a href="{{route('set-time')}}">Delivery Times</a> > {{$dayName}}</span>
    </div>
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-clock me-1"></i>Delivery Times for {{$dayName}}</div>
                            <a href="{{route('set-time')}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-arrow-left"></i> Back to All Days
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        @if($time->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Time (24h)</th>
                                            <th>Time (12h)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($time as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <span class="time-display" data-id="{{$item->id}}">{{$item->time}}</span>
                                                <input type="time" class="form-control time-edit" data-id="{{$item->id}}" value="{{$item->time}}" style="display: none;" step="900">
                                            </td>
                                            <td>
                                                <span class="time-12h">{{formatTimeRange($item->time)}}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary edit-time-btn" data-id="{{$item->id}}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-success save-time-btn" data-id="{{$item->id}}" style="display: none;">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary cancel-edit-btn" data-id="{{$item->id}}" style="display: none;">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No delivery times set for {{$dayName}}</h5>
                                <p class="text-muted">Add delivery times from the main delivery times page.</p>
                            </div>
                        @endif
                    </div>
                </div>  
            </div>   
        </div>
    </div>
</main>        
@endsection
@push('admin-js')
<script>
$(document).ready(function() {
    // Edit time
    $('.edit-time-btn').on('click', function() {
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        
        row.find('.time-display').hide();
        row.find('.time-edit').show();
        row.find('.edit-time-btn').hide();
        row.find('.save-time-btn, .cancel-edit-btn').show();
    });

    // Save time
    $('.save-time-btn').on('click', function() {
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        var newTime = row.find('.time-edit').val();
        
        if (!newTime) {
            showNotification('Please select a valid time', 'error');
            return;
        }
        
        $.ajax({
            url: "{{route('set-time.update', '')}}/" + id,
            type: 'PUT',
            data: {
                _token: '{{csrf_token()}}',
                time: newTime
            },
            success: function(response) {
                if(response.success) {
                    row.find('.time-display').text(newTime).show();
                    row.find('.time-edit').hide();
                    row.find('.save-time-btn, .cancel-edit-btn').hide();
                    row.find('.edit-time-btn').show();
                    
                    // Update 12-hour format display
                    var time12h = formatTime12h(newTime);
                    row.find('.time-12h').text(time12h);
                    
                    showNotification(response.message, 'success');
                }
            },
            error: function() {
                showNotification('Failed to update time', 'error');
            }
        });
    });

    // Cancel edit
    $('.cancel-edit-btn').on('click', function() {
        var row = $(this).closest('tr');
        var originalTime = row.find('.time-display').text();
        
        row.find('.time-edit').val(originalTime);
        row.find('.time-display').show();
        row.find('.time-edit').hide();
        row.find('.save-time-btn, .cancel-edit-btn').hide();
        row.find('.edit-time-btn').show();
    });

    function showNotification(message, type) {
        // Create notification element
        var notification = $('<div class="alert alert-' + (type === 'success' ? 'success' : 'danger') + ' alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999;">' + 
                           message + 
                           '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
        $('body').append(notification);
        
        // Auto remove after 3 seconds
        setTimeout(function() {
            notification.alert('close');
        }, 3000);
    }
    
    function formatTimeRange(timeString) {
        if (!timeString) return '';
        
        // Check if it's a time range (contains '-')
        if (timeString.includes(' - ')) {
            var times = timeString.split(' - ');
            var startTime = formatTime12h(times[0].trim());
            var endTime = formatTime12h(times[1].trim());
            return startTime + ' - ' + endTime;
        }
        
        // Single time format
        return formatTime12h(timeString);
    }
    
    function formatTime12h(timeString) {
        if (!timeString) return '';
        
        // Convert 24-hour format to 12-hour format
        var time = new Date('2000-01-01T' + timeString);
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        return hours + ':' + minutes + ' ' + ampm;
    }
});
</script>
@endpush