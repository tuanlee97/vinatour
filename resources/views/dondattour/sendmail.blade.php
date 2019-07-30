

<p>Xin chào,
 <br>
Bạn đã đặt tour trên website VinaTour.tk  <br><br>
Chúng tôi gửi bạn những thông tin đã được chọn  .<br>  </p>
<tr> 
    <td width="100%">
        <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="m_7410365552716709891devicewidth">
            <tbody>
                             
                              
                              <tr> 
                                                
                                            
                                            
                                 <td>
                                 	<h3 style="text-align: center; font-weight: bold"> ĐƠN ĐẶT TOUR #{{$dondattour->id}}</h3>
                                 	Chương trình chi tiết : <a href="https://vinatour.tk/chitiettour/{{$tour->id}}">{{$tour->tentour}}</a>
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="1" class="">
                                    		<thead>
										      <tr>
										       <th >Họ và tên</th>
										       	<th >Số điện thoại</th>
										         <th>Giới tính</th>
										        <th >Loại</th>
										        <th >Passport/ CMND</th>
										        <th>Giá tiền</th>
										      </tr>
										    </thead>
                                       <tbody> 
                                       		@foreach($arr_chitietdattour as $ct)
                                       		<tr>
                                     			<td>{{$ct->ten}}</td>
                                     			<td>{{$ct->sdt}}</td>
                                     			<td>{{$ct->gioitinh}}</td>
                                     			<td>{{$ct->loai}}</td>
                                     			<td>{{$ct->passport}}</td>
                                     			<td>{{$ct->giatien}}</td>
                                     		<tr>
                                     		@endforeach
                                     		<tr> <td colspan="6">
				<div >
					Tổng tiền: &nbsp;
					<span style=" float: right;" > {{$dondattour->tongtien}} VND</span>
					
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