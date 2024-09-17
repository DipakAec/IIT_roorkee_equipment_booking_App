<div class="row">
    <div class="mb-3 col-md-2">
        <label for="date" class="form-label">Add Date</label>
        <input type="date" id="datePicker" class="form-control" name="date"
            value="{{ old('date', $equipment->date ?? '') }}" required>
        <div class="text-danger date-error"></div>
    </div>
    <div class="mb-3 col-md-3">
        <label for="timings" class="form-label">Select Timings</label>
        <select name="timings" class="form-select" id="timings" aria-label="Default select example" required>
            <option value="" selected disabled>Select Timings</option>
            <option value="9:30 AM - 11:00 AM">9:30 AM - 11:00 AM</option>
            <option value="11:30 AM - 1:00 PM">11:30 AM - 1:00 PM</option>
            <option value="2:00 PM - 3:30 PM">2:00 PM - 3:30 PM</option>
            <option value="4:00 PM - 5:30 PM">4:00 PM - 5:30 PM</option>
            <option value="5:45 PM - 7:15 PM">5:45 PM - 7:15 PM</option>
            <option value="7:30 PM - 9:00 PM">7:30 PM - 9:00 PM</option>
        </select>
        <div class="text-danger timings-error"></div>
    </div>
    <div class="mb-3 col-md-3">
        <label for="day" class="form-label">Day</label>
        <select name="day" class="form-select" id="day" aria-label="Default select example" required>
            <option value="" selected disabled>Select Day</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        <div class="text-danger day-error"></div>
    </div>
    <div class="col-md-2">
        <label for="status" class="form-label">Status</label>
        <select name="status_calender" class="form-select" id="status_calender" aria-label="Default select example" required>
            <option value="" selected disabled>Select Status</option>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
            <option value="Booked">Booked</option>
            <option value="Public Holiday">Public Holiday</option>
        </select>
        <div class="text-danger status-error"></div>
    </div>

    <div class="col-md-2" id="holiday_name_div" >
        <label for="status" class="form-label">Holiday Name</label>
        <input type="text" class="form-control" name="holiday_name" id="holiday_name" required>
        <div class="text-danger holiday_name-error"></div>
    </div>

    <div class="col-md-2 d-flex justify-content-center align-items-center">
        <a href="#" id="AddContent" class="mt-3 btn btn-primary w-100">Add</a>
    </div>
</div>
