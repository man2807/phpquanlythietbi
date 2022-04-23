<div class="popup2" style='display:none;'> 
    <form action="{{ route('admin.supplies.postTravt') }}" method="post" name="FormTra" id="FormTra" enctype="multipart/form-data">
    {{ csrf_field() }}    
        <input type="text" name='data' id='datajson2' >
        <input type="text" name='idgv' id='dataidgv2' >
        <input type="submit" value='submit'>
    </form>
</div>
</div>