

        <html>
            <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


                <title>Detail</title>
            </head>
            <style>
                @page { margin:0; }
                body {
                padding: 45px;
                }
                #tbDetail {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                border-collapse: collapse;
                line-height: 16px;
                }
                #tbDetail td {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                padding: 2px;
                }
                #tbDetail .detail-data td {
                border-style: none solid dotted none;
                }
                #tbDetail tr td span {
                display: inline-block;
                text-align: center;
                }
                .bt-1{
                border-top: 1px solid #776b6b;
                }
                .br-1 {
                border-right: 1px solid #776b6b;
                }
                .bb-1 {
                border-bottom: 1px solid #776b6b;
                }
                .text-center {
                  text-align: center;
                }

                .margin-bottom{
                  margin-bottom: 2%;
                }

                .color-orange{
                    background-color: #FF5733;
                }

            </style>
            <body>
      
        
           
        
                <div class="detail" style="width:100%">
                    <table id="tbDetail" cellpadding="0" cellspacing="0" width="100%" style="font-size: 11.5px">
                        <thead>
                            <tr class="detail-header">
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Email</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Services</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Service Category</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Vaccine Dose</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Vaccine Name</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:20%">Appointment Date</td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($appointments_admin as $data)
                                <tr class="detail-data text-center">
                                    <td>&#160;{{$data->email}}</td>
                                    <td>&#160;{{$data->appointment_services}}</td>
                                    <td>&#160;{{$data->appointment_vaccine_category}}
                                    <td>{{$data->appointment_dose}} </td>
                                    <td>{{$data->appointment_vaccine_type}} </td>
                                    <td>&#160;{{$newDateFormat3 = \Carbon\Carbon::parse($data->appointment_date)->format('d/m/Y');}}</td>
                                    <td>&#160; @if($data->appointment_status == "success")
                                      <small class="bg-success px-1 rounded text-white">   {{$data->appointment_status}}</small>
                                      @elseif($data->appointment_status == "expired")
                                      <small class="color-orange px-1 rounded text-white">   {{$data->appointment_status}}</small>
                                      @elseif($data->appointment_status == "pending")
                                      <small class="bg-warning px-1 rounded text-white">   {{$data->appointment_status}}</small>
                                      @elseif($data->appointment_status == "canceled")
                                      <small class="bg-danger  px-1 rounded text-white">   {{$data->appointment_status}}</small>
          
                                      @endif</td>
                                 
                                </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </body>
        </html>

