@extends('layouts.main')

@section('content')
  <div class="container">
    <h1 class="pt-5">Search Results</h1>
    @if($results->isEmpty())
      <p>No results found for "{{ request('query') }}"</p>
    @else
      <div class="row mt-4">
        @foreach($results as $result)
          <div class="col-md-4 mb-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $result->Job_title}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $result->company}}, {{ $result->location}}</h6>
                <p class="card-text flex-grow-1"><b>Skills Required :</b> {{ $result->skills_required}}</p>
                {{-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> --}}
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-center">
        {{ $results->appends(['query' => request('query')])->links() }} <!-- Pagination links with query parameter -->
      </div>
    @endif
  </div>
@endsection
