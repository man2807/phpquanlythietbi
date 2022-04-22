$(document).ready(function(){
    $('body').on('click', '#addVat', function(e) {
        e.preventDefault();
        var _this =$(this);
        var cont = $('#browser').val();
        const myArray = cont.split("|");
        var datahtml = "<li class='item flex'><div class='vattuok' data-id='"+
        myArray[0].replace("[", "").replace("]", "")
        +"' data-price='"+
        myArray[2].replace("[", "").replace("]", "").split("(")[1].replace(")", "")
        +"' style='color:green;'>"+myArray[1].replace("[", "").replace("]", "").split("(")[0]
        +"</div><div class='iconClose' style='color:red;'><i class='fas fa-times'></i></div></li>";
        $('#vattu').append(datahtml);
        $('#browser').val("");
    });
    $('body').on('click', '#supplie', function(e) {
        e.preventDefault();
        var _this =$(this);
        var contai = $('#vattu').children();
        var Sumer = 0;
        var listId = "";
        contai.each(function(index){
            var clasOk = $(this).find('.vattuok');
            Sumer += $(clasOk).data('price');
            listId = listId + $(clasOk).data('id')+",";
        });
        $('#listVat').val(listId);
        console.log(listId);
        $('#supplie').val(Sumer);
    });
    $('body').on('change', '#name_kh', function(e) {
        e.preventDefault();
        var _this =$(this);
        var phone = $('#name_kh').val();
        var settings = {
            "url": "http://chmt.test/check/"+phone,
            "method": "GET",
            "timeout": 0,
            "headers": {},
          };
          $.ajax(settings).done(function (response) {
            console.log(response);
            if(response.includes("not found")){
                alert("Không tìm thấy thông tin, Vui lòng thêm mới !");
                return;
            }
            $('#name_kh').val(response[0].name);
            $('#id_custemer').val(response[0].id);
          });
    });
    $('body').on('change', '#phonenumber', function(e) {
        e.preventDefault();
        var _this =$(this);
        var phone = $('#phonenumber').val();
        var settings = {
            "url": "http://chmt.test/check/"+phone,
            "method": "GET",
            "timeout": 0,
            "headers": {},
          };
          $.ajax(settings).done(function (response) {
            console.log(response);
            if(response.includes("not found")){
                return;
            }
            alert("Số điện thoại đã tồn tại !");
            $('#phonenumber').val("");
          });
    });
    $('body').on('click', '.iconClose', function(e) {
        e.preventDefault();
        var _this =$(this);
        _this.parent().closest('li').remove();
    });
    $('body').on('change', '#name', function(e) {
        e.preventDefault();
        var _this =$(this);
        ChangeToSlug();
        var $meny = document.getElementById('name').value;
    });
    $('body').on('click', '#search_bill', function(e) {
        e.preventDefault();
        var _this =$(this);
        var data = $('#search_input').val();
        if(!data.includes('HD-')){
            alert('Vui lòng nhập đúng định dạng !');
            return;
        }
        var idCheck = data.split("-")[1];
        var settings = {
            "url": "http://chmt.test/hoadon/"+idCheck,
            "method": "GET",
            "timeout": 0,
            "headers": {},
          };
          $.ajax(settings).done(function (response) {
            console.log(response);
            var obj = response[0];
            $('#id').val(obj.id);
            var id_cus = obj.id_custemer;
            var settings = {
                "url": "http://chmt.test/checkid/1",
                "method": "GET",
                "timeout": 0,
                "headers": {},
              };
              
              $.ajax(settings).done(function (response) {
                console.log(response);
                var objs = response[0];
                $('#name_kh').val(objs.name);
                $('#id_custemer').val(objs.id);
              });
            $('#name_pc').val(obj.name_pc);
            $('#content').val(obj.content);
            $('#note').val(obj.note);
            $('#time_in').val(obj.time_in);
            $('#time_out').val(obj.time_out);
            $('#suachua').val(obj.suachua);
            $('#listVat').val(obj.listSupplie);
            $('#supplie').val(obj.supplie);
            $('#status').val(obj.status);
            const aray = obj.listSupplie.split(",");
            aray.forEach(element => {
                console.log(element);
                var settings = {
                    "url": "http://chmt.test/vattu/"+element,
                    "method": "GET",
                    "timeout": 0,
                    "headers": { },
                  };
                  $.ajax(settings).done(function (response) {
                    console.log(response);
                    var obj = response[0];
                        var datahtml = "<li class='item flex'><div class='vattuok' data-id='"+
                    obj.id
                    +"' data-price='"+
                    obj.price_out
                    +"' style='color:green;'>"+obj.name
                    +"</div><div class='iconClose' style='color:red;'><i class='fas fa-times'></i></div></li>";
                    $('#vattu').append(datahtml);
                  });
                })
            });
    });
     $('body').on('change', '#combobox', function(e) {
        e.preventDefault();
        var _this =$(this);
        alert(_this.val());
        alert(_this.data("id"));
        if(_this.val() == 3){
          var settings = {
            "url": "/supplies/delete/"+_this.data("id"),
            "method": "GET",
            "timeout": 0,
            "headers": {},
          };
          
          $.ajax(settings).done(function (response) {
              if(response == "success"){
                  alert("Xóa thành công !");
              }else{
                alert("Xóa thất bại!");
              }
              location.reload();
            console.log(response);
          });
        }
    });
    $('body').on('click', '#ExportData', function(e){
          e.preventDefault();
          var _this =$(this);
          $('#loading1').css('opacity','1');
          $('#loading1').css('visibility','visible');
          var start = $('#startTime').val();
          var end = $('#endTime').val();
          var settings = {
            "url": "http://chmt.test/getbill/"+start+"/"+end,
            "method": "GET",
            "timeout": 0,
            "headers": { },
          };
          let CsvString = "";
          CsvString += "Id,";
          CsvString += "Id_cus,";
          CsvString += "Name,";
          CsvString += "PhoneNumber,";
          CsvString += "Name_Pc,";
          CsvString += "Content,";
          CsvString += "Dis,";
          CsvString += "time_in,";
          CsvString += "time_out,";
          CsvString += "phisuachua,";
          CsvString += "AllSupplie,";
          CsvString += "Status\n";
          $.ajax(settings).done(function (response) {
              console.log(response);
              var array = response;
              if(response.includes("not found")){
                alert("Không tìm thấy hóa đơn !");
                return;
              }
              array.forEach(element =>{
                var obj = element;
                $('#id').val(obj.id);
                var id_cus = obj.id_custemer;
                var settings = {
                    "url": "http://chmt.test/checkid/"+id_cus,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {},
                  };
                  $.ajax(settings).done(function (response) {
                    var objs = response[0];
                    CsvString += obj.id +",";
                    CsvString += objs.id +",";
                    CsvString += objs.name +",";
                    CsvString += objs.phone +",";
                    CsvString += obj.name_pc +",";
                    CsvString += obj.content +",";
                    CsvString += obj.note +",";
                    CsvString += obj.time_in +",";
                    CsvString += obj.time_out +",";
                    CsvString += obj.suachua +",";
                    CsvString += obj.supplie +",";
                    if(obj.status == '1'){
                        CsvString += "No\n";
                    }else{
                        CsvString += "Done\n";
                    }
                  });
              });
          });
          setTimeout(function(){ 
            var link = document.createElement("a");
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(CsvString));
            link.setAttribute("download", "Bill_"+getToDay()+".csv");
            link.click();
            $('#loading1').css('opacity','0');
            $('#loading1').css('visibility','hidden');
         }, 5 * 1000);

    });
    $('body').on('click', '#Export', function(e) {
        e.preventDefault();
        var _this =$(this);
        $('#loading').css('opacity','1');
        $('#loading').css('visibility','visible');
        var listId = _this.data("list");
        var array = listId.split(',');
        let CsvString = "";
        CsvString += "Id,";
        CsvString += "Id_cus,";
        CsvString += "Name,";
        CsvString += "PhoneNumber,";
        CsvString += "Name_Pc,";
        CsvString += "Content,";
        CsvString += "Dis,";
        CsvString += "time_in,";
        CsvString += "time_out,";
        CsvString += "phisuachua,";
        CsvString += "AllSupplie,";
        CsvString += "Status\n";
        array.forEach(element =>{
            if(element.length > 0){
                var settings = {
                    "url": "http://http://127.0.0.1:8000/hoadon/"+element,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {},
                  };
                  $.ajax(settings).done(function (response) {
                    var obj = response[0];
                    $('#id').val(obj.id);
                    var id_cus = obj.id_custemer;
                    var settings = {
                        "url": "http://127.0.0.1:8000/checkid/"+id_cus,
                        "method": "GET",
                        "timeout": 0,
                        "headers": {},
                      };
                      $.ajax(settings).done(function (response) {
                        var objs = response[0];
                        CsvString += obj.id +",";
                        CsvString += objs.id +",";
                        CsvString += objs.name +",";
                        CsvString += objs.phone +",";
                        CsvString += obj.name_pc +",";
                        CsvString += obj.content +",";
                        CsvString += obj.note +",";
                        CsvString += obj.time_in +",";
                        CsvString += obj.time_out +",";
                        CsvString += obj.suachua +",";
                        CsvString += obj.supplie +",";
                        if(obj.status == '1'){
                            CsvString += "No\n";
                        }else{
                            CsvString += "Done\n";
                        }
                      });
            });
            }
        });
        setTimeout(function(){ 
            var link = document.createElement("a");
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(CsvString));
            link.setAttribute("download", "Bill_"+getToDay()+".csv");
            link.click();
            $('#loading').css('opacity','0');
            $('#loading').css('visibility','hidden');
         }, array.length * 1000);
        //Xong chuỗi
    });
    $('body').on('click', '.deleteCategory', function(e) {
        e.preventDefault();
        var _this =$(this);
        var settings = {
            "url": "/category/delete/"+_this.data("id"),
            "method": "GET",
            "timeout": 0,
            "headers": {},
          };
          
          $.ajax(settings).done(function (response) {
              if(response == "success"){
                  alert("Xóa thành công !");
              }else{
                alert("Xóa thất bại!");
              }
              location.reload();
            console.log(response);
          });
    });
    function ChangeToSlug()
    {
        var title, slug;
    
        //Lấy text từ thẻ input title 
        title = document.getElementById("name").value+"-"+new Date().toISOString();;
    
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('sku').value = md5(slug);
    }
    function getToDay(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm + '.' + dd + '.' + yyyy;
        return today;
    }

    $('body').on('click', '#muon', function(e) {
      e.preventDefault();
      var _this =$(this);
      var json_data = [];
      var idgvs = [];
      var elements = document.getElementsByClassName('slmuon');
      var id = document.getElementsByClassName('slmuon2');
      var idgv = document.getElementById('tengv');
      for (let i = 0; i<elements.length; i++){
        if(elements[i].value > 0){
            //lấy id và số lượng thay đổi của thiết bị
            //json_data  = json_data + "'"+id[i].value+"':'"+ elements[i].value +"',";
            json_data.push(id[i].value);
            json_data.push(elements[i].value);
        }
      }
      $('#datajson').val(json_data);
      $('#dataidgv').val(idgv.value);
      $('.popup').toggleClass();
      document.forms["FormMuon"].submit();
      
   // alert(json_data);
    });
    $('body').on('click', '#tra', function(e) {
      e.preventDefault();
      var _this =$(this);
      var json_data = [];
      var idgvs = [];
      var elements = document.getElementsByClassName('slmuon');
      var id = document.getElementsByClassName('slmuon2');
      var idgv = document.getElementById('tengv');
      for (let i = 0; i<elements.length; i++){
        if(elements[i].value > 0){
            //lấy id và số lượng thay đổi của thiết bị
            //json_data  = json_data + "'"+id[i].value+"':'"+ elements[i].value +"',";
            json_data.push(id[i].value);
            json_data.push(elements[i].value);
        }
      }
      $('#datajson').val(json_data);
      $('#dataidgv').val(idgv.value);
      $('.popup').toggleClass();
      document.forms["FormMuon"].submit();
      
   // alert(json_data);
    });
});