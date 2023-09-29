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
        @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}
            </label>
        @endforeach
        <br>
        <button class="btn btn-primary" id="applyFilter">Применить</button>
    </form>
    <div id="filteredResults">
        <!-- Filtered results will be displayed here -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#applyFilter').click(function() {
                var selectedCategories = $('input[name="categories[]"]:checked').map(function() {
                    return $(this).val();
                })
                // Send an AJAX GET request to the Laravel API
                $.ajax({
                    url: '/api/filter/' + selectedCategories,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Handle the success response
                        var filteredData = response.filteredData;

                        // Update the filtered results div with the new data
                        $('#filteredResults').html(renderFilteredData(filteredData));
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });

                // Update the URL without page reload
                history.pushState(null, null, '/platnie/' + selectedCategories);

                // Prevent the default form submission
                return false;
            });
        });

        function renderFilteredData(data) {
            // Implement logic to render the filtered data as HTML
            // You can use templates or generate HTML dynamically
            // Return the HTML content
        }
    </script>
@endpush
