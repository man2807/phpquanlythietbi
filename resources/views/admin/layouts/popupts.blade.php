
<div class="popupts" style='display:none;'> 
    <form action="{{ route('admin.supplies.postMuonts') }}" method="post" name="FormMuonts" id="FormMuonts" enctype="multipart/form-data">
    {{ csrf_field() }}    
        <input type="text" name='data' id='datajsonts' >
        <input type="text" name='idgv' id='dataidgvts' >
        <input type="submit" value='submit'>
    </form>
</div>
</div>
