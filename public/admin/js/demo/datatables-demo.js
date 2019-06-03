// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableCountry').DataTable({
    processing: true,
    serverSide: true,
      ajax:{
   url: "quocgia",
  },
    columns: [
    {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/images/flag/" + data + " width='30' class='img-thumbnail' />";
    },
    orderable: false
   },
            { data: 'tenquocgia', name: 'TenQuocGia' },
            { data: 'action', name: 'ThaoTac' }
            
        ] 
    });
});
