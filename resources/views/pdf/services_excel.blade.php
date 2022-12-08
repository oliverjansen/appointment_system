

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
                #tbDetail1 td {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                padding: 2px;
                }
                #tbDetail1 .detail-data td {
                border-style: none solid dotted none;
                }
                #tbDetail1 tr td span {
                display: inline-block;
                text-align: center;
                }
                #tbDetail2 td {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                padding: 2px;
                }
                #tbDetail2 .detail-data td {
                border-style: none solid dotted none;
                }
                #tbDetail2 tr td span {
                display: inline-block;
                text-align: center;
                }
                #tbDetail3 td {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                padding: 2px;
                }
                #tbDetail3.detail-data td {
                border-style: none solid dotted none;
                }
                #tbDetail3 tr td span {
                display: inline-block;
                text-align: center;
                }

                #tbDetail4 td {
                border-style: solid;
                border-color: #776b6b;
                border-width: 0.7px;
                padding: 2px;
                }
                #tbDetail4 .detail-data td {
                border-style: none solid dotted none;
                }
                #tbDetail4 tr td span {
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
                <h2 class="text-center">Services Inventory</h2>
      
        
                      <table id="tbDetail1" cellpadding="0" cellspacing="0" width="100%" style="font-size: 11.5px">
                        <thead>
                            <tr class="detail-header">
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Service</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Category</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Dose</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Vaccine Type</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Remaining Slot</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Date</b></td>
                            
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($vaccine  as $data)
                                <tr class="detail-data text-center">
                                    <td>&#160;{{$data->service}}</td>
                                    <td>&#160;{{$data->category}}</td>
                                    <td>&#160;{{$data->dose}}</td>
                                    <td>&#160;{{$data->vaccine_type}}</td>
                                    <td>&#160;{{$data->vaccine_slot}}</td>
                                    <td>&#160;{{  \Carbon\Carbon::parse($data->created_at)->format('m/Y'); }}</td>
                                </tr>
                          @endforeach
                          @foreach($other_services  as $data)
                          <tr class="detail-data text-center">
                              <td>&#160;{{$data->service}}</td>
                         
                              <td>&#160;{{$data->other_services}}</td>
                              <td>&#160;</td>
                              <td>&#160;</td>
                                   
                              <td>&#160;{{$data->other_services_slot}}</td>
                              <td>&#160;{{  \Carbon\Carbon::parse($data->created_at)->format('m/Y'); }}</td>




                              
                           
                          </tr>
                    @endforeach
                        </tbody>
                    </table>
        
                <div class="detail" style="width:100%">
         

               


                    {{-- dd --}}
                     <h2 class="text-center">Consumed Vaccine (Monthly) </h2>
                    <table id="tbDetail3" cellpadding="0" cellspacing="0" width="100%" style="font-size: 11.5px">
                        <thead>
                            <tr class="detail-header">
                            
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Category</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Vaccine</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Consumed</b></td>
                                <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Appointment Date</b></td>
                            
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($appointment_consumed  as $data)
                                <tr class="detail-data text-center">
                                    
                                    <td>&#160;{{$data->appointment_vaccine_category}}</td>

                                    <td>&#160;{{$data->vaccine}}</td>
                                    <td>&#160;{{$data->count}}</td>

                                    <td>&#160;{{ \Carbon\Carbon::parse($data->appointment_date)->format('m/Y');}}</td>



                                    
                                 
                                </tr>
                          @endforeach
                        </tbody>
                    </table> 
                     {{-- dd --}}
                     <h2 class="text-center">Consumed Medicine (Monthly) </h2>
                     <table id="tbDetail4" cellpadding="0" cellspacing="0" width="100%" style="font-size: 11.5px">
                         <thead>
                             <tr class="detail-header">
                             
                                 <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Medicine Category</b></td>
                                 <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Consumed</b></td>
                                 <td class="br-1 bb-1 bt-1 text-center" style="width:10%"><b>Appointment Date</b></td>
                             
                             </tr>
                         </thead>
                         <tbody>
                           @foreach($appointment_consumed_medicine  as $data)
                                 <tr class="detail-data text-center">
                                     
                                     <td>&#160;{{$data->appointment_vaccine_category}}</td>
                            
                                     <td>&#160;{{$data->count}}</td>
 
                                     <td>&#160;{{ \Carbon\Carbon::parse($data->appointment_date)->format('m/Y');}}</td>
 
 
 
                                     
                                  
                                 </tr>
                           @endforeach
                         </tbody>
                     </table> 
                     
                </div>
            </body>
        </html>

