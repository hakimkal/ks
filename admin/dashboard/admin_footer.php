
				<!-- /Page Content -->
			</div>
	</div>

</body>
</html>

<script type="text/javascript">
$().ready(function(){
$('.delete').click(function(e){
	//alert("clicked")
	
	if(confirm('Are you sure to delete ?'))
	{
	    // alert('Data deleted');
	   
	    return true;
	}
	else{
		e.preventDefault();
		return false;
		}
	
});

	
});
function DeleteClick(serial_no)
{
	
if(confirm('Are you sure to delete ' + serial_no + '?'))
{
     alert('Data deleted');
    return true;
}

else{
return false;
}}


</script>