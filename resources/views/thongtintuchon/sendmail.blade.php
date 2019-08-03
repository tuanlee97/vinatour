

<p>Xin chào,
 <br>
Bạn đã tùy chọn tour trên website VinaTour.tk  <br><br>
Chúng tôi gửi bạn những thông tin đã được chọn  .<br>  </p>
<tr> 
    <td width="100%">
        <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="m_7410365552716709891devicewidth">
            <tbody>
                             
                              
                              <tr> 
                                                
                                            
                                            
                                 <td>
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="1" class="">
                                    		<thead>
										      <tr>
										       <th >Ngày</th>
										       	<th >Tỉnh</th>
										         <th>Địa danh</th>
										        <th >Nhà hàng</th>
										        <th >Khách sạn</th>
										        <th>Thành tiền</th>
										      </tr>
										    </thead>
                                       <tbody> 
                                       		@foreach($arr_chitiet as $ct)
                                       		<tr>
                                     			<td>{{$ct->lichtrinhngay}}</td>
                                     			<td>{{$ct->tinh}}</td>
                                     			<td>{{$ct->diadanh}}</td>
                                     			<td>{{$ct->nhahang}}</td>
                                     			<td>{{$ct->khachsan}}</td>
                                     			<td>{{$ct->tongtienngay}}</td>
                                     		<tr>
                                     		@endforeach
                                     		<tr> <td colspan="6">
				<div >
					Tổng dự kiến tour đã chọn: &nbsp;
					<span style=" float: right;" > {{$tuchon->tongtien}} VND</span>
					
				</div>
					
			</td>

			</tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              
                              <tr>
                                 <td height="10" style="font-size:1px;line-height:1px">&nbsp;</td>
                              </tr>
                              
                               <tr>
                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
                                          </tr>
             </tbody>
          </table>
      </td>
  </tr>