<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart['products'] as $product)
                            <tr>
                                <td class="col-4"><img class="img-fluid img-thumbnail w-50" src="{{ $product->image ? asset('/storage/' . $product->image) : 'https://picsum.photos/150/150' }}" alt="{{ $product->title }}"></td>
                                <td class="col-3">{{ $product->title }}</td>
                                <td class="col-3">Rp{{ number_format($product->price,2,",",".") }}</td>
                                <td class="col-3">
                                    <button wire:click="removeFromCart({{ $product->id }})" class="btn btn-sm btn-danger">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <a href="{{ route('shop.checkout') }}" class="btn btn-primary float-right">Checkout</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
