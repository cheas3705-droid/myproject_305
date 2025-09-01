@extends("layouts.app")

@section("title", "Category-List")

@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="">
            <div class="mt-3 d-flex">
                <a href="{{ route('category.create') }}" class="btn btn-primary">បង្កើតថ្មី</a>
                <input type="search" class="form-control w-50 ">
            </div>

            <table class="table table-hover">
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
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->note }}</td>
                                <td class="d-flex ">
                                    <div class="mx-2">
                                        <a href="" class=""><i class="fa-solid fa-display"></i></a>
                                    </div>
                                    <div class="mx-2">
                                        <a href="" class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="cursor-pointer mx-2">
                                        <form class="" action="" method="">
                                            @csrf
                                            <i class="fa-solid fa-trash" style="color: red"></i>
                                        </form>
                                    </div>
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
</html>
@endsection
