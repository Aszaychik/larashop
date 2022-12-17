<div class="container">

    @if ($formVisible)
        @if (! $formUpdate)
            @livewire('product.create')
        @else
            @livewire('product.update')
        @endif
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p>Product</p>
                    <button wire:click="$toggle('formVisible')" class="btn btn-sm btn-primary">Create</button>
                </div>

                <div class="card-body">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="col">
                            <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
                        </div>
                    </div>

                    <hr>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($products as $product)
                            @php
                                $no++;
                            @endphp
                            <tr class="text-center">
                                <th class="col-1" scope="row">{{ $no }}</th>
                                <td class="col-4"><img class="img-fluid img-thumbnail w-50" src="{{ $product->image ? asset('/storage/' . $product->image) : 'https://picsum.photos/150/150' }}" alt="{{ $product->title }}"></td>
                                <td class="col-2 ">{{ $product->title }}</td>
                                <td class="col-2">Rp{{ number_format($product->price,2,",",".") }}</td>
                                <td class="col-3">
                                    <button wire:click="editProduct({{ $product->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                                    <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
