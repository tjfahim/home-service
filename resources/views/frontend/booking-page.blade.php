@extends('frontend.layouts.master')

@section('content')
<!-- banner part start -->
<section class="pt-5 pb-5">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>{{ $service->title }}</h2>
                <p>Check out our availability and book the date and time that works for you</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('booking.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="services_id" value="{{ $service->id }}">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="date" class="form-control-label">Date:</label>
                                <input type="date" name="date" id="selectedDate" class="form-control" value="{{ old('date') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="time" class="form-control-label">Time:</label>
                                <select name="time" id="selectedTime" class="form-control" required>
                                    <option value="">Select Time</option>
                                    <option value="Shift 1: 12AM - 11.59AM">Shift 1: 12AM - 11.59AM</option>
                                    <option value="Shift 2: 12PM - 11.59PM">Shift 2: 12PM - 11.59PM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Full Name:</label>
                                <input type="text" name="name" id="fullName" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-control-label">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description:</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Service Details</h5>
                                    <p class="card-text"><strong>Name:</strong> {{ $service->title }}</p>
                                    <p class="card-text"><strong>Price:</strong> ${{ $service->price }}</p>
                                    <hr>
                                    <h5 class="card-title">Selected Booking Details</h5>
                                    <div id="bookingDetails">
                                        <p>Please select a date and time to see details.</p>
                                    </div>
                                    <hr>
                                    <h5 class="card-title">Total Price</h5>
                                    <p id="totalPrice">Total: ${{ number_format($service->price, 2) }}</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Script to Update Selected Booking Details -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('selectedDate');
        const timeInput = document.getElementById('selectedTime');
        const fullNameInput = document.getElementById('fullName');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const descriptionInput = document.getElementById('description');
        const bookingDetailsDiv = document.getElementById('bookingDetails');
        const totalPriceElement = document.getElementById('totalPrice');
        const servicePrice = {{ $service->price }};

        function updateBookingDetails() {
            const selectedDate = dateInput.value;
            const selectedTime = timeInput.value;
            const fullName = fullNameInput.value;
            const email = emailInput.value;
            const phone = phoneInput.value;
            const description = descriptionInput.value;

            bookingDetailsDiv.innerHTML = `
                <p><strong>Date:</strong> ${selectedDate}</p>
                <p><strong>Time:</strong> ${selectedTime}</p>
                <p><strong>Name:</strong> ${fullName}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>Description:</strong> ${description}</p>
            `;

            // Calculate and display total price
            totalPriceElement.textContent = `Total: $${(servicePrice).toFixed(2)}`;
        }

        // Add event listeners to update details on input change
        dateInput.addEventListener('change', updateBookingDetails);
        timeInput.addEventListener('change', updateBookingDetails);
        fullNameInput.addEventListener('input', updateBookingDetails);
        emailInput.addEventListener('input', updateBookingDetails);
        phoneInput.addEventListener('input', updateBookingDetails);
        descriptionInput.addEventListener('input', updateBookingDetails);

        // Initial update to show default text
        updateBookingDetails();
    });
</script>

@endsection
