@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  @if (Helper::isRole('superadmin'))
  <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
    <a href="{{ route('agents.index') }}">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              {{-- <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded"> --}}
              <i class="bx bx-user text-info fs-2"></i>
            </div>
            {{-- <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                </div>
              </div> --}}
          </div>
          <span class="fw-semibold d-block mb-1 text-secondary">Total Agents</span>
          <h3 class="card-title mb-2">{{ $agentCount??"" }}</h3>
          {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +72.80%</small> --}}
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
    <a href="{{ route('agents_packages.index') }}">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              {{-- <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded"> --}}
              <i class="bx bx-package text-danger fs-2"></i>
            </div>
            {{-- <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                </div>
              </div> --}}
          </div>
          <span class="fw-semibold d-block mb-2 text-secondary">Total Packages</span>
          <h3 class="card-title text-nowrap mb-1">{{ $packageCount??'' }}</h3>
          {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.42%</small> --}}
        </div>
      </div>
    </a>
  </div>
  @endif
</div>
@if (session('status'))
<script>
  deleteSuccessAlert['text'] = 'Logged in successfully!';
  Swal.fire(deleteSuccessAlert);
</script>
@endif
@endsection