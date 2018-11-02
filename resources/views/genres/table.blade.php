<table class="table table-responsive" id="genres-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Slug</th>
    </tr>
    </thead>
    <tbody>
    @foreach($genres as $genre)
        <tr>
            <td>{!! $genre->name !!}</td>
            <td>{!! $genre->slug !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>