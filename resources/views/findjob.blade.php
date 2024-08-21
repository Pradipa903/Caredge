@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <style>
        .container {
            max-width: 600px;
        }
        .selected-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .remove-button {
            margin-left: 10px;
            cursor: pointer;
            color: red;
        }
    </style>
</head>
<body>
    <p>.</p>
    <h1 class="mt-5">Find Job</h1>
    <form action="{{ route('recommendations.save') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="form-group">
                <input type="text" id="searchMajors" name="searchMajors" placeholder="Input Majors" class="form-control" />
                <div id="selectedMajors"></div>
                <input type="hidden" name="selectedMajors" id="selectedMajorsInput">
            </div>
        </div>
        <div class="container mt-5">
            <div class="form-group">
                <input type="text" id="searchSkills" name="searchSkills" placeholder="Input Skills" class="form-control" />
                <div id="selectedSkills"></div>
                <input type="hidden" name="selectedSkills" id="selectedSkillsInput">
            </div>
        </div>

            <button class="btn btn-primary w-100 py-2 mt-5" type="submit"><a href="/recommendation"></a>Find Job </button>

    </form>

    <script type="text/javascript">
        function initializeAutocomplete(inputId, displayDivId, hiddenInputId, route) {
            var selectedItems = [];
            $('#' + inputId).typeahead({
                source: function (query, process) {
                    return $.get(route, { query: query }, function (data) {
                        return process(data);
                    });
                },
                afterSelect: function (item) {
                    if (!selectedItems.includes(item.name)){
                        selectedItems.push(item.name); // Assuming 'name' is the property to display
                        displaySelectedItems(displayDivId, selectedItems, hiddenInputId);
                        $('#' + inputId).typeahead('val', ''); // Clear the input
                    }
                }
            });
        }

        function displaySelectedItems(displayDivId, items, hiddenInputId) {
            var displayDiv = $('#' + displayDivId);
            displayDiv.empty();
            items.forEach(function (item, index) {
                var itemDiv = $('<div>').addClass('selected-item').text(item);
                var removeButton = $('<span>').addClass('remove-button').text('Remove').on('click', function () {
                    items.splice(index, 1);
                    displaySelectedItems(displayDivId, items, hiddenInputId);
                });
                itemDiv.append(removeButton);
                displayDiv.append(itemDiv);
            });
            $('#' + hiddenInputId).val(items.join(',')); // Store selected items in hidden input
        }

        initializeAutocomplete('searchSkills', 'selectedSkills', 'selectedSkillsInput', "{{ url('autocomplete-skills') }}");
        initializeAutocomplete('searchMajors', 'selectedMajors', 'selectedMajorsInput', "{{ url('autocomplete-majors') }}");
    </script>
</body>
</html>
@endsection
