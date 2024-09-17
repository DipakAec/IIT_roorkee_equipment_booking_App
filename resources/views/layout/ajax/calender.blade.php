<table class="table table-bordered dataTable calenderTable" id="dataTable" width="100%" cellspacing="0" role="grid"
    aria-describedby="dataTable_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.2px;">
                Record ID</th>
            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.2px;">
                Day</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                aria-label="Position: activate to sort column ascending" style="width: 296.2px;">Status</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                aria-label="Age: activate to sort column ascending" style="width: 66.2px;">Delete</th>
        </tr>
    </thead>

    <tbody>
        <p></p>
        @isset($equipment->records)
            @foreach ($equipment->records as $record)
                <tr class="odd">
                    <td class="sorting_1">{{ $record->id }}</td>
                    <td>{{ $record->day }}</td>
                    <td>{{ $record->status }}</td>
                    <td><a href="" id="deleteCalender">Delete</a></td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
