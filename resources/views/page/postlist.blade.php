 @if(Auth::guard('web')->check())
@foreach($posts as $post)
	<div class="panel panel-default  " >
	
		<div class="panel-body ">

			<p style="font-size:16px;"><b>{{ $post->name }}</b> đã viết.</p>
			<p style="font-size:11px; margin-top:-10px;">{{ date('M d, Y h:i A', strtotime($post->created_at)) }}</p>
			<h3 style="padding-top:5px; padding-bottom:5px;">{{ $post->post }} 
				@if($post->userid==Auth::user()->id || Auth::user()->role==3 )

				        <span  style=" float: right;" >

				        	<a title="Chỉnh sửa" id="suaykien" value="{{$post->postid}}"><i class="fa fa-pencil">&emsp;</i>

				        	<a title="Xóa" id="xoaykien" value="{{$post->postid}}"  ><i class="fa fa-trash-o"></i></a>&emsp;
				@endif</h3>
		</div>			
		<div class="panel-footer">
			<div class="row ">
				<div class="col-md-2 ">
					
					<button type="button" class="btn btn-primary btn-sm comment" value="{{ $post->postid }}"><i class="fa fa-comments"></i> 
						 @foreach($count as $c) @if($c->postid==$post->postid)    {{$c->count}}    @endif @endforeach Phản hồi
					</button>
				</div>
				
				

			
				
				

			</div>
		</div>
	</div>

	<div  id="commentField_{{ $post->postid }}" class="panel panel-default" style="background: #f5f5f5;padding:10px;margin-left: 30px; margin-top:-20px; display:none;">
		<div id="comment_{{ $post->postid }}"   >
		</div>
		 @if(Auth::guard('web')->check())
		<form id="commentForm_{{ $post->postid }}" >
			@csrf
			<input type="hidden" value="{{ $post->postid }}" name="postid">
			<div class="row"> 
				<div class="col-md-10 " >
					<input  type="text" name="commenttext{{ $post->postid }}" id="commenttext{{ $post->postid }}" data-id="{{ $post->postid }}" class="form-control commenttext" placeholder="Nhập phản hồi...">
				</div>
				<div class="col-md-2" style="margin-left:-25px;">
					<button type="button" class="btn btn-primary submitComment" value="{{ $post->postid }}"><i class="fa fa-comment"></i> Trả lời</button>
				</div>
			</div>
			
		</form>
		@endif
	</div>

@endforeach
@else
@foreach($posts as $post)
	<div class="panel panel-default" >
	
		<div class="panel-body">

			<p style="font-size:16px;"><b>{{ $post->name }}</b> đã viết.</p>
			<p style="font-size:11px; margin-top:-10px;">{{ date('M d, Y h:i A', strtotime($post->created_at)) }}</p>
			<h3 style="padding-top:5px; padding-bottom:5px;">{{ $post->post }} 
				
		</div>			
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-2">
					
					<button type="button" class="btn btn-primary btn-sm comment" value="{{ $post->postid }}"><i class="fa fa-comments"></i> 
						 @foreach($count as $c) @if($c->postid==$post->postid)    {{$c->count}}    @endif @endforeach Phản hồi
					</button>
				</div>
				
				

			
				
				

			</div>
		</div>
	</div>

	<div  id="commentField_{{ $post->postid }}" class="panel panel-default" style="background: #f5f5f5;padding:10px;margin-left: 30px; margin-top:-20px; display:none;">
		<div id="comment_{{ $post->postid }}"   >
		</div>
		 @if(Auth::guard('web')->check())
		<form id="commentForm_{{ $post->postid }}" >
			@csrf
			<input type="hidden" value="{{ $post->postid }}" name="postid">
			<div class="row"> 
				<div class="col-md-10 " >
					<input  type="text" name="commenttext{{ $post->postid }}" id="commenttext{{ $post->postid }}" data-id="{{ $post->postid }}" class="form-control commenttext" placeholder="Nhập phản hồi...">
				</div>
				<div class="col-md-2" style="margin-left:-25px;">
					<button type="button" class="btn btn-primary submitComment" value="{{ $post->postid }}"><i class="fa fa-comment"></i> Trả lời</button>
				</div>
			</div>
			
		</form>
		@endif
	</div>

@endforeach

@endif