@extends('layout')

@section('title', 'Home Page')

@section('content')
    <h3>Objects</h3>

    @foreach($products as $product)
        <a href="" class="link-dark">{{$product->name}}</a><br>
        @foreach($product->categories as $category)
            {{$category->name}}
        @endforeach
        <br>
    @endforeach

    <h3>Filter</h3>
    <form id="filterForm">
        @csrf
        @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}
            </label>
        @endforeach
        <br>
        <button type="button" class="btn btn-primary" id="applyFilter">Применить</button>
    </form>
    <div id="results">

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#applyFilter').click(function() {
                var formData = $('#filterForm').serialize();

                console.log(formData)

                $.ajax({
                    url: '/filter',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        var data = response.data;


                        var html = '<ul>';
                        data.forEach(function(item) {
                            html += '<li>ID: ' + item.id + ', Name: ' + item.name + '</li>';
                        });
                        html += '</ul>';
                        var selectedCategories = $('input[name="categories[]"]:checked').map(function() {
                            return $(this).textContent;
                        }).get();
                        var newUrl = '/' + selectedCategories.join('-');
                        history.pushState(null, null, newUrl);

                        $('#results').html(html);
                    },
                    error: function(error) {

                        console.error(error);
                    }
                });


                return false;
            });
        });
    </script>
@endpush
