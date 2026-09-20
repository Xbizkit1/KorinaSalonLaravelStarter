@extends('layouts.app')
@section('title', 'Schedule · Korina Salon')
@section('content')
<p class="page-kicker">Team calendar</p><h1>Staff schedule</h1><p class="page-subtitle">Peak shifts make holiday and special-occasion coverage visible.</p>
<div class="card table-card"><table><tr><th>Date</th><th>Staff member</th><th>Start</th><th>End</th><th>Status</th></tr>@forelse($schedules as $shift)<tr><td>{{ $shift->shift_date }}</td><td>{{ $shift->staff->name }}</td><td>{{ $shift->shift_start }}</td><td>{{ $shift->shift_end }}</td><td><span class="badge">{{ $shift->status }}</span></td></tr>@empty<tr><td colspan="5">No shifts scheduled.</td></tr>@endforelse</table></div>
@endsection
