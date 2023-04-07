@include('Resources.Header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Pending  Installments</h4>
            </div>
            <div class="card-body">
                @if ($error)
                    <div class="alert alert-{{ $type }} alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {!! $message !!}
                        </div>
                    </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-{{session()->get('type')}} alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>{!!session()->get('error')!!}
                    </div>
                </div>
            @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Customer Deatils</th>
                                <th>Installment No</th>
                                <th>Account No</th>
                                <th>Date Of Installment (Y-M-D)</th>
                                <th>Installment Amount</th>
                                <th>Status</th>
                                <th>Print</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($installment as $Installments)
                                <tr>
                                    <td> <a href="{{url('/DownloadCustomerDetails')}}/{{ $Installments->Customer_ID }}" class="btn btn-icon btn-info"><i
                                                class="far fa-user"></i></a>
                                    </td>

                                    <td>{{ $Installments->ID }}</td>
                                    <td>{{ $Installments->Customer_ID }}</td>
                                    <td>{{ $Installments->Date }}</td>
                                    <td>{{ $Installments->Installment_Amount }}</td>

                                    <td>
                                        @if ($Installments->Status == 0)
                                            <a href="{{ url('/InstallmentStatus') }}/{{ $Installments->ID }}/1/{{ $Installments->Customer_ID }}"
                                                class="btn btn-danger">Unpaid</a>
                                        @endif
                                        @if ($Installments->Status == 1)
                                            <a href="{{ url('/InstallmentStatus') }}/{{ $Installments->ID }}/0/{{ $Installments->Customer_ID }}"
                                                class="btn btn-success">paid</a>
                                        @endif

                                    </td>


                                    <td>
                                        @if ($Installments->Status == 1)
                                            <a href="{{ url('/DownloadinstallDetails') }}/{{ $Installments->ID }}"
                                                class="btn btn-success">Print Receipt</a>
                                        @endif
                                    </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Resources.Footer')
