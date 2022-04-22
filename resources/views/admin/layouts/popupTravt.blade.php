<div class="popup2" style='display:none;'> <!-- Cho nó ẩn cái popup này trc -->
    <form action="{{ route('admin.supplies.postTravt') }}" method="post" name="FormTra" id="FormTra" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <input type="text" name='data' id='datajson' ><!--Lưu json vào đây -->
        <!-- Hiển thị json vào đây ul li -->
        <ul id = 'viewsp'>
            <!-- <li><a href="" class="sp">Sản phẩm 1</a></li> -->
        </ul>
        <input type="text" class="user" name ='user' id='user'>
        <input type="submit" value='submit'>
    </form>
</div>