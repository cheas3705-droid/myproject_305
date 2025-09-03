@extends("layouts.app")
@section("title", "- Category-List")
@section("content")
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

        <!-- Create Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">បញ្ចូលប្រភេទផលិតផល</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryname" class="form-label">ឈ្មោះ​ប្រភេទផលិតផល</label>
                                <input type="text" class="form-control" id="categoryname" name="category_name" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="categoryname" class="form-label">ឈ្មោះ​ប្រភេទផលិតផល</label>
                                <input type="text" class="form-control @error('category_name')
                                    is-invalid
                                @enderror" id="categoryname" name="category_name" value="{{ old('category_name') }}" required>
                                @error('category_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="note" class="form-label">សម្គាល់</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> បិទ</button>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> បន្ថែម</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">កែប្រែប្រភេទផលិតផល</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editCategoryName" class="form-label">ឈ្មោះ​ប្រភេទ</label>
                                <input type="text" name="category_name" id="editCategoryName" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="editNote" class="form-label">សម្គាល់</label>
                                <input type="text" name="note" id="editNote" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> បិទ</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> រក្សាទុក</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-plus"></i> បង្កើតថ្មី
                </button>
            </div>
            <form action="{{ route('category.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control w-100" placeholder="ស្វែងរក..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary ms-2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
            <table class="table table-dark mt-3">
                <thead>
                    <tr>
                        <th>លេខរៀង</th>
                        <th>ឈ្មោះប្រភេទផលិតផល</th>
                        <th>សម្គាល់</th>
                        <th>សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr class="table-light" style="font-family: battambang; font-size: 18px;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->note }}</td>
                                <td class="d-flex ">
                                    <div class="mx-2">
                                        <a href="" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-display" style="color: blue"></i></a>
                                    </div>
                                    <div class="mx-2">
                                        <button
                                            class="btn btn-sm btn-outline-primary btn-edit"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->category_name }}"
                                            data-note="{{ $category->note }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal"
                                        >
                                            <i class="fa-solid fa-pen-to-square" style="color: green"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline delete-form mx-2">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm btn-outline-secondary btn-delete">
                                            <i class="fa-solid fa-trash" style="color: red"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">មិនមានទិន្នន័យទេ!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('#categoryname').on('input', function () {
            const input = $(this);
            const name = input.val().trim();

            // If input is empty, clear errors immediately
            if (name === '') {
                setValid(input);
                return;
            }
            $.post("{{ route('category.checkName') }}", {
                category_name: name,
                _token: "{{ csrf_token() }}"
            })
            .done(function(response) {
                setValid(input);
            })
            .fail(function(xhr) {
                // Get error message from Laravel validation response or fallback message
                const msg = xhr.responseJSON?.errors?.category_name?.[0] || 'ឈ្មោះនេះមានរួចហើយ។';
                setInvalid(input, msg);
            });
        });

        function setInvalid(input, message) {
            input.addClass('is-invalid');
            input.siblings('.invalid-feedback').text(message);  // Using siblings() since your structure has invalid-feedback as sibling
        }

        function setValid(input) {
            input.removeClass('is-invalid');
            input.siblings('.invalid-feedback').text('');
        }
    });

    // Delete
    $(document).on('submit', '.delete-form', function(e) {
        e.preventDefault(); // ❌ កុំអោយ form submit ភ្លាម

        const form = $(this);
        const actionUrl = form.attr('action');

        Swal.fire({
            title: 'តើអ្នកពិតជាចង់លុបមែនទេ?',
            text: "មិនអាចត្រឡប់វិញបានទេ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'លុប',
            cancelButtonText: 'បោះបង់',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                // ✅ បន្ទាប់ពីយល់ព្រម THEN ទើបធ្វើ AJAX
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                        });
                        form.closest('tr').remove();
                    },
                    error: function(xhr) {
                        let message = 'មានបញ្ហាក្នុងការលុប';
                        if (xhr.responseJSON?.message) {
                            message = xhr.responseJSON.message;
                        }
                        Swal.fire('បរាជ័យ!', message, 'error');
                    }
                });
            }
        });
    });

    // Edit
    $('#editModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id = button.data('id');
        const name = button.data('name');
        const note = button.data('note');

        // Set form action
        $('#editForm').attr('action', `/category/${id}`);

        // Fill input fields
        $('#editCategoryName').val(name);
        $('#editNote').val(note);
    });

</script>
</html>
@endsection
