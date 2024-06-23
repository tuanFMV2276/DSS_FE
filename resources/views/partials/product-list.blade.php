<!-- resources/views/partials/product-list.blade.php -->
<table border="1" data-status="products">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Main Diamond ID</th>
            <th>Image</th>
            <th>Extra Diamond ID</th>
            <th>Number Ex Diamond</th>
            <th>Diamond Shell ID</th>
            <th>Size</th>
            <th>Price Rate</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productsPaginated as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['product_code'] }}</td>
                <td>{{ $product['product_name'] }}</td>
                <td>{{ $product['main_diamond_id'] }}</td>
                <td><img src="{{ $product['image'] }}" alt="Product Image" width="50"></td>
                <td>{{ $product['extra_diamond_id'] }}</td>
                <td>{{ $product['number_ex_diamond'] }}</td>
                <td>{{ $product['diamond_shell_id'] }}</td>
                <td>{{ number_format($product['size'], 2) }}</td>
                <td>{{ number_format($product['price_rate'], 2) }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>{{ $product['status'] }}</td>
                <td>
                    <a href="{{ route('manager.editProduct', $product['id']) }}" style="display:inline-block;">
                        <button type="button" class="update-st">Update</button>
                    </a>
                    <form action="{{ route('manager.destroyProduct', $product['id']) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="more-margintop delete-st">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{ $productsPaginated->links() }}
</div>
