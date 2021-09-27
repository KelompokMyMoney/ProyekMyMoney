@extends('layouts.app')

@section('content')
<x-header title="All Transactions" showCreate="true" link="api/transactions/create" />
@include('layouts.session')
<table class="table table-striped table-hover mt-2 ml-2">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Budget</th>
            <th>Payment Via</th>
            <th>Category</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction->title }}</td>
            <td>{{ $transaction->budget->title }}</td>
            @forelse ($modes as $mode)
            @if ($transaction->mode_id == $mode->id)
            <td>{{ $mode->title }}</td>
            @break
            @endif
            @empty
            <td>-</td>
            @endforelse
            <td>{{ $transaction->category->title }}</td>
            <td class="format-amount" data-amount="{{ $transaction->amount }}"></td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No record found</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="ml-2 float-right">
    {{ $transactions->links() }}
</div>
@endsection

@section('script')
<script src="{{ asset('js/accounting.min.js') }}"></script>
@endsection