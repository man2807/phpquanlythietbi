
<div class="popup" style='display:none;'> 
    <form action="{{ route('admin.supplies.postMuonvt') }}" method="post" name="FormMuon" id="FormMuon" enctype="multipart/form-data">
    {{ csrf_field() }}    
        <input type="text" name='data' id='datajson' >
        <input type="text" name='idgv' id='dataidgv' >
        <input type="submit" value='submit'>
    </form>
</div>
</div>
