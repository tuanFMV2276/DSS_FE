{{-- <table class="table table-bordered">
    <thead>
        <tr>
            
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($customer as $n )
            <tr>
                <td>{{ $n['id']}}</td>
                <td>{{ $n['name']}}</td>
                <td>{{ $n['email']}}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}

<div>
    <p>Name: {{ $customer[1]['name'] }}</p>
    <p>Email: {{ $customer[1]['email'] }}</p>
    <!-- Display other properties as needed -->
    <p>Name: {{ $employee[1]['user_name'] }}</p>
    <p>Email: {{ $employee[1]['password'] }}</p>
</div>