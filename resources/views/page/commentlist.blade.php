 @if(Auth::guard('web')->check())
@foreach($comments as $comment)
	<div  class="panel panel-default" >
		
		<p><b>{{ $comment->name }}</b>: {{ $comment->comment }}@if($comment->userid==Auth::user()->id|| Auth::user()->role==3)

				<span  style=" float: right;" >
					<a value="{{$comment->commentid}}" id="suaphanhoi"  title="Chỉnh sửa"><i class="fa fa-pencil">&emsp;</i>

						<a  id="xoaphanhoi"value="{{$comment->commentid}}" title="Xóa" ><i class="fa fa-trash-o"></i></a>&emsp;
			@endif</p><p style="font-size:9px;">{{ date('M d, Y h:i A', strtotime($comment->updated_at)) }}</p> 
		
	</div>
@endforeach
@else
@foreach($comments as $comment)
	<div  class="panel panel-default" >
		
		<p><b>{{ $comment->name }}</b>: {{ $comment->comment }}</p><p style="font-size:9px;">{{ date('M d, Y h:i A', strtotime($comment->updated_at)) }}</p> 
		
	</div>
@endforeach
@endif