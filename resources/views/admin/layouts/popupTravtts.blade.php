<div class="popup2ts" style='display:none;'> 
    <form action="{{ route('admin.supplies.postTrats') }}" method="post" name="FormTrats" id="FormTrats" enctype="multipart/form-data">
    {{ csrf_field() }}    
        <input type="text" name='data' id='datajson2ts' >
        <input type="text" name='idgv' id='dataidgv2ts' >
        <input type="submit" value='submit'>
    </form>
</div>
</div>