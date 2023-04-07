@include('Resources.Header')

<div class="card">
    <div class="card-header">
        <h4>Add Customer</h4>
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
        <form method="POST" action="{{ Route('add.customer') }}" enctype="multipart/form-data" class="needs-validation"
            novalidate="">
            @csrf

            <div class="form-group">
                <div class="card-body ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-dark text-white-all">
                            <li style="font-weight: bolder" class="breadcrumb-item">Customer Details</li>
                        </ol>
                    </nav>
                </div>

                <label>Account No <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Account_No" value="{{ old('Account_No') }}" required class="form-control">
                @error('Account_No')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">First Name <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="F_Name" value="{{ old('F_Name') }}" required class="form-control">
                @error('F_Name')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Last Name <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="L_Name" value="{{ old('L_Name') }}" required class="form-control">
                @error('L_Name')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Customer Cnic <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="Customer_Cnic" value="{{ old('Customer_Cnic') }}" required class="form-control">
                @error('Customer_Cnic')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <div class="form-group mt-3">
                    <label>Gender <span style="font-size:16px;color:red;">*</span></label>
                    <select name="Gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                @error('Gender')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Address <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="Address" value="{{ old('Address') }}" required class="form-control">
                @error('Address')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">City <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="City" value="{{ old('City') }}" required class="form-control">
                <div class="invalid-feedback">
                    @error('City')
                        {{ $message }}
                    @enderror
                </div>

                <label class="mt-3">Province <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="State" value="{{ old('State') }}" required class="form-control">
                @error('State')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Phone No (without Dashes) <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Phone" value="{{ old('Phone') }}" required class="form-control">
                @error('Phone')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Email <span style="font-size:16px;color:red;">*</span></label>
                <input type="email" name="Email" value="{{ old('Email') }}" required class="form-control">
                @error('Email')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Date of birth <span style="font-size:16px;color:red;">*</span></label>
                <input type="date" name="Date_Of_Birth" value="{{ old('Date_Of_Birth') }}" required
                    class="form-control">
                @error('Date_Of_Birth')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Received Items <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Received_Items" value="{{ old('Received_Items') }}" required
                    class="form-control">
                @error('Received_Items')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Price <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Price" value="{{ old('Price') }}" required class="form-control">
                @error('Price')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Price On Installment <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Price_On_Installment" value="{{ old('Price_On_Installment') }}" required
                    class="form-control">
                @error('Price_On_Installment')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Advance Amount <span style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Advance" value="{{ old('Advance') }}" required class="form-control">
                @error('Advance')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Installment Amount (Monthly/Daily) <span
                        style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="Monthly_Daily_Installment"
                    value="{{ old('Monthly_Daily_Installment') }}" required class="form-control">
                @error('Monthly_Daily_Installment')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Installment Starting Date <span
                        style="font-size:16px;color:red;">*</span></label>
                <input type="date" name="Installment_Start_Date" value="{{ old('Installment_Start_Date') }}"
                    required class="form-control">
                @error('Installment_Start_Date')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <div class="form-group">
                    <label>Customer Picture <span style="font-size:16px;color:red;">*</span></label>
                    <input type="file" class="form-control" name="Customer_Picture"
                        value="{{ old('Customer_Picture') }}" required>
                </div>
                @error('Customer_Picture')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror
                {{-- //####################### Balee 1 ############################################# --}}
                <div class="card-body ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-dark text-white-all">
                            <li style="font-weight: bolder" class="breadcrumb-item">Bailee 1 Details</li>
                        </ol>
                    </nav>
                </div>

                <label class="mt-3">Bailee 1 Name <span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="bailee_1_name" value="{{ old('bailee_1_name') }}" required
                    class="form-control">
                @error('bailee_1_name')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Bailee 1 Cnic (without Dashes) <span
                        style="font-size:16px;color:red;">*</span></label>
                <input type="number" name="bailee_1_cnic" value="{{ old('bailee_1_cnic') }}" required
                    class="form-control">
                @error('bailee_1_cnic')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror



                <label class="mt-3">Bailee 1 Relation With Customer<span
                        style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="bailee_1_relation_with_customer"
                    value="{{ old('bailee_1_relation_with_customer') }}" required class="form-control">
                @error('bailee_1_relation_with_customer')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror



                <label class="mt-3">Bailee 1 House Address<span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="bailee_1_house_address" value="{{ old('bailee_1_house_address') }}"
                    required class="form-control">
                @error('bailee_1_house_address')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror


                <label class="mt-3">Bailee 1 Office Address<span style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="bailee_1_office_address" value="{{ old('bailee_1_office_address') }}"
                    required class="form-control">
                @error('bailee_1_office_address')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Bailee 1 Phone No (without Dashes)<span
                        style="font-size:16px;color:red;">*</span></label>
                <input type="text" name="bailee_1_phone" value="{{ old('bailee_1_phone') }}" required
                    class="form-control">
                @error('bailee_1_phone')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror


                {{-- //########################### Balee 2 ######################################### --}}
                <div class="card-body ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-dark text-white-all">
                            <li style="font-weight: bolder" class="breadcrumb-item">Bailee 2 Details</li>
                        </ol>
                    </nav>
                </div>

                <label class="mt-3">Bailee 2 Name</label>
                <input type="text" name="bailee_2_name" value="{{ old('bailee_2_name') }}" class="form-control">
                @error('bailee_2_name')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Bailee 2 Cnic (without Dashes)</label>
                <input type="number" name="bailee_2_cnic" value="{{ old('bailee_2_cnic') }}" class="form-control">
                @error('bailee_2_cnic')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror



                <label class="mt-3">Bailee 2 Relation With Customer</label>
                <input type="text" name="bailee_2_relation_with_customer"
                    value="{{ old('bailee_2_relation_with_customer') }}" class="form-control">
                @error('bailee_2_relation_with_customer')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror



                <label class="mt-3">Bailee 2 House Address</label>
                <input type="text" name="bailee_2_house_address" value="{{ old('bailee_2_house_address') }}"
                    class="form-control">
                @error('bailee_2_house_address')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror


                <label class="mt-3">Bailee 2 Office Address</label>
                <input type="text" name="bailee_2_office_address" value="{{ old('bailee_2_office_address') }}"
                    class="form-control">
                @error('bailee_2_office_address')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <label class="mt-3">Bailee 2 Phone No (without Dashes)</label>
                <input type="text" name="bailee_2_phone" value="{{ old('bailee_2_phone') }}"
                    class="form-control">
                @error('bailee_2_phone')
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                @enderror



























                <button type="submit" class="btn btn-primary btn-block submit-form mt-4">Submit</button>

            </div>

        </form>
    </div>
</div>

@include('Resources.Footer')
