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
        <!-- Filtered results will be displayed here -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#applyFilter').click(function() {
                var formData = $('#filterForm').serialize(); // Serialize the form data

                console.log(formData)
                // Send an AJAX POST request to a Laravel route or controller method
                $.ajax({
                    url: '/filter', // Replace with your Laravel route or controller method
                    type: 'POST', // Use POST or GET based on your route or method
                    data: formData,
                    success: function(response) {
                        var data = response.data;

                        // Iterate through the data and create HTML elements
                        var html = '<ul>';
                        data.forEach(function(item) {
                            html += '<li>ID: ' + item.id + ', Name: ' + item.name + '</li>';
                        });
                        html += '</ul>';
                        var selectedCategories = $('input[name="categories[]"]:checked').map(function() {
                            return $(this).textContent;
                        }).get();
                        var newUrl = '/' + selectedCategories.join('-'); // Customize the URL format as needed
                        history.pushState(null, null, newUrl);
                        // Display the HTML on your web page
                        $('#results').html(html);
                    },
                    error: function(error) {
                        // Handle any errors that occur during the request
                        console.error(error);
                    }
                });

                // Prevent the default form submission
                return false;
            });
        });
    </script>
@endpush
