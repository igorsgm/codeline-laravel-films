<table class="table table-responsive" id="countries-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{!! $country->name !!}</td>
            <td>{!! $country->code !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>