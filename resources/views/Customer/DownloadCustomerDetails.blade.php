@include('Resources.HeaderResources')


<style>
    body {
        margin-top: 20px;
        background-color: #f7f7ff;
    }

    #invoice {
        padding: 0px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }
</style>

<body>



    <div class="html-content" id="printableArea">

        {{-- <div id="invoice"> --}}
            <a style="margin-left: 10px;height:30px;" onclick="printDiv('printableArea')"
            class="btn btn-danger">Download</a>
            
            <div style="margin-left:5px;display:flex;justify-content: space-between;">
                <div>

                    <img style="width:17%;" align="left"
                    src="{{ asset('assets/img/Alicorp.png') }}">   
                    <h5 class="pt-4 pl-2" style="font-family:Arial, Helvetica, sans-serif;font-weight: bolder;">ALI CORPORATION &
                        INSTALLMENT CENTER</h5>
                </div>

            <figure class="avatar mr-5 avatar-xl  ">
                <img src="{{ asset('storage/CustomerImages/' . $customer[0]->Customer_Picture) }}">
            </figure>

        </div>
        <hr>
        <table class="table table-light table-striped pl-3">

            <tbody class="table">
                <tr>
                    <td><b>Account :</b> {{ $customer[0]->Account_No }}</td>
                    <td><b>First Name:</b> {{ $customer[0]->F_Name }}</td>
                    <td><b>Last Name:</b> {{ $customer[0]->L_Name }}</td>
                    <td><b>Customer CNIC :</b> {{ $customer[0]->Customer_Cnic }}</td>


                </tr>
                <tr>

                    <td><b>Gender :</b> {{ $customer[0]->Gender }}</td>
                    <td><b>Address :</b> {{ $customer[0]->Address }}</td>
                    <td><b>City :</b> {{ $customer[0]->City }}</td>
                    <td><b>State :</b> {{ $customer[0]->State }}</td>

                </tr>
                <tr>

                    <td><b>Phone :</b> {{ $customer[0]->Phone }}</td>
                    <td><b>Email :</b> {{ $customer[0]->Email }}</td>
                    <td><b>Date Of Birth :</b> {{ $customer[0]->Date_Of_Birth }}</td>
                    <td><b>Received Items :</b> {{ $customer[0]->Received_Items }}</td>

                </tr>
                <tr>

                    <td><b>Price : Rs:-</b> {{ $customer[0]->Price }}</td>
                    <td><b>Price On Installment : Rs:-</b> {{ $customer[0]->Price_On_Installment }}</td>
                    <td><b>Advance : Rs:-</b> {{ $customer[0]->Advance }}</td>
                    <td><b>Monthly Daily Installment : Rs:-</b> {{ $customer[0]->Monthly_Daily_Installment }}</td>

                </tr>
                <tr>

                    <td><b>Installment Start Date :</b> {{ $customer[0]->Installment_Start_Date }}</td>
                    <td><b>Bailee 1 Name :</b> {{ $customer[0]->bailee_1_name }}</td>
                    <td><b>Bailee 1 CNIC :</b> {{ $customer[0]->bailee_1_cnic }}</td>
                    <td><b>Bailee 1 Relation With Customer :</b> {{ $customer[0]->bailee_1_relation_with_customer }}
                    </td>

                </tr>

                <tr>

                    <td><b>Bailee 1 House Address:</b> {{ $customer[0]->bailee_1_house_address }}</td>
                    <td><b>Bailee 1 Office Address :</b> {{ $customer[0]->bailee_1_office_address }}</td>
                    <td><b>Bailee 1 Phone :</b> {{ $customer[0]->bailee_1_phone }}</td>
                    <td><b>Bailee 2 Name :</b> {{ $customer[0]->bailee_2_name }}</td>

                </tr>

                <tr>

                    <td><b>Bailee 2 CNIC:</b> {{ $customer[0]->bailee_2_cnic }}</td>
                    <td><b>Bailee 2 Relation With Customer :</b> {{ $customer[0]->bailee_2_relation_with_customer }}
                    </td>
                    <td><b>Bailee 2 House Address :</b> {{ $customer[0]->bailee_2_house_address }}</td>
                    <td><b>Bailee 2 Office Address :</b> {{ $customer[0]->bailee_2_office_address }}</td>

                </tr>

                <tr>

                    <td><b>Bailee 2 Phone:</b> {{ $customer[0]->bailee_2_phone }}</td>
                    <p style="margin-left:10px;">Downloaded On: {{ date('Y-m-d H:i:s') }}</p>

                </tr>
            </tbody>
        </table>
        <img style="justify-content:right;width:75%;" align="right"
            src="{{ asset('assets/img/AlicoorprotaionContract1.jpg') }}">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>
