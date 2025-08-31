@extends("layouts.app")
@section("title","Category-List")
@section("content")
<h2 class="alert alert-info text-center">Category List</h2>
<div class="container">
    <div class="mt-3">
        <a href="{{ route('category.create') }}" class="btn btn-primary">បង្កើតថ្មី</a>
    </div>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>លេខរៀង</th>
                <th>ឈ្មោះប្រភេទផលិតផល</th>
                <th>សម្គាល់</th>
                <th>សកម្មភាព</th>
            </tr>
        </thead>
        <tbody>
            @if (count($categories)>0)
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->note }}</td>
                        <td>
                            <input type="button" value="បង្ហាញ់" class="btn btn-primary">
                            <input type="button" value="កែប្រែ" class="btn btn-primary">
                            <input type="button" value="លុបចេញ" class="btn btn-danger">
                        </td>
                    </tr>

                @endforeach
            @else
                <tr><span>No Record!</span></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

