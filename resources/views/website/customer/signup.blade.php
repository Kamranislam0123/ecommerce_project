@extends('layouts.website')
@section('website-content')

<section class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="card px-5 py-3">
                    <div class="">
                        <h3 class="text-center text-success text-uppercase">Customer Sign-Up</h3>
                    </div>

                    <div class="card-body p-2">
                        <form action="{{ route('customerStore') }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- Left Section: First Name, Last Name, Email -->
                                <div class="col-md-6">
                                    <!-- First Name -->
                                    <div class="form-group p-1">
                                        <label for="input-firstname">First Name</label>
                                        <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First Name" id="input-firstname" class="form-control px-3 @error('firstname') is-invalid @enderror">
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Last Name -->
                                    <div class="form-group p-1">
                                        <label for="input-lastname">Last Name</label>
                                        <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" id="input-lastname" class="form-control px-3 @error('lastname') is-invalid @enderror">
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group p-1">
                                        <label for="input-email">E-Mail</label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail" id="input-email" class="form-control px-3 @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="input-telephone">Telephone</label>
                                        <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone" id="input-telephone" class="form-control px-3 @error('telephone') is-invalid @enderror">
                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Section: Telephone, District, Thana, Area, Address -->
                                <div class="col-md-6">
                                    <!-- Telephone -->


                                    <!-- District -->
                                    <div class="form-group p-1">
                                        <label for="district_id">District</label>
                                        <select name="district_id" id="district_id" class="form-control px-3 @error('district_id') is-invalid @enderror">
                                            <option value="">Select District</option>
                                            @foreach ($district as $item)
                                            <option value="{{ $item->id }}" {{ old('district_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Thana -->
                                    <div class="form-group p-1">
                                        <label for="thana_id">Thana</label>
                                        <select name="thana_id" id="thana_id" class="form-control px-3 @error('thana_id') is-invalid @enderror">
                                            <option value="">Select Thana</option>
                                            @foreach ($thana as $item)
                                            <option value="{{ $item->id }}" {{ old('thana_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('thana_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Area -->
                                    <div class="form-group p-1">
                                        <label for="area_id">Area</label>
                                        <select name="area_id" id="area_id" class="form-control px-3 @error('area_id') is-invalid @enderror">
                                            <option value="">Select Area</option>
                                            @foreach ($area as $item)
                                            <option value="{{ $item->id }}" {{ old('area_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('area_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group p-1">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control px-3 @error('address') is-invalid @enderror" rows="3" placeholder="Enter Address">{{ old('address') }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group py-3">
                                <button type="submit" class="btn btn-success w-100">Sign Up</button>
                            </div>

                            <!-- Login Link -->
                            <div class="text-center">
                                <a class="fs-9 fw-bold" href="{{ route('customer.login') }}">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('website-js')
<script type="text/javascript">
    console.log("Script Loaded");
    $(document).on("change", "#district_id", function() {
        var district_id = $("#district_id").val(); // Get the selected district_id
        console.log("Selected District ID: ", district_id); // Debugging to check if district_id is correct

        // Check if district_id is selected
        if (district_id != "") {
            // Make an AJAX request
            $.ajax({
                url: "{{ route('thana.change') }}", // Laravel route for fetching thana data
                type: "GET", // HTTP method
                data: {
                    district_id: district_id
                }, // Send the district_id to the server
                success: function(data) {
                    console.log("Thana Data Received: ", data); // Debugging: Log the received Thana data

                    var html = '<option value="">Select Thana</option>'; // Start with a default option
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>'; // Add each thana
                    });
                    $("#thana_id").html(html); // Populate the thana dropdown
                },
                error: function(xhr, status, error) {
                    // Log the error if the AJAX request fails
                    console.log("Error: ", error); // Debugging: Log the error message
                    console.log("Status: ", status); // Debugging: Log the status of the request
                    console.log("Response: ", xhr.responseText); // Debugging: Log the response from the server
                    alert('Error fetching thana data');
                }
            });
        } else {
            // If no district is selected, clear the thana dropdown
            $("#thana_id").html('<option value="">Select Thana</option>');
        }
    });
</script>


<script type="text/javascript">
    //  Get Subject Javascript
    $(document).on("change", "#thana_id", function() {
        var thana_id = $("#thana_id").val();

        $.ajax({
            url: "{{route('area.change')}}",
            type: "GET",
            data: {
                thana_id: thana_id
            },
            success: function(data) {
                var html = '<option value="">Select Area </option>';
                $.each(data, function(key, v) {
                    html += '<option value="' + v.id + '">' + v.name + ' </option>';
                });
                $("#area_id").html(html);
            }
        });


    });
</script>

@endpush
@endsection