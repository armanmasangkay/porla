
@extends('web.layout.web')

@section('title', 'Ingredients Stocks')

@include('web.templates.navbar')

@section('content')
    <div class="row mt-5 pt-3">
        <div class="col-md-12">
            <h4 class="h3 mb-3 table-title">INGREDIENTS STOCKS LIST</h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 col-sm-12">
            <form action="" method="post" class="d-flex justify-content-start align-items-center MT-3">
                <div class="form-group">
                    <label for="filter" class="me-1">SEARCH : </label>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Ingredients name ...">
                </div>
                <button type="submit" class="btn btn-primary ms-1">FILTER</button>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end align-items-center">
            <button class="btn btn-secondary mb-md-0 mb-sm-2 mb-2">ADD INGREDIENT</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td class="border-bottom-0">INGREDIENTS</td>
                            <td class="border-bottom-0">STOCKS</td>
                            <td class="border-bottom-0">MEASUREMENT</td>
                            <td class="border-bottom-0">TOTAL PURCHASED</td>
                            <td class="border-bottom-0">ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ingredients as $ingredient)
                            <tr>
                                <td>{{ $ingredient->name }}</td>
                                <td>{{ $ingredient->stocks }}</td>
                                <td>{{ $ingredient->measurement }}</td>
                                <td>{{ $ingredient->total_purchased }}</td>
                                <td></td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center border-top border-bottom-0">No ingredients added yet!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection