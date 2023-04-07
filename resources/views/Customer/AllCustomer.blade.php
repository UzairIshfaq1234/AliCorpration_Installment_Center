@include('Resources.Header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Customer Details</h4>
            </div>
            <div class="card-body">
                @if ($error)
                    <div class="alert alert-{{ $type }} alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Account No</th>
                                <th>Price On Installment</th>
                                <th>(Monthly/Daily)Installment</th>
                                <th>Installment Start Date</th>
                                <th>Bailee 1 Name</th>
                                <th>Update Customer</th>
                                <th>Installments</th>
                                <th>Download Customer Details</th>
                                <th>Delete Customer</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $customers)
                                <tr>
                                    <td>{{$customers->F_Name}}</td>
                                    <td>{{$customers->Account_No}}</td>
                                    <td>{{$customers->Price_On_Installment}}</td>
                                    <td>{{$customers->Monthly_Daily_Installment}}</td>
                                    <td>{{$customers->Installment_Start_Date}}</td>
                                    <td>{{$customers->bailee_1_name}}</td>

                                    <td><a href="{{url('/UpdateCustomer')}}/{{ $customers->ID }}" class="btn btn-primary">Update</a></td>

                                    <td><a href="{{url('/Installment')}}/{{ $customers->ID }}" class="btn btn-success">Installments</a></td>


                                    <td><a href="{{url('/DownloadCustomerDetails')}}/{{ $customers->ID }}" class="btn btn-dark">Download</a></td>

                                    <td><a href="{{url('/AllCustomer')}}/{{ $customers->ID }}" class="btn btn-danger">Delete</a></td>

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
