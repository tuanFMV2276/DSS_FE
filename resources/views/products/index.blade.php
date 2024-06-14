<h1>Product List</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>

<table class="table">
    <thead>
        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Main Diamond</th>
            <th>Extra Diamond</th>
            <th>Number of Extra Diamonds</th>
            <th>Diamond Shell</th>
            <th>Size</th>
            <th>Price Rate</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->main_diamond->diamond_name }}</td>
                <td>{{ $product->extra_diamond->name }}</td>
                <td>{{ $product->number_ex_diamond }}</td>
                <td>{{ $product->diamond_shell->name }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->price_rate }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>