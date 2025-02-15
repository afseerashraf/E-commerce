@extends('layout.adminLayout')
@section('title')create products @endsection

@section('content')
<div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Table</h5>
            </div>
            <div class="card-body">
                <table class="table table-stripped datatable">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            const table = $('.datatable').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('products.index') }}"
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'categorie',
                        name: 'categorie',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

// Delete user
        $(document).on('click', '.delete-product', function() {
            const productId = $(this).data('id');
            
            if (productId) {
                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: `{{ url('products') }}/${productId}`, // Fixed URL interpolation
                        type: 'POST', // Use POST instead of DELETE for Laravel
                        data: {
                            _method: 'DELETE', // Required for Laravel
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                alert('product deleted successfully!');
                                table.ajax.reload(null, false); // Reload table data without full refresh
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(error) {
                            alert('Something went wrong');
                        }
                    });
                }
            }
            });
   

  

    
        

});
</script>

@endsection